<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('name');
            $table->string('path');
            $table->longText('content');
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
        Schema::dropIfExists('posts');
    }
};
