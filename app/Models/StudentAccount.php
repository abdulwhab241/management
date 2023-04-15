<?php

namespace App\Models;

use App\Models\Student;
use App\Models\FeeInvoice;
use App\Models\ProcessingFee;
use App\Models\PaymentStudent;
use App\Models\ReceiptStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function feeInvoice()
    {
        return $this->hasMany(FeeInvoice::class, 'fee_invoice_id');
    }

    public function receipt()
    {
        return $this->belongsTo(ReceiptStudent::class, 'receipt_id');
    }

    public function processing()
    {
        return $this->belongsTo(ProcessingFee::class, 'processing_id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentStudent::class, 'payment_id');
    }
}
