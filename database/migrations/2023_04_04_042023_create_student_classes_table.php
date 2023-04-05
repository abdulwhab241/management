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
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            // Days  اليوم   جدول الحصص
            $table->bigInteger('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            // Grades  المرحلة
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            // Classrooms الصف
            $table->bigInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            // Sections الشعبة
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            // SchoolClass الحصة
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('school_classes')->onDelete('cascade');
            // Subject المادة
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            // Teachers الاستاذ
            $table->bigInteger('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');


            $table->string('create_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_classes');
    }
};
