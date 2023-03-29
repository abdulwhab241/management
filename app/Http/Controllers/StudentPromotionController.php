<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\StudentPromotionRepositoryInterface;

class StudentPromotionController extends Controller
{
    protected $Promotion;

    public function __construct(StudentPromotionRepositoryInterface $Promotion)
    {
        $this->Promotion = $Promotion;
    }

    public function index()
    {
        return $this->Promotion->index();
    }

    public function create()
    {
        return $this->Promotion->create();
    }

    public function store(Request $request)
    {
        return $this->Promotion->store($request);
    }

    public function destroy(Request $request)
    {
        return $this->Promotion->destroy($request);
    }
}
