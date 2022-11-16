<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<header class="header_section nav-link">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/"><img width="250" src="{{ asset('images/logo.png')}}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="/"> <i class="fa fa-home"></i> Home <span class="sr-only"> (current)</span></a>
                </li>
               {{-- <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="/about">About</a></li>
                      <li><a href="/testimonial">Testimonial</a></li>
                   </ul>
                </li> --}}
                <li class="nav-item">
                   <a class="nav-link" href="/contact"> <i class="fa fa-phone"></i> contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show_orders') }}"> <i class="fa fa-bitcoin"></i> Orders</a>
                 </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('cart') }}" class="icon-shopping-cart"> <i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-success">{{ $carts }}</a>
                </li>
                @if (Route::has('login'))

                @auth
                <li class="nav-item">
                   <x-app-layout>
                   </x-app-layout>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="{{ route('login') }}"> <i class="fa fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" href="{{ route('register') }}"> <i class="fa fa-user-md"></i> Register</a>
                    </li>
                @endauth

                @endif
                 <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form>

             </ul>
          </div>
       </nav>
    </div>
 </header>
