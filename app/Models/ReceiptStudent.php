<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
