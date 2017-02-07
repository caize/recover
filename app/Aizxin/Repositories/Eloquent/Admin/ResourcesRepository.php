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
		$data['thumb']=$imgs['imgs'][0];
		$data['created_at'] = date('Y-m-d H:i:s',time());
		$data['updated_at'] = date('Y-m-d H:i:s',time());
	    $result1 = $this->model->insertGetId($data);
	    $resource = $this->model->find($result1);
	    $gallery = array();
	    for ($i=0; $i < count($imgs['imgs']); $i++) {
	    	$gallery[] = new \Aizxin\Models\ResourcesGallery(['thumb' => $imgs['imgs'][$i]]);
	    }
	    $resource->gallery()->saveMany($gallery);
	    return $result1;
	}
	/**
	 *  [getResourcesList 资源列表]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-02-06T15:12:01+0800
	 *  @param    [type]                   $request [description]
	 *  @return   [type]                            [description]
	 */
	public function getResourcesList($request)
	{
		$results =  $this->model
			->select(['id','name','status','start_time','end_time','rc1_id','rc2_id','rc3_id',"type","service","identity","mid"])
			->with(['rc1'=>function($query){
				$query->select('id','name');}])
			->with(['rc2'=>function($query){
				$query->select('id','name');}])
			->with(['rc3'=>function($query){
				$query->select('id','name');}])
			->where('name','like','%'.trim($request['name']).'%')
		   	->orderBy("id",'desc')
		   	->paginate($request['pageSize'])
		   	->toArray();
    	return aizxin_paginate($results);
	}
	/**
	 *  [findDetail 资源详情]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-02-06T17:28:39+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function getResourcesDetail($id)
	{
		$resources = $this->model
					->with(['rc1'=>function($query){
						$query->select('id','name');}])
					->with(['rc2'=>function($query){
						$query->select('id','name');}])
					->with(['rc3'=>function($query){
						$query->select('id','name');}])
					->with(['province'=>function($query){
						$query->select('id','name');}])
					->with(['city'=>function($query){
						$query->select('id','name');}])
					->with(['district'=>function($query){
						$query->select('id','name');}])
					->find($id);
		$resources['gallery'] = $resources->gallery()->get(['id','thumb']);
		return $resources;
	}
}