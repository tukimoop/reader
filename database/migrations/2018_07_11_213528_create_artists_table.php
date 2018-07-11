<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_native');
            $table->string('last_name_native');
            $table->text('short_bio');
            $table->string('website');
            $table->date('birthday');
            $table->date('active_from');
            $table->date('active_to');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('language_id');

            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('artists');
    }
}
