<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tintuc_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('locale')->index();
            $table->foreign('tintuc_id')->references('id')->on('tintucs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tintuc_translations');
    }
}
