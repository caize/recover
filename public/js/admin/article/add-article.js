$(document).ready(function() {
    App.init();
    FormPlugins.init();
});
$(function() {
    // var editor = editormd('editor',{
    //     width   : "100%",
    //     height  : 640,
    //     syncScrolling : "single",
    //     toolbarAutoFixed: false,
    //     gotoLine:false,
    //     emoji:true,
    //     saveHTMLToTextarea:true,
    //     path    : "{{asset('assets/plugins/editor/lib')}}/",
    //     imageUpload : true,
    //     imageUploadURL : '/admin/article/upload'
    // });
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', Aizxin.conf.TOKEN); //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
    });
    new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        el: '#addArticle',
        data: {
            article: {
                category_id: 0
            },
            msg: '',
            load: null,
        },
        created: function() {
            this.$set('article', Aizxin.getV())
            if (this.article.id > 0) {
                $("#articleImg").attr('src', this.article.img);
                $("#container").html(this.article.content);
            } else {
                this.$set('article.category_id', 0);
            }
        },
        methods: {
            addArticle: function() {
                this.$set('load', layer.load());
                this.article.category_id = $('#category_id').val();
                this.article.content = ue.getContent();
                this.article.img = $("#articleImg")[0].src;
                if ($(".fileinput-preview").find('img').length > 0) {
                    this.article.base64 = $(".fileinput-preview").find('img')[0].src;
                }
                if (this.article.id != undefined && this.article.id > 0) {
                    this.updateArticle(this.article);
                } else {
                    this.createArticle(this.article);
                }
            },
            createArticle: function(data) {
                this.$http.post(Aizxin.U('admin/article'), data).then(function(response) {
                    this.callback(response);
                }, function(response) {
                    console.log(response)
                });
            },
            updateArticle: function(data) {
                this.$http.put(Aizxin.U('admin/article') + "/" + data.id, data).then(function(response) {
                    this.callback(response);
                }, function(response) {
                    console.log(response)
                });
            },
            /**
             *  [callback 返回响应]
             */
            callback: function(response) {
                var _this = this;
                if (response.data.code == 400) {
                    layer.msg(response.data.message, {
                        icon: 2
                    });
                    layer.close(_this.load);
                }
                if (response.data.code == 422) {
                    layer.msg(response.data.message, {
                        icon: 2
                    });
                    layer.close(_this.load);
                }
                if (response.data.code == 200) {
                    //此处用setTimeout演示ajax的回调
                    setTimeout(function() {
                        layer.close(_this.load);
                        _this.$set('load', null);
                        layer.msg(response.data.message, {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function() {
                            window.location.href = Aizxin.U('admin/article/index');
                        });
                    }, 3000);
                }
            }
        }
    });
});