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

       
    <title>Gamai Tech | Admin Dashboard</title>
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
          <li>
            <a href="/admin-dashboard">Dashboard</a>
          </li>
          <li class="active">
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
            <div class="col-sm-6 col-md-3 col-lg-3">
              <button class="btn btn-outline-pink btn-sm" id="add_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-plus"></i> </button>
            </div>
            <br><br>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <button class="btn btn-outline-pink btn-sm" id="reports_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-bar-chart"></i> </button>
            </div>
            <br><br>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <button class="btn btn-outline-pink btn-sm" id="data_view_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-table"></i> Table view</button>
              <div id="data_view_ip" style="display:none ;">card</div>
            </div> 
            <br><br>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <button class="btn btn-outline-pink btn-sm" id="search_btn" style="box-shadow: 0px 0px 8px #0C0C0C;"><i class="fa fa-search"></i> </button>
            </div>
            
          </div>
          <div class="row" id="data_container"></div>
          <!-- Modal --> 
          <!-- add modal -->
          <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="add_modalLabel">
                      New Device
                </h5>
                  <button id="close_add_modal" type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="add_op"></div>
                  <form enctype="multipart/form-data" method="post">
                  <!-- serial no -->
                  <!-- <i class="fa fa-user"></i> --> Title
                  <div class="input-group mb-3">
                    <input id="add_title" type="text" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>

                   <!-- <i class="fa fa-user"></i> --> 
                  <div class="input-group mb-3" hidden="true">
                    <input id="add_price" type="number" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>

                  <!-- Name -->
                  <!-- <i class="fa fa-user"></i> -->  Image
                  <div class="input-group mb-3">
                    <input id="file" type="file" name="file" class="form-control-modal" placeholder="f0c6" aria-label="" aria-describedby="">
                  </div>
                          Description
                   <div class="input-group mb-3">
                    <input id="add_description" type="text" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>

                  <!-- <i class="fa fa-tags"></i> --> Category
                  <div class="input-group mb-3 mt-3">
                    <select class="select form-control-modal" id="add_category">
                      <!-- <option selected></option> -->
                     
                      <option  value="0">6 channel power supply</option>
                      <option  value="1">Single channel power supply</option>
                      <option  value="2">Sensors</option>
                      <option  value="3">Smart water pump</option>
                      
                    </select>
                  </div>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="add_submit" ><i class="fa fa-check"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!-- edit modal -->
          <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="add_modalLabel">
                      Edit Device Details
                </h5>
                  <button id="close_add_modal" type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <!-- <div id="edit_op"></div> -->
                  </div>

                  <!-- id -->
                  <input type="" name="" id="edit_id" style="display: none;">
                  <input type="" name="" id="edit_edited" style="display: none;">
                  

                  <!-- serial no -->
                   Title
                  <div class="input-group mb-3">
                    <input id="edit_title" type="text" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>
                  <!-- serial no -->
                  
                  <div class="input-group mb-3">
                    <input id="edit_price" type="number" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>

                  <!-- name -->
                 Image
                  <div class="input-group mb-3" hidden="true">
                    <input id="edit_file" type="file" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>

                    Description 
                  <div class="input-group mb-3">
                    <input id="edit_description" type="text" class="form-control-modal" placeholder="" aria-label="" aria-describedby="">
                  </div>

                  <!-- <i class="fa fa-tags"></i> -->category
                  <div class="input-group mb-3">
                    <select class="select form-control-modal" id="edit_category">
                      <!-- <option selected></option> -->
                      
                      <option  value="0">6 channel power supply</option>
                      <option  value="1">Single channel power supply</option>
                      <option  value="2">Sensors</option>
                      <option  value="3">Smart water pump</option>
                      
                    </select>
                  </div>              
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-success" id="edit_submit" ><i class="fa fa-check"></i></button>
                  <div class="edit_op"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal --> 
          <!-- more modal -->
          <div class="modal fade" id="more_modal" tabindex="-1" role="dialog" aria-labelledby="more_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="more_modalLabel">
                      More Details
                </h5>
                  <button id="close_more_modal" type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="more_content_injector"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- reports modal -->
          <div class="modal fade" id="reports_modal" tabindex="-1" role="dialog" aria-labelledby="reports_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reports_modalLabel">
                    <span class="fa-stack fa-lg">
                       <i class="fa fa-square-o fa-stack-2x"></i>
                       <i class="fa fa-bar-chart fa-stack-1x"></i>
                     </span>
                      Reports and Downloads
                </h5>
                  <button id="" type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                  </button>
                </div>
                <div class="modal-body">
             


                  

                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-success" id="edit_submit" ><i class="fa fa-check"></i></button>
                  <div class="edit_op"></div>
                </div>
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

      $( document ).ready(function() {
            $('#search_btn').click(function(){
              $("#search_container").slideToggle("fast");
              return false;
            });
        });
  </script>
  
  </body>
</html>