<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Role;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $courses_count = Course::count();
        $tests_count = Test::count();
        $categories_count = Category::count();

        // Oxirgi faoliyat (misol sifatida oddiy logika)
        $recent_activities = Activity::with(['subject', 'causer']) // Subject va causer’ni yuklaymiz
            ->latest()
            ->limit(5)
            ->get();
        return view('admin.dashboard', compact('users_count', 'courses_count', 'tests_count', 'categories_count', 'recent_activities'));
    }
    public function profile()
    {
        $admin = Auth::user();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
        ]);

        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profil muvaffaqiyatli yangilandi!');
    }

}
