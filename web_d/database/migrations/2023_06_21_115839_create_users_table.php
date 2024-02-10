<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 255)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->timestamps();
        });
    
        Schema::create('user_queries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('q_title', 255);
            $table->string('q_description', 500);
            $table->unsignedInteger('nickname_id');
            $table->string('nickname', 255)->nullable(false);
            $table->timestamps();
    
            $table->foreign('nickname_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_queries');
        Schema::dropIfExists('users');
    }
};
