$(document).ready(function() {
    App.init();
    FormPlugins.init();
    FormSliderSwitcher.init();
    new Vue({
        el: '#role',
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        data: {
            r: {},
            msg: '',
            load: null,
        },
        created: function() {
            this.$set('r', Aizxin.getV())
        },
        methods: {
            addRole: function() {
                if (this.r.id != undefined && this.r.id > 0) {
                    this.updateNode(this.r);
                } else {
                    this.createNode(this.r);
                }
            },
            createNode: function(data) {
                this.$set('load', layer.load());
                this.$http.post(Aizxin.U('admin/role'), data).then(function(response) {
                    this.callback(response);
                }, function(response) {
                    console.log(response)
                });
            },
            updateNode: function(data) {
                this.$set('load', layer.load());
                this.$http.put(Aizxin.U('admin/role') + "/" + data.id, data).then(function(response) {
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
                            window.location.href = Aizxin.U('admin/role/index');
                        });
                    }, 3000);
                }
            }
        }
    });
});