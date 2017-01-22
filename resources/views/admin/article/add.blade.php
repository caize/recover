@extends('layouts.admin') @section('style')
@include('UEditor::head');
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
@endsection @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">文章管理</a></li>
        <li><a href="javascript:;">文章列表</a></li>
        <li class="active">文章添加</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">文章管理<small>...</small></h1>
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
                    <h4 class="panel-title">文章添加</h4>
                </div>
                <div class="panel-body" id="addArticle">
                    <validator name="nodeValidation">
                        <form class="form-horizontal" novalidate method="POST">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label ">文章分类:</label>
                                    <div class="col-md-9 col-sm-9">
                                        <select class="form-control input" id="category_id" data-size="10" v-model="article.category_id" data-live-search="true" data-style="btn-white">
                                        <option value="0">文章分类</option>
                                        @foreach($cate as $vo)
                                        <option value="{{$vo['id']}}">{{$vo['name']}}</option>
                                        @foreach($vo['child'] as $v)
                                            <option value="{{$v['id']}}">&nbsp;&nbsp;++&nbsp;{{$v['name']}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">文章标题:</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" v-model="article.title" name="title" v-validate:title="{ required: true}" class="form-control input" placeholder="文章标题">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">文章封面:</label>
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
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label" for="message">简要描述:</label>
                                    <div class="col-md-9 col-sm-9">
                                        <textarea v-model="article.intro" name="intro" class="form-control input" v-validate:intro="{ required: true}" id="message" name="message" rows="4" data-parsley-range="[20,200]"
                                            placeholder="这里填写当前文章的简要描述"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">文章状态</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="radio" v-model="article.status"  data-render="switchery" data-theme="default" v-bind:value="1"/>置顶
                                        <input type="radio" v-model="article.status"  data-render="switchery" data-theme="default" v-bind:value="2"/>最热
                                        <input type="radio" v-model="article.status"  data-render="switchery" data-theme="default" v-bind:value="3"/>最新
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">文章内容</label>
                                    <div class="col-md-9 col-sm-9">
                                        <!-- <div id="editor"><textarea style="display: none;"></textarea></div> -->
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="content" type="text/plain" style="height: 500px;width: 800px">
                                        </script>
                                    </div>
                                </div>
                                @permission('admin.article.store')
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-md-offset-3">
                                        <button @click="addArticle()" :disabled="$nodeValidation.invalid" type="button" class="btn btn-success btn-lg m-r-5" style="width: 100px">保 存</button>
                                    </div>
                                </div>
                                @endpermission
                                <div class="form-group" v-if="msg">
                                    <div class="col-md-9 col-sm-9 col-md-offset-3">
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
@endsection @section('my-js')
    <!-- ================== Vue JS ================== -->
    <script src="/layer/layer.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <!-- ================== END vue JS ================== -->
    <script>
    	$(document).ready(function() {
    		Aizxin.setV({!! $article !!});
    	});
    </script>
    <script src="/js/admin/article/add-article.js"></script>
@endsection