<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->increments('id');

            $table->string('folder_hash')->unique();
            $table->string('name');
            $table->string('name_native')->nullable();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedInteger('comic_status_id')->default(1);
            $table->string('thumbnail_url')->nullable();
            $table->string('cover_url')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->boolean('is_mature')->default(0);
            $table->boolean('is_visible')->default(0);

            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('comic_status_id')->references('id')->on('comic_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
