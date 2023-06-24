<?php

namespace App\Models;

use App\Models\Student;
use App\Models\StudentGrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function result()
    {
        return $this->belongsTo(StudentGrade::class, 'student_grade_id');
    }
}
