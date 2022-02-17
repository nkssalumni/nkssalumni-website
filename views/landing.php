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

  <section>
  <!-- Modal -->
    <div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="portModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title display-6" >Join Alumni Association </h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>        
          <div class="modal-body">
            <div class="container-fluid">  
              <p class="lead">Your Details: </p>
              <form method="post" >
                <?php echo $message;?>
                <div class="container">
                <div id = "response"></div>
                <label for="firstname" class="form-text">First Name:</label>
                <input type="text" class="form-control" id="firstname"/>
                <label for="secondname" class="form-text">Second Name:</label>
                <input type="text" class="form-control" id="secondname"/>
                <label for="phonenumber" class="form-text">Phone Number:</label>
                <input type="tel" name="phonenumber" class="form-control" id="phonenumber"/>
                <label for="email" class="form-text">Email:</label>
                <input type="text" class="form-control" id="email"/>
                <label for="password" class="form-text">Password:</label>
                <input type="password" class="form-control" id="password"/>
                <label for="confirmPassword" class="form-text">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword"/>
                <label class="form-text"  for="years">Year:</label>
                <select id="years" class="custom-select">
                  <option selected>Choose...</option>
                  <option value="2008"> 2008 </option>
                  <option value="2009"> 2009 </option>
                  <option value="2010"> 2010 </option>
                  <option value="2011"> 2011 </option>
                  <option value="2012"> 2012 </option>
                  <option value="2013"> 2013</option>  
                  <option value="2014"> 2014 </option>         
                  <option value="2015"> 2015</option>
                  <option value="2016"> 2016 </option>
                  <option value="2017"> 2017 </option>
                  <option value="2018"> 2018 </option>
                  <option value="2019"> 2019</option>
                  <option value="2020"> 2020 </option>
                  <option value="2021"> 2021</option>
                  <option value="2022"> 2022 </option>
                </select>
                <br/><br/><br/>
                <hr class="hrOriz">
                <p class="lead">Type of Membership:</p>
                <div class= "membership">
                  <div class="form-check form-check-inline"> 
                    <input class="form-check-input" name = "membership" type="radio" id="inlineCheckbox1" value="ordinary"> 
                    <label class="form-check-label" for="inlineCheckbox1">Ordinary</label> 
                  </div> 
                  <div class="form-check form-check-inline"> 
                    <input class="form-check-input" name = "membership" type="radio" id="inlineCheckbox2" value="executive"> 
                    <label class="form-check-label" for="inlineCheckbox2">Executive</label> 
                  </div> 
                </div>
                <br /><br />
                <hr class="hrOriz">
                <p> Note: For ordinary membership you will be required to pay a registration fee of Ksh 300 and yearly subscription of Ksh 1200.</p>
                  <br />
                <p> For Exercutive Membership you will be required to pay a registration fee of ksh 1000 and a yearly subscription of Ksh 2500. </p>
                  </div>
                <br/><br />
              </div>
              <br />
            </div>
            <div class="modal-footer">
              <button class="btn bg-secondary text-light"> Close </button>
              <button class="btn bg-primary text-light" id = "register-form"> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="loginModalLabel">LOGIN</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form id="log">
                <div id = "op"></div>
                <label for="Phone" class = "mt-3">Email:</label>
                <input type="text" id="login_email" class="form-control">
                <label for="password">password:</label>
                <input type="password" id="login_password" class="form-control">
              </form>
              <div class="form-group text-center mt-3">
                  <a class="explore-text-sm" href="/forgot-password"> Forgot password?</a> 
              </div>                  
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id = "login-form">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- This section contain introduction -->
  <section>
    <div class="carousel slide" data-ride="carousel" data-interval="10000" data-pause="hover">
      <div class="carousel-inner"> 
        <div class="carousel-item active"> 
          <img src="assets/images/alu.png" class="d-block w-100" alt="alumni pictures"> 
          <div class="carousel-caption "> <h3 class="slideshade">Did you go to Nkaimurunya Secondary School?</h3>
            <br />
            <a class="btn btn-lg bg-primary Lead text-light " data-toggle="modal" data-target="#regModal"  href="">Join Us</a>
            <br />
            <br />
          </div> 
        </div>
        <div class="carousel-item">
          <img src="assets/images/network.png" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h2 class="slideshade">Let's Network</h2>
            <h3 class="slideshade">We have alot of professionals, bussinesspersons and talents among us, who give a diverse and rich pool for begining your network to future fruitful results. </h3>
            <br />
            <a class="btn btn-lg bg-primary Lead text-light " data-toggle="modal" data-target="#regModal"  href="">Join Us</a>
            <br/>
          </div>
        </div>
        <div class="carousel-item"> <img src="assets/images/funmoments.png" class="d-block w-100"> 
          <div class="carousel-caption"> <h3 class="slideshade">Let's catch up and interact socially with Other Alumni</h3>
            <br />
            <br />
            <a class="btn btn-lg bg-primary Lead text-light " data-toggle="modal" data-target="#regModal"  href="">Join Us</a>
            <br />
            <br />
          </div> 
        </div>
      </div> 
    </div>
    <br />
    <br />
  </section>

  <!--this section contain the icons -->
  <section Class="cardi">
    <div class="align-items-center">
      <div class="cardi">
        <div class="row text-center">
          <div class="col-sm-3" >
            <div class="card align-items-center shadow p-3 mb-5 bg-white rounded profile-card" style="opacity: 2;">
              <img class="card-img-top img-fluid w-5 align-items-center " src="assets/images/classrepsw.png" style="width: 50%;" >
              <div class="card-body text-center">
                <h5 class="card-title">Class Reps</h5>
                <p class="card-text lead"> Contact Class Rep</p>
                <a href="#" class="btn btn-primary"> Contact </a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card w-60 align-items-center shadow p-3 mb-5 bg-white rounded profile-card" style="opacity: 2;">
              <img class="card-img-top img-fluid w-5 " src="assets/images/funtimes.png" style="width: 50%;" >
              <div class="card-body text-center">
                <h5 class="card-title">Fun Moments</h5>
                <p class="card-text lead"><small>View Our Pictures</small></p>
                <a href="funpage.html" target="_self" class="btn btn-success" > View</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card w-60 align-items-center shadow p-3 mb-5 bg-white rounded profile-card " style="opacity: 2;">
              <img class="card-img-top img-fluid w-5" src="assets/images/schedule.png" style="width: 50%;" >
              <div class="card-body text-center">
                <h5 class="card-title">Our Schedule</h5>
                <p class="card-text lead">  See Our Schedule</p>
                <button type="button" class="btn btn-primary animatebutton" id="animatebutton"> View </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <image src="assets/images/stock.png" class="img-fluid w-60 d-none d-sm-block">
        </div>
        <div class=" justify-content-end">
          <br />
          <p class="display-5">Post Your Portfolio.</p>
          <p class="display-4"><strong>Here!</strong></p>
          <p class="lead my-4"><small>If your looking for a job, <br />NKSSA has a vast network <br /> of various professsion <br />and there is a great chance <br /> that once you join your employer <br />can be a member or you can be reffered.</small></p>
          <button class="btn  btn-lg btn-primary" type="button"style="background-color:#0275d8" data-toggle="modal" data-target="#portfolio">View </button>
          <br />
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <section> 
    <div class="modal fade" id="portfolio" tabindex="-1" aria-labelledby="portModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
          <div class="modal-content">
        <div class="modal-header">
              <h2 class="modal-title display-6" id="loginModalLabel">Our Network</h2>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
            <div class="container-fluid">
              <div>
                <h3 class="display-3 text-center">Join Our Network </h3>
                <form>
                  <div class="container">
                    <label for="fname" class="form-text">First Name:</label>
                    <input type="text" class="form-control" id="pfirstname"/>
                    <label for="sname" class="form-text">Second Name:</label>
                    <input type="text" class="form-control" id="psecondname"/>
                    <label for="pnum" class="form-text">Phone Number:</label>
                    <input type="text" class="form-control" id="pphonenumber"/>
                    <label for="yr" class="form-text">Class of:</label>
                    <input type="text" class="form-control" id="pyr"/>
                    <label for="email" class="form-text">Email:</label>
                    <input type="text" class="form-control" id="pemail"/>
                    <br />
                    <p class="display-6"><small>Area of Expertise:</small></p>
                    <div class="border border-secondary container">
                    <br />
                    <label for="sc" >Choose your industry:</label>
                    <select id="sc" name="prof">
                      <option value="none">None</option>
                      <option value="Technology">Technology</option>
                      <option value="Science">Science</option>
                      <option value="Art">Art</option>
                      <option value="Bussiness">Bussiness</option>
                    </select>
                    <br />
                    <br />
                    <label for="more" class="form-text">Tell us more about your expertise:</label>
                    <textarea rows="5"class="form-control" id="sname"></textarea>
                    <br/>
                    <br />
                    </div>
                    <br />
                    <div class="modal-footer">
                      <button class="btn bg-secondary text-light"> Close </button>
                      <button class="btn bg-primary text-light" type = "button"> Submit </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br />

  <!-- year book section-->
  <section class="bg-primary">
    <div class="container text-light">
      <div class="d-sm-flex  align-items-center justify-content-between">
        <div>
          <p class="display-6"><strong><br/>Year Book<br />
          Pictures of Alumni<br /> From all Years.</strong></p>
          <p class="lead"><small>See the faces of Alumni, <br /> from the Pioneers to date,<br ?> update your own picture <br /> and your year of completion.</small></p>
          <button class="btn" type="button" style="background-color:#87ceeb;" >View </button>
          <br />
          <br />
        </div>
        <img class="img-fluid w-50 d-none d-sm-block" src="assets/images/yearbk.png">
      </div>
    </div>
  </section>
  <br />

  <!--success stories --->
  <section>
    <div class="container">
      <div class="row justify-content-center"> 
        <div class="text-center">
          <p class="display-6 ">Success Stories</p>
          <div clas= "justify-content-center">
            <ul class="navbar nav">
              <li class="nav-item"><a href="#" class="nav-link"> Bussiness</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Proffesionals</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Talent</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Diaspora</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/3rdparties/jquery/jquery.js"></script>
  <script src = "assets/3rdparties/bootstrap/js/bootstrap.js"></script>
  <script src="assets/3rdparties/build/js/intlTelInput-jquery.js"></script>

  <script>

    $("#phonenumber").intlTelInput({
      initialCountry: "auto",
        geoIpLookup: function(callback) {
          $.get('https://ipinfo.io?token=2433f368462b55', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
          });
        }
    });


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


     function clear_register_field() {
          $("#firstname").val('');
          $("#secondname").val('');
          $("#phonenumber").val('');
          $("#email").val('');
          $("#password").val('');
          $("#confirmPassword").val('');
      }


      function register_submit(){
        
        // pull in values/variables
        var firstname = $("#firstname").val();
        var csrf_token = $("#csrf").val();
        var secondname = $("#secondname").val();
        var phonenumber = $("#phonenumber").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var years = $("#years").val();
        var confirmPassword = $("#confirmPassword").val();
        var membership = $("input[name='membership']:checked").val();
    
     
        //console.log(background);
        //check if any of the variable is empty
        if (!firstname || !secondname  || !phonenumber || !email || !password || !confirmPassword || !years || !membership) {
          $('#response').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Please fill out all sections</div>');
        } 
        else {

            if (password != confirmPassword) {

                $('#response').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Passwords do not match</div>');

              } else {

                if (Number(password.length) < 8){

                  $('#response').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Password Must be atleast 8 characters</div>');

                }else {

          
                   
                    $('#response').html('');
                    var regData = {
                          csrf_token:csrf_token,
                          firstname:firstname,
                          secondname:secondname,
                          email:email,
                          phonenumber:phonenumber,
                          password:password,
                          confirmPassword:confirmPassword,
                          years:years,
                          membership:membership      
                        };
                    //console.log(regData);
                    $.ajax({  
                        url:"/register",  
                        method:"POST",  
                        data: regData,
                        dataType: 'text', 
                        success:function(data)  
                        {                              
                            //console.log(data);
                            var response = JSON.parse(data);
                            console.log(response);
                            if (response.message == 'success') {
                              var link = '/resend-activation-link?email='+email;
                              $('#response').html('<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check animated swing infinite"></i>Sign Up Success. Check your email to verify your account </div><div>Did not get email?  Click <a href = "'+link+'">here to resend email</a></div>');
                              
                              // clear the fields
                              clear_register_field();

                            } else {
                              $('#response').html('<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> '+response.message +'</div>');
                              
                            }
                            
                        },
                        error: function (jqXhr, textStatus, errorThrown) {
                            
                            $('#response').html('<hr><div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-warning animated swing infinite"></i> Contact system Admin. System error</div>');
                            //console.log(jqXhr + " || " + textStatus + " || " + errorThrown);
                        } 
                    });

                }

              } 
          }
        }

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

          $('#register-form').click(function(){
                
              register_submit();  
              return false;    
            });

            $('#login-form').click(function(){
              login_submit();
              return false;
            });
        });
  </script>
</body>
</html>