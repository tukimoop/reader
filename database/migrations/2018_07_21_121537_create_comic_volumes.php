<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicVolumes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_volumes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('folder_hash')->unique();
            $table->string('name');
            $table->string('name_native')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->unsignedInteger('order')->default(1);
            $table->unsignedInteger('comic_id');
            $table->unsignedInteger('language_id');

            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('comic_id')->references('id')->on('comics');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_volumes');
    }
}
