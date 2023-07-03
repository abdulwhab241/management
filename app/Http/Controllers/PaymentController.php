<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\PaymentStudent;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PaymentRequest;
use App\Exports\PaymentStudentsExport;
use App\Repository\PaymentRepositoryInterface;

class PaymentController extends Controller
{
    protected $Payment;

    public function __construct(PaymentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment;
    }

    public function index()
    {
        return $this->Payment->index();
    }

    public function create()
    {
        $Enrollments = FeeInvoice::distinct()->where('year', date("Y"))->get(['student_id']);
        return view('pages.Payments.add',compact('Enrollments'));
    }


    public function store(PaymentRequest $request)
    {
        return $this->Payment->store($request);
    }


    public function edit($id)
    {
        return $this->Payment->edit($id);
    }


    public function update(PaymentRequest $request)
    {
        return $this->Payment->update($request);
    }

    public function show_payment($id)
    {
        $Payments = PaymentStudent::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->payment_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Payments.notification', compact('Payments'));
    }

    public function export() 
    {
        return Excel::download(new PaymentStudentsExport, 'سندات الصرف.xlsx');
    }
    
    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }

}
