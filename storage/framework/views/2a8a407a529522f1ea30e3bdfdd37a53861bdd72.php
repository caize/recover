<?php $__env->startSection('style'); ?>
<link href="/assets/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet">
<style type="text/css">
    .input {
        width: 300px;
    }
    .input option{
        font-weight: normal;
        display: block;
        white-space: pre;
        min-height: 1.2em;
        padding: 0px 2px 1px;
    }
    .bootstrap-select.form-control:not([class*="span"]) {
        width: 300px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">文章管理</a></li>
        <!--<li><a href="javascript:;">文章列表</a></li>-->
        <li class="active">分类列表</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">文章管理<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row" id="category">
        <!-- begin col-6 -->
        <div class="col-md-6 ui-sortable">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">文章列表</h4>
                </div>
                <div class="panel-body">
                    <div class="dd" id="nestable3">
                        <ol class="dd-list">
                            <li class="dd-item dd3-item" data-id="{{vo.id}}" v-for="vo in list">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">{{vo.name}}
                                    <div class="pull-right action-buttons">
                                        <?php if (\Entrust::can(('admin.category.create'))) : ?>
                                        <a href="javascript:;" data-pid="13" class="btn-xs createMenu" data-toggle="tooltip"data-original-title="添加" @click="addCateParent(vo.id)"  data-placement="top"><i class="fa fa-plus"></i>
                                        </a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can(('admin.category.edit'))) : ?>
                                        <a href="javascript:;" data-href="url" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改" @click="editCate(vo)"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can(('admin.category.destroy'))) : ?>
                                        <a href="javascript:;" class="btn-xs destoryMenu" data-id="13" data-original-title="删除"data-toggle="tooltip" @click="destroyCate(vo.id)" data-placement="top"><i class="fa fa-trash"></i></a>
                                        <?php endif; // Entrust::can ?>
                                    </div>
                                </div>
                                <ol class="dd-list" >
                                    <li class="dd-item dd3-item" data-id="{{v.id}}" v-for="v in vo.child">
                                        <div class="dd-handle dd3-handle"></div><div class="dd3-content">{{v.name}}
                                            <div class="pull-right action-buttons">
                                                <?php if (\Entrust::can(('admin.category.edit'))) : ?>
                                                <a href="javascript:;" data-href="url" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改" @click="editCate(v)" data-placement="top"><i class="fa fa-pencil"></i></a>
                                                <?php endif; // Entrust::can ?>
                                                <?php if (\Entrust::can(('admin.category.destroy'))) : ?>
                                                <a href="javascript:;" class="btn-xs destoryMenu" data-id="13" data-original-title="删除"data-toggle="tooltip" @click="destroyCate(v.id)"  data-placement="top"><i class="fa fa-trash"></i></a>
                                                <?php endif; // Entrust::can ?>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
        <div class="col-md-6 ui-sortable">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">分类添加</h4>
                </div>
                <div class="panel-body">
                    <validator name="cateValidation">
                        <form class="form-horizontal" novalidate method="POST">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label">顶级分类</label>
                                <div class="col-md-9">
                                    <select class="form-control selectpicker input" id="parent_id" data-size="10" v-model="cate.parent_id" data-live-search="true" data-style="btn-white">
                                        <option v-bind:value="0">顶级权限</option>
                                        <option v-bind:value="vo.id" v-for="vo in list" >{{vo.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">分类名称</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" v-model="cate.name" class="form-control input" placeholder="分类名称" v-validate:name="{ required: true}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">分类英文名</label>
                                <div class="col-md-9">
                                    <input type="text" name="engineName" v-model="cate.engineName" class="form-control input" placeholder="分类英文名" v-validate:engineName="{ required: true}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">分类排序</label>
                                <div class="col-md-9">
                                    <input type="text" name="sort" v-model="cate.sort" class="form-control input" v-validate:sort="{ required: true}" placeholder="分类排序"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">分类状态</label>
                                <div class="col-md-9">
                                    <label class="radio-inline">
                                        <input type="radio" v-model="cate.status" name="optionsRadios" v-bind:value="0" />
                                        禁用
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" v-model="cate.status" name="optionsRadios" v-bind:value="1" checked />
                                        启用
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="button" @click="addCate()" :disabled="$cateValidation.invalid" class="btn btn-sm btn-primary m-r-10">保 存</button>
                                </div>
                            </div>
                            <div class="form-group" v-if="msg">
                                <div class="col-md-9 col-md-offset-3">
                                    <div class="alert alert-danger fade in m-b-15">
                                        <strong>Error!</strong>
                                        <span v-text="msg">.</span>
                                        <span class="close" data-dismiss="alert">×</span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    </validator>
                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>
    <!-- end row -->
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('my-js'); ?>
<script src="/layer/layer.js"></script>
<script src="/assets/js/ui-modal-notification.demo.min.js"></script>
<script src="/assets/plugins/jquery-nestable/jquery.nestable.js"></script>
<script src="/js/admin/article/category.js"></script> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>