<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'notes'
    ];

    public function Sections()
    {
        return $this->hasMany(Section::class, 'grade_id');
    }
}
