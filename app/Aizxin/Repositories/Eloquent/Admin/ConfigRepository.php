<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Config;
use Cache;
class ConfigRepository extends Repository
{
	public $fillable = ['name','code','type','value'];
	/**
	 *  [model Config]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return Config::class;
	}
	/**
	 *  [configList 网站配置信息]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-01-12T12:59:13+0800
	 *  @return   [type]                   [description]
	 */
	public function configGroupList($data)
	{
		$list['list'] = $this->model
				->select($this->fillable)
				->where(['group'=>$data['group']])
				->orderBy("sort",'asc')
				->get()
				->toArray();
		$arr = array();
		for ($i=0; $i < count($list['list']); $i++) {
			array_push($arr,$list['list'][$i]['code']);
		}
		$list['code'] = $arr;
		return $list;
	}
	/**
	 *  [editConfig 更新信息]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-01-12T18:06:17+0800
	 *  @return   [type]                   [description]
	 */
	public function editConfig($data)
	{
		$rs = false;
		foreach ($data as $key => $value) {
			$rs = $this->model->where(['code'=>$key])->update(['value'=>$value])?true:false;
		}
		return $data;
	}
	/**
	 *  [getConfig 信息]
	 *  臭虫科技
	 *  @author chouchong
	 *  @DateTime 2017-01-13T18:29:13+0800
	 *  @return   [type]                   [description]
	 */
	public function getConfig()
	{
		$list = $this->model
				->select($this->fillable)
				->orderBy("sort",'asc')
				->get()
				->toArray();
		$arr = array();
		for ($i=0; $i < count($list); $i++) {
			$arr[$list[$i]['code']] = $list[$i]['value'];
		}
		// 缓存菜单数据
        if(count($arr) > 0){
			Cache::forever(config('admin.globals.cache.config'),$arr);
        }
        return $arr;
	}
}