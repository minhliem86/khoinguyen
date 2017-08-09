<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Product extends Model
{
    use CascadesDeletes;
    protected $cascadeDeletes  = ['photos'];

    public $table = "products";

    protected $fillable = ['title','avatar_img','description', 'order', 'status', 'category_id', 'price', 'slug', 'meta_keywords', 'meta_description', 'meta_images'];

    public function categories(){
      return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function photos()
    {
      return $this->morphMany('App\Models\Photo','photoable');
    }
}
