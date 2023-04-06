<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== auth()->user()->id) {
            abort(403);
        }

        return view('orders.show', [
            'order' => $order,
        ]);
    }
}
