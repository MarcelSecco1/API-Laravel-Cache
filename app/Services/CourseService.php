<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getCourses()
    {
        return $this->courseRepository->getAllCourses();
    }

    public function getCourse(string $identify)
    {
        return $this->courseRepository->getCourseByUuid($identify);
    }

    public function createNewCourse(array $data)
    {
        return $this->courseRepository->createNewCourse($data);
    }
}
