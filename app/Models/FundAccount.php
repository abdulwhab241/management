<?php

namespace App\Models;

use App\Models\Student;
// use App\Models\FeeInvoice;
// use App\Models\ProcessingFee;
// use App\Models\PaymentStudent;
// use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
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

    // public function receipt()
    // {
    //     return $this->belongsTo(ReceiptStudent::class, 'receipt_id');
    // }

    // public function payment()
    // {
    //     return $this->belongsTo(PaymentStudent::class, 'payment_id');
    // }

    // public function processing()
    // {
    //     return $this->belongsTo(ProcessingFee::class, 'processing_id');
    // }

    // public function fee_invoice()
    // {
    //     return $this->belongsTo(FeeInvoice::class, 'fee_invoice_id');
    // }

    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }
}
