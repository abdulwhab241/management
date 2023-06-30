<?php


namespace App\Repository;


interface FeeInvoicesRepositoryInterface
{
    public function index();
    // public function show($id);
    public function edit($id);
    public function create();
    
    public function store($request);
    public function update($request);
    public function destroy($request);
}