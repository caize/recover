<?php
namespace Aizxin\Repositories\Eloquent;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Unit;
use Cache;
class UnitRepository extends Repository
{
	/**
	 *  [model ArticleRepository]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return Unit::class;
	}
	/**
	 *  [getList description]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-01-20T17:19:56+0800
	 *  @return   [type]                   [description]
	 */
	public function getList()
	{
		if (Cache::has(config('admin.globals.cache.unit'))) {
		    return Cache::get(config('admin.globals.cache.unit'));
		}
		return $this->getUnit();
	}
	/**
	 *  [getCateList 菜单数据]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-23T00:17:18+0800
	 *  @return   [type]                   [description]
	 */
	public function getUnit()
	{
		$units = $this->model
				->select(['id','name'])
				->orderBy("id",'asc')
				->get()
				->toArray();
        // 缓存计量单位数据
        if(count($units) > 0){
			Cache::forever(config('admin.globals.cache.unit'),$units);
        }
        return $units;
	}
}