<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\ResourcesCategory;
use Cache;
class ResourcesCategoryRepository extends Repository
{
	public $fillable = ['id','name','parent_id','thumb','is_show','type'];
	/**
	 *  [model Config]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return ResourcesCategory::class;
	}
	/**
	 *  [getCateList 菜单数据]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-23T00:17:18+0800
	 *  @return   [type]                   [description]
	 */
	public function getCateList()
	{
		if (Cache::has(config('admin.globals.cache.resources.category'))) {
		    return Cache::get(config('admin.globals.cache.resources.category'));
		}
		return $this->getCate();
	}
	public function cate()
	{
		$cates = $this->model
				->select($this->fillable)
				->orderBy('id','asc')
				->get()
				->toArray();
		if($cates){
			$cateList = sort_parent($cates);
			foreach ($cateList as $key => &$v) {
				if ($v['child']) {
					$sort = array_column($v['child'], 'id');
					array_multisort($sort,SORT_ASC,$v['child']);
				}
			}
			return $cateList;
		}
		return [];
	}
	/**
	 *  [getCate 缓存菜单数据]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-23T00:15:40+0800
	 *  @return   [type]                   [description]
	 */
	public function getCate()
	{
		$data = $this->cate();
        // 缓存菜单数据
        if(count($data) > 0){
			Cache::forever(config('admin.globals.cache.resources.category'),$data);
        }
        return $data;
	}
	/**
	 *  [destroyCate 分类删除]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-23T14:51:17+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function destroyCate($id)
	{
		$childNum = $this->model->where('parent_id',$id)->count();
		if($childNum > 0){
			return false;
		}
		$isDelete = $this->model->destroy($id);
    	if ($isDelete) {
    		$this->getCate();
			return true;
    	}
    	return false;
	}
}