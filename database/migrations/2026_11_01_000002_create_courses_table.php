<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            // Foreign key: every course must have an instructor.
            $table->foreignId('instructor_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('level')->default('Beginner'); // Beginner / Intermediate / Advanced
            $table->unsignedTinyInteger('duration_weeks')->default(4);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
