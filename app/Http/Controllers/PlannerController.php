<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlannerService;

class PlannerController extends Controller
{
    public function __construct(
        private PlannerService $plannerService
    ) {}

    public function index(Request $request)
    {
        return response()->json(
            $this->plannerService->getAll($request->user())
        );
    }

    public function store(Request $request)
    {
        return response()->json(
            $this->plannerService->create(
                $request->user(),
                $request->all()
            ),
            201
        );
    }
}
