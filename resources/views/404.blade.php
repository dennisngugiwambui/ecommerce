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
      <title>Denno - Ecommerce Site</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
      <style>
        @charset "UTF-8";
/* CSS Document */

body {
    background: #fff;
    padding: 0;
    margin: 0;
    font-family: Helvetica, Arial, sans-serif;
}

.container {
    background-color: #fff;
    margin: 0 auto;
    text-align: center;
    padding-top: 50px;
}

h3 {
    font-size: 16px;
    color: #3498db;
    font-weight: bold;
    text-align: center;
    line-height: 130%;
}

.buton {
    background: #3498db;
    padding: 10px 20px;
    color: #fff;
    font-weight: bold;
    text-align: center;
    border-radius: 3px;
    text-decoration: none;
}

a:hover {
    color: #ff0;
}

span {
    font-size: 14px;
    color: #FFF;
    font-weight: normal;
    text-align: center;
}

span a {
    color: #FF0;
    text-decoration: none;
}

span a:hover {
    color: #F00;
}

@media screen and (max-width: 500px) {
    img {
        width: 70%;
    }
    .container {
        padding: 70px 10px 10px 10px;
    }
    h3 {
        font-size: 14px;
    }
}
      </style>
   </head>
   <body>
      <div class="">
         <!-- header section strats -->
         @include('shop.header')
         <!-- end header section -->
      </div>
      <div>
        <div class="container">
            <img class="ops" style="height: 300px; width:300px; align-items:center;" src="{{ asset('./images/404error.png') }}" />
            <br />
            <h3>404 ERROR</h3>
            <br />
            <p style="font-size: 25px;">seems like the page you are trying to access does not exist. click  <a class="btn btn-danger" value="here" href="{{ url('/') }}">HERE</a> to go back home</p>
        </div>
      </div>
      <!-- footer start -->
     @include('shop.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="/">Full stack experts</a><br>

            Distributed By <a href="">Denno</a>

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
   </body>
</html>
