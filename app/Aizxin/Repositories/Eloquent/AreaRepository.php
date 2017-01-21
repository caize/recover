<?php
namespace Aizxin\Repositories\Eloquent;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Area;
use Cache;
class AreaRepository extends Repository
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
		return Area::class;
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
		if (Cache::has(config('admin.globals.cache.area'))) {
		    return Cache::get(config('admin.globals.cache.area'));
		}
		return $this->getArea();
	}
	/**
	 *  [getCateList 菜单数据]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-23T00:17:18+0800
	 *  @return   [type]                   [description]
	 */
	public function getArea()
	{
		$data = $this->model
				->select(['id as code','parent_id','name'])
				->get()
				->toArray();
        // 缓存地区数据
        $areas = area_sort_parent($data);
        if(count($data) > 0){
			Cache::forever(config('admin.globals.cache.area'),$areas);
        }
        return $areas;
	}
}