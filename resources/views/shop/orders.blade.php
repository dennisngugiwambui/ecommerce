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
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Meshop - Ecommerce Site</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
      <style>
        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          padding: 30px;
        }
        table, th, td{
          border: 1px solid grey;
        }
        .th_dg{
          font-size: 25px;
          padding: 5px;
          background: salmon;
        }
        .img_deg{
            height: 50px;
            width: 50px;
        }
        .total_deg{
            font-size: 20px;
            padding: 40px;
        }
        .end{
            padding: 10px;
            margin: 10px;
        }
      </style>
   </head>
   <body>
      <div class="">
         <!-- header section strats -->
         @include('shop.header')

      </div>
      <!-- why section -->
      @include('sweetalert::alert')
      <div class="center">
        <table>
          <thead>
            <tr class="end">
                <th class="th_dg">Product TitleImage</th>
                <th class="th_dg">Quantity</th>
              <th class="th_dg">Price</th>
              <th class="th_dg">Delivery Status</th>
              <th class="th_dg">Payment status</th>
              <th class="th_dg">Image</th>
              <th class="th_dg">Cancel order</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $orders)
            <tr>
                <td>{{ $orders->product_title }}</td>
                <td>{{ $orders->quantity }}</td>
                <td>{{ $orders->price }}</td>
                <td>{{ $orders->delivery_status }}</td>
                <td>{{ $orders->payment_status }}</td>
                <td>
                    <img class="img_deg" src="{{ asset('product/'. $orders->image) }}" style="height: 100px; width: 100px;" alt="{{ $orders->image }}">
                </td>
                <td>
                    @if($orders->delivery_status=='processing')
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $orders->id }}">
                         <i class="fa fa-warning"></i>
                         Cancel
                   </button>
                   @else
                   <p style="background: yellow;">Canceled</p>
                   @endif
                </td>
                <div class="modal fade" id="exampleModal_{{ $orders->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="{{ route('cancel_orders',['id'=>$orders->id]) }}" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Removing {{ $orders->product_title }} from your order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body" style="color: black;">
                            <p class="bg-warning">Are you sure you want to Cancel this order?.<br> Make sure you ask for a refund before clicking the button since the order will be marked refunded. This decision is irreversible</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info" style="background: burlywood" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Cancel the order">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </tr>
            @endforeach
            {{-- <td>
                <img class="img_deg" src="{{ asset('product/'. $cart->image) }}" alt="">
            </td>
            <td>{{ $cart->product_title }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>Ksh{{ $cart->price }}</td>
            <td>
                <!-- Button trigger modal -->
                <button class="btn btn-danger"  class="text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-trash fa-lg"></i>
                </button>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content" style="background: burlywood; color: white;">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Removing {{ $cart->product_title }} from cart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body" style="color: black;">
                            <p>Are you sure you want to delete this cart?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info" style="background: burlywood" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('remove_cart',$cart->id) }}" class="btn btn-primary">Remove Cart</a>
                            </div>
                        </div>
                        </div>
                    </div>
            </td>
          </tr>
           @endforeach --}}
        </tbody>
        </table>
      </div>
      <!-- footer start -->
     @include('shop.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="/">Full stack experts</a><br>

            Distributed By <a href="">Terry</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> --}}
   </body>
</html>
