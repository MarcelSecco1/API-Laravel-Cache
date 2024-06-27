<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

class CourseRepository
{
    protected $model;

    public function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function getAllCourses()
    {
        // return Cache::remember('courses', 60, function () {
        //     return $this->model
        //         ->with('modules.lessons')
        //         ->get();
        // });

        return Cache::rememberForever('courses', function () {
            return $this->model
                ->with('modules.lessons')
                ->get();
        });
    }

    public function getCourseByUuid(string $uuid, bool $relationShip = true)
    {


        $query = $this->model
            ->where('uuid', $uuid);

        if ($relationShip)
            $query->with('modules.lessons');

        return $query->firstOrFail();
    }

    public function createNewCourse(array $data)
    {
        return $this->model->create($data);
    }

    public function deleteCourseByUuid(string $uuid)
    {
        Cache::forget('courses');
        return $this->getCourseByUuid($uuid, false)->delete();
    }

    public function updateCourseByUuid(array $data, string $uuid)
    {
        Cache::forget('courses');

        return $this->getCourseByUuid($uuid, false)->update($data);
    }
}
