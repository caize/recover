$(document).ready(function() {
    App.init();
    new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        el: '#user',
        data: {
            pagination: {
                total: 0,
                per_page: 7,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4, // left and right padding from the pagination <span>,just change it to see effects
            items: [],
            msg: '',
            pageSize: 10,
            name: '',
            user: {
                roles: []
            },
            role: [],
            title: '只能查用户'
        },
        created: function() {
            this.fetchItems(this.pagination.current_page, this.pageSize, '');
            this.$set('role', Aizxin.getV());
        },
        methods: {
            /**
             *  [fetchItems 获取权限]
             */
            fetchItems: function(page, pageSize, name) {
                this.pagination.current_page = page;
                var data = {
                    page: page,
                    pageSize: pageSize,
                    name: name
                };
                this.$http.post(Aizxin.U('admin/user/index'), data).then(function(response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function(error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [destroy 删除权限]
             */
            destroy: function(id) {
                var _this = this;
                layer.confirm('确认删除权限', {
                    icon: 1,
                    title: '提示'
                }, function(index) {
                    _this.$http.delete(Aizxin.U('admin/user') + "/" + id).then(function(response) {
                        if (response.data.code == 400) {
                            layer.close(index);
                            layer.msg(response.data.message);
                        }
                        if (response.data.code == 200) {
                            layer.msg(response.data.message, {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function() {
                                _this.name = '';
                                _this.fetchItems(_this.pagination.current_page, _this.pageSize, '');
                            });
                        }
                    }, function(error) {
                        layer.close(index);
                        layer.msg('系统错误');
                    });
                });
            },
            /**
             *  [userRole 角色显示]
             */
            userRole: function(id) {
                this.user.user_id = id;
                this.$set('user.role_id', 0)
                this.$http.get(Aizxin.U('admin/user') + "/" + id).then(function(response) {
                    if (response.data.result.length > 0) {
                        this.$set('user.role_id', response.data.result[0].id)
                    }
                }, function(error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [addRole 角色更新]
             */
            addRole: function() {
                this.user.roles.push(this.user.role_id);
                this.$http.post(Aizxin.U('admin/user/role'), this.user).then(function(response) {
                    if (response.data.code == 200) {
                        var ii = layer.load();
                        //此处用setTimeout演示ajax的回调
                        setTimeout(function() {
                            layer.close(ii);
                            $('#modal-dialog').modal('hide');
                        }, 3000);
                    }
                    if (response.data.code == 400) {
                        $('#modal-dialog').modal('hide');
                        layer.msg(response.data.message)
                    }
                }, function(error) {
                    console.log("系统错误");
                });
            }
        }
    });
});