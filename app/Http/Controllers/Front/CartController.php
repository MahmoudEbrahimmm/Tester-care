<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'user_id'     => auth()->check() ? auth()->user()->id : null,
                'name'        => $product->name,
                'quantity'    => 1,
                'price'       => $product->price,
                'image'       => $product->image,
                'description' => $product->description,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('home')->with('success', 'تمت اضافة المنتج في السلة بنجاح');
    }

    public function cartUpdate(Request $request)
    {
        $cart = session('cart', []);

        if ($request->type == "update") {
            $cart[$request->product_id]["quantity"] = $request->quantity;
        } else {
            unset($cart[$request->product_id]);
        }

        session()->put("cart", $cart);

        $view = view("components.cartProducts")->render();
        return response()->json(["success" => $view]);
    }

    public function checkout()
    {
        if (!session()->has('cart') || empty(session('cart'))) {
            return redirect()->route('cart')->with('error', 'السلة فارغة!');
        }

        return view('checkout');
    }

    public function checkoutStore(Request $request)
    {
        $request->validate([
            "name"           => "required|string|max:255",
            "phone"          => "required|string|max:20",
            "address"        => "required|string|max:500",
            "payment_method" => "required|in:cash,instapay,vf-cash",
        ]);

        $order = Order::create([
            "user_id"        => auth()->check() ? auth()->user()->id : null,
            "name"           => $request->name,
            "phone"          => $request->phone,
            "address"        => $request->address,
            "payment_method" => $request->payment_method,
            "amount"         => 0,
            "status"         => 'pending',
        ]);

        $amount = 0;

        foreach (session('cart', []) as $key => $value) {
            $order->items()->create([
                "product_id" => $key,
                "quantity"   => $value['quantity'],
                "price"      => $value['price'],
                "image"      => $value['image'] ?? null,
            ]);

            $amount += $value['quantity'] * $value['price'];
        }

        $order->update([
            "amount" => $amount
        ]);

        // تفريغ السلة
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'تم ارسال الاوردر بنجاح سنتواصل معكم قريبا');
    }
}
