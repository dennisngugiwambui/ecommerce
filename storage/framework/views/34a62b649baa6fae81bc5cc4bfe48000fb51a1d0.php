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
      <link rel="shortcut icon" href="images/favicon.png" type="">
          <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
      <title>Meshop- Ecommerce Site</title>
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
          font-size: 30px;
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
      <div class="hero_area">
         <!-- header section strats -->
         <?php echo $__env->make('shop.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- end header section -->
      <!-- why section -->
      <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- cart section -->

      <div class="center">
        <table>
          <thead>
            <tr class="end">
                <th class="th_dg">Image</th>
                <th class="th_dg">Title</th>
              <th class="th_dg">Quantity</th>
              <th class="th_dg">Price</th>
              <th class="th_dg">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $totalprice=0; ?>
           <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td>
                <img class="img_deg" src="<?php echo e(asset('product/'. $cart->image)); ?>" alt="">
            </td>
            <td><?php echo e($cart->product_title); ?></td>
            <td><?php echo e($cart->quantity); ?></td>
            <td>$<?php echo e($cart->price); ?></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Removing <?php echo e($cart->product_title); ?> from cart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body" style="color: black;">
                            <p>Are you sure you want to delete this cart?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-info" style="background: burlywood" data-bs-dismiss="modal">Close</button>
                            <a href="<?php echo e(route('remove_cart',$cart->id)); ?>" class="btn btn-primary">Remove Cart</a>
                            </div>
                        </div>
                        </div>
                    </div>
            </td>
          </tr>
          <?php $totalprice=$totalprice+$cart->price ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <div class="total_deg">
           TOTAL: <?php echo e($totalprice); ?>

        </div>

        <div>
            <button class="btn btn-primary btn-block"> <a href="<?php echo e(route('cashPay')); ?>"> <i class="fa fa-money"></i> Pay Now</a></button>
        </div>
        <div>
            <button class="btn btn-secondary btn-block"> <a href="<?php echo e(route('stripe', $totalprice)); ?>"><i class="fa fa-cart-plus"></i> Pay using card</a></button>
        </div>
      </div>
      <!-- footer start -->
     <?php echo $__env->make('shop.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="/">Full stack experts</a><br>

            Distributed By <a href="">Terry</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
      <!-- popper js -->
      <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
      <!-- bootstrap js -->
      <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
      <!-- custom js -->
      <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
   </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/shop/cart.blade.php ENDPATH**/ ?>