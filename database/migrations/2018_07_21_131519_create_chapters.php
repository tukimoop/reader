<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('folder_hash')->unique();
            $table->string('name')->nullable();
            $table->string('name_native')->nullable();
            $table->unsignedInteger('number')->comment('The number of this chapter. Used for ordering.');
            $table->date('release_date');
            $table->string('thumbnail_url')->nullable();
            $table->unsignedInteger('comic_id');
            $table->unsignedInteger('volume_id');
            $table->boolean('quiet_release')->default(0)->comment('Determines if this release should be hidden from latest.');
            $table->boolean('is_visible')->default(0)->comment('Determines if this release should be visible on the site.');


            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('cascade');
            $table->foreign('volume_id')->references('id')->on('volumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
