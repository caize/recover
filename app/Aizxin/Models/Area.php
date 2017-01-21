<?php

namespace Aizxin\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $parent = 'parent_id';
    protected $fillable = ['name','parent_id'];

    public function parent()
    {
    	return $this->hasMany('Aizxin\Models\Area', 'parent_id', 'id');
    }
}
