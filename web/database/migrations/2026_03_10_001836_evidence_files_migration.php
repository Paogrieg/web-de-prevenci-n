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
        Schema::create('evidenceFiles', function (Blueprint $table) {
            $table->id();
            $table->string('rute');
            $table->text('description');
            $table->foreignId('evidences_id')->references('id')->on('evidences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidenceFiles');
    }
};
