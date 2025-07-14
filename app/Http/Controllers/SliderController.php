<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function create(): View
    {
        return view('sliders.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|unique:sliders,title|string',
            'body' => 'required|string|min:10',
            'link_text' => 'required|string|min:3',
            'link_address' => 'required|string'
        ]);

        Slider::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_text' => $request->link_text,
            'link_address' => $request->link_address
        ]);

        return redirect()->route('slider.index')->with('success', 'اسلایدر با موفقیت ایجاد شد.');
    }

    public function edit(Slider $slider): View
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|string|unique:sliders,title,' . $slider->id,
            'body' => 'required|string|min:10',
            'link_text' => 'required|string|min:3',
            'link_address' => 'required|string'
        ]);

        $slider->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_text' => $request->link_text,
            'link_address' => $request->link_address
        ]);

        return redirect()->route('slider.index')->with('success', 'اسلایدر با موفقیت ویرایش شد.');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('warning', 'اسلایدر با موفقیت حذف شد.');
    }
}
