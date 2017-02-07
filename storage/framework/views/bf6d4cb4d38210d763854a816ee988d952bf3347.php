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
                                            <td>{{vo.rc2|json}}</td>
                                            <td>
                                                <a type="button" class="btn btn-success" href="#modal-dialog" data-toggle="modal" @click="resourcesDetail(vo.id)">
                                                    <i class="fa fa-group"></i>
                                                    <span>详情</span>
                                                </a>
                                            </td>
                                            <td>
                                                 <?php if (\Entrust::can(('admin.article.destroy'))) : ?>
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
                                                    <div class="form-group" v-if="res.company_name">
                                                    {{res|json}}
                                                        <label class="col-md-3 control-label">公司名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text"class="form-control media-input" name="companyname" v-bind:value="res.company_name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系人</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="联系人" name="contactname" v-bind:value="res.contact_name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系电话</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="联系电话" name="contactphone" value="公司名称" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系地址</label>
                                                        <div class="col-md-9">
                                                           <input type="text" class="form-control media-input" placeholder="联系电话" name="contactphone" value="公司名称" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" name="name" value="公司名称" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">种类类型</label>
                                                        <div class="col-md-9">
                                                            订单
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物数量</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="number"  class="form-control cc-select" value="公司名称" readonly>
                                                            <input v-model="resources.unit" type="text" class="form-control cc-select" placeholder="自定义单位" style="margin-left: 2%;" value="公司名称" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物价格(选填)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control cc-select" placeholder="货物价格" value="公司名称" readonly>
                                                            <input type="text" class="form-control cc-select" placeholder="货物价格" style="margin-left: 2%;" value="公司名称" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">活动时间</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group input-daterange">
                                                                <span class="input-group-addon">开始时间</span>
                                                                <input type="text" v-model="resources.start_time" name="starttime" v-validate:starttime="{required: true}"  class="form-control media-input" name="start" placeholder="开始时间">
                                                                <span class="input-group-addon">&nbsp;结束时间</span>
                                                                <input type="text" name="endtime" v-validate:endtime="{required: true}" v-model="resources.end_time" class="form-control media-input" name="end" placeholder="结束时间">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">原用途(选填)</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control media-input" placeholder="原用途" v-model="resources.original_use" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物内容</label>
                                                        <div class="col-md-9">
                                                            <textarea v-model="resources.content" class="form-control media-input" name="content" v-validate:content="{required: true}" placeholder="组成成分及含量，外观成色，是否需要人工分选" rows="10"></textarea>
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
<script src="/js/admin/resources/resources.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>