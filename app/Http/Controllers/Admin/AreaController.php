<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Repositories\Eloquent\AreaRepository;

class AreaController extends Controller
{
    /**
     *  [$service 服务]
     *  @var [type]
     */
    protected $repository;

    /**
     *  [__construct description]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-20T17:21:41+0800
     *  @param    AreaRepository           $repository [description]
     */
    public function __construct(AreaRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     *  [index description]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-20T17:22:13+0800
     *  @return   [type]                   [description]
     */
    public function index()
    {
        return respondWithSuccess($this->repository->getArea(),'返回响应');
    }
}
