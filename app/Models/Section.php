<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Result;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Attendance;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_section',
        'grade_id',
        'class_id',
    ];

    public function My_classes()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

      // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }

    public function Grades()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function StudentGrades()
    {
        return $this->hasMany(StudentGrade::class, 'section_id');
    }

    public function Results()
    {
        return $this->hasMany(Result::class, 'section_id');
    }

    public function Students()
    {
        return $this->hasMany(Student::class, 'section_id');
    }

    public function StudentAttendances()
    {
        return $this->hasMany(Attendance::class, 'section_id');
    }

    public function Enrollments()
    {
        return $this->hasMany(Enrollment::class,'section_id');
    }
}
