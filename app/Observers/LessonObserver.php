<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Str;


class LessonObserver
{
    public function creating(Lesson $lesson): void
    {
        $lesson->uuid = (string) Str::uuid();
        return;
    }
}
