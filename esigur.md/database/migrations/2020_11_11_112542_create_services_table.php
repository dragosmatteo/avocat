<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('name_seo')->nullable();
            $table->text('link_title')->nullable();
            $table->text('title');
            $table->text('body');
            $table->text('advantage_title')->nullable();
            $table->text('price_title')->nullable();
            $table->text('faq_title')->nullable();
            $table->text('work_title')->nullable();
            $table->text('step_title')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('image');
            $table->string('slug')->unique();
            $table->boolean('on_main')->default(0);
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
        Schema::dropIfExists('services');
    }
}
