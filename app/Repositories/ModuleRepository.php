<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected $model;

    public function __construct(Module $module)
    {
        $this->model = $module;
    }

    public function getAllModules()
    {
        return $this->model->all();
    }

    public function getModuleByUuid(string $uuid)
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function createNewModule(array $data)
    {
        return $this->model->create($data);
    }

    public function deleteModuleByUuid(string $uuid)
    {
        return $this->getModuleByUuid($uuid)->delete();
    }

    public function updateModuleByUuid(array $data, string $uuid)
    {
        return $this->getModuleByUuid($uuid)->update($data);
    }
}