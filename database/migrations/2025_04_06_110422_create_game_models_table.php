<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_models', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->tinyInteger('rwhite')->nullable();;
            $table->tinyInteger('rblack')->nullable();;
            $table->tinyInteger('white')->nullable();;
            $table->tinyInteger('black')->nullable();;
            $table->tinyInteger('book')->nullable();;
            $table->tinyInteger('play')->nullable();;
            $table->tinyInteger('randomgame')->nullable();;
            $table->tinyInteger('todo')->nullable();;
            $table->tinyInteger('donetodo')->nullable();;
            $table->tinyInteger('variationid')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_models');
    }
};
