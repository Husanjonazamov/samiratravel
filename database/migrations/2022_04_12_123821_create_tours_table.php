<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->string('location')->nullable();
            $table->string('time')->nullable();
            $table->string('slug')->nullable();
            $table->double('price',38,2)->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('slider')->default(0);
            $table->boolean('best')->default(0);
            $table->boolean('famous')->default(0);
            $table->enum('type',['tour','hotel','transfer'])->default('tour');
            $table->bigInteger('position')->default(0);
            $table->string('special')->default('normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.composer dumpautoload -o
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
