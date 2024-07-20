<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class StripeController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = App::make('stripe');
    }

    public function stripeSession(Request $request)
    {

            $productName = $request->productname;
            $price = $request->price;
            $customer_email=Auth::user()->email;

            $session = $this->stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' =>  $productName,
                            ],
                            'unit_amount' => $price * 100, // Amount in cents
                        ],
                        'quantity' => 1,
                    ],

                ],
                'mode' => 'payment',
                'customer_email' => $customer_email,
                'success_url' => url('/checkout-success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => route('checkout.cancel'),
            ]);
            return redirect($session->url);



    }

    public function checkoutSuccess(Request $request)
    {

           $sessionId = $request->query('session_id');
         


            $session = $this->stripe->checkout->sessions->retrieve($sessionId);
            $customeremail=$session->customer_details->email;
            
            $insertData=Transaction::create([
                'stripe_payment_id' => $session->payment_intent,
                'customer_email' => $customeremail,              
                'amount' => $session->amount_total / 100, // Convert from cents to dollars
                'currency' => $session->currency,
                'status' => $session->payment_status,
            ]);
           return view('checkout-success');
    }

    public function checkoutCancel()
    {
        return view('checkout-cancel');
    }
}
