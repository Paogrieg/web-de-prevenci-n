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
         Schema::create('seguimientoCasos', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['in_process','open','close']);
            $table->text('coments');
            $table->foreignId('complaint_id')->references('id')->on('complaints');
            $table->foreignId('testimonial_id')->references('id')->on('testimonials');
            $table->foreignId('advisor_id')->references('id')->on('advisors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
