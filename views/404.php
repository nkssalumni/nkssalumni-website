<!DOCTYPE html>
<html lang="en">
  <head>
    
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Site Metas --> 
    <meta name="description" content="">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!--icon-->
    <link rel="icon" href="assets/img/favicon/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/x-icon"/>

    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/91ae273ed7.js" crossorigin="anonymous"></script>

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/3rdparties/bootstrap/css/bootstrap.css">

    <!--animate-->
    <link rel="stylesheet" type="text/css" href="assets/3rdparties/animate/animate.css">

    <!--International CODE-->
    <link rel="stylesheet" href="assets/3rdparties/build/css/intlTelInput.css">

    <!--custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>NKSSAA</title>
  </head>
</head>

<!--Body and Background Image -->
<body style="background-image: url(assets/images/backa.jpg);">
<!--navigation panel -->
  <section>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark navbar-right ">
      <div class="container"> 
        <a class="navbar-brand" href="/"><img src="assets/images/logo.png" width="20" class="img-set"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> </button> 
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav ml-auto text-light"> 
            <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/">Home</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/about">About Us</a> </li> 
            <li class="nav-item"> <a class="nav-link" href="/contact-us">Contact Us</a> </li> 
            <li class="nav-item"> <a class="nav-link" href="/our-activities">Our Activities</a> </li>
          </ul>
          <ul class="navbar-nav">
            <div>
              <button class="btn btn-md text-light" style="background-color:#00BFFF;" type="button" data-toggle="modal" data-target="#regModal"  > Register </button>
              <button class="btn btn-md text-light"  style="background-color:#00BFFF;" type="button"  data-toggle="modal" data-target="#loginModal">Login </button>
            </div>
          </ul>
        </div> 
      </div>
    </nav>
  </section>
    <div class="bg-light-pink h-100">
      <div class=" container p-5">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
           
            <h1 class="text-center font-weight-bolder"><i>404 </i><span class="smaller"><i class="font-weight-normal"> That's an error</i></span></h1>
          </div> 
        </div> 
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-5">
            <h5 class="text-center">The Requested URL <span class="text-pink"><?php echo $url; ?></span>  was not found on this server</h5><br>
            <h5  class="text-center">That's all we know</h5>
          
          </div> 
        </div> 
      </div>    
    </div>   
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>

</html>