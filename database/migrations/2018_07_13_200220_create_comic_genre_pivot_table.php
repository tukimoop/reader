<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateComicGenrePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_genre', function (Blueprint $table) {
            $table->integer('comic_id')->unsigned()->index();
            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
            $table->integer('genre_id')->unsigned()->index();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->primary(['comic_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comic_genre');
    }
}
