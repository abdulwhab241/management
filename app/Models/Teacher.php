<?php

namespace App\Models;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guarded=[];


    public function specializations()
    {
        return $this->belongsTo(Specialization::class,'specialization_id');
    }
    
    public function genders()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }

    // public function images()
    // {
    //     return $this->morphMany(Image::class, 'imageable');
    // }

    // علاقة المعلمين مع الاقسام
    public function SectionsWith()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
}
