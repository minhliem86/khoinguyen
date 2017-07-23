<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 3)->create()->each(function($cate){
          $cate->products()->saveMany(factory(App\Models\Product::class,3)->create(
            [
              'category_id' => $cate->id
            ]
          )->each(function($product){
            $product->photos()->saveMany(factory(App\Models\Photo::class,3)->create());
          }));
        });
    }
}
