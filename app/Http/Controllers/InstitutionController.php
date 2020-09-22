<?php

namespace App\Http\Controllers;

use App\Repository\InstituitionRepository;
use Illuminate\Http\Response;

class InstitutionController extends Controller
{
    /**
     * @var InstituitionRepository
     */
    private $repository;

    /**
     * InstitutionController constructor.
     * @param InstituitionRepository $repository
     */
    public function __construct(InstituitionRepository $repository)
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
