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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('image')->nullable();
            // $table->json('image')->nullable();
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->date('birth_date');
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->bigInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->longText('qualification')->nullable();
            $table->string('academic_year');

             //Father information
             $table->string('father_name'); // اسم الاب
             $table->string('employer')->nullable(); // جهة العمل
             $table->string('father_job'); // الوظيفة
            $table->string('father_phone');
             $table->string('password'); // هاتف الاب
             $table->string('job_phone')->nullable(); // هاتف العمل
             $table->string('home_phone')->nullable(); // هاتف المنزل
             $table->longText('address'); // العنوان

             //Mother information
            $table->string('mother_name');
            $table->string('mother_phone')->nullable();
            $table->string('mother_job');
            $table->integer('year');
            
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
        Schema::dropIfExists('students');
    }
};
