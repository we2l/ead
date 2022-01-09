<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;

class LessonController extends Controller
{
    protected $repository;

    public function __construct(LessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($moduleId)
    { 
        return LessonResource::collection($this->repository->getLessonsByModuleId($moduleId));
    }

    public function show($lessonId)
    {   
        return new LessonResource($this->repository->getLesson($lessonId));
    }
}
