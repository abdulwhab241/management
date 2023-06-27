<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\MidResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function mid()
    {
        return $this->belongsTo(MidResult::class, 'mid_id');
    }
}
