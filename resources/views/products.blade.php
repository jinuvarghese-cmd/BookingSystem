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
                    @foreach($columns as $column)
                    <th scope="col">{{$column}}</th>
                    @endforeach
                    <th scope="col">Action</th>
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
                  @foreach($products as $product)
                  <tr>
                    @foreach($product as $type => $value)
                      @php
                       ($type == 'id') ? $editable = '' :  $editable = 'contenteditable';
                       ($type == 'price') ? $value = '$' . $value :  $value = $value;
                      @endphp
                      <td {{$editable}} class= {{$type}}>
                        <p>{{$value}}</p>
                      </td>
                    @endforeach
                    <td>
                        <button type="button" class="btn btn-danger btn-xs update">Update</button>
                        <button type="button" class="btn btn-danger btn-xs update">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    @include('layouts.footers.auth')
    @include('productsJs') 
@endsection




