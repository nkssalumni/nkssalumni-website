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
                    <a class="nav-link active" href="/upload-notes">Upload Notes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin-uploaded-recordings">Uploaded Videos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin-uploaded-notes">Uploaded Notes</a>
                  </li>
                </ul>
          </div>
        </div>
        <div class = "row animated bounce" >

            <div class="col-lg-3 col-md-3 col-sm-12"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 card bg-primary" id="form_div">
             
                <form action="" method='post' enctype="multipart/form-data">
                  <div id = "form-message"></div>
                  <div class="form-group">
                    <input type="file" name="file" class="form-control mt-3" id = "file"/>
                  </div>
                  <div id = "uploaded_file"></div><br>
                  <input type="submit" class = "btn btn-warning" value="Upload Notes"/>
                </form>
            </div>
        </div>
    </div>
</div>


  <!-- JQUERY -->
  <script src="../assets/3rdparties/jquery/jquery.js"></script>
  <!-- Bootstrap JS -->
  <script src="../assets/3rdparties/bootstrap/js/bootstrap.js"></script>   
  <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

       $('form').submit(function(e){
        e.preventDefault();
        $('#form-message').html('');
        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        var extensions_arr = ["pdf","doc","docx","ppt","xls", "xlsx"];
        if(jQuery.inArray(ext, extensions_arr) !== -1) 
        {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);
            var f = document.getElementById("file").files[0];
            var fsize = f.size||f.fileSize;
            if(fsize > 100000000)
            {
            alert("File Size is too big");
            }
            else
            {
            form_data.append("file", document.getElementById('file').files[0]);
            $.ajax({
                url:"/upload-notes",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#uploaded_file').html("<label class='text-success'> Uploading...</label>");
                },   
                success:function(data)
                {
                    //console.log(data);
                    var response = JSON.parse(data);
                    //console.log(response.message);
                    $('#uploaded_file').html('');
                    if (response.message != 'success') {
                      $('#form-message').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning"></i>' + response.message + '</div>');
                    }else{
                      $('#form-message').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i>File upload Successful</div>');
                    }
                },
                error:function(){
                    $('#uploaded_file').html('');
                    $('#form-message').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning infinite-swing"></i>File upload error</div>');
                }
            });
        }

        }else{
            alert("You can only upload pdf, doc, docx, ppt,xlsx or xls file");

        }
        

    });
  </script>
  </body>
</html>