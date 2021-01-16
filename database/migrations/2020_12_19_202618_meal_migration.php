<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MealMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->string('title');
            $table->string('genre');
            $table->json('ingredients');
            $table->integer('prepTime');
            $table->integer('cookTime');
            $table->datetime('lastMade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
