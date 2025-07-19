<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->with('address', 'orderItems')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function edit(Order $order): View
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Order $order, Request $request)
    {
        $request->validate([
            'status' => 'required|integer'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('order.index')->with('success', 'وضعیت سفارش با موفقیت ویرایش شد.');
    }
}
