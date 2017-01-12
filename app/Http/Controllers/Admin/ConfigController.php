<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
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
    public function __construct(){
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
    	return view('admin.config.index');
    }
    public function show($id){
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function edit($id)
    {
    }
    public function destroy($id)
    {
    }
    public function update(Request $request,$id)
    {
    }
    public function role(Request $request)
    {
    }
}
