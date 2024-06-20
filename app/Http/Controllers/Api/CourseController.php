<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCourse;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cousers = $this->courseService->getCourses();

        return CourseResource::collection($cousers);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCourse $request)
    {
        $couse = $this->courseService->createNewCourse($request->validated());

        return new CourseResource($couse);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identify)
    {
        $course = $this->courseService->getCourse($identify);

        return new CourseResource($course);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
