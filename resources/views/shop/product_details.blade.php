<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="">
      <title>Meshop - Ecommerce Site</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('shop.header')
         <!-- end header section -->
         <!-- slider section -->
      <!-- end why section -->

      <!-- arrival section -->

      <!-- product section -->
      @include('sweetalert::alert')
            <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding: 30px; width: 50%;">
                   <div class="img-box">
                    <img src="{{ asset('product/'. $products->image) }}" alt="{{ $products->description }}" style="height: 300px; width: 300px" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $products->id }}">
                   </div>
                   <div class="detail-box">
                      <h5>
                        {{ $products->title }}
                      </h5>

                     @if ($products->discount_price!=null)
                     <h6 style="color: red;">
                        $.{{ $products->discount_price }}
                      </h6>

                      <h6 style="text-decoration:line-through; color:blue;">
                         $.{{ $products->price }}
                      </h6>

                      @else
                      <h6>
                        $.{{ $products->price }}
                      </h6>
                      @endif
                      <h6>Product Category:{{ $products->category }}</h6>
                      <h6>Description:{{ $products->description }}</h6>
                      <h6>Available quantity: {{ $products->quantity }}</h6>
                   </div>
                   <form action="{{ route('add_cart', $products->id) }}" method="POST">
                    @csrf


                    <div class="row">

                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" width="100px;">
                        </div>

                       <div class="col-md-4">
                        <input type="submit" name="" value="Add to cart" class="option2">
                       </div>
                    </div>
                </form>
                  </div>

               </div>
            </div>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_{{ $products->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" style="height: 500px; width: 500px;">
                        <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleLabel">{{ $products->title }}</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body" style="color: beige; background:coral;">
                           <img src="{{ asset('product/'. $products->image) }}"  style="height: 300px; width: 300px;"  alt="">
                              <h1>{{ $products->description }}</h1>
                              <h1>We are selling this product at a very cheaper price of <b>Ksh. {{ $products->discount_price }}.00</b></h1>
                              <h6 style="background:peru; color: black;">Enjoy free shippng where we will deliver the product to your door steps.</h6>
                        </div>
                     </div>
                  </div>

            {{-- {{!!$products->withQueryString()->links('pagination::bootstrap-4') !!}} --}}
           </div>
        </div>
     </section>

      <!-- client section -->
      <!-- end client section -->
      <!-- footer start -->
     @include('shop.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="/">Full stack experts</a><br>

            Distributed By <a href="">Terry</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{ asset('js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
   </body>
</html>
