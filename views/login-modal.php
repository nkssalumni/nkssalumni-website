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

    <!--custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  

    <title>NKSSAA</title>
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
            </div> -->
          </ul>
        </div> 
      </div>
    </nav>
  </section>
   
   
    <div class = "mt-5 mr-5 ml-5 d-flex justify-content-center">  
    <?php echo $token;?>              
    <?php echo $message;?>
    </div>
                  
   
  
    
 
  <script src="assets/3rdparties/jquery/jquery.js"></script>
  <script src="assets/3rdparties/bootstrap/js/bootstrap.js"></script>
  <script>
      
		function login_submit(){
  
          // pull in values/variables
          var email = $("#login_email").val();
          var password = $("#login_password").val();
          var csrf_token = $("#csrf").val();
          var returnurl = $("#returnurl").val();
        

          //check if any of the variable is empty
          if (!email || !password) {
            $('#op').html('<div class="alert alert-danger animated bounce mt-4" role="alert"><i class="fa fa-warning animated swing infinite"></i> Please fill out all sections</div>');
          } 
          else {

            $('#op').html('');

            $.ajax({  
                url:"/login",  
                method:"POST",  
                data:{
                  csrf_token:csrf_token,
                  email:email,
                  password:password,
                  returnurl:returnurl

                },
                dataType: 'text', 
                success:function(data)  
                {  
                    //console.log(data);
                    var response = JSON.parse(data);
                    //console.log(response);
                    if (response.message !== 'success') {
                    
                      $('#op').html('<div class="alert alert-danger animated bounce mt-4" role="alert"><i class="fa fa-warning animated swing infinite"></i> ' + response.message +'</div>');
                                  
                      // clear the fields

                    }else if(response.message === 'success'){
                     
                      
                            window.location = "/";
                          
                          
                    }
                    
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    
                    $('#op').html('<div class="alert alert-danger animated bounce mt-4" role="alert"><i class="fa fa-warning animated swing infinite"></i> Contact system Admin. System error</div>');
                    console.log(jqXhr + " || " + textStatus + " || " + errorThrown);
                } 
            });
          }
        }
        $(document).ready(function() {

            $('#login-form').click(function(){
                login_submit();
                return false;
            });
        });
  </script>

</html>