<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function index(): View
    {
        $messages = ContactUs::latest()->get();
        return view('contact-us.index', compact('messages'));
    }

    public function show(ContactUs $contactUs): View
    {
        return view('contact-us.show', compact('contactUs'));
    }

    public function destroy(ContactUs $contactUs): RedirectResponse
    {
        $contactUs->delete();
        return redirect()->route('contact-us.index')->with('warning', 'پیام با موفقیت حذف شد.');
    }
}
