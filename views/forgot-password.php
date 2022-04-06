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
          <!-- <ul class="navbar-nav">
            <div>
              <button class="btn btn-md text-light" style="background-color:#00BFFF;" type="button" data-toggle="modal" data-target="#regModal"  > Register </button>
              <button class="btn btn-md text-light"  style="background-color:#00BFFF;" type="button"  data-toggle="modal" data-target="#loginModal">Login </button>
            </div>
          </ul> -->
        </div> 
      </div>
    </nav>
  </section>

    <div class="h-100">
     <div class="container">
          <div class = "row animated bounce" >
              <div class="none col-lg-3 col-md-3 col-sm-12 mt-5 mt-5"></div>
              <div class="col-lg-6 col-md-6 col-sm-12 mt-3 p-3 mb-5 d-flex justify-content-center">
               <div class="card card-auth"  style="box-shadow: 0px 0px 10px  #0C0C0C !important;margin:5px; width:90%">
                 
                   <form method="post" class="mt-3 ">
                    
                    <?php echo $message;?>
                    <div id="op"></div>
                    <label for="email" class="form-text mr-3 mt-3 ml-3">Enter your Email:</label>
                    <div class="form-group d-flex justify-content-center mt-3 ml-3 mr-3">
                       
                          <input type="email" name="email"  class="form-control" id = "email" > 
                    </div>
                         
                      <div class="form-group">
                        <div class="d-flex justify-content-center mb-5 mt-3">
                          <button type="submit" class="btn btn-primary btn-lg text-light" id="send_button" >Get New Password</button>
                        </div>
                      </div>
                  </form> 
              </div>
          </div>
      </div> 
    </div>
    <script src="../assets/3rdparties/jquery/jquery.js"></script>
    <script src="../assets/3rdparties/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript">
       function clear_register_field() {
          $("#email").val('');
        }

       
      function forgotpassword_submit(){
        
        // pull in values/variables
        var email = $("#email").val();
        var csrf = $('#csrf').val();



        //check if any of the variable is empty
        if (!email || (email == "")) {
          $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Please enter your Email</div>');
        } 
        else {

          $('#op').html('');

          console.log(email);
          console.log(csrf);

          $.ajax({  
              url:"/forgot-password",  
              method:"POST",  
              data:{
                csrf:csrf,
                email:email
              },
              dataType: 'text', 
              success:function(data)  
              {  
                  //console.log(data);
                  var response = JSON.parse(data);
                  //console.log(response);
                  if (response.message !== 'success') {
                    
                     $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> ' + response.message +'</div>');
                    

                  }else if(response.message === 'success'){
                    // clear the fields
                    $('#op').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-tick"></i>  Password reset link sent to email </div>');
                    clear_register_field();
                  }
                  
              },
              error: function (jqXhr, textStatus, errorThrown) {
                  
                  $('#op').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Contact system Admin. System error</div>');
                  //console.log(jqXhr + " || " + textStatus + " || " + errorThrown);
              } 
          });
        }
      }


      $('form').submit(function(event){
          event.preventDefault();
          forgotpassword_submit();
          return false;
         });
    </script>
</html>