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
        Schema::create('moves_models', function (Blueprint $table) {
            $table->id();
            
            // Define the foreign key column 'game_id'
            $table->unsignedBigInteger('game_id');  // Add the unsignedBigInteger column for the foreign key
            
            // Define the foreign key relationship
            // $table->foreign('game_id')             // Reference the 'game_id' column
            //       ->references('id')              // Reference the 'id' column in the 'games' table
            //       ->on('games')                   // Define the table to reference ('games')
            //       ->onDelete('cascade');          // Define the action when the related record is deleted (optional)

            // Other fields in your moves_models table
            $table->text('classorid')->nullable();
            $table->text('movesource')->nullable();
            $table->text('variantion')->nullable();
            $table->text('fened')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the foreign key constraint first
        Schema::table('moves_models', function (Blueprint $table) {
            $table->dropForeign(['game_id']);  // Drop the foreign key
        });

        Schema::dropIfExists('moves_models');
    }
};
