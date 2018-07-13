<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateComicPublisherPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_publisher', function (Blueprint $table) {
            $table->integer('comic_id')->unsigned()->index();
            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
            $table->integer('publisher_id')->unsigned()->index();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->primary(['comic_id', 'publisher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comic_publisher');
    }
}
