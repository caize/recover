@extends('layouts.admin')
@section('style')
<link href="/assets/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css">
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
@endsection
@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">{!! trans('admin.resources.manage') !!}</a></li>
        <!--<li><a href="javascript:;">文章列表</a></li>-->
        <li class="active">{!! trans('admin.resources.category.index') !!}</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">{!! trans('admin.resources.manage') !!}<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row" id="resourcescategory">
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
                    <h4 class="panel-title">{!! trans('admin.resources.category.index') !!}</h4>
                </div>
                <div class="panel-body">
                    <div class="dd" id="nestable3">
                        <ol class="dd-list">
                            <li class="dd-item dd3-item" data-id="@{{vo.id}}" v-for="vo in list">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">@{{vo.name}}
                                    <div class="pull-right action-buttons">
                                        @permission('admin.resources.category.store')
                                        <a href="javascript:;" data-pid="13" class="btn-xs createMenu" data-toggle="tooltip"data-original-title="添加" @click="addCateParent(vo)"  data-placement="top"><i class="fa fa-plus"></i>
                                        </a>
                                        @endpermission
                                        @permission('admin.resources.category.update')
                                        <a href="javascript:;" data-href="url" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改" @click="editCate(vo)"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                        @endpermission
                                        @permission('admin.resources.category.destroy')
                                        <a href="javascript:;" class="btn-xs destoryMenu" data-id="13" data-original-title="删除"data-toggle="tooltip" @click="destroyCate(vo.id)" data-placement="top"><i class="fa fa-trash"></i></a>
                                        @endpermission
                                    </div>
                                </div>
                                <ol class="dd-list" >
                                    <li class="dd-item dd3-item" data-id="@{{v.id}}" v-for="v in vo.child">
                                        <div class="dd-handle dd3-handle"></div><div class="dd3-content">@{{v.name}}
                                            <div class="pull-right action-buttons">
                                                @permission('admin.resources.category.store')
                                                <a href="javascript:;" data-pid="13" class="btn-xs createMenu" data-toggle="tooltip"data-original-title="添加" @click="addCateParent(v)"  data-placement="top"><i class="fa fa-plus"></i>
                                                </a>
                                                @endpermission
                                                @permission('admin.resources.category.update')
                                                <a href="javascript:;" data-href="url" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改" @click="editCate(v)" data-placement="top"><i class="fa fa-pencil"></i></a>
                                                @endpermission
                                                @permission('admin.resources.category.destroy')
                                                <a href="javascript:;" class="btn-xs destoryMenu" data-id="13" data-original-title="删除"data-toggle="tooltip" @click="destroyCate(v.id)"  data-placement="top"><i class="fa fa-trash"></i></a>
                                                @endpermission
                                            </div>
                                        </div>
                                        <ol class="dd-list" >
                                            <li class="dd-item dd3-item" data-id="@{{c.id}}" v-for="c in v.child">
                                                <div class="dd-handle dd3-handle"></div><div class="dd3-content">@{{c.name}}
                                                    <div class="pull-right action-buttons">
                                                        @permission('admin.resources.category.update')
                                                        <a href="javascript:;" data-href="url" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改" @click="editCate(c)" data-placement="top"><i class="fa fa-pencil"></i></a>
                                                        @endpermission
                                                        @permission('admin.resources.category.destroy')
                                                        <a href="javascript:;" class="btn-xs destoryMenu" data-id="13" data-original-title="删除"data-toggle="tooltip" @click="destroyCate(c.id)"  data-placement="top"><i class="fa fa-trash"></i></a>
                                                        @endpermission
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
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
                    <h4 class="panel-title">{!! trans('admin.resources.category.add') !!}</h4>
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
                                        <template v-for="vo in list">
                                            <option v-bind:value="vo.id">@{{vo.name}}</option>
                                            <template v-for="v in vo.child">
                                                <option v-bind:value="v.id">&nbsp;&nbsp;++&nbsp;@{{v.name}}</option>
                                            </template>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">服务类型</label>
                                <div class="col-md-9">
                                    <select class="form-control selectpicker input" id="type" data-size="10" v-model="cate.type" data-live-search="true" data-style="btn-white">
                                        <option v-bind:value="0">服务类型</option>
                                        <option v-bind:value="1">供求交易</option>
                                        <option v-bind:value="2">服务预约</option>
                                        <option v-bind:value="3">免费信息</option>
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
                                <label class="col-md-3 control-label">分类背景图必填项</label>
                                <div class="col-md-9">
                                    <div class="col-md-9 col-sm-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                              <img src="{{asset('assets/img/no-image.png')}}" alt="" id="articleImg"/> </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                          <div>
                                              <span class="btn purple btn-file">
                                                    <span class="fileinput-new">
                                                        <button type="button" class="btn btn-primary start">
                                                            <i class="fa fa-upload"></i>
                                                            <span>上传图片</span>
                                                        </button>
                                                    </span>
                                                    <span class="fileinput-exists">
                                                        <button type="reset" class="btn btn-warning cancel">
                                                            <i class="fa fa-ban"></i>
                                                            <span>更新图片</span>
                                                        </button>
                                                     </span>
                                                    <input id="upload-input" type="file" name="editormd-image-file">
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    <button type="button" class="btn btn-danger delete">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                        <span>图片删除</span>
                                                    </button>
                                                </a>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">分类是否显示</label>
                                <div class="col-md-9">
                                    <label class="radio-inline">
                                        <input type="radio" v-model="cate.is_show" name="optionsRadios" v-bind:value="0" />
                                        隐藏
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" v-model="cate.is_show" name="optionsRadios" v-bind:value="1"/>
                                        显示
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
@endsection @section('my-js')
<script src="/layer/layer.js"></script>
<script src="/assets/js/ui-modal-notification.demo.min.js"></script>
<script src="/assets/plugins/jquery-nestable/jquery.nestable.js"></script>
<script src="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        App.init();
        Notification.init();
        $('#nestable3').nestable('serialize');
        var vn = new Vue({
            el: '#resourcescategory',
            http: {
                root: '/root',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            },
            data: {
                cate:{parent_id:0,is_show:1,type:0},
                list:[],
                msg:'',
                load:null,
            },
            created: function () {
                this.cateList();
            },
            methods: {
                /**
                 *  [addCateParent 添加]
                 */
                addCateParent: function (v){
                    vn.$set('cate',{parent_id:v.id,is_show:1,type:v.type});
                },
                /**
                 *  [editCate 修改]
                 */
                editCate: function (vo){
                    $("#articleImg").attr('src',vo.thumb);
                    if($(".fileinput-preview").find('img').length > 0){
                        $(".fileinput-preview").find('img').attr('src',vo.thumb);
                    }
                    vn.$set('cate',vo);
                },
                /**
                 *  [addCate 添加按钮]
                 */
                addCate: function (){
                    this.$set('load',layer.load());
                    if($(".fileinput-preview").find('img').length > 0){
                        this.cate.base64 = $(".fileinput-preview").find('img')[0].src;
                    }
                    this.cate.thumb = $("#articleImg")[0].src;
                    if(this.cate.id != undefined && this.cate.id > 0){
                        this.updateCate(this.cate);
                    }else{
                        this.createCate(this.cate);
                    }
                },
                /**
                 *  [destroyCate 分类]
                 */
                destroyCate: function(id){
                    layer.confirm('确认删除分类', {icon: 1, title:'删除分类'}, function(index){
                        vn.$http.delete("{{url('admin/resources/category')}}/"+id)
                        .then(function(response){
                            this.callback(response);
                        }, function (error) {
                           layer.close(index);
                           layer.msg('系统错误');
                        });
                    });
                },
                /**
                 *  [createCate 添加操作]
                 */
                createCate: function (data){
                    this.$http.post("{{url('/admin/resources/category')}}",data)
                    .then(function (response){
                        this.callback(response);
                    }, function (response) {
                        console.log(response)
                    });
                },
                /**
                 *  [updateCate 修改操作]
                 */
                updateCate: function (data){
                    this.$http.put("{{url('/admin/resources/category')}}/"+data.id,data).then(function (response){
                        this.callback(response);
                    }, function (response) {
                        console.log(response)
                    });
                },
                /**
                 *  [cateList 分类列表]
                 */
                cateList: function(){
                    this.$http.post("{{url('/admin/resources/category/index')}}").then(function (response){
                        if(response.data.code == 200){
                            this.$set('list',response.data.result)
                        }
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
                            layer.msg(response.data.message,{
                              icon: 1,
                              time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                vn.$set('cate',{parent_id:0,is_show:1,type:0});
                                vn.cateList();
                            });
                        }, 3000);
                    }
                }
            }
        });
    });
</script> @endsection