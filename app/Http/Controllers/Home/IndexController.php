<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;
use Aizxin\Models\User;
class IndexController extends Controller
{
    public function index()
    {
        
        // dd(\JWTAuth::fromUser(User::find(3)));
        dd(\Predis::get('test'));
        return view('welcome');
    }
}
