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
}
