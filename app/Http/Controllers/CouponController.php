<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function index(): View
    {
        $coupons = Coupon::all();
        return view('coupons.index', compact('coupons'));
    }

    public function create(): View
    {
        return view('coupons.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'percentage' => 'required|integer',
            'expire_at' => 'required|date_format:Y/m/d H:i:s'
        ]);

        Coupon::create([
            'code' => $request->code,
            'percent' => $request->percentage,
            'expire_date' => toGregorian($request->expire_at)
        ]);

        return redirect()->route('coupon.index')->with('success', 'کد تخفیف با موفقیت ایجاد شد.');
    }

    public function edit(Coupon $coupon): View
    {
        return view('coupons.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code,' . $coupon->id,
            'percentage' => 'required|integer',
            'expire_at' => 'required|date_format:Y/m/d H:i:s'
        ]);

        $coupon->update([
            'code' => $request->code,
            'percent' => $request->percentage,
            'expire_date' => toGregorian($request->expire_at)
        ]);

        return redirect()->route('coupon.index')->with('success', 'کد تخفیف با موفقیت ویرایش شد.');
    }

    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->with('warning', 'کد تخفیف با موفقیت حذف شد.');
    }
}
