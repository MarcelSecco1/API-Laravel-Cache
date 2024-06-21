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
    public function index()
    {
        $cousers = $this->moduleService->getModules();

        return ModuleResource::collection($cousers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateModule $request)
    {
        $couse = $this->moduleService->createNewModule($request->validated());

        return new ModuleResource($couse);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identify)
    {
        $Module = $this->moduleService->getModule($identify);

        return new ModuleResource($Module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateModule $request, string $identify)
    {
        $this->moduleService->updateModule($request->validated(), $identify);

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identify)
    {
        $this->moduleService->deleteModule($identify);

        return response()->json([], 204);
    }
}
