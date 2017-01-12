 <?php $__env->startSection('content'); ?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <!--<li><a href="javascript:;">权限列表</a></li>-->
        <li class="active">管理员列表</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12 ui-sortable">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">管理员列表</h4>
                </div>
                <div class="panel-body" id="user">
                    <div class="table-responsive">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="data-table_length">
                                <label>显示
                                    <vue-select @change-page="fetchItems" :pagination.sync="pagination" :page-size.sync="pageSize" :name.sync="name"></vue-select>
                                    <?php if (\Entrust::can(('admin.user.create'))) : ?>
                                    <a href="<?php echo e(url('admin/user/create')); ?>"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;">权限添加</a>
                                    <?php endif; // Entrust::can ?>
                                </label>
                            </div>
                            <vue-input @change-page="fetchItems" :pagination.sync="pagination" :page-size.sync="pageSize" :name.sync="name" :title="title"></vue-input>
                            <table id="data-table" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 271px;">编号</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table"
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">用户</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">邮箱</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">角色管理</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="vo in items">
                                        <tr class="gradeA odd" role="row" >
                                            <td class="sorting_1">{{vo.id}}</td>
                                            <td>{{vo.name}}</td>
                                            <td>{{vo.email}}</td>
                                            <td>
                                                <?php if (\Entrust::can(('admin.user.show'))) : ?>
                                                <a type="button" class="btn btn-success" @click="userRole(vo.id)" href="#modal-dialog" data-toggle="modal">
                                                <i class="fa fa-user"></i>
                                                <span>修改角色</span>
                                                </a>
                                                 <?php endif; // Entrust::can ?>
                                            </td>
                                            <td>
                                                <?php if (\Entrust::can(('admin.user.edit'))) : ?>
                                                <a href="<?php echo e(url('admin/user')); ?>/{{vo.id}}/edit" class="btn btn-primary delete">
                                                <i class="fa fa-edit"></i>
                                                <span>修改</span>
                                                </a>
                                                 <?php endif; // Entrust::can ?>
                                                 <?php if (\Entrust::can(('admin.user.destroy'))) : ?>
                                                <button type="button" class="btn btn-danger delete" @click="destroy(vo.id)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>删除</span>
                                                </button>
                                                <?php endif; // Entrust::can ?>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        <pagination @change-page="fetchItems" :pagination.sync="pagination" :offset.sync="offset" :page-size.sync="pageSize" :name.sync="name"></pagination>
                    </div>
                <!-- #modal-dialog -->
                <div class="modal fade" id="modal-dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">角色分配</h4>
                            <input type="hidden" v-model="role.id">
                        </div>
                        <div class="modal-body">
                            <div class="container" style="width: 100%">
                                <select class="form-control selectpicker input" data-size="10" v-model="user.role_id" data-live-search="true" data-style="btn-white">
                                        <option v-bind:value="0">角色分配</option>
                                        <option v-bind:value="vo.id" v-for="vo in role">{{vo.display_name}}</option>
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
                            <a href="javascript:;" class="btn btn-sm btn-success" @click="addRole()">保存</a>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('my-js'); ?>
<script src="/layer/layer.js"></script>
<script src="/vue/vue-pagination.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
var vn = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects
            items: [],
            msg:'',
            pageSize:10,
            name:'',
            user:{roles:[]},
            role:[],
            title:'只能查用户'
        },
        created: function () {
            this.fetchItems(this.pagination.current_page,this.pageSize,'');
            this.$set('role',<?php echo $role; ?>);
        },
        methods: {
            /**
             *  [fetchItems 获取权限]
             */
            fetchItems: function (page,pageSize,name) {
                this.pagination.current_page = page;
                var data = {page: page,pageSize:pageSize,name:name};
                this.$http.post("<?php echo e(url('admin/user/index')); ?>", data).then(function (response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function (error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [destroy 删除权限]
             */
            destroy:function (id){
                layer.confirm('确认删除权限', {icon: 1, title:'提示'}, function(index){
                    vn.$http.delete("<?php echo e(url('admin/user')); ?>/"+id).then(function(response){
                        if(response.data.code == 400){
                            layer.close(index);
                            layer.msg(response.data.message);
                        }
                        if (response.data.code == 200) {
                            layer.msg(response.data.message, {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                vn.name = '';
                                vn.fetchItems(vn.pagination.current_page,vn.pageSize,'');
                            });
                        }
                    }, function (error) {
                       layer.close(index);
                       layer.msg('系统错误');
                    });
                });
            },
            /**
             *  [userRole 角色显示]
             */
            userRole: function (id){
                this.user.user_id = id;
                this.$set('user.role_id',0)
                this.$http.get("<?php echo e(url('admin/user')); ?>/"+id).then(function (response) {
                    if(response.data.result.length > 0){
                        this.$set('user.role_id',response.data.result[0].id)
                    }
                }, function (error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [addRole 角色更新]
             */
            addRole: function (){
                this.user.roles.push(this.user.role_id);
                this.$http.post("<?php echo e(url('admin/user/role')); ?>",this.user).then(function (response) {
                    if(response.data.code == 200){
                        var ii = layer.load();
                        //此处用setTimeout演示ajax的回调
                        setTimeout(function(){
                            layer.close(ii);
                            $('#modal-dialog').modal('hide');
                        }, 3000);
                    }
                    if(response.data.code == 400){
                        $('#modal-dialog').modal('hide');
                        layer.msg(response.data.message)
                    }
                }, function (error) {
                    console.log("系统错误");
                });
            }
        }
    });
</script> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>