<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_trainer', function (Blueprint $table) {
            $table->id();
            $table->integer('trainer_id');
            $table->integer('customer_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('trainer_id');
            $table->index('customer_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_trainer');
    }
};
