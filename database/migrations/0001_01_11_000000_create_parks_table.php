<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->foreignId('locality_id')->constrained()->restrictOnDelete();
            $table->string('environment');
            $table->string('floor_type');
            $table->boolean('artificial_illumination');
            $table->boolean('shadow');
            $table->boolean('water_source');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parks');
    }
};
