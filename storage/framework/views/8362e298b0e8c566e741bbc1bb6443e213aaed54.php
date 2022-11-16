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
      <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="">
      <title>Meshop - Ecommerce Site</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.css')); ?>" />
      <!-- font awesome style -->
      <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />
      <!-- responsive style -->
      <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <?php echo $__env->make('shop.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- end header section -->
         <!-- slider section -->
      <!-- end why section -->

      <!-- arrival section -->

      <!-- product section -->
      <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding: 30px; width: 50%;">
                   <div class="img-box">
                    <img src="<?php echo e(asset('product/'. $products->image)); ?>" alt="<?php echo e($products->description); ?>" style="height: 300px; width: 300px" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo e($products->id); ?>">
                   </div>
                   <div class="detail-box">
                      <h5>
                        <?php echo e($products->title); ?>

                      </h5>

                     <?php if($products->discount_price!=null): ?>
                     <h6 style="color: red;">
                        $.<?php echo e($products->discount_price); ?>

                      </h6>

                      <h6 style="text-decoration:line-through; color:blue;">
                         $.<?php echo e($products->price); ?>

                      </h6>

                      <?php else: ?>
                      <h6>
                        $.<?php echo e($products->price); ?>

                      </h6>
                      <?php endif; ?>
                      <h6>Product Category:<?php echo e($products->category); ?></h6>
                      <h6>Description:<?php echo e($products->description); ?></h6>
                      <h6>Available quantity: <?php echo e($products->quantity); ?></h6>
                   </div>
                   <form action="<?php echo e(route('add_cart', $products->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>


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
                  <div class="modal fade" id="exampleModal_<?php echo e($products->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" style="height: 500px; width: 500px;">
                        <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleLabel"><?php echo e($products->title); ?></h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body" style="color: beige; background:coral;">
                           <img src="<?php echo e(asset('product/'. $products->image)); ?>"  style="height: 300px; width: 300px;"  alt="">
                              <h1><?php echo e($products->description); ?></h1>
                              <h1>We are selling this product at a very cheaper price of <b>Ksh. <?php echo e($products->discount_price); ?>.00</b></h1>
                              <h6 style="background:peru; color: black;">Enjoy free shippng where we will deliver the product to your door steps.</h6>
                        </div>
                     </div>
                  </div>

            
           </div>
        </div>
     </section>

      <!-- client section -->
      <!-- end client section -->
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
   </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/shop/product_details.blade.php ENDPATH**/ ?>