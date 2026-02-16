<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercise_muscle', function (Blueprint $table) {
            $table->id();
            $table->integer('exercise_id');
            $table->integer('muscle_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('exercise_id');
            $table->index('muscle_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise_muscle');
    }
};
