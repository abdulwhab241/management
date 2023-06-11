<?php


namespace App\Repository;


interface ProcessingFeeRepositoryInterface
{
    public function index();

    // public function create();

    public function create();

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);

}