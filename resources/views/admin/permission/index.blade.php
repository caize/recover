@extends('layouts.admin') @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">权限管理</a></li>
        <!--<li><a href="javascript:;">权限列表</a></li>-->
        <li class="active">权限列表</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">权限管理<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
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
                    <h4 class="panel-title">权限列表</h4>
                </div>
                <div class="panel-body" id="permission">
                    <div class="table-responsive">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="data-table_length">
                                <label>显示
                                    <vue-select @change-page="fetchItems" :pagination.sync="pagination" :page-size.sync="pageSize" :name.sync="name"></vue-select>
                                    @permission('admin.permission.create')
                                    <a href="{{url('admin/permission/create')}}"  class="btn btn-primary m-r-5 m-b-5" style="height: 32px;margin-top: 4px;">权限添加</a>
                                    @endpermission
                                </label>
                            </div>
                            <vue-input @change-page="fetchItems" :pagination.sync="pagination" :page-size.sync="pageSize" :name.sync="name" :title="title"></vue-input>
                            <table id="data-table" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="data-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 271px;">编号</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table"
                                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 392px;">名称</th>
                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 360px;">排序</th>                                        <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 182px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="vo in items">
                                        <tr class="gradeA odd" role="row" >
                                            <td class="sorting_1">@{{vo.id}}</td>
                                            <td>@{{vo.display_name}}</td>
                                            <td>@{{vo.sort}}</td>
                                            <td>
                                                @permission('admin.permission.edit')
                                                <a href="{{url('admin/permission')}}/@{{vo.id}}/edit" class="btn btn-primary delete">
                                                <i class="fa fa-edit"></i>
                                                <span>修改</span>
                                                </a>
                                                @endpermission
                                                @permission('admin.permission.destroy')
                                                <button type="button" class="btn btn-danger delete" @click="destroy(vo.id)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>删除</span>
                                                </button>
                                                @endpermission
                                            </td>
                                        </tr>
                                            <template v-for="v in vo.child">
                                                <tr class="gradeA even" role="row" >
                                                    <td class="sorting_1">@{{v.id}}</td>
                                                    <td>┗━@{{v.display_name}}</td>
                                                    <td>@{{v.sort}}</td>
                                                    <td>
                                                        @permission('admin.permission.edit')
                                                        <a href="{{url('admin/permission')}}/@{{v.id}}/edit" class="btn btn-primary delete">
                                                            <i class="fa fa-edit"></i>
                                                            <span>修改</span>
                                                        </a>
                                                        @endpermission
                                                        @permission('admin.permission.destroy')
                                                        <button type="button" class="btn btn-danger delete" @click="destroy(v.id)">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                            <span>删除</span>
                                                        </button>
                                                        @endpermission
                                                    </td>
                                                </tr>
                                                <template v-for="t in v.child">
                                                    <tr class="gradeA even" role="row" >
                                                        <td class="sorting_1">@{{t.id}}</td>
                                                        <td>┗━━@{{t.display_name}}</td>
                                                        <td>@{{t.sort}}</td>
                                                        <td>
                                                            @permission('admin.permission.edit')
                                                            <a href="{{url('admin/permission')}}/@{{t.id}}/edit" class="btn btn-primary delete">
                                                                <i class="fa fa-edit"></i>
                                                                <span>修改</span>
                                                            </a>
                                                            @endpermission
                                                            @permission('admin.permission.destroy')
                                                            <button type="button" class="btn btn-danger delete" @click="destroy(t.id)">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                                <span>删除</span>
                                                            </button>
                                                            @endpermission
                                                    </td>
                                                    </tr>
                                                </template>
                                            </template>
                                    </template>
                                </tbody>
                            </table>
                        <pagination @change-page="fetchItems" :pagination.sync="pagination" :offset.sync="offset" :page-size.sync="pageSize" :name.sync="name"></pagination>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
</div>
@endsection @section('my-js')
<script src="/layer/layer.js"></script>
<script src="/vue/vue-pagination.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
var vn = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        },
        el: '#permission',
        data: {
            pagination: {
                total: 0,
                per_page: 7,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects
            items: [],
            msg:'',
            pageSize:10,
            name:'',
            title:'只能查顶级权限'
        },
        created: function () {
            this.fetchItems(this.pagination.current_page,this.pageSize,'');
        },
        methods: {
            /**
             *  [fetchItems 获取权限]
             */
            fetchItems: function (page,pageSize,name) {
                this.pagination.current_page = page;
                var data = {page: page,pageSize:pageSize,display_name:name};
                this.$http.post("{{url('admin/permission/index')}}", data).then(function (response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function (error) {
                    // handle error
                });
            },
            /**
             *  [destroy 删除权限]
             */
            destroy:function (id){
                layer.confirm('确认删除权限', {icon: 1, title:'删除权限'}, function(index){
                    vn.$http.delete("{{url('admin/permission')}}/"+id).then(function(response){
                        if(response.data.code == 400){
                            layer.close(index);
                            layer.msg(response.data.message);
                        }
                        if (response.data.code == 200) {
                            layer.msg(response.data.message, {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                                vn.name = '';
                                vn.fetchItems(vn.pagination.current_page,vn.pageSize,'');
                            });
                        }
                    }, function (error) {
                       layer.close(index);
                       layer.msg('系统错误');
                    });
                });
            }
        }
    });
</script> @endsection