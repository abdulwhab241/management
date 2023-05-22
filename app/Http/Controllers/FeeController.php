<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Http\Requests\FeeRequest;
use Illuminate\Support\Facades\DB;
use App\Repository\FeesRepositoryInterface;

class FeeController extends Controller
{
    protected $Fees;

    public function __construct(FeesRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
    }

    public function index()
    {
        return $this->Fees->index();
    }

    public function create()
    {
        return $this->Fees->create();
    }


    public function store(FeeRequest $request)
    {
        return $this->Fees->store($request);
    }

    public function edit($id)
    {
        return $this->Fees->edit($id);
    }


    public function update(FeeRequest $request)
    {
        return $this->Fees->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Fees->destroy($request);
    }

    public function show($id)
    {
        $Fees = Fee::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->fee_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Fees.notification', compact('Fees'));
    }
}
