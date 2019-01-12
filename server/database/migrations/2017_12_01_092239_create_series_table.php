<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255)->default(null);
            $table->string('images', 1000)->default(null);
            $table->string('name');
            $table->integer('type')->default(null);
            $table->string('short_description')->default(null);
            $table->string('description')->default(null);
            $table->date('release_date')->default(null);
            $table->integer('seasons')->default(null);
            $table->integer('episodes')->default(null);
            $table->string('aired')->default(null);
            $table->string('duration')->default(null);
            $table->string('additional_information')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
