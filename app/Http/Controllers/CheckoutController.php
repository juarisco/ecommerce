<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Cart::content()->count() == 0) {
            Session::flash('info', 'Your cart is still empty. Do some shopping');

            return redirect()->back();
        }

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

        // dd('your card was charged successfully. ');

        Session::flash('success', 'Purchase successfull. wait for our email.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
