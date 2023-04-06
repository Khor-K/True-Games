<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $cart = Cart::where('user_id', $user_id)->first();
        $orders = Order::where('user_id', $user_id)->get();

        return view('cart.index', [
            'cart' => $cart,
            'orders' => $orders,
        ]);
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            abort(404);
        }

        $user = Auth::user();
        $user_id = $user->id;
        $cart = Cart::where('user_id', $user_id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->save();
        }

        $existingCartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $product->id;
            $cartItem->quantity = 1;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Товар добавлен в корзину.');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');

        $user = Auth::user();
        $user_id = $user->id;

        $cart = Cart::where('user_id', $user_id)->first();
        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            if ($cartItem->quantity > 1)
            {
                $cartItem->quantity -= 1;
                $cartItem->save();
            }
            else
                $cartItem->delete();
        }
        return redirect()->back()->with('success', 'Товар удален из корзины.');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $cart = Cart::where('user_id', $user_id)->first();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Неправильный пароль.']);
        }

        $order = new Order();
        $order->user_id = $user->id;
        $order->created_at = now();
        $order->save();

        foreach ($cart->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product->id;
            $orderItem->quantity = $item->quantity;
            $orderItem->save();
        }

        $cart->items()->delete();

        return redirect()->back()->with('success', 'Заказ оформлен.');
    }
}
