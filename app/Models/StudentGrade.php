<?php

namespace App\Models;

use App\Models\Month;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentGrade extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded=[];

    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class, 'teacher_id');
    // }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }
}
