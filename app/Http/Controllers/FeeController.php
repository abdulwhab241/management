<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeeRequest;
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
}
