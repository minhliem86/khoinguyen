<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = 'projects';

    protected $fillable = ['video_id', 'title', 'description', 'status', 'order','img_url'];
}
