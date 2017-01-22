$(document).ready(function() {
    App.init();
    new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        el: '.webConfig',
        data: {
            config: [],
            code: [],
            con: {},
            load: null
        },
        created: function() {
            this.configActive(1)
        },
        methods: {
            /**
             *  [configActive 点击事件]
             *  臭虫科技
             *  @author chouchong
             *  @DateTime 2017-01-12T13:12:35+0800
             */
            configActive: function(id) {
                var data = {
                    group: id
                };
                this.$http.post(Aizxin.U('admin/config/index'), data).then(function(response) {
                    this.$set('config', response.data.result.list);
                    this.$set('code', response.data.result.code);
                }, function(response) {
                    console.log(response)
                });
            },
            /**
             *  [editConfig 信息修改]
             *  臭虫科技
             *  @author chouchong
             *  @DateTime 2017-01-13T10:33:25+0800
             *  @return   {[type]}                 [description]
             */
            editConfig: function() {
                this.$set('load', layer.load());
                this.$set('con', {});
                for (var i = 0; i < this.code.length; i++) {
                    this.con[this.code[i]] = $('#' + this.code[i]).val();
                    if (this.code[i] == 'WEB_SITE_LOGO') {
                        this.con[this.code[i]] = $('#' + this.code[i])[0].src;
                    }
                    if ($(".fileinput-preview").find('img').length > 0) {
                        this.con.base64 = $(".fileinput-preview").find('img')[0].src;
                    }
                }
                this.$http.post(Aizxin.U('admin/config'), this.con).then(function(response) {
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
                    // var ii = layer.load();
                    //此处用setTimeout演示ajax的回调
                    setTimeout(function() {
                        layer.close(_this.load);
                        _this.$set('load', null);
                        layer.msg(response.data.message, {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function() {});
                    }, 3000);
                }
            }
        }
    });
});