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
    @media  only screen and (min-width: 1200px) {
        .media-input {
            width: 50%;
        }
        .media-text {
            width: 52%;
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
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(1,1)" v-bind:class="[ targetA==1 ? btnSuccess : btnWhite]">我要销售</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(1,2)" v-bind:class="[ targetA==2 ? btnSuccess : btnWhite]">我要求购</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(2,3)" v-bind:class="[ targetA==3 ? btnSuccess : btnWhite]">我需要服务</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(2,4)" v-bind:class="[ targetA==4 ? btnSuccess : btnWhite]">我提供服务</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="target(3,5)" v-bind:class="[ targetA==5 ? btnSuccess : btnWhite]">免费信息</button>
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
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(1)" v-bind:class="[ identityA==1 ? btnSuccess : btnWhite]">企业/工厂</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(2)" v-bind:class="[ identityA==2 ? btnSuccess : btnWhite]">回收/贸易商</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(3)" v-bind:class="[ identityA==3 ? btnSuccess : btnWhite]">加工/利用商</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(4)" v-bind:class="[ identityA==4 ? btnSuccess : btnWhite]">个人/个体商户</button>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg m-r-5 m-b-5" @click="identity(5)" v-bind:class="[ identityA==5 ? btnSuccess : btnWhite]">机关/事业单位</button>
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
                                                                :provincecode.sync="resources.provincecode"
                                                                :citycode.sync="resources.citycode"
                                                                :districtcode.sync="resources.districtcode"
                                                                :citydataurl.once="citydataurl"
                                                                >
                                                            </vue-city>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control media-input" placeholder="联系详细地址">
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
                                                            <select class="form-control cc-select">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <select class="form-control cc-select" style="margin-left: 2%;">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <select class="form-control cc-select" style="margin-left: 2%;">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">货物数量</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control cc-select" placeholder="货物数量">
                                                            <select class="form-control cc-select" style="margin-left: 2%;">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
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
                                <vue-cate
                                    :rc1id.sync="resources.rc1_id"
                                    :rc2id.sync="resources.rc2_id"
                                    :rc3id.sync="resources.rc3_id"
                                    :catedataurl.once="catedataurl"
                                    >
                                </vue-cate>
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
    <script>
    	$(document).ready(function() {
    		App.init();
            FormPlugins.init();
            // FormWizard.init();
    	});
         $(function() {
            $("#wizard").bwizard({
                validating:function(e,t){
                    // if(t.index==0){
                    //     if(Vr.resources.type == undefined){
                    //         layer.msg('请选择服务类型',{icon:2});
                    //         return false;
                    //     }
                    // }
                    // if(t.index==1){
                    //     if(Vr.resources.identity == undefined){
                    //         layer.msg('请选择服务身份',{icon:2});
                    //         return false;
                    //     }
                    // }
                }
            });
            var Vr = new Vue({
                http: {
                    root: '/root',
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    }
                },
                el: '#addResources',
                data: {
                    resources:{
                        province:'',
                        city:'',
                        district:'',
                        provincecode:'',
                        citycode:'',
                        districtcode:'',
                        rc1_id:'',
                        rc2_id:'',
                        rc2_id:'',
                    },
                    targetA:0,
                    identityA:0,
                    btnSuccess:'btn-success',
                    btnWhite:'btn-white',
                    nitialPreview: [],
                    initialPreviewConfig: [],
                    showUpload:true,
                    showRemove:true,
                    citydataurl:"<?php echo e(url('admin/area')); ?>",
                    catedataurl:"<?php echo e(url('admin/cate')); ?>",
                },
                components:{
                    vueCity: vueCity,
                    vueCate: vueCate,
                },
                methods: {
                    /**
                     *  [target 目标选择]
                     */
                    target:function(target,targetA){
                        this.$set('targetA',targetA);
                        this.resources.type = target;
                        this.resources.service = targetA;
                    },
                    /**
                     *  [identity 身份选择]
                     */
                    identity:function(identity){
                        this.$set('identityA',identity);
                        this.resources.identity = identity;
                    },
                    /**
                     *  [callback 返回响应]
                     */
                    callback: function(response){
                        var _this = this;
                        if(response.data.code == 400){
                            layer.msg(response.data.message,{icon: 2});
                            layer.close(_this.load);
                        }
                        if(response.data.code == 422){
                            layer.msg(response.data.message,{icon: 2});
                            layer.close(_this.load);
                        }
                        if(response.data.code == 200){
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(_this.load);
                                _this.$set('load',null);
                                layer.msg(response.data.message,{
                                  icon: 1,
                                  time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                    window.location.href = "<?php echo e(url('/admin/article/index')); ?>";
                                });
                            }, 3000);
                        }
                    }
                }
            });
            $("#upload-input").fileinput({
                maxFileCount: 6, //表示允许同时上传的最大文件个数
                allowedFileExtensions: ["jpg", "png", "gif"],
                uploadUrl: "/admin/qiniu/upload",
                language: 'zh',
                uploadAsync: false,
                overwriteInitial: false,
                // maxImageWidth: 200,
                // maxImageHeight: 150,
                showUpload:Vr.showUpload,
                showRemove:false,
                maxFileSize:6144, //表示允许同时上传的图片不能6M
            }).on('filebatchpreupload', function(event, data) {
                // var n = data.files.length, files = n > 1 ? n + ' files' : 'one file';
                if (Vr.showUpload == false) {
                    return {
                        message: "图片尺寸或大小错误，不能上传!",
                        data:{}
                    };
                }
            }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
                response = data.response;
                console.log(data);
                // $.each(data.files, function(key, file) {
                //     var fname = response[key].file;
                //     Vr.nitialPreview.push("<img style='height:160px' src='"+fname+"'>");
                //     Vr.initialPreviewConfig.push({caption: "", url: "/admin/upload/delete", key: ((key++)-1)})
                // });
                console.log(response);
                Vr.$set('showRemove',false);
            }).on('fileuploaderror', function(event, data, msg) { // 上传错误
                console.log(msg);
               Vr.$set('showUpload',false);
            }).on('filesuccessremove', function(event, id) {
                if (id) {
                   console.log(id);
                } else {
                    return false; // abort the thumbnail removal
                }
            }).on('filecleared', function(event) {
                console.log('filecleared');
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>