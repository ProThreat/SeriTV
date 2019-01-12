<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->default(null);
            $table->string('images')->default(null);
            $table->string('name');
            $table->integer('type')->default(null);
            $table->string('short_description')->default(null);
            $table->string('description')->default(null);
            $table->date('release_date')->default(null);
            $table->string('duration')->default(null);
            $table->string('duration')->default(null);
            $table->string('additional_information')->default(null);
            $table->decimal('imdb_rating', 8,1)->default(null);
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
        Schema::dropIfExists('movies');
    }
}
