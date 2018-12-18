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

        $cart = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        dd(Cart::content());
    }
}
