<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function loginPost(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'رمزعبور اشتباه است.']);
        }

        $userRoles = explode(',', $user->roles->implode('name', ','));
        if (in_array('user', $userRoles)) {
            return redirect()->back()->with('error', 'اجازه دسترسی ندارید.');
        }
        Auth::login($user);
        session()->regenerate();
        return redirect()->route('dashboard')->with('success', 'با موفقیت به حساب کاربری خود وارد شدید.');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login')->with('warning', 'با موفقیت خارج شدید.');
    }
}
