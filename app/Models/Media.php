<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $table = 'medias';

    protected $fillable = ['caption', 'img_url', 'order', 'status'];

}
