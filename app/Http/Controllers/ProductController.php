<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $products = Product::simplePaginate(9);
        return view('products', ['products' => $products]);        
    }

    public function addToCart(Request $request){
        if($request->ajax()){
            $products =[];
            $id = $request->id;
            $no = $request->no;
            
            if ($request->session()->has('products')) {
                $products = $request->session()->get('products');    
            }
            if(isset($products[$id])){
                $old_no = $products[$id];
                $products[$id] = (int)$old_no + (int)$no;
            }else{
                $products[$id] = (int)$no;
            }

            $request->session()->put('products', $products);
        }
    }
}
