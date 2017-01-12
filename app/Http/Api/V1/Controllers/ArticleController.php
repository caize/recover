<?php
namespace App\Http\Api\V1\Controllers;

use Illuminate\Http\Request;
use Aizxin\Services\Admin\ArticleService;

class ArticleController extends BaseController
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
    public function index()
    {
        return $this->service->getArticle();
    }
}
