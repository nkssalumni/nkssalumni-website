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
    <meta name="author" content="maxwellwachira67@gmail.com +254703519593">


    <!--icon-->
    <link rel="icon" href="assets/img/favicon/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/x-icon"/>

    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/91ae273ed7.js" crossorigin="anonymous"></script>

    <!-- Montserrat -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/3rdparties/bootstrap/css/bootstrap.css">

    <!--animate-->
    <link rel="stylesheet" type="text/css" href="assets/3rdparties/animate/animate.css">

     <!--International CODE-->
    <link rel="stylesheet" href="assets/3rdparties/build/css/intlTelInput.css">

    <!--custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>e-menu | sign up</title>
  </head>
  <body>
    <div class="horizontal-navbar">   
      <nav class="navbar navbar-expand-lg mb-0">
        <a class="navbar-brand" href="/"><img src="assets/img/logo.png" alt="logo"></a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars fa-lg"></i>
        </button>

        <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
          <ul class="nav navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/live">Restaurant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/all-courses">Catering</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/advanced-courses">Blog</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="/pro">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">Reviews</a>
            </li>
          </ul>
         <div class="navbar-nav flex-row mb-2">
            <input id="search" type="text" class="nav-form" placeholder="Search....">
              <div class="input-group-append">
                  <span class="input-group-text nav-form-search-icon"><i class="fa fa-search fa-lg"></i></span>
              </div>
        </div>
        </div>
        <div class="text-theme mr-2 font-weight-bold">
          ORDER NOW <br>+254703519593
        </div>
      </nav>
    </div>
    <div class="bg2 h-55">
     <div class="container">
          <div class = "row animated bounce" >
              <div class="none col-lg-3 col-md-3 col-sm-12 mt-5 mt-5"></div>
              <div class="col-lg-6 col-md-6 col-sm-12 card mt-5 shadow-lg p-3 bg-light mb-5" >
                   <form method="post" class="mt-3 ">
                    
                    <?php echo $message;?>
                  </form> 
              </div>
          </div>
      </div> 
    </div>
    
 
  <script src="assets/3rdparties/jquery/jquery.js"></script>
  <script src="assets/3rdparties/bootstrap/js/bootstrap.js"></script>

</html>