 <?php $__env->startSection('style'); ?>
<?php echo $__env->make('UEditor::head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<style>
    .input {
        width: 500px;
    }
    .bootstrap-select.form-control:not([class*="span"]) {
        width: 500px;
    }
    .cc-select{
        width: 28%;float: left;
    }
    .ninputb{
        width: 45%;float: left;display:block;
    }
    .display{
        display:none;
    }
    .ainputb{
        width: 100%;
    }
    .ainputw{
        width: 55%;
    }
    @media  only screen and (min-width: 1200px) {
        .media-input {
            width: 60%;
        }
        .media-text {
            width: 62%;
        }
        .cc-select{
            width: 14%;float: left;
        }
    }
    .kv-preview-data.file-preview-image.file-zoom-detail{
        width: 100%  !important;
    }
</style>
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;"><?php echo trans('admin.resources.manage'); ?></a></li>
        <li><a href="javascript:;"><?php echo trans('admin.resources.index'); ?></a></li>
        <li class="active"><?php echo trans('admin.resources.store'); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo trans('admin.resources.manage'); ?><small>...</small></h1>
    <!-- begin row -->
    <div class="row" id="addResources">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo trans('admin.resources.store'); ?></h4>
                </div>
                <div class="panel-body">
                    <div id="wizard">
                        <ol>
                            <li>
                                服务类型选择
                                <small>.</small>
                            </li>
                            <li>
                                服务身份选择
                                <small>.</small>
                            </li>
                            <li>
                                信息发布
                                <small>.</small>
                            </li>
                            <li>
                                操作完成
                                <small>.</small>
                            </li>
                        </ol>
                        <!-- begin wizard step-1 -->
                        <div>
                            <fieldset>
                                <legend class="pull-left width-full"></legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(1,1)" v-bind:class="[ targetA==1 ? classType.btnSuccess : classType.btnWhite]">我要销售</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(1,2)" v-bind:class="[ targetA==2 ? classType.btnSuccess : classType.btnWhite]">我要求购</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(2,3)" v-bind:class="[ targetA==3 ? classType.btnSuccess : classType.btnWhite]">我需要服务</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(2,4)" v-bind:class="[ targetA==4 ? classType.btnSuccess : classType.btnWhite]">我提供服务</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(3,5)" v-bind:class="[ targetA==5 ? classType.btnSuccess : classType.btnWhite]">免费信息</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <!-- <button type="button" class="btn btn-white btn-lg m-r-5 m-b-5">我要销售</button> -->
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-1 -->
                        <!-- begin wizard step-2 -->
                        <div>
                            <fieldset>
                                <legend class="pull-left width-full"></legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(1)" v-bind:class="[ identityA==1 ? classType.btnSuccess : classType.btnWhite]">企业/工厂</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(2)" v-bind:class="[ identityA==2 ? classType.btnSuccess : classType.btnWhite]">回收/贸易商</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(3)" v-bind:class="[ identityA==3 ? classType.btnSuccess : classType.btnWhite]">加工/利用商</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(4)" v-bind:class="[ identityA==4 ? classType.btnSuccess : classType.btnWhite]">个人/个体商户</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(5)" v-bind:class="[ identityA==5 ? classType.btnSuccess : classType.btnWhite]">机关/事业单位</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <!-- <button type="button" class="btn btn-white btn-lg m-r-5 m-b-5">我要销售</button> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-2 -->
                        <!-- begin wizard step-3 -->
                        <div>
                            <fieldset>
                                <legend class="pull-left width-full">信息发布</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-6 -->
                                    <div class="ui-sortable">
                                        <!-- begin panel -->
                                        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">公司名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="公司名称">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系人</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="联系人">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系电话</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="联系电话">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系地址</label>
                                                        <div class="col-md-9">
                                                            <vue-city
                                                                :province.sync="resources.province"
                                                                :city.sync="resources.city"
                                                                :district.sync="resources.district"
                                                                :provincename.sync="cityname.provincename"
                                                                :cityname.sync="cityname.cityname"
                                                                :districtname.sync="cityname.districtname"
                                                                :citydataurl.once="citydataurl"
                                                                >
                                                            </vue-city>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                        <div class="media-input">
                                                            <input type="text" v-if="cityname.provincename !=''"  class="form-control" v-bind:class="[cityname.provincename !=''?classType.ntextb:classType.display]" value="{{cityname.provincename}}{{cityname.cityname}}{{cityname.districtname}}" readonly="true" v-on:change="textw()">
                                                            <input type="text" class="form-control" placeholder="联系详细地址" v-bind:class="[cityname.provincename !=''?classType.atextw:classType.atextb]">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="货物名称">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">种类类型</label>
                                                        <div class="col-md-9">
                                                            <vue-cate
                                                                :rc1id.sync="resources.rc1_id"
                                                                :rc2id.sync="resources.rc2_id"
                                                                :rc3id.sync="resources.rc3_id"
                                                                :catedataurl.once="catedataurl"
                                                                >
                                                            </vue-cate>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物数量</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control cc-select" placeholder="货物数量">
                                                            <select class="form-control cc-select" style="margin-left: 2%;">
                                                                <option v-bind:value="0">选择单位</option>
                                                                <option v-for="v in units" v-bind:value="v.name">{{v.name}}</option>
                                                            </select>
                                                            <div class="cc-select" style="margin-left: 1%;">
                                                                <button type="button" class="btn btn-success"><i class="fa fa-edit"></i>自定义单位</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物价格(选填)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control cc-select" placeholder="货物价格">
                                                            <div class="cc-select" style="margin-left: 1%;">
                                                                <button type="button" class="btn btn-success"><i class="fa fa-edit"></i>自定义价格区间</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">活动时间</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group input-daterange">
                                                                <span class="input-group-addon">开始时间</span>
                                                                <input type="text" class="form-control media-input" name="start" placeholder="开始时间">
                                                                <span class="input-group-addon">&nbsp;结束时间</span>
                                                                <input type="text" class="form-control media-input" name="end" placeholder="结束时间">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">原用途(选填)</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control media-input" placeholder="原用途" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物内容</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control media-input" placeholder="组成成分及含量，外观成色，是否需要人工分选" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">图片上传</label>
                                                        <div class="col-md-9">
                                                            <div class="media-text">
                                                                <?php echo $__env->make('layouts.upload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end panel -->
                                    </div>
                                    <!-- end col-6 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-3 -->
                        <!-- begin wizard step-4 -->
                        <div>
                            <div class="jumbotron m-b-0 text-center">
                                <p>ddd</p>
                            </div>
                        </div>
                        <!-- end wizard step-4 -->
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('my-js'); ?>
    <!-- ================== Vue JS ================== -->
    <script src="/layer/layer.js"></script>
    <script src="/vue/vue-city.js"></script>
    <script src="/vue/vue-cate.js"></script>
    <!-- ================== END vue JS ================== -->
    <script src="/js/admin/resources/add-resources.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>