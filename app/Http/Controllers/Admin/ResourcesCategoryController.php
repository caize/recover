<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\ResourcesCategoryService;

class ResourcesCategoryController extends Controller
{
    /**
     *  [$service 服务]
     *  @var [type]
     */
    protected $service;

    /**
     *  [__construct 注入]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-15T00:12:46+0800
     *  @param    AuthService              $service [description]
     */
    public function __construct(ResourcesCategoryService $service)
    {
        $this->service = $service;
    }
    /**
     *  [index 网站信息]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:29:18+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->service->findByParent();
        }
        return view('admin.resources.category.index');
    }
    public function show($id){
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        return $this->service->create($request);
    }
    public function edit($id)
    {
    }
    /**
     *  [destroy 分类删除]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-13T17:13:55+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
    /**
     *  [update 分类更新]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-13T17:14:11+0800
     *  @param    Request                  $request [description]
     *  @param    [type]                   $id      [description]
     *  @return   [type]                            [description]
     */
    public function update(Request $request,$id)
    {
        return $this->service->create($request);
    }
    /**
     *  [list description]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-21T17:55:16+0800
     *  @param    string                   $value [description]
     *  @return   [type]                          [description]
     */
    public function list()
    {
        return $this->service->findByParent();
    }
}
