<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicChapterImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_chapter_images', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('comic_id');
            $table->unsignedInteger('comic_chapter_id');
            $table->string('image_url');

            $table->timestamps();

            // Foreign Keys
            $table->foreign('comic_id')->references('id')->on('comics');
            $table->foreign('comic_chapter_id')->references('id')->on('comic_chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_chapter_images');
    }
}
