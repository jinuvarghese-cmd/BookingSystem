@extends('layouts.app')
@section('content')

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
          <div class="card-body p-5">

            <p class="lead fw-bold mb-5" style="color: #f37a27;">Order Details</p>

            <div class="row">
              <div class="col mb-3">
                <p class="small text-muted mb-1">Date</p>
                <p>{{$booking->date}}</p>
              </div>
              <div class="col mb-3">
                <p class="small text-muted mb-1">Order No.</p>
                <p>{{$booking->id}}</p>
              </div>
            </div>

            <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
              @php
                $products = $booking->product;
                $booking_products = $booking->booking_product;

                $product_nos = [];
              @endphp
              <!-- @foreach($booking_products as $booking_product)
                $product_nos[$booking_product->product_id] = $booking_product->no_of_products;
              @endforeach -->
              @foreach($products as $product)
                @php
                @endphp
              <div class="row">
                <div class="col-md-8 col-lg-9">
                  <p>{{$booking_products}}(*{{$product_nos[$product->id]}})</p>
                </div>
                <div class="col-md-4 col-lg-3">
                  <p>£299.99</p>
                </div>
              </div>
              @endforeach
            </div>

            <div class="row my-4">
              <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                <p class="lead fw-bold mb-0" style="color: #f37a27;">£262.99</p>
              </div>
            </div>

            <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

            <div class="row">
              <div class="col-lg-12">

                <div class="horizontal-timeline">

                  <ul class="list-inline items d-flex justify-content-between">
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                        class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                    </li>
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped</p
                        class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                    </li>
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">On the way
                      </p>
                    </li>
                    <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                      <p style="margin-right: -8px;">Delivered</p>
                    </li>
                  </ul>

                </div>

              </div>
            </div>

            <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please contact
                us</a></p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.footers.auth')
@endsection




