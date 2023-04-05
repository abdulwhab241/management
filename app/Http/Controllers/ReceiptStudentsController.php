<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use Illuminate\Http\Request;
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


    public function show($id)
    {
        return $this->Receipt->show($id);
    }


    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }


    public function update(ReceiptRequest $request)
    {
        return $this->Receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }
}
