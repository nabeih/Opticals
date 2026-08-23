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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 25);
            $table->integer('age')->unsigned()->nullable();
            $table->string('phone', 10)->unique();
            $table->string('address', 25)->nullable();
            $table->date('preferred_date')->nullable();
            $table->enum('complaint_type', ['فحص شامل', 'تركيب نظارات او عدسات', 'استشارة', 'عملية', 'اخرى'])->nullable();
            $table->text('complaint_description')->nullable();
            $table->text('notes')->nullable();
            $table->string('pathfile', 255)->nullable();
            $table->enum('status', ['جديد', 'تم التواصل', 'قيد المتابعة', 'انتهى'])->default('جديد');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
