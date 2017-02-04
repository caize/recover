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
                                图片上传
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
                                            <validator name="AddReValidation">
                                                <form class="form-horizontal" novalidate>
                                                    <div class="form-group" v-if="resources.identity < 4">
                                                        <label class="col-md-3 control-label">公司名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" v-model="resources.company_name" class="form-control media-input" placeholder="公司名称" name="companyname" v-validate:companyname="{required: true}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系人</label>
                                                        <div class="col-md-9">
                                                            <input type="text" v-model="resources.contact_name" class="form-control media-input" placeholder="联系人" name="contactname" v-validate:contactname="{required: true}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">联系电话</label>
                                                        <div class="col-md-9">
                                                            <input type="text" v-model="resources.contact_phone" class="form-control media-input" placeholder="联系电话" name="contactphone" v-validate:contactphone="{required: true,userPhone: true}">
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
                                                            <input type="text" v-if="cityname.provincename !=''"  class="form-control" v-bind:class="[cityname.provincename !=''?classType.ntextb:classType.display]" v-bind:value="cityname.provincename+cityname.cityname+cityname.districtname" readonly="true" v-model="address1name">
                                                            <input type="text" class="form-control" placeholder="联系详细地址" v-bind:class="[cityname.provincename !=''?classType.atextw:classType.atextb]" v-model="address2name">
                                                            <input type="hidden" v-model="resources.address" v-bind:value="address1name+address2name">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" v-model="resources.name" class="form-control media-input" name="name" v-validate:name="{required: true}" placeholder="货物名称">
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
                                                            <input type="text" name="number" v-validate:number="{required: true}" v-model="resources.number" class="form-control cc-select" placeholder="货物数量">
                                                            <select v-model="resources.unit" class="form-control cc-select" style="margin-left: 2%;" v-if="isUint == true">
                                                                <option v-bind:value="0" selected>选择单位</option>
                                                                <option v-for="v in units" v-bind:value="v.name">{{v.name}}</option>
                                                            </select>
                                                            <input v-model="resources.unit" type="text" class="form-control cc-select" placeholder="自定义单位" style="margin-left: 2%;" v-if="isUint == false">
                                                            <div class="cc-select" style="margin-left: 1%;">
                                                                <button type="button" @click="addUnit(isUint)" class="btn btn-success"><i class="fa fa-edit"></i>{{isUintText}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物价格(选填)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" v-model="resources.price1" class="form-control cc-select" placeholder="货物价格">
                                                            <input type="text" v-model="resources.price2" class="form-control cc-select" placeholder="货物价格" style="margin-left: 2%;" v-if="isPrive == true">
                                                            <div class="cc-select" style="margin-left: 1%;">
                                                                <button type="button" @click="addPrive(isPrive)" class="btn btn-success"><i class="fa fa-edit"></i>{{isPriveText}}</button>
                                                            </div>
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
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-3 -->
                        <!-- begin wizard step-4 -->
                        <div>
                            <fieldset>
                                <legend class="pull-left width-full">图片上传</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-6 -->
                                    <div class="ui-sortable">
                                        <!-- begin panel -->
                                        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <div class="media-text">
                                                                <?php echo $__env->make('layouts.upload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <button @click="saveResources()" type="button" class="btn btn-success m-r-5">确认发布</button>
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