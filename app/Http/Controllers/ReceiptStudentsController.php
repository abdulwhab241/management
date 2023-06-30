<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceiptStudent;
use App\Exports\ReceiptsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ReceiptRequest;
use App\Repository\ReceiptStudentsRepositoryInterface;

class ReceiptStudentsController extends Controller
{
    protected $Receipt;

    public function __construct(ReceiptStudentsRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }
    public function index()
    {
        return $this->Receipt->index();
    }

    public function create()
    {
        return $this->Receipt->create();
    }

    public function store(ReceiptRequest $request)
    {
        return $this->Receipt->store($request);
    }


    // public function show($id)
    // {
    //     return $this->Receipt->show($id);
    // }


    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }


    public function update(ReceiptRequest $request)
    {
        return $this->Receipt->update($request);
    }

    public function show_receipt($id)
    {
        $Receipts = ReceiptStudent::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->receipt_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Receipts.notification', compact('Receipts'));
    }


    public function export() 
    {
        return Excel::download(new ReceiptsExport, 'سندات القبض.xlsx');
    }

    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }
}
