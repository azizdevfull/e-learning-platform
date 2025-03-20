<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $admins = User::where('role_id', Role::where('name', 'admin')->first()->id)->latest()->paginate(10); // Admin roli ID’si 1
        return view('admin.users.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Admin muvaffaqiyatli qo‘shildi.');
    }

    public function show(User $user)
    {
        if (!$user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'Bu foydalanuvchi admin emas.');
        }
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if (!$user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'Bu foydalanuvchi admin emas.');
        }
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if (!$user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'Bu foydalanuvchi admin emas.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Admin muvaffaqiyatli yangilandi.');
    }

    public function destroy(User $user)
    {
        if (!$user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'Bu foydalanuvchi admin emas.');
        }

        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'O‘zingizni o‘chira olmaysiz.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Admin muvaffaqiyatli o‘chirildi.');
    }
}
