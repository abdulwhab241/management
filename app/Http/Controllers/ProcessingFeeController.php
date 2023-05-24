<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcessingFee;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProcessingRequest;
use App\Repository\ProcessingFeeRepositoryInterface;

class ProcessingFeeController extends Controller
{
    protected $Processing;

    public function __construct(ProcessingFeeRepositoryInterface $Processing)
    {
        $this->Processing = $Processing;
    }

    public function index()
    {
        return $this->Processing->index();
    }


    public function store(ProcessingRequest $request)
    {
        return $this->Processing->store($request);
    }


    public function show($id)
    {
        return $this->Processing->show($id);
    }


    public function edit($id)
    {
        return $this->Processing->edit($id);
    }


    public function update(ProcessingRequest $request)
    {
        return $this->Processing->update($request);
    }

    public function show_processing($id)
    {
        $ProcessingFees = ProcessingFee::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->processing_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.ProcessingFee.notification', compact('ProcessingFees'));
    }


    public function destroy(Request $request)
    {
        return $this->Processing->destroy($request);
    }
}
