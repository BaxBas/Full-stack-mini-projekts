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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nosaukums');
            $table->integer('ieguts')->nullable();
            $table->decimal('svars',4,3)->default(0.0);
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade'); // constrained - garantē, ka tiks savienots ar eksistējošu "subjects" ierakstu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
