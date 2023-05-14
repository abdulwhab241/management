<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\PaymentStudent;
use App\Http\Requests\PaymentRequest;
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


    public function store(PaymentRequest $request)
    {
        return $this->Payment->store($request);
    }


    public function show($id)
    {
        return $this->Payment->show($id);
    }


    public function edit($id)
    {
        return $this->Payment->edit($id);
    }


    public function update(PaymentRequest $request)
    {
        return $this->Payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }

    public function Filter_Payment(Request $request)
    {
        
        $payment_students = PaymentStudent::all();
        $Search = Student::where('name', 'LIKE', '%'. strip_tags($request->Search ).'%')->latest()->get();

        return view('pages.Payments.index',compact('payment_students'))->withDetails($Search);
    }
}
