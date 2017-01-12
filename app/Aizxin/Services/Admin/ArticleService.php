<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ArticleRepository;
use Aizxin\Repositories\Eloquent\Admin\CategoryRepository;
use Aizxin\Validators\ArticleValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;
use zgldh\QiniuStorage\QiniuStorage;

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
     *  [uploadImage 上传图片到七牛]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-23T17:52:15+0800
     *  @param    [type]                   $file [description]
     *  @return   [type]                         [description]
     */
    private function uploadImage($file)
    {
        $disk = QiniuStorage::disk('qiniu');
        $fileName = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
        $bool = $disk->put(config('admin.globals.imagePath').$fileName,file_get_contents($file->getRealPath()));
        if ($bool) {
            $path = $disk->downloadUrl(config('admin.globals.imagePath').$fileName);
            return $path;
        }
        return '';
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
            $path = $this->uploadImage($request->file('editormd-image-file'));
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
     *  [qiniuBase64 七牛base64上传]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-26T15:16:34+0800
     *  @param    [type]                   $base64 [description]
     *  @return   [type]                           [description]
     */
    public function qiniuBase64($base64)
    {
        // 构建鉴权对象
        $auth = new Auth(env('QINIU_AXXESS_KEY'), env('QINIU_SECRET_KEY'));
        // 生成上传 Token
        $token = $auth->uploadToken(env('QINIU_BUCKET'));
        // // 上传到七牛后保存的文件名
        $key = md5(time()).'.png';
        // // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 上传文件到七牛
        list($ret, $err) = $uploadMgr->putFile($token, $key, $base64['base64']);
        if ($err !== null) {
            return false;
        } else {
            return "http://".env('QINIU_DOMAINS_DEFAULT')."/".$ret['key'];
        }
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
            $img = $this->qiniuBase64($request->only('base64'));
            if($img == false){
                return $this->respondWithErrors('上传图片错误',400);
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