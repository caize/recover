<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Article;
use Cache;
class ArticleRepository extends Repository
{
	/**
	 *  [$fillable description]
	 *  @var [type]
	 */
	public $fillable = ['id', 'title','category_id'];
	/**
	 *  [model ArticleRepository]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return Article::class;
	}
	/**
	 *  [getArticleList 文章列表]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-26T17:26:21+0800
	 *  @param    [type]                   $request [description]
	 *  @return   [type]                            [description]
	 */
	public function getArticleList($request)
	{
		$results =  $this->model
			->select($this->fillable)
			->with(['category'=>function($query){
				$query->select('id','name');
			}])->where('title','like','%'.trim($request['title']).'%')
		   	->orderBy("id",'desc')
		   	->paginate($request['pageSize'])
		   	->toArray();
    	return aizxin_paginate($results);
	}
	/**
	 *  [findById 根据Id查询]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-26T20:02:18+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function findById($id)
	{
		return $this->find($id)->toJson();
	}
}