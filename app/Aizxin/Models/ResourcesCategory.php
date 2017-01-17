<?php

namespace Aizxin\Models;

use Illuminate\Database\Eloquent\Model;

class ResourcesCategory extends Model
{
    protected $table = 'resources_categories';
    protected $fillable = ['name','parent_id','thumb','is_show','type'];
}
