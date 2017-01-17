 <?php $__env->startSection('style'); ?>
<?php echo $__env->make('UEditor::head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css">
<!-- <link rel="stylesheet" type="text/css" href="/assets/plugins/editor/css/editormd.min.css"> -->
<style>
    .input {
        width: 500px;
    }
    .bootstrap-select.form-control:not([class*="span"]) {
        width: 500px;
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
                                目标选择
                                <small>.</small>
                            </li>
                            <li>
                                身份选择
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radiorequired" value="foo" id="radio-required" data-parsley-required="true" data-parsley-multiple="radiorequired" data-parsley-id="0518"> Radio Button 1
                                                    </label><ul class="parsley-errors-list" id="parsley-id-multiple-radiorequired"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radiorequired" value="foo" id="radio-required" data-parsley-required="true" data-parsley-multiple="radiorequired" data-parsley-id="0518"> Radio Button 1
                                                    </label><ul class="parsley-errors-list" id="parsley-id-multiple-radiorequired"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lastname" placeholder="Smith" class="form-control" />
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
                                <legend class="pull-left width-full">Contact Information</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" placeholder="123-456-7890" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end col-6 -->
                                    <!-- begin col-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="text" name="email" placeholder="someone@example.com" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end col-6 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-2 -->
                        <!-- begin wizard step-3 -->
                        <div>
                            <fieldset>
                                <legend class="pull-left width-full">Login</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <div class="controls">
                                                <input type="text" name="username" placeholder="johnsmithy" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pasword</label>
                                            <div class="controls">
                                                <input type="password" name="password" placeholder="Your password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confirm Pasword</label>
                                            <div class="controls">
                                                <input type="password" name="password2" placeholder="Confirmed password" class="form-control" />
                                            </div>
                                        </div>
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
                                <h1>Login Successfully</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
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
    <script src="<?php echo e(asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
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
                    if(t.index==0){
                        console.log(t)
                        layer.msg('ddd');
                        return false;
                        // if(false===$('form[name="form-wizard"]').parsley().validate("wizard-step-1")){
                        //     return false}
                        // }else if(t.index==1){
                        //     if(false===$('form[name="form-wizard"]').parsley().validate("wizard-step-2")){
                        //         return false}
                        // }else if(t.index==2){
                        //     if(false===$('form[name="form-wizard"]').parsley().validate("wizard-step-3")){
                        //         return false}
                        // }
                    }
                }
            });
            new Vue({
                http: {
                    root: '/root',
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    }
                },
                el: '#addResources',
                data: {
                    article:{category_id:0},
                    msg:'',
                    load:null,
                },
                created: function (){
                    this.$set('article',<?php echo $article; ?>)
                    if(this.article.id > 0){
                        $("#articleImg").attr('src',this.article.img);
                        $("#container").html(this.article.content);
                    }else{
                        this.$set('article.category_id',0);
                    }
                },
                methods: {
                    addArticle: function(){
                        this.$set('load',layer.load());
                        this.article.category_id = $('#category_id').val();
                        this.article.content = ue.getContent();
                        this.article.img = $("#articleImg")[0].src;
                        if($(".fileinput-preview").find('img').length > 0){
                            this.article.base64 = $(".fileinput-preview").find('img')[0].src;
                        }
                        if(this.article.id != undefined && this.article.id > 0){
                            this.updateArticle(this.article);
                        }else{
                            this.createArticle(this.article);
                        }
                    },
                    createArticle: function (data){
                        this.$http.post("<?php echo e(url('/admin/article')); ?>",data).then(function (response){
                            this.callback(response);
                        }, function (response) {
                            console.log(response)
                        });
                    },
                    updateArticle: function (data){
                        this.$http.put("<?php echo e(url('/admin/article')); ?>/"+data.id,data).then(function (response){
                            this.callback(response);
                        }, function (response) {
                            console.log(response)
                        });
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
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>