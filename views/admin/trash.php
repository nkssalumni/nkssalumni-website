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

       
    <title>e-menu | Admin Dashboard</title>
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
          e-menu
        </div>

        <ul class="list-unstyled components">
          <li >
            <a href="/admin-dashboard">Dashboard</a>
          </li>
          <li>
            <a href="/devices">Devices</a>
          </li>
          <li class="active">
            <a href="/trash">Trash</a>
          </li>
        </ul>
      </nav>

    <!-- Page Content Holder -->
    <div id="content">
      <nav class="navbar bg-black">
        <button class="text-pink bg-transparent" id="menu-toggle"><i class="fas fa-times fa-lg"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="text-pink"><i class="fas fa-bars"></i></span>
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
        <!-- put rows here -->
        <div class="container">
          <div class="row mt-3" id="search_container" style="display: none;">
            <div class="input-group mb-3" style="box-shadow: 0px 0px 8px #0C0C0C;margin:5px; ">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
              </div>
              <input id="search" type="text" class="form-control" placeholder="search............." aria-label="search" aria-describedby="basic-addon1">
            </div>
          </div>

          <!-- op -->
          <div id="op"></div> 

          <!-- button s -->
          <div class="row mt-3 d-flex justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <button class="btn btn-outline-pink btn-sm" id="data_view_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-table"></i> Table view</button>
              <div id="data_view_ip" style="display:none ;">card</div>
            </div> 
            <br><br>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <button class="btn btn-outline-pink btn-sm" id="search_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-search"></i> </button>
            </div>
            
          </div>
          <div class="row" id="data_container"></div>
         </div>
       </main>
     </div>
   </div>
 </body>
 </html>
 <script src="../assets/3rdparties/jquery/jquery.js"></script>
 <script src="../assets/3rdparties/bootstrap/js/bootstrap.js"></script>
 <script type="text/javascript">
   $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

   
   function read(){
      var search = $('#search').val();
      var data_view = $('#data_view_ip').text();
      $.get(
        "/api-meals-read-trash",
        {
          search:search,
          data_view:data_view
        },
        function (data, status) {
          console.log(data);
              $("#data_container").html(data);
          }
        );
    } 

    function restore(id){
      var conf = confirm("Do you really want to restore this device?");
        if (conf == true) {
            $.post("/api-meals-restore", {
                    id: id
                },
                function (data, status) {
                    // reload Users by using readRecords();
                    read();
                    $('#op').html('<div class="mt-3 alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i>Record Deleted</div>');
                    setInterval(function(){
              $('#op').html('');
            }, 5000);
                }
            );
        }
    }

    // table view / card view
  $('#data_view_btn').click(function(){
    var data_view = $('#data_view_ip').text();
    
    if (data_view == 'table') {
      $('#data_view_ip').text("card");
      $('#data_view_btn').html('<i class="fa fa-table"></i> Table View');
    } else if (data_view == 'card') {
      $('#data_view_ip').text("table");
      $('#data_view_btn').html('<i class="fa fa-id-card"></i> Card View');
    }
    read();
    //console.log('view changed');
    return false;
  });


    $(document).ready(function (){
      read();

      $('#search').on('keyup', function(){
        read();
        // console.log("data");
      });

      $('#search_btn').click(function(){
        $("#search_container").slideToggle("fast");
        return false;
      });
    });
 </script>
