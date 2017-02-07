<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ResourcesRepository;
use Aizxin\Validators\ResourcesValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class ResourcesService extends CommonService
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
    public function __construct(ResourcesRepository $repository, ResourcesValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    /**
     *  [create 资源添加/更新]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-04T16:32:31+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function create($request)
    {
        $data = $request->except(['imgs','s']);
        $imgs = $request->only('imgs');
        try {
            $this->validator->with( $data )->passesOrFail();
            $res = $this->repository->add( $data,$imgs );
            if( $res > 0){
                return $this->respondWithSuccess($res, '添加成功');
            }
            return $this->respondWithErrors('添加失败',400);
        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag()->first() , 422);
        }
    }
    /**
     *  [list 资源列表]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:13:16+0800
     *  @return   [type]                   [description]
     */
    public function list($request)
    {
        return $this->respondWithSuccess($this->repository->getResourcesList($request), '返回成功');
    }
    /**
     *  [getResourcesDetail 资源详情]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T17:23:24+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function getResourcesDetail($id)
    {
        return $this->respondWithSuccess($this->repository->getResourcesDetail($id), '返回成功');
    }
}