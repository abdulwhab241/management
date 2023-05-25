<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherClass extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

}
