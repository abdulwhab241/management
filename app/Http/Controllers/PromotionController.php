<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Requests\PromotionRequest;
use App\Repository\StudentPromotionRepositoryInterface;

class PromotionController extends Controller
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


    public function store(PromotionRequest $request)
    {
        return $this->Promotion->store($request);
    }

    public function print()
    {
        $Promotions = Promotion::all();
        return view('pages.Upgrades.print', compact('Promotions'));
    }
    
    public function destroy(Request $request)
    {
        //
        return $this->Promotion->destroy($request);
    }
    
}
