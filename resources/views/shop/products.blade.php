<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<section class="product_section layout_padding">
    @include('sweetalert::alert')
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div>
        <form action="">
            @csrf
            <div class="input-group rounded" style="margin-left: 20%; margin-right:20%; width: 300px;">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
               <button type="submit" href="">
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fa fa-search"></i>
                  </span>
               </button>
              </div>
        </form>
      </div>
       <div class="row">
        @foreach ($products as $products)
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                    <a href="{{ route('product_details', $products->id) }}" type="button" class="option1">
                        Product Details
                    </a>
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
               <div class="img-box">
                  <img src="product/{{ $products->image }}" alt="{{ $products->description }}">
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
               </div>
            </div>
        </div>
        @endforeach

        {{-- {{!!$products->withQueryString()->links('pagination::bootstrap-4') !!}} --}}
       </div>
    </div>
 </section>
