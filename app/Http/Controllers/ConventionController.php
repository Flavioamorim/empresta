<?php

namespace App\Http\Controllers;

use App\Repository\ConventionRepository;
use Illuminate\Http\Response;

class ConventionController extends Controller
{
    /**
     * @var ConventionRepository
     */
    private $repository;

    /**
     * ConventionController constructor.
     * @param ConventionRepository $repository
     */
    public function __construct(ConventionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $content = $this->repository->getAll();

        return response()->json($content, Response::HTTP_OK);
    }
}
