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

    public function getAllModulesByCourse(int $course)
    {
        return $this->model->where('course_id', $course)->get();
    }

    public function getModule(int $id, string $uuid)
    {
        return $this->model->where('course_id', $id)
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
    public function getModuleByUuid(string $uuid)
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function createNewModule(int $courseId, array $data)
    {
        $data['course_id'] = $courseId;
        return $this->model->create($data);
    }

    public function updateModuleByUuid(int $courseId, array $data, string $uuid)
    {
        $data['course_id'] = $courseId;
        return $this->getModuleByUuid($uuid)->update($data);
    }

    public function deleteModuleByUuid(string $uuid)
    {
        return $this->getModuleByUuid($uuid)->delete();
    }

    
}
