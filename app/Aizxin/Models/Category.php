<?php

namespace Aizxin\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $parent = 'parent_id';
    protected $fillable = ['name','parent_id','sort','status','engineName'];
}
