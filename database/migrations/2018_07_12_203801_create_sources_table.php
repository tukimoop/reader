<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('name_native')->nullable();
            $table->text('short_bio')->nullable();
            $table->string('website')->nullable();
            $table->date('active_from')->nullable();
            $table->date('active_to')->nullable();
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
        Schema::dropIfExists('sources');
    }
}
