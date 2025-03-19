<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Kategoriyalar ro‘yxati
    public function index()
    {
        $categories = Category::all();
        return view('teacher.categories.index', compact('categories'));
    }

    // Yangi kategoriya yaratish formasi
    public function create()
    {
        return view('teacher.categories.create');
    }

    // Yangi kategoriya saqlash
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('teacher.categories.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }

    // Kategoriyani tahrirlash formasi
    public function edit(Category $category)
    {
        return view('teacher.categories.edit', compact('category'));
    }

    // Kategoriya ma'lumotlarini yangilash
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('teacher.categories.index')->with('success', 'Kategoriya muvaffaqiyatli yangilandi!');
    }

    // Kategoriyani o‘chirish
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('teacher.categories.index')->with('success', 'Kategoriya muvaffaqiyatli o‘chirildi!');
    }
}
