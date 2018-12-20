<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay()
    {
        // dd(request()->all());

        Stripe::setApiKey("sk_test_bHcDa7e6kVHzjL5rYXaEJFXm");

        $token = request()->stripeToken;

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => request()->stripeToken
        ]);

        dd('your card was charged successfully. ');
    }
}
