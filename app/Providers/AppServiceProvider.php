<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Observers\CourseObserver;
use App\Observers\LessonObserver;
use App\Observers\ModuleObserver;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Course::observe(CourseObserver::class);
        Module::observe(ModuleObserver::class);
        Lesson::observe(LessonObserver::class);
        // Event::listen(
        //     CourseObserver::class
        // );
    }
}
