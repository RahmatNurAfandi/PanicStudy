<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PlannerServiceInterface;

class PlannerController extends Controller
{
    public function __construct(
        private PlannerServiceInterface $plannerService
    ){}

    public function index(Request $request)
    {
        return response()->json(
            $this->plannerService->getAll(
                $request->user()
            )
        );
    }
}
