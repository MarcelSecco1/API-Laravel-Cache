<?php

namespace App\Services;

use App\Models\Lesson;
use App\Repositories\LessonRepository;
use App\Repositories\ModuleRepository;

class LessonService
{
    protected $moduleRepository, $lessonRepository;

    public function __construct(
        ModuleRepository $moduleRepository,
        LessonRepository $lessonRepository
    ) {
        $this->moduleRepository = $moduleRepository;
        $this->lessonRepository = $lessonRepository;
    }

    public function getLessonByModule(string $module)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);
        return $this->lessonRepository->getAllLessonByModule($module->id);
    }

    public function getLessonByModuleAndUuid(string $module, string $identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);

        return $this->lessonRepository->getLesson($module->id, $identify);
    }

    public function createNewLesson(array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);

        return $this->lessonRepository->createNewLesson($module->id, $data);
    }

    public function deleteLesson(string $identify)
    {
        return $this->lessonRepository->deleteLessonByUuid($identify);
    }
    public function updateLesson(array $data, string $identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->lessonRepository->updateLessonByUuid($module->id, $data, $identify);
    }
}
