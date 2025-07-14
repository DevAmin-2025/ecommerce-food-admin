<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterController extends Controller
{
    public function index(): View
    {
        $footer = Footer::first();
        return view('footer.index', compact('footer'));
    }

    public function edit(Footer $footer): View
    {
        return view('footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $request->validate([
            'contact_title' => 'required|string',
            'contact_address' => 'required|string',
            'contact_phone' => 'required|regex:/^09[0-3][0-9]{8}$/',
            'contact_email' => 'required|email',
            'info_title' => 'required|string',
            'info_body' => 'required|string',
            'youtube_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'telegram_link' => 'nullable|url',
            'work_hours_title' => 'required|string',
            'work_days' => 'required|string',
            'work_hour_from' => 'required|string',
            'work_hour_to' => 'required|string',
            'copyright' => 'required|string',
        ]);

        $footer->update([
            'contact_title' => $request->contact_title,
            'contact_address' => $request->contact_address,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'info_title' => $request->info_title,
            'info_body' => $request->info_body,
            'youtube_link' => $request->youtube_link,
            'instagram_link' => $request->instagram_link,
            'whatsapp_link' => $request->whatsapp_link,
            'telegram_link' => $request->telegram_link,
            'work_hours_title' => $request->work_hours_title,
            'work_days' => $request->work_days,
            'work_hour_from' => $request->work_hour_from,
            'work_hour_to' => $request->work_hour_to,
            'copyright' => $request->copyright,
        ]);

        return redirect()->route('footer.index')->with('success', 'بخش فوتر با موفقیت آپدیت شد.');
    }
}
