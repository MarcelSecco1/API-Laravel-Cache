<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    protected $model;

    public function __construct(Lesson $lesson)
    {
        $this->model = $lesson;
    }

    public function getAllLessonByModule(int $idModule)
    {
        return $this->model->where('module_id', $idModule)->get();
    }

    public function getLesson(int $id, string $uuid)
    {
        return $this->model->where('module_id', $id)
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
    public function getLessonByUuid(string $uuid)
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function createNewLesson(int $moduleId, array $data)
    {
        $data['module_id'] = $moduleId;
        return $this->model->create($data);
    }

    public function updateLessonByUuid(int $moduleId, array $data, string $uuid)
    {
        $data['module_id'] = $moduleId;
        return $this->getLessonByUuid($uuid)->update($data);
    }

    public function deleteLessonByUuid(string $uuid)
    {
        return $this->getLessonByUuid($uuid)->delete();
    }
}
