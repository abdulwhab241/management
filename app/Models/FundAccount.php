<?php

namespace App\Models;

use App\Models\Student;
use App\Models\PaymentStudent;
use App\Models\ReceiptStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FundAccount extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function receipt()
    {
        return $this->belongsTo(ReceiptStudent::class, 'receipt_id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentStudent::class, 'payment_id');
    }
}
