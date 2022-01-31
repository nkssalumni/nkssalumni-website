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

    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
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
    <style>
            #zmmtg-root{
                display:none;
            }
            .sdk-select {
                height: 34px;
                border-radius: 4px;
            }
    
            .websdktest button {
               
                margin-left: 5px;
            }
    
            #websdk-iframe {
                width: 500px !important;
                height: 500px !important;
                border: 1px;
                border-color: red;
                border-style: dashed;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                left: 50%;
                margin: 0;
            }
            .dt-body-nowrap {
               white-space: nowrap;
            }
        </style>

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

      <div class="container mt-5 text-center" >
        
       <div  class="websdktest">
        <h4 style="color: white !important;">Join Live Class by clicking the 'Join' button. <br> To see participant list, click the 'list' Button.</h4>
          <form id="meeting_form">
              <button type="submit" class="btn btn-warning" id="join_meeting">Start</button>
              <button type="button" class="btn btn-warning" id="listButton">List</button>
          </form>
      </div>
      <div class="data-table"></div>
      <div class="return-button"></div>
    </div>
      
</div>
</div>


   <!-- JQUERY -->
  <script src="../assets/3rdparties/jquery/jquery.js"></script>
  <!-- Bootstrap JS -->
  <script src="../assets/3rdparties/bootstrap/js/bootstrap.js"></script>
  <script src="https://source.zoom.us/1.9.1/lib/vendor/react.min.js"></script>
  <script src="https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js"></script>
  <script src="https://source.zoom.us/1.9.1/lib/vendor/redux.min.js"></script>
  <script src="https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js"></script>
  <script src="https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js"></script>
  <script src="https://source.zoom.us/zoom-meeting-1.9.1.min.js"></script>
  <script src="../assets/js/zoom/tool.js"></script>
  <script src="../assets/js/zoom/vconsole.min.js"></script>
  <script src="../assets/js/zoom/index.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/buttons.flash.min.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/jszip.min.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/pdfmake.min.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/vfs_fonts.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/buttons.html5.min.js"></script>
  <script type="text/javascript" src="../assets/3rdparties/datatables/buttons.print.min.js"></script>
     
  <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

      $('#listButton').click( function(){
          $('.websdktest').html('');
          $('.data-table').html(`
              <div class = "card bg-light slideIn text-white">
              <h5 class="card-title text-dark mt-3">Participant List</h5>
                <div class="card-body bg-light">
                 <table id="participants-list" class = "table">
                   <thead>
                      <tr>
                        <th> Name</th>
                        <th> Email</th>
                      </tr>
                    </thead>
                 </table>
                </div>
              </div>
            `);

          $.ajax({  
          url:"/zoom-participants-list",  
          method:"POST",  
          data:{},
          dataType: 'text', 
          success:function(data)  
          {  
              console.log(data);
              var data = JSON.parse(data);
              // datatables
              $('#participants-list').DataTable({
                    "data": data.participants,
                    "dom": 'Bfrtip',
                    "buttons": [
                          { extend: 'copy', className: 'btn btn-warning' },
                          { extend: 'csv', className: 'btn btn-primary' },
                          { extend: 'pdf', className: 'btn btn-danger' },
                          { extend: 'excel', className: 'btn btn-success' }
                    ],
                    "columns": [     
                            { data: 'name' },
                            { data: 'user_email' }
                    ],
                    "columnDefs": [
                      {
                          targets: '_all',
                          className: 'bg-secondary text-white'
                      }
                    ]
                });

              $('.return-button').html(`<div class = "container text-center mt-5"><a class = "btn btn-warning" href = "/live-class">Back</a></div>`);
          },
          error: function(){

          }
        });
        
      });
  </script>
  </body>
</html>