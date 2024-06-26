<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use App\Services\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($module)
    {
        $lessons = $this->lessonService->getLessonByModule($module);

        return LessonResource::collection($lessons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateLesson $request, $module)
    {
        $lesson = $this->lessonService->createNewLesson($request->validated());

        return new lessonResource($lesson);
    }

    /**
     * Display the specified resource.
     */
    public function show($module, string $identify)
    {
        $lesson = $this->lessonService->getLessonByModuleAndUuid($module, $identify);

        return new lessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateLesson $request, $module, string $identify)
    {
        $this->lessonService->updateLesson($request->validated(), $identify);

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($module, string $identify)
    {
        $this->lessonService->deleteLesson($identify);

        return response()->json([], 204);
    }
}
