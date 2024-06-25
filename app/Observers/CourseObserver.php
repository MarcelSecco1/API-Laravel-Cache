<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseObserver
{
    /**
     * Handle the Course "creating" event.
     */
    public function creating(Course $course): void
    {
        $course->uuid = (string) Str::uuid();
        return;
    }

    
}
