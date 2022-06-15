@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
            </div>
            <!-- Light table -->
            <tr>
              <div id="message"></div>
            </tr>

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>
                    <td></td>
                    <td contenteditable id="name"></td>
                    <td contenteditable id="description"></td>
                    <td contenteditable id="price"></td>
                    <td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td>
                  </tr>
                  @php
                    $slNo = ($products->perPage() * ($products->currentPage() - 1));
                  @endphp
                  @foreach($products as $product)
                    @php
                      $slNo++;
                    @endphp
                  <tr>
                    <td class="id"  class="id">
                        <p>{{$slNo}}</p>
                    </td>
                    <td contenteditable class="name">
                        <p>{{$product->name}}</p>
                    </td>
                    <td contenteditable class="description">
                        <p>{{$product->description}}</p>
                    </td>
                    <td contenteditable class="price">
                        <p>${{$product->price}}</p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs update" id="{{$product->id}}">Update</button>
                        <button type="button" class="btn btn-danger btn-xs delete" id="{{$product->id}}">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center links-for-pagination">
                {!! $products->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    @include('layouts.footers.auth')
    @include('products.productsJs') 
@endsection




