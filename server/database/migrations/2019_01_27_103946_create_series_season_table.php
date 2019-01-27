<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_season', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id');
            $table->integer('type');
            $table->integer('name');
            $table->string('short_description');
            $table->text('description');
            $table->date('release_date');
            $table->string('aired')->nullable();
            $table->string('duration');
            $table->string('status');
            $table->text('rating');
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
        Schema::dropIfExists('series_season');
    }
}
