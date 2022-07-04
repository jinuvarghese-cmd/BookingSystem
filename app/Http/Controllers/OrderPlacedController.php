<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;

class OrderPlacedController extends Controller
{
    /**
     * Send an order placed mail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
 
        // Ship the order...
 
        Mail::to($request->user())->send(new OrderPlaced($order));
    }
}
