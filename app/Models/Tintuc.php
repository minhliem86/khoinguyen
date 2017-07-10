<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Tintuc extends Model
{
    use Translatable;

     public $translatedAttributes = ['title', 'content', 'slug'];

     protected $fillable = ['status'];

}
