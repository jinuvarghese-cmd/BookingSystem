<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderPlaced;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

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
        $booking_id = $request->booking_id;
        $product_bookings =  $request->products;
        $products = [];
            foreach($product_bookings as $id => $no){
                $products[]= Product::find($id);
            }   
 
        Mail::to(Config::get('mail.mail_to_admins.address'))->send(new OrderPlaced($products, $booking_id, $product_bookings));
    }
}
