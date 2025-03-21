<?php

namespace App\View\Components\Welcome;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterCourses extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $topCourses = Course::withCount('students')
            ->orderByDesc('students_count')
            ->take(5)
            ->get();

        return view('components.welcome.footer-courses', compact('topCourses'));
    }
}
