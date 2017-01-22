@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css">
<div id="content" class="content webConfig" >
    <!-- begin breadcrumb -->
    <!-- <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">{!! trans('admin.system.system') !!}</a></li>
        <li><a href="javascript:;">CSS Helper</a></li>
        <li class="active">Predefined CSS Class</li>
    </ol> -->
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">{!! trans('admin.system.system') !!}</h1>
    <!-- end page-header -->
    <ul class="nav nav-tabs">
        <li class="active" @click="configActive(1)"><a href="#general-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-fw fa-cogs"></i> <span class="hidden-xs">{!! trans('admin.system.config.web') !!}</span></a></li>
        <!-- <li class="" @click="configActive(2)"><a href="#text-font-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-font"></i> <span class="hidden-xs">Text &amp; Font</span></a></li> -->
    </ul>
    <div class="tab-content" id="webConfig">
        <div class="tab-pane fade active in" id="general-tab">
            <div class="table-responsive">
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                        <div class="form-group" v-for="c in config">
                            <label class="control-label col-md-2 col-sm-2" for="fullname">@{{c.name}}* :</label>
                            <div class="col-md-8 col-sm-8" v-if='c.type == "input"'>
                                <input class="form-control" type="text" id="@{{c.code}}" name="@{{c.code}}" value="@{{c.value}}" >
                            </div>
                            <div class="col-md-8 col-sm-8" v-if='c.type == "text"'>
                                <textarea class="form-control" id="@{{c.code}}" name="@{{c.code}}" rows="4" data-parsley-range="[20,200]" data-parsley-id="6870">@{{c.value}}</textarea>
                            </div>
                            <div class="col-md-8 col-sm-8" v-if='c.type == "upload"'>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                      <img v-if="c.value" v-bind:src="c.value" alt="" id="@{{c.code}}"/>
                                      <img v-else src="{{asset('assets/img/no-image.png')}}" alt="" id="@{{c.code}}"/>
                                      </div>
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
                            <label class="control-label col-md-2 col-sm-2"></label>
                            <div class="col-md-8 col-sm-8">
                                <button type="button" @click="editConfig()" class="btn btn-primary">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="tab-pane fade" id="text-font-tab">
            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="fullname">Full Name * :</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Required" data-parsley-required="true" data-parsley-id="3227">
                        {{-- <ul class="parsley-errors-list filled" id="parsley-id-3227"><li class="parsley-required">This value is required.</li></ul> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="email">Email * :</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" data-parsley-id="0512">
                        {{-- <ul class="parsley-errors-list filled" id="parsley-id-0512"><li class="parsley-required">This value is required.</li></ul> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="website">Website :</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="url" id="website" name="website" data-parsley-type="url" placeholder="url" data-parsley-id="7292"><ul class="parsley-errors-list" id="parsley-id-7292"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="message">Message (20 chars min, 200 max) :</label>
                    <div class="col-md-8 col-sm-8">
                        <textarea class="form-control" id="message" name="message" rows="4" data-parsley-range="[20,200]" placeholder="Range from 20 - 200" data-parsley-id="6870"></textarea><ul class="parsley-errors-list" id="parsley-id-6870"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="message">Digits :</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="digits" name="digits" data-parsley-type="digits" placeholder="Digits" data-parsley-id="5353"><ul class="parsley-errors-list" id="parsley-id-5353"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="message">Number :</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="number" name="number" data-parsley-type="number" placeholder="Number" data-parsley-id="4277"><ul class="parsley-errors-list" id="parsley-id-4277"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2" for="message">Phone :</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="data-phone" data-parsley-type="number" placeholder="(XXX) XXXX XXX" data-parsley-id="1767"><ul class="parsley-errors-list" id="parsley-id-1767"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2"></label>
                    <div class="col-md-8 col-sm-8">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div> -->
    </div>
</div>
@endsection @section('my-js')
<script src="/layer/layer.js"></script>
<script src="/vue/vue-pagination.js"></script>
<script src="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="/js/admin/config/config.js"></script> @endsection