<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ArticleRepository;
use Aizxin\Repositories\Eloquent\Admin\CategoryRepository;
use Aizxin\Validators\ArticleValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
// 七牛
use Aizxin\Tools\QiniuUpload;

class ArticleService extends CommonService
{
    /**
     * @var ArticleRepository
     */
    protected $repository;
    /**
     * @var ArticleValidator
     */
    protected $validator;
    /**
     * @var CategoryRepository
     */
    protected $cate;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    ArticleRepository           $repository [description]
     *  @param    ArticleValidator            $validator  [description]
     */
    public function __construct(ArticleRepository $repository, ArticleValidator $validator,CategoryRepository $cate)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->cate = $cate;
    }
    /**
     *  [getCate 分类列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T16:17:46+0800
     *  @return   [type]                   [description]
     */
    public function getCate()
    {
        return $this->cate->getCateList();
    }
    /**
     *  [upload markdown 图片上传]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-23T17:52:30+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     *  上传的后台只需要返回一个 JSON 数据，结构如下：
     {
        success : 0 | 1,           // 0 表示上传失败，1 表示上传成功
        message : "提示的信息，上传成功或上传失败及错误信息等。",
        url     : "图片地址"        // 上传成功时才返回
     }
     */
    public function upload($request)
    {
        if ($request->hasFile('editormd-image-file')) {
            $path = (new QiniuUpload())->uploadImage($request->file('editormd-image-file'));
            return response()->json([
                'success' => 1,
                'message' => '上传成功',
                'url' => strval($path)
            ]);
        }
        return response()->json([
            'success' => 0,
            'message' => '失败成功',
            'url' => '',
        ]);
    }
    /**
     *  [create 文章添加与更新]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T16:13:34+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function create($request)
    {
        $data = $request->except('base64');
        if($request->has('base64')){
            $img = (new QiniuUpload())->qiniuBase64($request->only('base64'),config('admin.globals.imagePath.article'));
            if($img == false){
                return $this->respondWithErrors('上传图片错误',400);
            }
            if(isset($data['id']) && $data['id'] > 0){
                if(strpos($data['img'], env('QINIU_DOMAINS_DEFAULT')) !== false){
                    $path = explode(env('QINIU_DOMAINS_DEFAULT').'/', $data['img']);
                    (new QiniuUpload())->qiniuDelete($path[1]);
                }
            }
            $data['img'] = $img;
        }
        try {
            if(isset($data['id']) && $data['id'] > 0){
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_UPDATE );
                if( $this->repository->update( $data ,$data['id'])){
                    return $this->respondWithSuccess(1, '修改成功');
                }
                return $this->respondWithErrors('修改失败',400);
            }else{
                $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );
                if( $this->repository->create( $data )){
                    return $this->respondWithSuccess(1, '添加成功');
                }
                return $this->respondWithErrors('添加失败',400);
            }
        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag()->first() , 422);
        }
    }
    /**
     *  [getArticleList 文章列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T17:27:59+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function getArticleList($request)
    {
        return $this->respondWithSuccess($this->repository->getArticleList($request), '添加成功');
    }
    /**
     *  [getArticle api文章列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-29T11:33:18+0800
     *  @return   [type]                   [description]
     */
    public function getArticle()
    {
        return $this->respondWithSuccess($this->repository->all(), '添加成功');
    }
    /**
     *  [findById 根据Id查询]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T20:05:04+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function findById($id)
    {
       return $this->repository->find($id)->toJson();
    }
    /**
     *  [destroy 根据Id删除]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T21:16:26+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function destroy($id)
    {
        if($this->repository->delete($id)){
            return $this->respondWithSuccess(1, '删除成功');
        }
        return $this->respondWithErrors('删除失败',400);
    }
}