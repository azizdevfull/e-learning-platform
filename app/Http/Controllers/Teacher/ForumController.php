<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ForumThread;
use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index(Course $course)
    {
        // Faqat o‘qituvchining o‘z kursi ekanligini tekshirish
        if ($course->teacher_id !== Auth::id()) {
            abort(403, 'Bu kurs sizga tegishli emas.');
        }

        $threads = $course->forumThreads()->with('user', 'posts')->latest()->paginate(10);

        return view('teacher.forum.index', compact('course', 'threads'));
    }

    public function show(Course $course, ForumThread $thread)
    {
        if ($course->teacher_id !== Auth::id() || $thread->course_id !== $course->id) {
            abort(403);
        }

        $thread->load('posts.user');

        return view('teacher.forum.show', compact('course', 'thread'));
    }

    public function storePost(Request $request, Course $course, ForumThread $thread)
    {
        if ($course->teacher_id !== Auth::id() || $thread->course_id !== $course->id) {
            abort(403);
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        $thread->posts()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('teacher.forum.show', [$course->id, $thread->id]);
    }

    // Qo‘shimcha: Xabarni o‘chirish (ixtiyoriy)
    public function destroyPost(Course $course, ForumThread $thread, ForumPost $post)
    {
        if ($course->teacher_id !== Auth::id() || $thread->course_id !== $course->id) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('teacher.forum.show', [$course->id, $thread->id])->with('success', 'Xabar o‘chirildi.');
    }
}