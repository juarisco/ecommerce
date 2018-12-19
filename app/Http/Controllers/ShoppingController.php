<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        // dd(request()->all());
        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        // dd(Cart::content());
        return redirect()->route('cart');
    }

    public function cart()
    {
        // Cart::destroy();

        return view('cart');
    }
}
