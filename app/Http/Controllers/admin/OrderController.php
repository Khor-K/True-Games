<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = Order::with('user', 'items.product')->findOrFail($id);

        return view('admin.orders.show', [
            'order' => $order,
        ]);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', [
            'order' => $order,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        if ($request->input('status') === 'cancelled') {
            $order->status = 'cancelled';
            $order->cancellation_reason = $request->input('cancellation_reason');
        } else {
            $order->status = $request->input('status');
            $order->cancellation_reason = null;
        }

        $order->save();

        return redirect()->route('admin.orders.show', $order->id);
    }
}
