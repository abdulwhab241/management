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
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            // $table->foreignId('result_id')->references('id')->on('results')->onDelete('cascade');

            // $table->string('name_month');

            // $table->integer('year');
            // $table->date('date');
            // $table->string('create_by')->nullable();
            // $table->softDeletes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};
