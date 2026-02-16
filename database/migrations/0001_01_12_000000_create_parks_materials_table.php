<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('park_material', function (Blueprint $table) {
            $table->id();
            $table->integer('park_id');
            $table->integer('material_id');
            $table->string('state');
            $table->timestamps();
            $table->softDeletes();

            $table->index('park_id');
            $table->index('material_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('park_material');
    }
};
