<?php $__env->startSection('content'); ?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <!-- <ol class="breadcrumb pull-right">
        <li><a href="javascript:;"><?php echo trans('admin.system.system'); ?></a></li>
        <li><a href="javascript:;">CSS Helper</a></li>
        <li class="active">Predefined CSS Class</li>
    </ol> -->
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo trans('admin.system.system'); ?></h1>
    <!-- end page-header -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#general-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-fw fa-cogs"></i> <span class="hidden-xs"><?php echo trans('admin.system.config.web'); ?></span></a></li>
        <li class=""><a href="#text-font-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-font"></i> <span class="hidden-xs">Text &amp; Font</span></a></li>
        <li class=""><a href="#margin-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-arrows"></i> <span class="hidden-xs">Margin</span></a></li>
        <li class=""><a href="#padding-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-expand"></i> <span class="hidden-xs">Padding</span></a></li>
        <li class=""><a href="#background-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-paint-brush"></i> <span class="hidden-xs">Background</span></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="general-tab">
            <h4 class="m-t-5 m-b-5">General CSS Class</h4>
            <p class="m-b-15">
                All the predefined css classes will override the defined css styling in your classes, UNLESS the <code>!important</code> is declared in your defined css styling.
            </p>
            <div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="8" class="text-center">General CSS Class Name</th>
                        </tr>
                        <tr>
                            <th class="text-center">Row Space</th>
                            <th class="text-center">Table</th>
                            <th class="text-center">Float</th>
                            <th class="text-center">Border Radius</th>
                            <th class="text-center">Width</th>
                            <th class="text-center">Height</th>
                            <th class="text-center">Vertical Box</th>
                            <th class="text-center">Overflow</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.row.row-space-0</td>
                            <td>.table-valign-middle</td>
                            <td>.pull-left</td>
                            <td>.no-rounded-corner</td>
                            <td>.width-full (100%)</td>
                            <td>.height-full (100%)</td>
                            <td>.vertical-box</td>
                            <td>.overflow-auto</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-2</td>
                            <td>.table-th-valign-middle</td>
                            <td>.pull-right</td>
                            <td>.rounded-corner</td>
                            <td>.width-lg (600px)</td>
                            <td>.height-lg (600px)</td>
                            <td>.vertical-box-column</td>
                            <td>.overflow-visible</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-4</td>
                            <td>.table-td-valign-middle</td>
                            <td>.pull-none</td>
                            <td></td>
                            <td>.width-md (450px)</td>
                            <td>.height-md (450px)</td>
                            <td>.vertical-box-row</td>
                            <td>.overflow-scroll</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-6</td>
                            <td>.table-valign-top</td>
                            <td></td>
                            <td></td>
                            <td>.width-sm (300px)</td>
                            <td>.height-sm (300px)</td>
                            <td>.vertical-box-cell</td>
                            <td>.overflow-x-hidden</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-8</td>
                            <td>.table-th-valign-top</td>
                            <td></td>
                            <td></td>
                            <td>.width-xs (150px)</td>
                            <td>.height-xs (150px)</td>
                            <td>.vertical-box-inner-cell</td>
                            <td>.overflow-x-visible</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-10</td>
                            <td>.table-td-valign-top</td>
                            <td></td>
                            <td></td>
                            <td>.width-50 (50px)</td>
                            <td>.height-50 (50px)</td>
                            <td></td>
                            <td>.overflow-x-scroll</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-12</td>
                            <td>.table-valign-bottom</td>
                            <td></td>
                            <td></td>
                            <td>.width-100 (100px)</td>
                            <td>.height-100 (100px)</td>
                            <td></td>
                            <td>.overflow-y-hidden</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-14</td>
                            <td>.table-th-valign-bottom</td>
                            <td></td>
                            <td></td>
                            <td>.width-150 (150px)</td>
                            <td>.height-150 (150px)</td>
                            <td></td>
                            <td>.overflow-y-visible</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-16</td>
                            <td>.table-td-valign-bottom</td>
                            <td></td>
                            <td></td>
                            <td>.width-200 (200px)</td>
                            <td>.height-200 (200px)</td>
                            <td></td>
                            <td>.overflow-y-scroll</td>
                        </tr>
                        <tr>
                            <td>.row.row-space-18</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-250 (250px)</td>
                            <td>.height-250 (250px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.row.row-space-20</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-300 (300px)</td>
                            <td>.height-300 (300px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.row.row-space-22</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-350 (350px)</td>
                            <td>.height-350 (350px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.row.row-space-24</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-400 (400px)</td>
                            <td>.height-400 (400px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.row.row-space-26</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-450 (450px)</td>
                            <td>.height-450 (450px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.row.row-space-28</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-500 (500px)</td>
                            <td>.height-500 (500px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.row.row-space-30</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-550 (550px)</td>
                            <td>.height-550 (550px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.width-600 (600px)</td>
                            <td>.height-600 (600px)</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="text-font-tab">
            <h4 class="m-t-5 m-b-5">Text &amp; Font - Align / Color / Size</h4>
            <p class="m-b-15">
                All the predefined css classes will override the defined css styling in your classes, UNLESS the <code>!important</code> is declared in your defined css styling.
            </p>
            <div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="5" class="text-center">Text / Font Class Name</th>
                        </tr>
                        <tr>
                            <th class="text-center">Font Size</th>
                            <th class="text-center">Font Weight</th>
                            <th class="text-center">Text Color</th>
                            <th class="text-center">Text Align</th>
                            <th class="text-center">Text Overflow</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.f-s-8</td>
                            <td>.f-w-100</td>
                            <td>.text-inverse</td>
                            <td>.text-center</td>
                            <td>.text-ellipsis</td>
                        </tr>
                        <tr>
                            <td>.f-s-9</td>
                            <td>.f-w-200</td>
                            <td>.text-primary</td>
                            <td>.text-left</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-10</td>
                            <td>.f-w-300</td>
                            <td>.text-success</td>
                            <td>.text-right</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-11</td>
                            <td>.f-w-400</td>
                            <td>.text-danger</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-12</td>
                            <td>.f-w-500</td>
                            <td>.text-info</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-13</td>
                            <td>.f-w-600</td>
                            <td>.text-warning</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-14</td>
                            <td>.f-w-700</td>
                            <td>.text-white</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-15</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-16</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-17</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-18</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-19</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>.f-s-20</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="margin-tab">
            <h4 class="m-t-5 m-b-5">Margin - All / Top / Right / Bottom / Left</h4>
            <p class="m-b-15">
                All the predefined css classes will override the defined css styling in your classes, UNLESS the <code>!important</code> is declared in your defined css styling.
            </p>
            <div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="5" class="text-center">Margin Class Name</th>
                        </tr>
                        <tr>
                            <th class="text-center">Margin</th>
                            <th class="text-center">Margin Top</th>
                            <th class="text-center">Margin Right</th>
                            <th class="text-center">Margin Bottom</th>
                            <th class="text-center">Margin Left</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.m-0</td>
                            <td>.m-t-0</td>
                            <td>.m-r-0</td>
                            <td>.m-b-0</td>
                            <td>.m-l-0</td>
                        </tr>
                        <tr>
                            <td>.m-1</td>
                            <td>.m-t-1</td>
                            <td>.m-r-1</td>
                            <td>.m-b-1</td>
                            <td>.m-l-1</td>
                        </tr>
                        <tr>
                            <td>.m-2</td>
                            <td>.m-t-2</td>
                            <td>.m-r-2</td>
                            <td>.m-b-2</td>
                            <td>.m-l-2</td>
                        </tr>
                        <tr>
                            <td>.m-3</td>
                            <td>.m-t-3</td>
                            <td>.m-r-3</td>
                            <td>.m-b-3</td>
                            <td>.m-l-3</td>
                        </tr>
                        <tr>
                            <td>.m-4</td>
                            <td>.m-t-4</td>
                            <td>.m-r-4</td>
                            <td>.m-b-4</td>
                            <td>.m-l-4</td>
                        </tr>
                        <tr>
                            <td>.m-5</td>
                            <td>.m-t-5</td>
                            <td>.m-r-5</td>
                            <td>.m-b-5</td>
                            <td>.m-l-5</td>
                        </tr>
                        <tr>
                            <td>.m-10</td>
                            <td>.m-t-10</td>
                            <td>.m-r-10</td>
                            <td>.m-b-10</td>
                            <td>.m-l-10</td>
                        </tr>
                        <tr>
                            <td>.m-15</td>
                            <td>.m-t-15</td>
                            <td>.m-r-15</td>
                            <td>.m-b-15</td>
                            <td>.m-l-15</td>
                        </tr>
                        <tr>
                            <td>.m-20</td>
                            <td>.m-t-20</td>
                            <td>.m-r-20</td>
                            <td>.m-b-20</td>
                            <td>.m-l-20</td>
                        </tr>
                        <tr>
                            <td>.m-25</td>
                            <td>.m-t-25</td>
                            <td>.m-r-25</td>
                            <td>.m-b-25</td>
                            <td>.m-l-25</td>
                        </tr>
                        <tr>
                            <td>.m-30</td>
                            <td>.m-t-30</td>
                            <td>.m-r-30</td>
                            <td>.m-b-30</td>
                            <td>.m-l-30</td>
                        </tr>
                        <tr>
                            <td>.m-35</td>
                            <td>.m-t-35</td>
                            <td>.m-r-35</td>
                            <td>.m-b-35</td>
                            <td>.m-l-35</td>
                        </tr>
                        <tr>
                            <td>.m-40</td>
                            <td>.m-t-40</td>
                            <td>.m-r-40</td>
                            <td>.m-b-40</td>
                            <td>.m-l-40</td>
                        </tr>
                        <tr>
                            <td>.m-auto</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="padding-tab">
            <h4 class="m-t-5 m-b-5">Padding - All / Top / Right / Bottom / Left</h4>
            <p class="m-b-15">
                All the predefined css classes will override the defined css styling in your classes, UNLESS the <code>!important</code> is declared in your defined css styling.
            </p>
            <div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="5" class="text-center">Padding Class Name</th>
                        </tr>
                        <tr>
                            <th class="text-center">Padding</th>
                            <th class="text-center">Padding Top</th>
                            <th class="text-center">Padding Right</th>
                            <th class="text-center">Padding Bottom</th>
                            <th class="text-center">Padding Left</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.p-0</td>
                            <td>.p-t-0</td>
                            <td>.p-r-0</td>
                            <td>.p-b-0</td>
                            <td>.p-l-0</td>
                        </tr>
                        <tr>
                            <td>.p-1</td>
                            <td>.p-t-1</td>
                            <td>.p-r-1</td>
                            <td>.p-b-1</td>
                            <td>.p-l-1</td>
                        </tr>
                        <tr>
                            <td>.p-2</td>
                            <td>.p-t-2</td>
                            <td>.p-r-2</td>
                            <td>.p-b-2</td>
                            <td>.p-l-2</td>
                        </tr>
                        <tr>
                            <td>.p-3</td>
                            <td>.p-t-3</td>
                            <td>.p-r-3</td>
                            <td>.p-b-3</td>
                            <td>.p-l-3</td>
                        </tr>
                        <tr>
                            <td>.p-4</td>
                            <td>.p-t-4</td>
                            <td>.p-r-4</td>
                            <td>.p-b-4</td>
                            <td>.p-l-4</td>
                        </tr>
                        <tr>
                            <td>.p-5</td>
                            <td>.p-t-5</td>
                            <td>.p-r-5</td>
                            <td>.p-b-5</td>
                            <td>.p-l-5</td>
                        </tr>
                        <tr>
                            <td>.p-10</td>
                            <td>.p-t-10</td>
                            <td>.p-r-10</td>
                            <td>.p-b-10</td>
                            <td>.p-l-10</td>
                        </tr>
                        <tr>
                            <td>.p-15 / .wrapper</td>
                            <td>.p-t-15</td>
                            <td>.p-r-15</td>
                            <td>.p-b-15</td>
                            <td>.p-l-15</td>
                        </tr>
                        <tr>
                            <td>.p-20</td>
                            <td>.p-t-20</td>
                            <td>.p-r-20</td>
                            <td>.p-b-20</td>
                            <td>.p-l-20</td>
                        </tr>
                        <tr>
                            <td>.p-25</td>
                            <td>.p-t-25</td>
                            <td>.p-r-25</td>
                            <td>.p-b-25</td>
                            <td>.p-l-25</td>
                        </tr>
                        <tr>
                            <td>.p-30</td>
                            <td>.p-t-30</td>
                            <td>.p-r-30</td>
                            <td>.p-b-30</td>
                            <td>.p-l-30</td>
                        </tr>
                        <tr>
                            <td>.p-35</td>
                            <td>.p-t-35</td>
                            <td>.p-r-35</td>
                            <td>.p-b-35</td>
                            <td>.p-l-35</td>
                        </tr>
                        <tr>
                            <td>.p-40</td>
                            <td>.p-t-40</td>
                            <td>.p-r-40</td>
                            <td>.p-b-40</td>
                            <td>.p-l-40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="background-tab">
            <h4 class="m-t-5 m-b-5">Background</h4>
            <p class="m-b-15">
                All the predefined css classes will override the defined css styling in your classes, UNLESS the <code>!important</code> is declared in your defined css styling.
            </p>
            <div class="table-responsive">
                <table class="table table-condensed table-th-valign-middle table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center col-md-3">Color Name</th>
                            <th colspan="3" class="text-center">Background Class Name</th>
                        </tr>
                        <tr>
                            <th class="text-center">Lighter</th>
                            <th class="text-center">Normal</th>
                            <th class="text-center">Darker</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>No Background</td>
                            <td> - </td>
                            <td>.no-bg</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>White</td>
                            <td> - </td>
                            <td>.bg-white</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>Silver</td>
                            <td>.bg-silver-lighter</td>
                            <td>.bg-silver</td>
                            <td>.bg-silver-darker</td>
                        </tr>
                        <tr>
                            <td>Black</td>
                            <td>.bg-black-lighter</td>
                            <td>.bg-black</td>
                            <td>.bg-black-darker</td>
                        </tr>
                        <tr>
                            <td>Red</td>
                            <td>.bg-red-lighter</td>
                            <td>.bg-red</td>
                            <td>.bg-red-darker</td>
                        </tr>
                        <tr>
                            <td>Orange</td>
                            <td>.bg-orange-lighter</td>
                            <td>.bg-orange</td>
                            <td>.bg-orange-darker</td>
                        </tr>
                        <tr>
                            <td>Yellow</td>
                            <td>.bg-yellow-lighter</td>
                            <td>.bg-yellow</td>
                            <td>.bg-yellow-darker</td>
                        </tr>
                        <tr>
                            <td>Green</td>
                            <td>.bg-green-lighter</td>
                            <td>.bg-green</td>
                            <td>.bg-green-darker</td>
                        </tr>
                        <tr>
                            <td>Blue</td>
                            <td>.bg-blue-lighter</td>
                            <td>.bg-blue</td>
                            <td>.bg-blue-darker</td>
                        </tr>
                        <tr>
                            <td>Aqua</td>
                            <td>.bg-aqua-lighter</td>
                            <td>.bg-aqua</td>
                            <td>.bg-aqua-darker</td>
                        </tr>
                        <tr>
                            <td>Purple</td>
                            <td>.bg-purple-lighter</td>
                            <td>.bg-purple</td>
                            <td>.bg-purple-darker</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('my-js'); ?>
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
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            }
        },
        el: '#article',
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
            title:'只能查文章标题'
        },
        created: function () {
            this.fetchItems(this.pagination.current_page,this.pageSize,'');
        },
        methods: {
            /**
             *  [fetchItems 获取文章]
             */
            fetchItems: function (page,pageSize,name) {
                this.pagination.current_page = page;
                var data = {page: page,pageSize:pageSize,name:name};
                this.$http.post("<?php echo e(url('admin/article/index')); ?>", data).then(function (response) {
                    this.$set('items', response.data.result.data);
                    this.$set('pagination', response.data.result.pagination);
                }, function (error) {
                    console.log("系统错误");
                });
            },
            /**
             *  [destroy 删除文章]
             */
            destroy:function (id){
                layer.confirm('确认删除文章', {icon: 1, title:'删除文章'}, function(index){
                    vn.$http.delete("<?php echo e(url('admin/article')); ?>/"+id).then(function(response){
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
</script> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>