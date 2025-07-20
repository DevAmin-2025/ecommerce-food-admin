<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_ids' => 'required',
            'role_ids.*' => 'exists:roles,id'
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_ids);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'کاربر با موفقیت ایجاد شد.');
        } catch (\Exception) {
            DB::rollBack();
            return redirect()->route('user.index')->with('error', 'ایجاد کاربر با خطا مواجه شد.');
        };
    }

    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role_ids' => 'required',
            'role_ids.*' => 'exists:roles,id'
        ]);

        try {
            DB::beginTransaction();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password
            ]);
            if ($request->role_ids) {
                $user->roles()->sync($request->role_ids);
            }
            DB::commit();
            return redirect()->route('user.index')->with('success', 'کاربر با موفقیت ویرایش شد.');
        } catch (\Exception) {
            DB::rollBack();
            return redirect()->route('user.index')->with('error', 'ویرایش کاربر با خطا مواجه شد.');
        };
    }
}
