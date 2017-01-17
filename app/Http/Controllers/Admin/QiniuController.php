<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Aizxin\Tools\QiniuUpload;
class QiniuController extends Controller
{
    /**
     *  [delete 七牛删除图片]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-17T13:31:01+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function delete(Request $request)
    {
        $data = $request->all();
        $res = (new QiniuUpload())->qiniuDelete($data['path']);
        if($res){
        	return respondWithSuccess($res,'删除成功');
        }else {
        	return respondWithErrors('删除失败');
        }
    }
}
