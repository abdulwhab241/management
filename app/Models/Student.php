<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Attendance;
use App\Models\StudentResult;
use App\Models\StudentAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guarded=[];

    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }


  // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

//   // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
//     public function images()
//     {
//         return $this->morphMany(Image::class, 'imageable');
//     }


    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }

    public function student_result()
    {
        return $this->hasMany(StudentResult::class, 'student_id');
    }

    // علاقة بين جدول الطلاب وجدول الحضور والغياب
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }


}
