$(document).ready(function() {
    App.init();
    Notification.init();
    $('#nestable3').nestable('serialize');

    new Vue({
        el: '#category',
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': Aizxin.conf.TOKEN
            }
        },
        data: {
            cate: {
                parent_id: 0
            },
            list: [],
            msg: ''
        },
        created: function() {
            this.cateList();
        },
        methods: {
            /**
             *  [addCateParent 添加]
             */
            addCateParent: function(id) {
                this.$set('cate', {
                    parent_id: id
                });
            },
            /**
             *  [editCate 修改]
             */
            editCate: function(vo) {
                this.$set('cate', vo);
            },
            /**
             *  [addCate 添加按钮]
             */
            addCate: function() {
                this.cate.parent_id = $("#parent_id").val();
                if (this.cate.id != undefined && this.cate.id > 0) {
                    this.updateCate(this.cate);
                } else {
                    this.createCate(this.cate);
                }
            },
            /**
             *  [destroyCate 分类]
             */
            destroyCate: function(id) {
                var _this = this;
                layer.confirm('确认删除分类', {
                    icon: 1,
                    title: '删除分类'
                }, function(index) {
                    _this.$http.delete(Aizxin.U('admin/category') + "/" + id).then(function(response) {
                        _this.callback(response);
                    }, function(error) {
                        layer.close(index);
                        layer.msg('系统错误');
                    });
                });
            },
            /**
             *  [createCate 添加操作]
             */
            createCate: function(data) {
                this.$http.post(Aizxin.U('admin/category'), data).then(function(response) {
                    this.callback(response);
                }, function(response) {
                    console.log(response)
                });
            },
            /**
             *  [updateCate 修改操作]
             */
            updateCate: function(data) {
                this.$http.put(Aizxin.U('admin/category') + "/" + data.id, data).then(function(response) {
                    this.callback(response);
                }, function(response) {
                    console.log(response)
                });
            },
            /**
             *  [cateList 分类列表]
             */
            cateList: function() {
                this.$http.post(Aizxin.U('admin/category/index')).then(function(response) {
                    if (response.data.code == 200) {
                        this.$set('list', response.data.result)
                    }
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
                }
                if (response.data.code == 422) {
                    layer.msg(response.data.message, {
                        icon: 2
                    });
                }
                if (response.data.code == 200) {
                    var ii = layer.load();
                    //此处用setTimeout演示ajax的回调
                    setTimeout(function() {
                        layer.close(ii);
                        layer.msg(response.data.message, {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function() {
                            _this.$set('cate', {
                                parent_id: 0
                            });
                            _this.cateList();
                        });
                    }, 3000);
                }
            }
        }
    });
});