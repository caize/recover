<?php

namespace Aizxin\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    protected $fillable = ["type","service","identity","mid","rc1_id","rc2_id","rc3_id","name","company_name",
                            "contact_name","contact_phone","province","city","district","address","number","unit","price1","price2","thumb","original_use","content","start_time","end_time"];
    /**
     *  [gallery 资源图片关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-04T17:30:40+0800
     *  @return   [type]                   [description]
     */
    public function gallery()
    {
    	return $this->hasMany('Aizxin\Models\ResourcesGallery', 'rid', 'id');
    }
    /**
     *  [rc1 分类1关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:05:24+0800
     *  @return   [type]                   [description]
     */
    public function rc1()
    {
        return $this->belongsTo('Aizxin\Models\ResourcesCategory', 'rc1_id', 'id');
    }
    /**
     *  [rc2 分类2关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:05:56+0800
     *  @return   [type]                   [description]
     */
    public function rc2()
    {
        return $this->belongsTo('Aizxin\Models\ResourcesCategory', 'rc2_id', 'id');
    }
    /**
     *  [rc3 分类3关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:06:05+0800
     *  @return   [type]                   [description]
     */
    public function rc3()
    {
        return $this->belongsTo('Aizxin\Models\ResourcesCategory', 'rc3_id', 'id');
    }
    /**
     *  [province 省关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:06:14+0800
     *  @return   [type]                   [description]
     */
    public function province()
    {
       return $this->belongsTo('Aizxin\Models\Area', 'province', 'id');
    }
    /**
     *  [city 城市关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:06:33+0800
     *  @return   [type]                   [description]
     */
    public function city()
    {
        return $this->belongsTo('Aizxin\Models\Area', 'city', 'id');
    }
    /**
     *  [district 区域关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:06:48+0800
     *  @return   [type]                   [description]
     */
    public function district()
    {
        return $this->belongsTo('Aizxin\Models\Area', 'district', 'id');
    }
    /**
     *  [member 会员关联]
     *  臭虫科技
     *  @author chouchong
     *  @DateTime 2017-02-06T15:07:04+0800
     *  @return   [type]                   [description]
     */
    public function member()
    {
        return $this->hasMany('Aizxin\Models\member', 'id', 'mid');
    }
}
