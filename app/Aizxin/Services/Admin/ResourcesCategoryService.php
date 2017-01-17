<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ResourcesCategoryRepository;
use Aizxin\Validators\ResourcesCategoryValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Aizxin\Tools\QiniuUpload;

class ResourcesCategoryService extends CommonService
{
    /**
     * @var ResourcesCategoryRepository
     */
    protected $repository;
    /**
     * @var CategoryValidator
     */
    protected $validator;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    ResourcesCategoryRepository           $repository [description]
     *  @param    ResourcesCategoryValidator            $validator  [description]
     */
    public function __construct(ResourcesCategoryRepository $repository, ResourcesCategoryValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    /**
     *  [create 分类添加和更新]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T22:58:20+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function create($request)
    {
        $data = $request->except('base64');
        if($request->has('base64')){
            $img = (new QiniuUpload())->qiniuBase64($request->only('base64'),config('admin.globals.imagePath.resources.category'));
            if($img == false){
                return $this->respondWithErrors('上传图片错误',400);
            }
            if(strpos($data['thumb'], env('QINIU_DOMAINS_DEFAULT')) !== false){
                $path = explode(env('QINIU_DOMAINS_DEFAULT').'/', $data['thumb']);
                (new QiniuUpload())->qiniuDelete($path[1]);
            }
            $data['thumb'] = $img;
        }
        try {
            if(isset($data['id']) && $data['id'] > 0){
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_UPDATE );
                if( $this->repository->update( $data ,$data['id'])){
                    $this->repository->getCate();
                    return $this->respondWithSuccess(1, '修改成功');
                }
                return $this->respondWithErrors('修改失败',400);
            }else{
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );
                if( $this->repository->create( $data )){
                    $this->repository->getCate();
                    return $this->respondWithSuccess(1, '添加成功');
                }
                return $this->respondWithErrors('添加失败',400);
            }
        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag()->first() , 422);
        }
    }
    /**
     *  [findById 根据id查询]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-22T23:43:39+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function findByParent()
    {
        $data = $this->repository->getCateList();
        return $this->respondWithSuccess(count($data) > 0 ? $data : [], '添加成功');
    }
    /**
     *  [destroy 删除分类]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-17T17:18:37+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function destroy($id)
    {
        if($this->repository->destroyCate($id) !== false){
            return $this->respondWithSuccess(1, '删除成功');
        }
        return $this->respondWithErrors('有子分类,不能删除',400);
    }
}