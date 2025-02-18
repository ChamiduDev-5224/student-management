<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        return response()->json($this->studentRepository->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->studentRepository->create($request->all()));
    }
}
