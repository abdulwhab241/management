<?php

namespace App\Models;

use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }
}
