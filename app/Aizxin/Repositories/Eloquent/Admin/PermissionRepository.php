<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Permission;
use Cache;
class PermissionRepository extends Repository
{
	/**
	 *  [model description]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return Permission::class;
	}
	/**
	 *  [$fillable description]
	 *  @var [type]
	 */
	public $fillable = ['id', 'display_name','parent_id','sort','name','icon'];
	/**
	 *  [getPermissionParent 顶级权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-16T13:23:17+0800
	 *  @param    integer                  $parent [description]
	 *  @return   [type]                           [description]
	 */
	public function getPermissionParent($parent = 0)
	{
		if (Cache::has(config('admin.globals.cache.menu'))) {
		    return Cache::get(config('admin.globals.cache.menu'));
		}
		return $this->getMenu();
	}
	/**
	 *  [menu description]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T22:26:15+0800
	 *  @return   [type]                   [description]
	 */
	public function menu($field, $value)
	{
		$menus = $this->model
				->select($this->fillable)
				->where($field,$value)
				->orderBy('sort','asc')
				->get()
				->toArray();
		if($menus){
			$menuList = sort_parent($menus);
			foreach ($menuList as $key => &$v) {
				if ($v['child']) {
					$sort = array_column($v['child'], 'sort');
					array_multisort($sort,SORT_ASC,$v['child']);
				}
			}
			return $menuList;
		}
		return [];
	}
	/**
	 *  [childMenu description]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:39:56+0800
	 *  @param    [type]                   $menus [description]
	 *  @param    integer                  $pid   [description]
	 *  @return   [type]                          [description]
	 */
	public function childMenu($menus,$pid=0)
	{
		$arr = [];
		if (empty($menus)) {
			return '';
		}
		foreach ($menus as $key => $rule) {
			$menuslist = $this->findByField('parent_id',$rule['id'],'sort','asc',$this->fillable)->toArray();
			if ($rule['parent_id'] == $pid) {
				$arr[$key] = $rule;
				$arr[$key]['child'] = self::childMenu($menuslist,$rule['id']);
			}
		}
		return $arr;
	}
	/**
	 *  [getPermissionList 权限列表]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T12:57:45+0800
	 *  @return   [type]                   [description]
	 */
	public function getPermissionList($request)
	{
		$results =  $this->model
		   ->where('display_name','like','%'.$request['display_name'].'%')
		   ->where(function($query){
		        $query->where('parent_id',0);
		    })
		   ->orderBy("sort",'asc')
		   ->paginate($request['pageSize'])
		   ->toArray();
		if(count($results['data'])){
			$results['data'] = $this->childMenu($results['data']);
		}
    	return aizxin_paginate($results);
	}
	/**
	 *  [destroyPermission 删除权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T17:11:11+0800
	 *  @param    [type]                   $request [description]
	 *  @return   [type]                            [description]
	 */
	public function destroyPermission($id)
	{
		$childNum = $this->model->where('parent_id',$id)->count();
		if($childNum > 0){
			return false;
		}
		$isDelete = $this->model->destroy($id);
    	if ($isDelete) {
			return true;
    	}
    	return false;
	}
	/**
	 *  [editMenu 权限获取]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T23:29:16+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function findPermission($id)
	{
		return $this->model->find($id)->toArray();
	}
	/**
	 *  [getMenu 左侧菜单]
	 *  izxin.com
	 *  @author chouchong
	 *  @DateTime 2016-09-18T17:41:51+0800
	 *  @return   [type]                   [description]
	 */
	public function getMenu()
	{
		$data = $this->menu('is_menu',1);
        // 缓存菜单数据
		Cache::forever(config('admin.globals.cache.menu'),$data);
        return $data;
	}
	/**
	 *  [getMenuId 当前的url的id和父级id]
	 *  izxin.com
	 *  @author chouchong
	 *  @DateTime 2016-09-18T18:33:01+0800
	 *  @param    [type]                   $name [description]
	 *  @return   [type]                         [description]
	 */
	public function getMenuId($name)
	{
		$arr = [];
		$zdata = $this->findByField('name',$name)->toArray();
		$arr['zMenu'] = $zdata[0];
		if($arr['zMenu']['parent_id'] > 0){
			$fdata = $this->findByField('id',$arr['zMenu']['parent_id'])->toArray();
			$arr['fMenu'] = $fdata[0];
		}
		return $arr;
	}
	/**
	 *  [permissionList 权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T15:17:14+0800
	 *  @return   [type]                   [description]
	 */
	public function permissionList()
	{
		return sort_parent($this->all(['id','display_name','parent_id'])->toArray());
	}
}