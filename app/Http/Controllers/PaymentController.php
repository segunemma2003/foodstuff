<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        // try{
            $url = Paystack::getAuthorizationUrl();
            return $url->redirectNow();
        // }catch(\Exception $e) {
        //     return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        // }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        \Cart::session(auth()->user()->ID)->clear();
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);

    }
}
