<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ConfigRepository;
use Aizxin\Tools\QiniuUpload;

class ConfigService extends CommonService
{
    /**
     * @var ConfigRepository
     */
    protected $repository;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    ConfigRepository           $repository [description]
     *  @param    ConfigValidator            $validator  [description]
     */
    public function __construct(ConfigRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     *  [list 网站信息]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-12T13:01:51+0800
     *  @param    string                   $value [description]
     *  @return   [type]                          [description]
     */
    public function groupList($data)
    {
        return $this->respondWithSuccess($this->repository->configGroupList($data), '返回成功');
    }
    /**
     *  [store 网站信息更新]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-01-12T18:00:24+0800
     *  @param    [type]                   $data [description]
     *  @return   [type]                         [description]
     */
    public function editConfig($request)
    {
        $data = $request->except('base64');
        if($request->has('base64')){
            $img = (new QiniuUpload())->qiniuBase64($request->only('base64'),config('admin.globals.imagePath.config'));
            if($img == false){
                return $this->respondWithErrors('上传图片错误',400);
            }
            if(strpos($data['WEB_SITE_LOGO'], env('QINIU_DOMAINS_DEFAULT')) !== false){
                $path = explode(env('QINIU_DOMAINS_DEFAULT').'/', $data['WEB_SITE_LOGO']);
                (new QiniuUpload())->qiniuDelete($path[1]);
            }
            $data['WEB_SITE_LOGO'] = $img;
        }
        if($this->repository->editConfig( $data )){
            $this->repository->getConfig();
            return $this->respondWithSuccess(1, '修改成功');
        }
        return $this->respondWithErrors('修改失败',400);
    }
}