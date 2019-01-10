<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255)->default(null);
            $table->string('images', 1000)->default(null);
            $table->string('name')->default(null);
            $table->string('description', 500)->default(null);
            $table->date('release_date')->default(null);
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
        Schema::dropIfExists('seris');
    }
}
