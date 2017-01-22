$(document).ready(function() {
    App.init();
    Notification.init();
    $('.r1 td:nth-child(1) .inverted').on('click', function() {
        if ($(this).prop('checked')) {
            $(this).closest('td').siblings().find('.inverted').prop('checked', true);
        } else {
            $(this).closest('td').siblings().find('.inverted').prop('checked', false);
        }
    });
    $('.r1 td:nth-child(2) .r2 .inverted').on('click', function() {
        if ($(this).prop('checked')) {
            $(this).closest('.r2').siblings('.r3').find('.inverted').prop('checked', true);
        } else {
            $(this).closest('.r2').siblings('.r3').find('.inverted').prop('checked', false);
        }
    });
    new Vue({
        el: '#role',
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
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
            rule: [],
            role: {},
            title: '只能查角色名'
        },
        created: function() {
            this.fetchItems(this.pagination.current_page, this.pageSize, '');
            this.$set('rule', Aizxin.getV());
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
                    display_name: name
                };
                this.$http.post(Aizxin.U('admin/role/index'), data).then(function(response) {
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
                layer.confirm('确认删除角色', {
                    icon: 1,
                    title: '提示'
                }, function(index) {
                    _this.$http.delete(Aizxin.U('admin/role') + "/" + id).then(function(response) {
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
             *  [permission 权限显示]
             */
            permission: function(id) {
                $("input[type='checkbox']").prop('checked', false);
                this.role.id = id;
                this.$http.get(Aizxin.U('admin/role') + "/" + id).then(function(response) {
                    if (response.data.result.length > 0) {
                        var grant = response.data.result;
                        for (var i = 0; i < grant.length; i++) {
                            $('#rules_' + grant[i].id).prop('checked', true);
                        }
                    }
                }, function(error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [addRule 权限分配]
             */
            addRule: function() {
                let grant = [];
                $('.inverted').each(function() {
                    if ($(this).prop('checked')) grant.push($(this).val());
                });
                this.role.rules = grant;
                this.$http.post(Aizxin.U('admin/role/permission'), this.role).then(function(response) {
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