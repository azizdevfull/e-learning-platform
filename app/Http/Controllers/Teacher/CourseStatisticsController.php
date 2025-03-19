<?php

// App\Http\Controllers\Teacher\CourseStatisticsController.php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Test;
use App\Models\TestResult;

class CourseStatisticsController extends Controller
{
    public function index()
    {
        $courses = Course::with('students')->get(); // Kurslar va talabalar
        $tests = Test::with('questions')->get(); // Testlar va savollar
        return view('teacher.statistics.index', compact('courses', 'tests'));
    }

    public function courseDetails(Course $course)
    {
        $students = $course->students;
        return view('teacher.statistics.course_details', compact('course', 'students'));
    }

    public function testStatistics(Test $test)
    {
        $results = TestResult::where('test_id', $test->id)->with('student')->get();
        return view('teacher.statistics.test_details', compact('test', 'results'));
    }
}
