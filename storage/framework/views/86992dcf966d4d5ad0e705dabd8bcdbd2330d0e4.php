 <?php $__env->startSection('content'); ?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <!--<li><a href="javascript:;">权限列表</a></li>-->
        <li class="active">权限列表</li>
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
                    <h4 class="panel-title">权限列表</h4>
                </div>
                <div class="panel-body" id="permission">
                    <div class="table-responsive">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="data-table_length">
                                <label>显示
                                    <vue-select @change-page="fetchItems" :pagination.sync="pagination" :page-size.sync="pageSize" :name.sync="name"></vue-select>
                                    <?php if (\Entrust::can(('admin.permission.create'))) : ?>
                                    <a href="<?php echo e(url('admin/permission/create')); ?>"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;">权限添加</a>
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
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">名称</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 360px;">排序</th>                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="vo in items">
                                        <tr class="gradeA odd" role="row" >
                                            <td class="sorting_1">{{vo.id}}</td>
                                            <td>{{vo.display_name}}</td>
                                            <td>{{vo.sort}}</td>
                                            <td>
                                                <?php if (\Entrust::can(('admin.permission.edit'))) : ?>
                                                <a href="<?php echo e(url('admin/permission')); ?>/{{vo.id}}/edit" class="btn btn-primary delete">
                                                <i class="fa fa-edit"></i>
                                                <span>修改</span>
                                                </a>
                                                <?php endif; // Entrust::can ?>
                                                <?php if (\Entrust::can(('admin.permission.destroy'))) : ?>
                                                <button type="button" class="btn btn-danger delete" @click="destroy(vo.id)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>删除</span>
                                                </button>
                                                <?php endif; // Entrust::can ?>
                                            </td>
                                        </tr>
                                            <template v-for="v in vo.child">
                                                <tr class="gradeA even" role="row" >
                                                    <td class="sorting_1">{{v.id}}</td>
                                                    <td>┗━{{v.display_name}}</td>
                                                    <td>{{v.sort}}</td>
                                                    <td>
                                                        <?php if (\Entrust::can(('admin.permission.edit'))) : ?>
                                                        <a href="<?php echo e(url('admin/permission')); ?>/{{v.id}}/edit" class="btn btn-primary delete">
                                                            <i class="fa fa-edit"></i>
                                                            <span>修改</span>
                                                        </a>
                                                        <?php endif; // Entrust::can ?>
                                                        <?php if (\Entrust::can(('admin.permission.destroy'))) : ?>
                                                        <button type="button" class="btn btn-danger delete" @click="destroy(v.id)">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                            <span>删除</span>
                                                        </button>
                                                        <?php endif; // Entrust::can ?>
                                                    </td>
                                                </tr>
                                                <template v-for="t in v.child">
                                                    <tr class="gradeA even" role="row" >
                                                        <td class="sorting_1">{{t.id}}</td>
                                                        <td>┗━━{{t.display_name}}</td>
                                                        <td>{{t.sort}}</td>
                                                        <td>
                                                            <?php if (\Entrust::can(('admin.permission.edit'))) : ?>
                                                            <a href="<?php echo e(url('admin/permission')); ?>/{{t.id}}/edit" class="btn btn-primary delete">
                                                                <i class="fa fa-edit"></i>
                                                                <span>修改</span>
                                                            </a>
                                                            <?php endif; // Entrust::can ?>
                                                            <?php if (\Entrust::can(('admin.permission.destroy'))) : ?>
                                                            <button type="button" class="btn btn-danger delete" @click="destroy(t.id)">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                                <span>删除</span>
                                                            </button>
                                                            <?php endif; // Entrust::can ?>
                                                    </td>
                                                    </tr>
                                                </template>
                                            </template>
                                    </template>
                                </tbody>
                            </table>
                        <pagination @change-page="fetchItems" :pagination.sync="pagination" :offset.sync="offset" :page-size.sync="pageSize" :name.sync="name"></pagination>
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
<script src="/js/admin/rbac/permission.js"></script> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>