<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->date('name_changed_at')->nullable();

            // Personal Information
            $table->unsignedInteger('country_id')->nullable();
            $table->string('personal_website')->nullable();
            $table->string('name_skype')->nullable();
            $table->string('name_discord')->nullable();
            $table->string('name_twitter')->nullable();
            $table->string('name_instagram')->nullable();
            $table->string('name_myanimelist')->nullable();
            $table->string('name_kitsu')->nullable();

            $table->boolean('show_email')->default(0);
            $table->boolean('show_adult_content')->default(0);
            $table->boolean('show_globally')->default(1);

            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
}
