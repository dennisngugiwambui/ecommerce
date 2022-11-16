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
         <?php echo $__env->make('shop.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      </div>
      <!-- why section -->
      <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($orders->product_title); ?></td>
                <td><?php echo e($orders->quantity); ?></td>
                <td><?php echo e($orders->price); ?></td>
                <td><?php echo e($orders->delivery_status); ?></td>
                <td><?php echo e($orders->payment_status); ?></td>
                <td>
                    <img class="img_deg" src="<?php echo e(asset('product/'. $orders->image)); ?>" style="height: 100px; width: 100px;" alt="<?php echo e($orders->image); ?>">
                </td>
                <td>
                    <?php if($orders->delivery_status=='processing'): ?>
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo e($orders->id); ?>">
                         <i class="fa fa-warning"></i>
                         Cancel
                   </button>
                   <?php else: ?>
                   <p style="background: yellow;">Canceled</p>
                   <?php endif; ?>
                </td>
                <div class="modal fade" id="exampleModal_<?php echo e($orders->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="<?php echo e(route('cancel_orders',['id'=>$orders->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Removing <?php echo e($orders->product_title); ?> from your order</h5>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
        </table>
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
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      
   </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/shop/orders.blade.php ENDPATH**/ ?>