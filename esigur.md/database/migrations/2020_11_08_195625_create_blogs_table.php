<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('seo_name')->nullable();
            $table->text('title');
            $table->longText('body');
            $table->string('image');
            $table->string('slug')->unique();
            $table->integer('type_id')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
