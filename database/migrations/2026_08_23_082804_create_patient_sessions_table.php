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
        Schema::create('patient_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->date('session_date')->useCurrent();
            $table->enum('session_type', ['فحص', 'متابعة', 'استشارة', 'عملية'])->nullable();
            $table->string('diagnosis')->nullable();
            $table->text('medical_report')->nullable();
            $table->string('treatment')->nullable();
            $table->date('next_appointment')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_sessions');
    }
};
