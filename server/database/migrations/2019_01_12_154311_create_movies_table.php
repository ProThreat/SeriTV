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
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->string('title');
            $table->integer('type')->default(1);
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('additional_information')->nullable();
            $table->decimal('imdb_rating', 8,1)->nullable();
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
