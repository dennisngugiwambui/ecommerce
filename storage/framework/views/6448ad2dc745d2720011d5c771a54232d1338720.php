<?php $__env->startSection('content'); ?>

<main>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Active Orders</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">New Products</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">All products</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <p id="p1"></p>
                                    <script>
                                        var date = new Date();
                                        var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
                                        var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
                                        var date_time = current_date+" "+current_time;
                                        document.getElementById("p1").innerHTML = date_time;
                                    </script>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Welcome today</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                        <button type="button" style="background: chocolate;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                            Add Category
                        </button>

                        <!-- Modal For adding Category -->
                        <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategory" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Categories</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <div class="modal-body" style="background: maroon;">
                                    <form action="<?php echo e(route('category')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Category</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="category_name" class="form-control-plaintext" id="category">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i>Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product title</th>
                                    <th>Quantity</th>
                                    <th>Payment status</th>
                                    <th>Delivery status</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product title</th>
                                    <th>Quantity</th>
                                    <th>Delivery status</th>
                                    <th>Payment status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                   </tr>
                            </tfoot>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($orders->id); ?></td>
                                    <td><?php echo e($orders->name); ?></td>
                                    <td><?php echo e($orders->email); ?></td>
                                    <td><?php echo e($orders->address); ?></td>
                                    <td><?php echo e($orders->phone); ?></td>
                                    <td><?php echo e($orders->product_title); ?></td>
                                    <td><?php echo e($orders->quantity); ?></td>
                                    <td><?php echo e($orders->delivery_status); ?></td>
                                    <td><?php echo e($orders->payment_status); ?></td>
                                    <td> <img src="<?php echo e(asset('product/'.$orders->image)); ?>" alt=""> </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editCategory_<?php echo e($orders->id); ?>">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategory_<?php echo e($orders->id); ?>"> <i class="fa fa-trash"></i> Del</button>

                                        </div>
                                    </td>
                                </tr>
                                            
                                    <div class="modal right fade" id="editCategory_<?php echo e($orders->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit Order</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?php echo e($orders->id); ?>

                                            </div>
                                            <div class="modal-body" style="background: maroon;">
                                                <form action="<?php echo e(route('category.update', $orders->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="mb-3 row">
                                                        <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Category</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="category_name" value="<?php echo e($orders->name); ?>" class="form-control-plaintext" id="category" placeholder="enter category name">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i>Close</button>
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                        
                                        <div class="modal right fade" id="deleteCategory_<?php echo e($orders->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="staticBackdropLabel">delete Category</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <?php echo e($orders->id); ?>

                                                </div>
                                                <div class="modal-body" style="background: maroon;">
                                                    <form action="<?php echo e(route('category.destroy',['id'=>$orders->id])); ?>" method="post">
                                                        <?php echo csrf_field(); ?>


                                                        <p style="background:chartreuse; color: black;"> Are you sure you want to delete this <?php echo e($orders->product_title); ?> category?</p>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i>Close</button>
                                                                <button type="submit" class="btn btn-danger" >Delete Product</button>
                                                            </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <input type="number" name="" id="">
            </div>
        </main>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/admin/orders.blade.php ENDPATH**/ ?>