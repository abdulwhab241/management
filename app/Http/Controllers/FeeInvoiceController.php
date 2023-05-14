<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Http\Requests\FeeInvoiceRequest;
use App\Repository\FeeInvoicesRepositoryInterface;

class FeeInvoiceController extends Controller
{
    protected $Fees_Invoices;
    public function __construct(FeeInvoicesRepositoryInterface $Fees_Invoices)
    {
        $this->Fees_Invoices = $Fees_Invoices;
    }

    public function index()
    {
        return $this->Fees_Invoices->index();
    }


    public function create()
    {
        return $this->Fees_Invoices->create();
    }

    public function store(FeeInvoiceRequest $request)
    {
        return $this->Fees_Invoices->store($request);
    }


    public function show($id)
    {
        return $this->Fees_Invoices->show($id);
    }


    public function edit($id)
    {
        return $this->Fees_Invoices->edit($id);
    }


    public function update(FeeInvoiceRequest $request)
    {
        return $this->Fees_Invoices->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Fees_Invoices->destroy($request);
    }

    public function Filter_Fee(Request $request)
    {
        
        $Fee_invoices = FeeInvoice::all();
        $Search = Student::where('name', 'LIKE', '%'. strip_tags($request->Search ).'%')->latest()->get();

        return view('pages.Fees_Invoices.index',compact('Fee_invoices'))->withDetails($Search);
    }
}
