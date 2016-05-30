<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $fillable = ['image_id', 'views'];
}
