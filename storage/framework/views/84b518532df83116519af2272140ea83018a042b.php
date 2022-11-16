<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Meshop</title>
</head>
<body>
    <form action="<?php echo e(route('send_user_mail', $orders->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Greetings</label>
            <div class="col-sm-10">
              <input type="text" name="greeting" class="form-control-plaintext" id="staticEmail" value="Hello <?php echo e($orders->name); ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">First Line</label>
            <div class="col-sm-10">
              <input type="text" name="firstline" class="form-control" id="firstline">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-10">
              <input type="text" name="body" class="form-control" id="firstline">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Button</label>
            <div class="col-sm-10">
              <input type="text" name="button" class="form-control" id="firstline">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
              <input type="text" name="url" class="form-control" id="firstline">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">last Line</label>
            <div class="col-sm-10">
              <input type="text" name="lastline" class="form-control" id="firstline">
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
            <a type="submit" class="btn btn-danger" >Send Mail</a>
          </div>
        </div>
    </form>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel1\Meshop\resources\views/admin/email_info.blade.php ENDPATH**/ ?>