<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $products = Product::simplePaginate(8);

       if($request->ajax()){
        return response()->json([
            'success' => true,
            'products' => $products,
            'links' => (string)$products->links()
        ]);
       }
       else{
        return view('products', ['products' => $products]);
       }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        echo '<div class="alert alert-success">Data Inserted</div>';
    }

    public function reload(){

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     */
    public function update(ProductRequest $request)
    {
        $Product = Product::find($request->id);
        if ($Product == null) 
        {
            echo '<div class="alert alert-danger">Could not be updated, try again</div>';
        }

        $Product->name = $request->name;
        $Product->description = $request->description;
        $Product->price = $request->price;
        $Product->save();
        echo '<div class="alert alert-success">Data Updated</div>';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if($request->ajax())
         {
            $product = Product::find($request->id);
            $product->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
         }
    }
}
