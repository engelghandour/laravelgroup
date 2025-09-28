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
        Schema::connection('php_fich')->create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('grade');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('students_count')->default(0);
            $table->timestamps();

            // Add index for better performance
            $table->index('grade');
            $table->index('teacher_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('php_fich')->dropIfExists('classes');
    }
};
