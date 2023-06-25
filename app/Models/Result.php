<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Month;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
    
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'exam_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }
}
