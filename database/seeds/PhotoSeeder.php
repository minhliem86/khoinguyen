<?php

use Illuminate\Database\Seeder;
use App\Models\Photo;
class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Photo::class, 10)->create();
    }
}
