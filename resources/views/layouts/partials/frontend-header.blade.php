<header>
   <!-- header inner -->
   <div class="header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.html"><img src="{{ asset('frontend') }}/images/logo.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/products')}}">Products</a>
                        </li>
                        @php
                           if (!Auth::check()) {
                        @endphp
                        <li class="nav-item d_none">
                           <a class="nav-link" href="{{url('/login')}}">Login</a>
                        </li>
                        @php
                           }else{
                        @endphp    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                        </form>
                        <li class="nav-item d_none">
                           <a class="nav-link" href="{{ route('logout') }} " onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        @php
                           }
                        @endphp
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>