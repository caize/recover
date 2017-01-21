<?php
// 首页直接跳转到后台
Route::get('/admin', function () {
    return redirect()->route('admin.index');
});
// 首页直接跳转到后台
Route::get('/', function () {
    return redirect()->route('index');
});
//后台路由组
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>'web'], function () {
    // 登录
    Route::get('login', 'AuthController@login')->name('admin.login');
    Route::post('login', 'AuthController@postLogin');
    // 注销
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
    // 七牛
    Route::any('qiniu/upload', 'QiniuController@upload');
    Route::post('qiniu/delete', 'QiniuController@delete');
    // 已经登录
    Route::group(['middleware' => ['admin.auth','role.auth:admin']], function () {
        // 后台首页
        Route::get('/', 'AdminController@index')->name('admin.index.index');
        // 后台权限节点
        Route::any('permission/index', 'PermissionController@index')->name('admin.permission.index');
        Route::resource('permission','PermissionController');
        // 后台角色
        Route::any('role/index', 'RoleController@index')->name('admin.role.index');
        Route::post('role/permission', 'RoleController@permission')->name('admin.role.permission');
        Route::resource('role','RoleController');
        // 管理员
        Route::any('user/index', 'UserController@index')->name('admin.user.index');
        Route::post('user/role', 'UserController@role')->name('admin.user.role');
        Route::resource('user','UserController');
        // 文章分类
        Route::any('category/index', 'CategoryController@index')->name('admin.category.index');
        Route::resource('category','CategoryController');
        // 文章
        Route::any('article/index', 'ArticleController@index')->name('admin.article.index');
        Route::resource('article','ArticleController');
        // 网站信息
        Route::any('config/index', 'ConfigController@index')->name('admin.config.index');
        Route::resource('config','ConfigController');
        //资源分类
        Route::any('resources/category/index', 'ResourcesCategoryController@index')->name('admin.resources.category.index');
        Route::resource('resources/category', 'ResourcesCategoryController');
        //资源
        Route::resource('resources', 'ResourcesController');
    });
    Route::get('/area', 'AreaController@index');
    Route::get('/cate', 'ResourcesCategoryController@list');
});
// pc端路由组
Route::group(['namespace' => 'Home', 'middleware'=>'web'], function () {
    Route::get('/', 'IndexController@index')->name('index');
});
// webapp端路由组
Route::group(['namespace' => 'Mobile','middleware'=>'web','domain' =>'m.recover.cn'],function(){
    Route::get('/index', 'IndexController@index')->name('index');
});

// Api路由
$api = app('Dingo\Api\Routing\Router');
// 配置api版本和路由
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Api\V1\Controllers','middleware' => 'cors'], function ($api) {


        $api->any('a.api', 'ArticleController@index');
        $api->group(['middleware' => 'jwt.auth'], function ($api) {

            $api->any('article.api', 'ArticleController@index');
        });

    });
});
