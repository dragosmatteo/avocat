<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('title');
            $table->text('body');
            $table->string('image');
            $table->text('images')->nullable();
            $table->integer('type_id');
            $table->integer('testimonial_id')->nullable();
            $table->string('date');
            $table->string('link');
            $table->string('slug')->unique();
            $table->boolean('show')->default(1);
            $table->integer('order')->default(1);
            $table->integer('views')->default(1);
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
        Schema::dropIfExists('works');
    }
}
