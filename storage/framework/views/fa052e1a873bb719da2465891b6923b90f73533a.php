 <?php $__env->startSection('style'); ?>
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
        <li><a href="javascript:;">权限管理</a></li>
        <li><a href="javascript:;">权限列表</a></li>
        <li class="active">权限添加</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限添加</h4>
                </div>
                <div class="panel-body" id="node">
                    <validator name="nodeValidation">
                        <form class="form-horizontal" novalidate method="POST">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ">上级权限:</label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker input" id="parent_id" data-size="10" v-model="p.parent_id" data-live-search="true" data-style="btn-white">
                                        <option value="0">顶级权限</option>
                                        <?php foreach($list as $vo): ?>
                                        <?php if($vo['id']==$rule['parent_id']): ?>
                                        <option value="<?php echo e($vo['id']); ?>" selected><?php echo e($vo['display_name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($vo['id']); ?>"><?php echo e($vo['display_name']); ?></option>
                                        <?php endif; ?>
                                        <?php foreach($vo['child'] as $v): ?>
                                        <?php if($v['id']==$rule['parent_id']): ?>
                                        <option value="<?php echo e($v['id']); ?>" selected>┗━<?php echo e($v['display_name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($v['id']); ?>">┗━<?php echo e($v['display_name']); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限别名:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.name" name="name" v-validate:name="{ required: true}" class="form-control input" placeholder="权限别名,如(admin.permission.index)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限名:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.display_name" name="displayName" v-validate:displayName="{ required: true}" class="form-control input" placeholder="权限名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">简要描述:</label>
                                    <div class="col-md-9">
                                        <textarea v-model="p.description" name="description" class="form-control input" v-validate:description="{ required: true}" id="message" name="message" rows="4" data-parsley-range="[20,200]"
                                            placeholder="这里填写当前权限的简要描述"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限排序:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.sort" name="sort" class="form-control input" placeholder="排序号" v-validate:sort="{ required: true}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">权限图标:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.icon" name="icon" class="form-control input" placeholder="权限图标">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">是否是菜单:</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" v-model="p.is_menu"  data-render="switchery" data-theme="default"  />
                                    </div>
                                </div>
                                <?php if (\Entrust::can('admin.permission.store')) : ?>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button @click="addNode()" :disabled="$nodeValidation.invalid" type="button" class="btn btn-success btn-lg m-r-5" style="width: 100px">保 存</button>
                                    </div>
                                </div>
                                <?php endif; // Entrust::can ?>
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
        <!-- end col-6 -->
    </div>
    <!-- end row -->
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('my-js'); ?>
    <!-- ================== Vue JS ================== -->
    <script src="/layer/layer.js"></script>
    <!-- ================== END vue JS ================== -->
    <script>
    	$(document).ready(function() {
    		App.init();
            FormPlugins.init();
            FormSliderSwitcher.init();
    	});
        new Vue({
            http: {
                root: '/root',
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                }
            },
            el: '#node',
            data: {
                p:{},
                msg:''
            },
            created: function (){
                this.$set('p',<?php echo $rules; ?>)
            },
            methods: {
                addNode: function() {
                    this.p.parent_id = $("#parent_id").val();
                    this.p.is_menu = this.p.is_menu?1:0;
                    if(this.p.id != undefined && this.p.id > 0){
                        this.updateNode(this.p);
                    }else{
                        this.createNode(this.p);
                    }
                },
                createNode: function (data){
                    this.$http.post("<?php echo e(url('/admin/permission')); ?>",data).then(function (response){
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 422){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            var ii = layer.load();
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(ii);
                                window.location.href = "<?php echo e(url('/admin/permission/index')); ?>";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                },
                updateNode: function (data){
                    this.$http.put("<?php echo e(url('/admin/permission/')); ?>/"+data.id,data).then(function (response){
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 422){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            var ii = layer.load();
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(ii);
                                window.location.href = "<?php echo e(url('/admin/permission/index')); ?>";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>