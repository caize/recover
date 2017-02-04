<?php

namespace Aizxin\Models;

use Illuminate\Database\Eloquent\Model;

class ResourcesGallery extends Model
{
    protected $table = 'resources_gallery';
    protected $fillable = ['rid','thumb'];
}
