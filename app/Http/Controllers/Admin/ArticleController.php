<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\ArticleService;

class ArticleController extends Controller
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
    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }
    /**
     *  [index 文章]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:29:18+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->service->getArticleList($request);
        }
        return view('admin.article.index');
    }
    public function show($id){
    }
    /**
     *  [create 文章添加视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T15:40:38+0800
     *  @return   [type]                   [description]
     */
    public function create()
    {
        $cate = $this->service->getCate();
        $article = json_encode(['id'=>0]);
        return view('admin.article.add',compact('cate','article'));
    }
    /**
     *  [store 文章添加操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T15:40:07+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function store(Request $request)
    {
        return $this->service->create($request);
    }
    /**
     *  [edit 文章编辑视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T15:41:12+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function edit($id)
    {
        $cate = $this->service->getCate();
        $article = $this->service->findById($id);
        return view('admin.article.add',compact('cate','article'));
    }
    /**
     *  [update 文章编辑操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T15:41:43+0800
     *  @param    Request                  $request [description]
     *  @param    [type]                   $id      [description]
     *  @return   [type]                            [description]
     */
    public function update(Request $request,$id)
    {
        return $this->service->create($request);
    }
    /**
     *  [destroy 文章删除]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T15:42:03+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
    /**
     *  [upload markdown 图片上传]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-23T18:06:06+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function upload(Request $request)
    {
        return $this->service->upload($request);
    }
}
