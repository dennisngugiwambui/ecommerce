<?php $__env->startSection('content'); ?>

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
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addProduct">
                        Add Product
                    </button>

                    <!-- Modal For adding Category -->
                    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addCategory" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body" style="background: maroon;">
                                <form action="<?php echo e(route('products')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-3 row">
                                        <label for="title" class="col-sm-2 col-form-label" style="color: white;">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control-plaintext" id="category" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="description" class="col-sm-2 col-form-label" style="color: white;">Desciption</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="description" class="form-control-plaintext" id="category" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="category" class="col-sm-2 col-form-label" style="color: white;">Category</label>
                                        <div class="col-sm-10">
                                            <select class="col-sm-12" name="category" style="color: black" id="" required>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option style="color: black;" value="<?php echo e($category->category_name); ?>"><?php echo e($category->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="quantity" class="col-sm-2 col-form-label" style="color: white;">Quantity</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="quantity" class="form-control-plaintext" id="category" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="price" class="col-sm-2 col-form-label" style="color: white;">Price</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="price" class="form-control-plaintext" id="price" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="discount" class="col-sm-2 col-form-label" style="color: white;">Discount</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="discount_price" class="form-control-plaintext" id="discount_price" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="image" class="col-sm-2 col-form-label" style="color: white;">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control-plaintext" id="image" required>
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
                    Products Table
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Quantity</th>
                                <th>category</th>
                                <th>image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                           <tr>
                            <th>#</th>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>category</th>
                            <th>image</th>
                            <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($products->id); ?></td>
                                <td><?php echo e($products->title); ?></td>
                                <td><?php echo e($products->description); ?></td>
                                <td><?php echo e($products->price); ?></td>
                                <td><?php echo e($products->discount_price); ?></td>
                                <td><?php echo e($products->quantity); ?></td>
                                <td><?php echo e($products->category); ?></td>
                                <td>
                                    <img style="height: 200px; width: 200px;" src="/product/<?php echo e($products->image); ?>" alt="<?php echo e($products->image); ?>">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editCategory_<?php echo e($products->id); ?>">
                                            <i class="fa fa-edit"></i>Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategory_<?php echo e($products->id); ?>"> <i class="fa fa-trash"></i> Del</button>

                                    </div>
                                </td>
                            </tr>
                                        
                                <div class="modal right fade" id="editCategory_<?php echo e($products->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Edit Product detail</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php echo e($category->id); ?>

                                        </div>
                                        <div class="modal-body" style="background: maroon;">
                                            <form action="<?php echo e(route('category.update', $products->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>

                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Title</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="title" value="<?php echo e($products->title); ?>" required class="form-control-plaintext" id="category" placeholder="enter category name">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="description" class="col-sm-2 col-form-label" style="color: white;">Desciption</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" value="<?php echo e($products->description); ?>" name="description" class="form-control-plaintext" id="category" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="category" class="col-sm-2 col-form-label" style="color: white;">Category</label>
                                                    <div class="col-sm-10">
                                                        <select class="col-sm-12" name="category" style="color: black" id="" required>
                                                            <option style="color: black;" value="<?php echo e($products->category); ?>"><?php echo e($products->category); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="quantity" class="col-sm-2 col-form-label" style="color: white;">Quantity</label>
                                                    <div class="col-sm-10">
                                                        <input type="number"  value="<?php echo e($products->quantity); ?>" name="quantity" class="form-control-plaintext" id="category" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="price" class="col-sm-2 col-form-label" style="color: white;">Price</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="price" value="<?php echo e($products->price); ?>" class="form-control-plaintext" id="price" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="discount" class="col-sm-2 col-form-label" style="color: white;">Discount</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" value="<?php echo e($products->discount_price); ?>" name="discount_price" class="form-control-plaintext" id="discount_price" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="image" class="col-sm-2 col-form-label" style="color: white;">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" value="<?php echo e($products->image); ?>" name="image" class="form-control-plaintext" id="image" required>
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

                                    
                                    <div class="modal right fade" id="deleteCategory_<?php echo e($products->id); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">delete Products</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?php echo e($products->id); ?>

                                            </div>
                                            <div class="modal-body" style="background: maroon;">
                                                <form action="<?php echo e(route('category.destroy',['id'=>$products->id])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>

                                                    <p style="background:chartreuse; color: black;"> Are you sure you want to delete this <?php echo e($products->title); ?> Product?</p>
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
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/admin/products.blade.php ENDPATH**/ ?>