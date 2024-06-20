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
}