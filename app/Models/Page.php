<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = "pages";

    protected $fillable = ['title', 'slug', 'page_name', 'content', 'status'];
}
