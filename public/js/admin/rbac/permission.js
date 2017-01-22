$(document).ready(function() {
        App.init();
    new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        el: '#permission',
        data: {
            pagination: {
                total: 0,
                per_page: 7,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects
            items: [],
            msg:'',
            pageSize:10,
            name:'',
            title:'只能查顶级权限'
        },
        created: function () {
            this.fetchItems(this.pagination.current_page,this.pageSize,'');
        },
        methods: {
            /**
             *  [fetchItems 获取权限]
             */
            fetchItems: function (page,pageSize,name) {
                this.pagination.current_page = page;
                var data = {page: page,pageSize:pageSize,display_name:name};
                this.$http.post(Aizxin.U('admin/permission/index'), data).then(function (response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function (error) {
                    // handle error
                });
            },
            /**
             *  [destroy 删除权限]
             */
            destroy:function (id){
                var _this = this;
                layer.confirm('确认删除权限', {icon: 1, title:'删除权限'}, function(index){
                    _this.$http.delete(Aizxin.U('admin/permission') + "/" + id).then(function(response) {
                        if(response.data.code == 400){
                            layer.close(index);
                            layer.msg(response.data.message);
                        }
                        if (response.data.code == 200) {
                            layer.msg(response.data.message, {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                _this.name = '';
                                _this.fetchItems(_this.pagination.current_page,_this.pageSize,'');
                            });
                        }
                    }, function (error) {
                       layer.close(index);
                       layer.msg('系统错误');
                    });
                });
            }
        }
    });
    });