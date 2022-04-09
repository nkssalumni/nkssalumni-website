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

       
    <title>NKSSA |  Dashboard</title>
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
      <nav id="sidebar" class="card ">
        <div class="text-pink sidebar-header d-flex justify-content-center mt-3">
         <a href = "/dashboard"><img src = "../assets/images/logo.png" width="20" class="img-set"/></a>
        </div>

        <ul class="list-unstyled components">
          <li class="active">
            <a href="/admin-dashboard">Dashboard</a>
          </li>
          <li>
            <a href="/payments">Registration Fee</a>
          </li>
          <li>
            <a href="#">Subscribe</a>
          </li>
          <li>
            <a href="#">Profile</a>
          </li>
          <li>
            <a href="#">Jobs</a>
          </li>
          <li>
            <a href="#">Network</a>
          </li>
        </ul>
      </nav>

    <!-- Page Content Holder -->
    <div id="content">
      <nav class="navbar shadow-lg p-3 mb-5 bg-white rounded">
        <button class="text-pink bg-transparent" id="menu-toggle"><i class="fas fa-times fa-lg"></i></button>
        <div>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item text-black"> <a class="nav-link"  href="/logout">Logout</a> </li>
            <!-- <li class="nav-item dropdown">
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
            </li> -->
          </ul>
        </div>
      </nav>
      <main> 
        <div class="container">
                <p>Welcome <?php echo $_SESSION["name"];?></p>
                <p>Click <a href = "/payments">this link</a> to pay your registration fee</p>  
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