@extends('layouts.frontend')
@section('content')
<section class="banner_main">
<div  class="products">
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="titlepage">
            <h2>Our Products</h2>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="our_products">
         <button type="button" id ="checkout" class="btn btn-primary">Checkout</button>
            <div class="row">
               @php
                  $i=1;
               @endphp
               @foreach($products as $product)
                  <div class="col-md-4 margin_bottom1">
                     <div class="product_box">
                        <figure><img src="https://source.unsplash.com/random/200x200?sig=<?php echo $i; ?>"></figure>
                        <h3>{{$product->name}}</h3>
                        <div class="number">
	                        <span class="minus">-</span>
	                        <input type="text" value="1"/>
	                        <span class="plus">+</span>
                        </div>
                        <p id="price" data-value="{{$product->price}}">${{$product->price}}</p>
                        <button type="button" data-id = "{{$product->id}}" id="add_to_cart" class="btn btn-success">Add to Cart</button>
                     </div>
                  </div>
                  @php
                     $i++;
                  @endphp
               @endforeach
               <div class="col-md-12 d-flex justify-content-center">
                  {!! $products->links() !!}
               </div>
            </div>
            @if(Session::has('message'))
               <p class ="message" style="position:absolute; top:10px; right:150px; color: #007bff;">{{ Session::get('message') }}</p>
            @endif
         </div>
      </div>
   </div>
</div>
</div>
</section>
@include('productsJs') 
@endsection
