<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Repository\SubjectRepositoryInterface;

class SubjectController extends Controller
{
    protected $Subject;

    public function __construct(SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();
    }

    public function store(SubjectRequest $request)
    {
        return $this->Subject->store($request);
    }

    public function edit($id)
    {
        return $this->Subject->edit($id);
    }

    public function update(SubjectRequest $request)
    {
        return $this->Subject->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
}
