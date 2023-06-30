<?php

namespace App\Http\Controllers;


use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Exports\FeeInvoicesExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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


    // public function show($id)
    // {
    //     return $this->Fees_Invoices->show($id);
    // }

    public function show_fee_invoice($id)
    {
        $FeeInvoices = FeeInvoice::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->fee_invoice_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Fees_Invoices.notification', compact('FeeInvoices'));
    }

    public function export() 
    {
        return Excel::download(new FeeInvoicesExport, 'الفواتير الدراسية.xlsx');
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

}
