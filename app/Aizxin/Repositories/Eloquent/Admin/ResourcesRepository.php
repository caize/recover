<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Resource;
use Cache;
use DB;
class ResourcesRepository extends Repository
{
	/**
	 *  [model Config]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return Resource::class;
	}
	/**
	 *  [create 资源添加]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-02-04T16:38:10+0800
	 *  @param    [type]                   $data [description]
	 *  @return   [type]                         [description]
	 */
	public function add($data,$imgs)
	{
		DB::beginTransaction();
		try{
			$data['thumb']=$imgs['imgs'][0];
		    $result1 = $this->model->insertGetId($data);
		    if (!$result1) {
		        /**
		         * Exception类接收的参数
		         * $message = "", $code = 0, Exception $previous = null
		         */
		        throw new \Exception('1');
		    }
		    // $result2 = Test::create(['name'=>$name]);
		    // if (!$result2) {
		    //     throw new \Exception("2");
		    // }
		    DB::commit();
		    return $result1;
		} catch (\Exception $e){
		    DB::rollback();//事务回滚
		    // echo $e->getMessage();
		    // echo $e->getCode();
		    return $e->getCode();
		}
		// $data['thumb']=$imgs['imgs'][0];
		// $result1 = $this->model->insertGetId($data);
		// return $result1;
	}
}