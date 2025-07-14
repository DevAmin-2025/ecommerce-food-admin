<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|string|unique:categories,name',
            'status' => 'required|integer'
        ]);

        Category::create([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->route('category.index')->with('success', 'دسته بندی با موفقیت ایجاد شد.');
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|string|unique:categories,name,' . $category->id,
            'status' => 'required|integer|'
        ]);

        $category->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->route('category.index')->with('success', 'دسته بندی با موفقیت ویرایش شد.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index')->with('warning', 'دسته بندی با موفقیت حذف شد.');
    }
}
