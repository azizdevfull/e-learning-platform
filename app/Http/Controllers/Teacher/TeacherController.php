<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Auth::user();

        // Faqat o'qituvchi ekanligini tekshirish (middleware orqali amalga oshiriladi)
        if (!$teacher->isTeacher()) {
            abort(403, 'Bu sahifa faqat o‘qituvchilar uchun');
        }

        // Kurslar statistikasi
        $totalCourses = Course::where('teacher_id', $teacher->id)->count();
        $newCourses = Course::where('teacher_id', $teacher->id)
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        // Talabalar statistikasi
        $totalStudents = Enrollment::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->distinct('user_id')->count();
        $lastMonthStudents = Enrollment::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->where('created_at', '<', now()->subDays(30))->distinct('user_id')->count();
        $growthPercentage = $lastMonthStudents > 0 ? round((($totalStudents - $lastMonthStudents) / $lastMonthStudents) * 100) : 0;

        // Testlar statistikasi
        $totalTests = Test::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->count();
        $recentTests = Test::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->where('created_at', '>=', now()->subDays(7))->count();

        // O'rtacha ball
        $averageScore = TestResult::whereHas('test.course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->avg('score') ?? 0;
        $lastMonthAvg = TestResult::whereHas('test.course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->where('created_at', '<', now()->subDays(30))->avg('score') ?? 0;
        $scoreChange = round($averageScore - $lastMonthAvg, 1);

        // So'nggi faoliyat
        $recentActivities = [];
        $newCoursesList = Course::where('teacher_id', $teacher->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->take(2)
            ->get();
        foreach ($newCoursesList as $course) {
            $recentActivities[] = [
                'message' => "Yangi kurs qo'shildi: \"{$course->title}\"",
                'timestamp' => $course->created_at->format('d.m.Y, H:i'),
                'bg_class' => 'bg-pastel-blue',
                'icon_class' => 'text-primary',
                'icon_path' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'
            ];
        }
        $newTestsList = Test::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->take(2)
            ->get();
        foreach ($newTestsList as $test) {
            $recentActivities[] = [
                'message' => "Yangi test yaratildi: \"{$test->title}\"",
                'timestamp' => $test->created_at->format('d.m.Y, H:i'),
                'bg_class' => 'bg-pastel-green',
                'icon_class' => 'text-secondary',
                'icon_path' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'
            ];
        }

        // Rejalashtirilgan testlar
        $upcomingTests = Test::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->latest()->take(3)->get();

        // Yangi qo'shilgan talabalar
        $recentStudents = Enrollment::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->with('user', 'course')
            ->where('created_at', '>=', now()->subDays(30))
            ->latest()
            ->take(3)
            ->get();

        return view('teacher.index', compact(
            'totalCourses',
            'newCourses',
            'totalStudents',
            'growthPercentage',
            'totalTests',
            'recentTests',
            'averageScore',
            'scoreChange',
            'recentActivities',
            'upcomingTests',
            'recentStudents'
        ));
    }
    public function profile()
    {
        $teacher = Auth::user();
        return view('teacher.profile', compact('teacher'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
        ]);

        $teacher = Auth::user();
        $teacher->name = $request->name;
        $teacher->email = $request->email;

        if ($request->filled('password')) {
            $teacher->password = bcrypt($request->password);
        }

        $teacher->save();

        return redirect()->back()->with('success', 'Profil muvaffaqiyatli yangilandi!');
    }
}