<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index(): View
    {
        $item = AboutUs::first();
        return view('about-us.index', compact('item'));
    }

    public function edit(AboutUs $aboutUs)
    {
        return view('about-us.edit', compact('aboutUs'));
    }

    public function update(AboutUs $aboutUs, Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'body' => 'required|string|min:10',
            'link_text' => 'required|string',
            'link_address' => 'required|string',
            'image_address' => 'nullable|image|max:2048'
        ]);

        if ($request->image_address) {
            $imageName = $request->image_address->getClientOriginalName();
            $request->image_address->storeAs('images/about-us', $imageName);
            Storage::delete('images/about-us/' . $aboutUs->image_address);
        }

        $aboutUs->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_text' => $request->link_text,
            'link_address' => $request->link_address,
            'image_address' => $request->image_address ? $imageName : $aboutUs->image_address
        ]);

        return redirect()->route('about-us.index')->with('success', 'بخش درباره ما با موفقیت ویرایش شد.');
    }
}
