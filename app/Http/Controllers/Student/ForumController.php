<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ForumThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index(Course $course)
    {
        if (!Auth::user()->courses()->where('courses.id', $course->id)->exists()) {
            abort(403, 'Siz bu kursga yozilmagansiz.');
        }

        $threads = $course->forumThreads()->with('user', 'posts')->latest()->paginate(10);

        return view('student.forum.index', compact('course', 'threads'));
    }

    public function storeThread(Request $request, Course $course)
    {
        if (!Auth::user()->courses()->where('courses.id', $course->id)->exists()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $thread = $course->forumThreads()->create([
            'user_id' => Auth::id(),
            'title' => $request->title,
        ]);

        return redirect()->route('student.forum.show', [$course->id, $thread->id]);
    }

    public function show(Course $course, ForumThread $thread)
    {
        if ($thread->course_id !== $course->id || !Auth::user()->courses()->where('courses.id', $course->id)->exists()) {
            abort(403);
        }

        $thread->load('posts.user');

        return view('student.forum.show', compact('course', 'thread'));
    }

    public function storePost(Request $request, Course $course, ForumThread $thread)
    {
        if ($thread->course_id !== $course->id || !Auth::user()->courses()->where('courses.id', $course->id)->exists()) {
            abort(403);
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        $thread->posts()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('student.forum.show', [$course->id, $thread->id]);
    }
}
