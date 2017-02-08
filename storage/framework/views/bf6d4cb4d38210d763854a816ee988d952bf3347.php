<?php $__env->startSection('style'); ?>
<style>
    .media-input{
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
    }
    @media  only screen and (min-width: 1200px) {
        .media-input {
            width: 60%;
        }
    }
    .image {
        width: 25%;
        display: block;
        margin-right: -10px;
        overflow: hidden;
        padding: 10px;
    }
    .image img {
        width: 100%;
        height: 200px;
        -webkit-border-radius: 3px 3px 0 0;
        -moz-border-radius: 3px 3px 0 0;
        border-radius: 3px 3px 0 0;
    }
</style>
<link href="/assets/plugins/isotope/isotope.css" rel="stylesheet" />
<link href="/assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;"><?php echo trans('admin.resources.manage'); ?></a></li>
        <!--<li><a href="javascript:;">文章列表</a></li>-->
        <li class="active"><?php echo trans('admin.resources.index'); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo trans('admin.resources.manage'); ?><small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row" id="resources">
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
                    <h4 class="panel-title"><?php echo trans('admin.resources.index'); ?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="data-table_length">
                                <label>显示
                                    <vue-select @change-page="fetchItems" :pagination.sync="pagination" :page-size.sync="pageSize" :name.sync="name"></vue-select>
                                    <?php if (\Entrust::can(('admin.resources.create'))) : ?>
                                    <a href="<?php echo e(url('admin/resources/create')); ?>"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;"><?php echo trans('admin.resources.store'); ?></a>
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
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">标题</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">分类</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">状态</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 237px;">详情</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="vo in items">
                                        <tr class="gradeA odd" role="row" >
                                            <td class="sorting_1">{{$index+1}}</td>
                                            <td>{{vo.name}}</td>
                                            <td>
                                                <span v-if="vo.rc1">{{vo.rc1.name}}</span>
                                                <span v-if="vo.rc2">>>{{vo.rc2.name}}</span>
                                                <span v-if="vo.rc3">>>{{vo.rc3.name}}</span>
                                            </td>
                                            <td>
                                                <span v-if="vo.status == 0">
                                                    <button class="btn btn-warning m-r-5 m-b-5">等待审核</button>
                                                </span>
                                                <span v-if="vo.status == -1">
                                                    <button class="btn btn-warning m-r-5 m-b-5">审核失败</button>
                                                </span>
                                                <span v-if="vo.status == 1">
                                                    <button v-if="vo.service == 1 || vo.service == 2" disabled="true" class="btn btn-white active m-r-5 m-b-5">等待报价</button>
                                                    <button v-if="vo.service==3 || vo.service == 4" disabled="true" class="btn btn-white active m-r-5 m-b-5">等待预约</button>
                                                </span>
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-success" href="#modal-dialog" data-toggle="modal" @click="resourcesDetail(vo.id)">
                                                    <i class="fa fa-group"></i>
                                                    <span>详情</span>
                                                </a>
                                            </td>
                                            <td>
                                                 <?php if (\Entrust::can(('admin.resources.destroy'))) : ?>
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
                </div>
            </div>
            <!-- end panel -->
            <!-- #modal-message -->
            <div class="modal fade" id="modal-dialog">
                <div class="modal-dialog" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">资源回收详情</h4>
                        </div>
                        <div class="modal-body">
                        <div class="container" style="width: 100%">
                             <div class="row">
                                    <!-- begin col-6 -->
                                    <div class="ui-sortable">
                                        <!-- begin panel -->
                                        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                                            <div class="panel-body">
                                            <validator name="AddReValidation">
                                                <form class="form-horizontal" novalidate>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">服务类型</label>
                                                        <div class="col-md-9">
                                                        <!-- //1：我要销售、2：我要求购，3：我需要服务、4:我提供服务，5：免费服务 -->
                                                        <span class="media-input" v-if="res.service == 1">我要销售</span>
                                                        <span class="media-input" v-if="res.service == 2">我要求购</span>
                                                        <span class="media-input" v-if="res.service == 3">我需要服务</span>
                                                        <span class="media-input" v-if="res.service == 4">我提供服务</span>
                                                        <span class="media-input" v-if="res.service == 5">免费服务</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">身份类型</label>
                                                        <div class="col-md-9">
                                                        <!-- //1:企业/工厂，2:回收/贸易商，3:加工/利用商，4:个人/个体商户，5:机关/事业单位 -->
                                                        <span class="media-input" v-if="res.identity == 1">企业/工厂</span>
                                                        <span class="media-input" v-if="res.identity == 2">回收/贸易商</span>
                                                        <span class="media-input" v-if="res.identity == 3">加工/利用商</span>
                                                        <span class="media-input" v-if="res.identity == 4">个人/个体商户</span>
                                                        <span class="media-input" v-if="res.identity == 5">机关/事业单位</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" v-if="res.company_name">
                                                        <label class="col-md-3 control-label">公司名称</label>
                                                        <div class="col-md-9">
                                                        <span class="media-input">{{res.company_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系人</label>
                                                        <div class="col-md-9">
                                                        <span class="media-input">{{res.contact_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系电话</label>
                                                        <div class="col-md-9">
                                                        <span class="media-input">{{res.contact_phone}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系地址</label>
                                                        <div class="col-md-9">
                                                        <span class="media-input">{{res.address}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物名称</label>
                                                        <div class="col-md-9">
                                                        <span class="media-input">{{res.name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">种类类型</label>
                                                        <div class="col-md-9">
                                                            <span class="media-input">
                                                                <span v-if="res.rc1">{{res.rc1.name}}</span>
                                                                <span v-if="res.rc2">>>{{res.rc2.name}}</span>
                                                                <span v-if="res.rc3">>>{{res.rc3.name}}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物数量</label>
                                                        <div class="col-md-9">
                                                            <span name="number" class="media-input">{{res.number}}
                                                            <span>{{res.unit}}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">
                                                        <span v-if="res.price2 > 1">价格区间</span>
                                                        <span v-else>货物价格</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <span class="media-input">{{res.price1}}
                                                                <span v-if="res.price2 > 1" style="margin-left: 2%;" >到{{res.price2}}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">活动时间</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group input-daterange">
                                                                <span class="input-group-addon">开始时间：</span>
                                                                <span class="media-input" style="width: 100%">{{res.start_time}}</span>
                                                                <span class="input-group-addon">&nbsp;结束时间:</span>
                                                                <span class="media-input" style="width: 100%">{{res.end_time}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" v-if="res.original_use">
                                                        <label class="col-md-3 control-label">原用途</label>
                                                        <div class="col-md-9">
                                                            <span class="media-input" style="height: initial;">{{res.original_use}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物内容</label>
                                                        <div class="col-md-9">
                                                            <span class="media-input" name="content" style="height: initial;">{{res.content}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物图片</label>
                                                        <div class="col-md-9">
                                                            <div style="float: left" class="image gallery-group-1" v-for="g in res.gallery">
                                                                <div class="image-inner">
                                                                    <a href="{{g.thumb}}" data-lightbox="gallery-group-1">
                                                                        <img v-bind:src="g.thumb" alt="" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </validator>
                                            </div>
                                        </div>
                                        <!-- end panel -->
                                    </div>
                                    <!-- end col-6 -->
                                </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
    </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('my-js'); ?>
<script src="/layer/layer.js"></script>
<script src="/vue/vue-pagination.js"></script>
<script src="/assets/plugins/isotope/jquery.isotope.min.js"></script>
<script src="/assets/plugins/lightbox/js/lightbox-2.6.min.js"></script>
<script src="/assets/js/gallery.demo.min.js"></script>
<script src="/js/admin/resources/resources.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>