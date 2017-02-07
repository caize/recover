$(document).ready(function() {
    new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        el: '#node',
        data: {
            p: {},
            msg: '',
            load: null
        },
        created: function() {
            this.$set('p', Aizxin.getV());
        },
        methods: {
            addNode: function() {
                this.p.parent_id = $("#parent_id").val();
                this.p.is_menu = this.p.is_menu ? 1 : 0;
                if (this.p.id != undefined && this.p.id > 0) {
                    this.updateNode(this.p);
                } else {
                    this.createNode(this.p);
                }
            },
            createNode: function(data) {
                this.$set('load', layer.load());
                this.$http.post(Aizxin.U('admin/permission'), data).then(function(response) {
                    this.callback(response)
                }, function(response) {
                    console.log(response)
                });
            },
            updateNode: function(data) {
                this.$http.put(Aizxin.U('admin/permission') + "/" + data.id, data).then(function(response) {
                    this.callback(response)
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
                            window.location.href = Aizxin.U('admin/permission/index');
                        });
                    }, 3000);
                }
            }
        }
    });
    App.init();
    FormPlugins.init();
    FormSliderSwitcher.init();
});