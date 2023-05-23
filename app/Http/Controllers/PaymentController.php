<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentStudent;
use Illuminate\Support\Facades\DB;
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

    public function show_notification($id)
    {
        $Payments = PaymentStudent::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->payment_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Payments.notification', compact('Payments'));
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }

}
