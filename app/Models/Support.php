<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    public $table = 'supports';

    protected $fillable = ['support_id', 'name', 'order', 'status'];
}
