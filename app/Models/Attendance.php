<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];


    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

}
