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
    <div class="bg2">
     <div class="container">
           <div class = "row animated bounce" >
              <div class="none col-lg-3 col-md-3 col-sm-12 mt-5 mt-5"></div>
              <div class="col-lg-6 col-md-6 col-sm-12 card mt-5 shadow-lg p-3   mb-5 card-auth" style="box-shadow: 0px 0px 20px  #0C0C0C !important;margin:5px;">
              
                   <form method="post" class="mt-3 ">
                    
                    <?php echo $message;?>
                    <div id="op"></div>
                      <div class="form-group">
                        <div class="mb-5 mt-3">
                           <label class="ml-2 ">Password</label>
                              <div class="form-group d-flex justify-content-center">
                                  <input type="password" name="password" id = "password" class="form-control" placeholder=" Enter Password">
                                  <span toggle="#password-field" id="toggle-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              </div>

                              <label class="ml-2 black-text-sm">Confirm Password</label>
                              <div class="form-group d-flex justify-content-center">
                               
                                  <input type="password" name="confirmPassword" id = "confirmPassword" class="form-control" placeholder=" Confirm Password">
                                  <span toggle="#confirmPassword-field" id="toggle-confirmPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              </div>
                              <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-primary" id="send_button" style="width:80%">Get New Password</button>
                              </div>
                        </div>
                      </div>
                  </form> 
              </div>
          </div>
      </div> 
    </div>
    
   
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script type="text/javascript">
     function clear_register_field() {
        $("#password").val('');
        $("#confirmPassword").val('');
      }

      $("#toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password").attr("type");
        if (input == "password") {
          $("#password").attr("type", "text");
        } else {
          $("#password").attr("type", "password");
        }
        });
      $("#toggle-confirmPassword").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#confirmPassword").attr("type");
        if (input == "password") {
          $("#confirmPassword").attr("type", "text");
        } else {
          $("#confirmPassword").attr("type", "password");
        }
        });

    function register_submit(){
      
      // pull in values/variables
      var password = $("#password").val();
      var confirmPassword = $("#confirmPassword").val(); 
      var rst_token = $("#rst_token").val();

      //check if any of the variable is empty
      if(!password || !confirmPassword) {
        $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i>Enter all fields</div>');
        clear_register_field();
      } 
      else {

        if(password != confirmPassword){

          $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Password does no match confirm Password</div>');

        }else{

          $('#op').html('');

          $.ajax({  
              url:"/password-reset", 
              method:"POST",  
              data:{
                password:password,
                rst_token:rst_token
              },
              dataType: 'text', 
              success:function(data)  
              {  
                  console.log(data);
                  var response = JSON.parse(data);
                  //console.log(response);
                  if (response.message !== 'success') {
                    
                     $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> ' + response.message +'</div>');
                    

                  }else if(response.message === 'success'){
                    // clear the fields
                    $('#op').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-tick"></i> Your password has been reset succesfully.  </div>');
                      //$('#remove-form').html('');
                      clear_register_field();
                  }
                  
              },
              error: function (jqXhr, textStatus, errorThrown) {
                  
                  $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Contact system Admin. System error</div>');
                  console.log(jqXhr + " || " + textStatus + " || " + errorThrown);
              } 
          });
        }
      }
    }


    $(document).ready(function() {

       $('form').submit(function(event){
        event.preventDefault();
        register_submit();
        return false;
       });

    }); 
    </script>
</html>