<?php

namespace App\View\Components\Welcome;

use App\Models\Course;
use App\Models\Role;
use App\Models\TestResult;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class stats extends Component
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
        $courseCount = Course::count();
        $studentCount = User::where('role_id', Role::where('name', 'student')->first()->id)->count();
        $teacherCount = User::where('role_id', Role::where('name', 'teacher')->first()->id)->count();
        $averageScore = TestResult::avg('score'); // O'rtacha test natijasi
        $satisfactionRate = round($averageScore);
        return view('components.welcome.stats', compact('courseCount', 'studentCount', 'teacherCount', 'satisfactionRate'));
    }
}
