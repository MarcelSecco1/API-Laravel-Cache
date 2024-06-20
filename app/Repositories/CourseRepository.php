<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $model;

    public function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function getAllCourses()
    {
        return $this->model->all();
    }

    public function getCourseByUuid(string $uuid)
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function createNewCourse(array $data)
    {
        return $this->model->create($data);
    }
}