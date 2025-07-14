<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::all();
        return view('features.index', compact('features'));
    }

    public function create(): View
    {
        return view('features.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|string|unique:features,title',
            'body' => 'required|min:10|string',
            'icon' => 'required|string'
        ]);

        Feature::create([
            'title' => $request->title,
            'body' => $request->body,
            'icon' => $request->icon
        ]);

        return redirect()->route('feature.index')->with('success', 'ویژگی با موفقیت ایجاد شد.');
    }

    public function edit(Feature $feature): View
    {
        return view('features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|string|unique:features,title,' . $feature->id,
            'body' => 'required|min:10|string',
            'icon' => 'required|string'
        ]);

        $feature->update([
            'title' => $request->title,
            'body' => $request->body,
            'icon' => $request->icon
        ]);

        return redirect()->route('feature.index')->with('success', 'ویژگی با موفقیت ویرایش شد.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();
        return redirect()->route('feature.index')->with('warning', 'ویژگی با موفقیت حذف شد.');
    }
}
