<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::latest()->get();
        return view('roles.index', compact('roles'));
    }

    public function create(): View
    {
        return view('roles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('role.index')->with('success', 'نقش با موفقیت ایجاد شد.');
    }

    public function edit(Role $role): View
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|unique:roles,name,' . $role->id
        ]);

        $role->update([
            'name' => $request->name
        ]);
        return redirect()->route('role.index')->with('success', 'نقش با موفقیت ویرایش شد.');
    }
}
