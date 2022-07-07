<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderPlaced;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

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
        if($request->ajax()){
            $booking_id = $request->booking_id;
            $product_bookings =  $request->products;
        }else{
            $booking_id =$request->session()->get('booking_id');
            $product_bookings =$request->session()->get('products');
        }

        $products = [];
        foreach($product_bookings as $id => $no){
            $products[]= Product::find($id);
        }   
 
        Mail::to(Config::get('mail.mail_to_admins.address'))->send(new OrderPlaced($products, $booking_id, $product_bookings));

        if(URL::current() != url('/products')){
            Session::forget('booking_id');
            Session::forget('products');
            Session::flash('message', 'Your order is placed');
            return redirect('/products');
        }
    }
}
