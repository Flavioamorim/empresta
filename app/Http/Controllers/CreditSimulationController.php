<?php

namespace App\Http\Controllers;

use App\Http\Requests\SimulateRequest;
use App\Service\SimulateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class CreditSimulationController extends Controller
{
    /**
     * @var SimulateService
     */
    private $simulateService;

    /**
     * CreditSimulationController constructor.
     * @param SimulateService $simulateService
     */
    public function __construct(SimulateService $simulateService)
    {
        $this->simulateService = $simulateService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function simulate(SimulateRequest $request)
    {
        $simulate = $this->simulateService->executeSimulation($request->all());

        return response()->json($simulate, Response::HTTP_OK);
    }
}
