<!DOCTYPE html>
<html>
  <head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <!--<link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" /> -->

       
    <title>Gamai Tech |  Dashboard</title>
    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/91ae273ed7.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/3rdparties/bootstrap/css/bootstrap.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/3rdparties/animate/animate.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    
  </head>
  <body>

    <div class="d-flex" id="wrapper">
    <!-- Sidebar Holder -->
      <nav id="sidebar" class="card bg-black">
        <div class="text-pink sidebar-header d-flex justify-content-center mt-3">
          Gamai Tech
        </div>

        <ul class="list-unstyled components">
          <li class="active">
            <a href="/admin-dashboard">Dashboard</a>
          </li>
          <li>
            <a href="/devices">Devices</a>
          </li>
          <li>
            <a href="/trash">Trash</a>
          </li>
        </ul>
      </nav>

    <!-- Page Content Holder -->
    <div id="content">
      <nav class="navbar bg-black">
        <button class="text-pink bg-transparent" id="menu-toggle"><i class="fas fa-times fa-lg"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/logout">logout</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Password Reset</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Settings</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <main> 
        <div class="container">
          <div class="row mt-3 mb-3">
                <h5 >Welcome Admin</h5>
          </div>
          <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total</h5>
                  <h6 class="card-subtitle mb-2 ">7 devices</h6>
                </div>
              </div>
          </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
              <div class="card bg-info">
                <div class="card-body">
                  <h5 class="card-title">Single channel smart power supply</h5>
                  <h6 class="card-subtitle mb-2">2 devices</h6>
                </div>
              </div>
          </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
              <div class="card bg-warning">
                <div class="card-body">
                  <h5 class="card-title">6 channel smart power supply</h5>
                  <h6 class="card-subtitle mb-2">3 devices</h6>
                </div>
              </div>
          </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
              <div class="card bg-dark">
                <div class="card-body">
                  <h5 class="card-title text-white">Sensors</h5>
                  <h6 class="card-subtitle mb-2 text-white">2 devices</h6>
                </div>
              </div>
          </div>
           <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
              <div class="card bg-secondary">
                <div class="card-body">
                  <h5 class="card-title">Trash</h5>
                  <h6 class="card-subtitle mb-2 text-white">0 devices</h6>
                </div>
              </div>
          </div>
        </div>
      </main>
      </div>
      </div>

        

  <script src="../assets/3rdparties/jquery/jquery.js"></script>
  <script src="../assets/3rdparties/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

  <script type="text/javascript" src = "../assets/js/meals.js"></script>
     
  <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
  </script>
  
  </body>
</html>