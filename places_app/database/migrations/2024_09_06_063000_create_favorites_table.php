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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->co;
            $table->unsignedBigInteger('place_id');
            $table->index('user_id', 'favorites_user_idx');
            $table->index('place_id', 'favorites_place_idx');

            $table->foreign('user_id', 'favorites_user_fk')->on('users')->references('id');
            $table->foreign('place_id', 'favorites_place_fk')->on('places')->references('id');
            
            $table->unique(['user_id', 'place_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
