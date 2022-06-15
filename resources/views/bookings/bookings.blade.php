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
                    <th scope="col">DATE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">VIEW</th>
                  </tr>
                </thead>
                <tbody class="list">
                <tr>
                    <td></td>
                    <td id="date"></td>
                    <td id="status"></td>
                  </tr>
                  @php
                    $slNo = ($bookings->perPage() * ($bookings->currentPage() - 1));
                  @endphp
                  @foreach($bookings as $booking)
                    @php
                      $slNo++;
                    @endphp
                  <tr>
                    <td class="id"  class="id">
                        <p>{{$slNo}}</p>
                    </td>
                    <td class="date">
                        <p>{{$booking->date}}</p>
                    </td>
                    <td class="status">
                        <p>{{$booking->status}}</p>
                    </td>
                    <td>
                    <button type="button"  class="btn btn-success btn-xs" onclick="window.location='{{  url('booking/'.$booking->id)}}'">View</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center links-for-pagination">
                {!! $bookings->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    @include('layouts.footers.auth')
@endsection




