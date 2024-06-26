<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Http\Resources\ModuleResource;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($course)
    {
        $modules = $this->moduleService->getModulesByCourse($course);

        return ModuleResource::collection($modules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateModule $request, $course)
    {
        $module = $this->moduleService->createNewModule($request->validated());

        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     */
    public function show($course, string $identify)
    {
        $module = $this->moduleService->getModuleByCourse($course, $identify);

        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateModule $request, $course, string $identify)
    {
        dd('teste');
        $this->moduleService->updateModule($request->validated(), $identify);

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($course, string $identify)
    {
        $this->moduleService->deleteModule($identify);

        return response()->json([], 204);
    }
}
