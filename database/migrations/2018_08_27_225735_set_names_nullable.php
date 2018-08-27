<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNamesNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comic_chapters', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
        });

        Schema::table('comic_volumes', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comic_chapters', function (Blueprint $table) {
            $table->string('name')->change();
        });

        Schema::table('comic_volumes', function (Blueprint $table) {
            $table->string('name')->change();
        });
    }
}
