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

       
    <title>BeyondFiat | Dashboard</title>
    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/91ae273ed7.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/3rdparties/bootstrap/css/bootstrap.min.css" />
    <!--Data table -->
    <link rel="stylesheet" href="../assets/3rdparties/datatables/jquery.dataTables.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/3rdparties/animate/animate.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    
  </head>
  <body>

      <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper" class="bg-primary border-right border-dark">
        <div class="text-center"><img src="../assets/3rdparties/img/logo2.png" class="dash-brand"></div>
        <div class="list-group list-group-flush">
          <a href="/admin-dashboard" class="list-group-item list-group-item-action bg-primary">Dashboard</a>
          <a href="/registered-students" class="list-group-item list-group-item-action bg-primary">Students</a>
          <a href="/revenue" class="list-group-item list-group-item-action bg-primary">Revenue</a>
          <a href="/live-class" class="list-group-item list-group-item-action bg-primary">Live Class</a>
          <a href="#" class="list-group-item list-group-item-action bg-primary">Message</a>
          <a href="/upload-files" class="list-group-item list-group-item-action bg-primary">Uploads</a>
          <!--<a href="#" class="list-group-item list-group-item-action bg-primary">Account Settings</a>-->
          <a class="list-group"></a>
           <li class="list-group"></li>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-dark">
        <button class="btn btn-outline-warning" id="menu-toggle"><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div style="padding-left: 5px;">Dashboard<i class="fa fa-tachometer" style="padding-left: 5px;"></i></div>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/logout">logout</a>
                <div class="dropdown-divider"></div>
                <!--<a class="dropdown-item" href="#">Password Reset</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Settings</a>-->
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container mt-5">
        <div class="row animated bounce ">
          <div class="col-lg-1 col-md-1 col-sm-12"></div>
          <div class="col-lg-9 col-md-9 col-sm-12 d-flex justify-content-center" style="box-shadow: 0px 0px 8px  #0C0C0C;margin:5px;">
             <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link" href="/upload-files">Upload Recording</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="/upload-notes">Upload Notes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin-uploaded-recordings">Uploaded Recordings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="/admin-uploaded-notes">Uploaded Notes</a>
                  </li>
                </ul>
          </div>
        </div>
      </div>
          <!-- put rows here -->
        <div class="container">
          <div class="row  " id="search_container" style="display: none;">
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
          <div class="row d-flex justify-content-center mt-5">
            <div class="col-sm-6 col-md-3 col-lg-3">
              <button class="btn btn-outline-primary btn-sm bg-primary" id="data_view_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-table"></i> Table view</button>
              <div id="data_view_ip" style="display:none ;">card</div>
            </div> 
            <br><br>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <button class="btn btn-outline-primary btn-sm bg-primary" id="search_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-search"></i> </button>
            </div>
          </div>
        <div class = "row animated bounce" id="data_container" >
  
        </div>
        </div>
    </div>
</div>



   <!-- JQUERY -->
  <script src="../assets/3rdparties/jquery/jquery.js"></script>
  <!-- Bootstrap JS -->
  <script src="../assets/3rdparties/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/dataTables.buttons.min.js"></script>
  <script type="text/javascript">

    $( document ).ready(function() {
            $('#search_btn').click(function(){
              $("#search_container").slideToggle("fast");
              return false;
            });

            // main crud
             read(); 

        // search
           $('#search').on('keyup', function(){
              read();
              // console.log("data");
            });
        });
    
    function read(){
      var search = $('#search').val();
      var data_view = $('#data_view_ip').text();
      $.get(
        "/api-notes-read",
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
      console.log('view changed');
      return false;
    });

    // delete
  function deleteDetails(id){
    var conf = confirm("Do you really want to delete this notes?");
      if (conf == true) {
          $.post("/api-notes-delete", {
                  id: id
              },
              function (data, status) {
                  // reload Users by using readRecords();
                  read();
                  $('#op').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i>Record Deleted</div>');
                  setInterval(function(){
            $('#op').html('');
          }, 5000);
              }
          );
      }
}

  </script>
  </body>
</html>