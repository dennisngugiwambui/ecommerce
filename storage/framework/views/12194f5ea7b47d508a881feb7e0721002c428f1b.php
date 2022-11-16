<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<header class="header_section nav-link">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/"><img width="250" src="<?php echo e(asset('images/logo.png')); ?>" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="/"> <i class="fa fa-home"></i> Home <span class="sr-only"> (current)</span></a>
                </li>
               
                <li class="nav-item">
                   <a class="nav-link" href="/contact"> <i class="fa fa-phone"></i> contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('show_orders')); ?>"> <i class="fa fa-bitcoin"></i> Orders</a>
                 </li>
                <li class="nav-item">
                   <a class="nav-link" href="<?php echo e(route('cart')); ?>" class="icon-shopping-cart"> <i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-success"><?php echo e($carts); ?></a>
                </li>
                <?php if(Route::has('login')): ?>

                <?php if(auth()->guard()->check()): ?>
                <li class="nav-item">
                   <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="<?php echo e(route('login')); ?>"> <i class="fa fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info" href="<?php echo e(route('register')); ?>"> <i class="fa fa-user-md"></i> Register</a>
                    </li>
                <?php endif; ?>

                <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/shop/header.blade.php ENDPATH**/ ?>