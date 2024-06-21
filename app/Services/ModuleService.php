<?php

namespace App\Services;

use App\Repositories\ModuleRepository;

class ModuleService
{
    protected $moduleRepository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    public function getModules()
    {
        return $this->moduleRepository->getAllModules();
    }

    public function getModule(string $identify)
    {
        return $this->moduleRepository->getModuleByUuid($identify);
    }

    public function createNewModule(array $data)
    {
        return $this->moduleRepository->createNewModule($data);
    }

    public function deleteModule(string $identify)
    {
        return $this->moduleRepository->deleteModuleByUuid($identify);
    }
    public function updateModule(array $data, string $identify)
    {
        return $this->moduleRepository->updateModuleByUuid($data, $identify);
    }
}
