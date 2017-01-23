$(document).ready(function() {
    App.init();
    FormPlugins.init();
    FormSliderSwitcher.init();
    new Vue({
        el: '#user',
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        data: {
            u: {},
            msg: '',
            readonly: false,
            load: null
        },
        created: function() {
            this.$set('u', Aizxin.getV());
            if (this.u.id > 0) {
                this.readonly = true;
            }
        },
        methods: {
            addUser: function() {
                this.$set('load', layer.load());
                if (this.u.id != undefined && this.u.id > 0) {
                    this.updateUser(this.u);
                } else {
                    this.createUser(this.u);
                }
            },
            createUser: function(data) {
                this.$http.post(Aizxin.U('admin/user'), data).then(function(response) {
                    this.callback(response)
                }, function(response) {
                    console.log(response)
                });
            },
            updateUser: function(data) {
                this.$http.put(Aizxin.U('admin/user') + "/" + data.id, data).then(function(response) {
                    this.callback(response)
                }, function(response) {
                    console.log(response)
                });
            },
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
                            window.location.href = Aizxin.U('admin/user/index');
                        });
                    }, 3000);
                }
            }
        }
    });
});