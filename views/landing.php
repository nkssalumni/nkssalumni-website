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
     <link rel="stylesheet" type="text/css" href="assets/css/mystyles-one.css">
      <link rel="stylesheet" type="text/css" href="assets/css/initialcards.css">
  <script src="assets/js/Myjavascript.js"></script>

            <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
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
                <label for="Phone" class = "mt-3 text-dark">Email:</label>
                <input type="text" id="login_email" class="form-control">
                <label for="password" class="text-dark">password:</label>
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
     <div>
         <div class="mypadding" >
             <div class="mycontainer">
                 <div class="myslider">
                     <div class="box1 box">
                         <div class="bg"></div>
                         <div class="details">
                             <h1 class="mywhite">Did you go NKSS?</h1>
                             <p>
                                 Join the alumni today and make your mark.
                             </p>
                             <br>
                             <button data-target="#regModal" data-toggle="modal">Join US</button>
                         </div>
                      <div class="illustration">
                        <div class="inner"></div>
                        <img src="assets/images/alu.png" alt="Student" border="0" class="picha1" >
                         </div>
                       </div>

                     <div class="box2 box">
                         <div class="bg"></div>
                         <div class="details">
                             <h1 class="mywhite" >Join our Network.</h1>
                             <p>
                                 We have alot of proffestionals, bussinesspersons and talents amonst us, who give a diverse and rich pool for  beggining  your network for future fruitful reslust.
                             </p>
                             <button data-target="#regModal" data-toggle="modal" >Join Us</button>
                         </div>

                         <div class="illustration">
                             <div class="inner"></div>
                                 <img src="assets/images/network.png" alt="Resouces" border="0" class="picha1">
                         </div>
                     </div>
                     <div class="box3 box">
                         <div class="bg"></div>
                            <div class="details">
                             <h1 class="mywhite">Let's catch up</h1>
                                <p> We usually have meetings that happens occationally, where you can meet fellow alumni interact and catch up.
                                 </p>
                                 <button data-target="#regModal" data-toggle="modal" >Join Us</button>
                                </div>
                                     <div class="illustration">
                                       <div class="inner"></div>
                                        <img src="assets/images/funmoments.png" alt="Equip" border="0" class="picha2">
                                     </div>
                                </div>
                                    <div class="box4 box">
                                        <div class="bg"></div>
                                            <div class="details">
                                            <h1 class="mywhite">Alumni Welfare</h1>
                                                <p>You can donate towards helping and empowering fellow alumni. This welfare kitty is set up to help those alumni in worst situations. The funds are ment to give loans or grant to this members so they can get out of a bad situation.
                                            </p>
                                                 <button data-target="#regModal" data-toggle="modal">Check Now</button>
                                         </div>
                                              <div class="illustration">
                                             <div class="inner"></div>
                                             <img src="https://i.ibb.co/pW2WrC6/Welfare.jpg" alt="Welfare" border="0" class="picha2">
                                        </div>
                                 </div>
                     <div class="box5 box">
                         <div class="bg"></div>
                             <div class="details">
                             <h1 class="mywhite">Give back to the school</h1>
                             <p>These funds will be used to build or buy required equipments for the school.
                             </p>
                             <button data-target="#regModal" data-toggle="modal">Donate Now</button>
                         </div>
                        <div class="illustration">
                             <div class="inner"></div>
                                <img src="https://i.ibb.co/qybbfSq/Staff.jpg" alt="Staff" border="0" class="picha2">
                         </div>
                     </div>
                 </div>



                 <svg xmlns="http://www.w3.org/2000/svg" class="prev" width="56.898" height="91" viewBox="0 0 56.898 91">
                     <path d="M45.5,0,91,56.9,48.452,24.068,0,56.9Z" transform="translate(0 91) rotate(-90)" fill="#fff" /></svg>

                 <svg xmlns="http://www.w3.org/2000/svg" class="next" width="56.898" height="91" viewBox="0 0 56.898 91">

                     <path d="M45.5,0,91,56.9,48.452,24.068,0,56.9Z" transform="translate(56.898) rotate(90)" fill="#fff" />

                     </svg>

                 <div class="trail">

                     <div class="box1 active">1</div>

                     <div class="box2">2</div>

                     <div class="box3">3</div>

                     <div class="box4">4</div>

                     <div class="box5">5</div>

                 </div>

             </div>

             <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>

             <!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/CSSRulePlugin3.min.js"></script> -->



             <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/gsap.min.js"></script> -->

                 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/CSSRulePlugin.min.js"></script> -->






             </section>
  <!--this section contain the icons -->
  section class="container myspaces">
      <div class="three-columns align-items-center">
          <div class="card-one">
              <div class="imgBox">
              <img src="images/classreps.png">
                  </div>
              <div class="contentBox">
              <h3>CLASS REPRESENTATIVE.</h3>
              <a href="javascript:none" class="mybtn">Contact now</a>
              <span></span>
              </div>
              </div>

              <div class="card-one">
                  <div class="imgBox">
                  <img src="images/funtimes.png">
                      </div>
                  <div class="contentBox">
                  <h3>FUN MOMENTS</h3>

                  <a href="javascript:none" class="mybtn">View Now</a>
                  <span></span>
                  </div>
                  </div>

                  <div class="card-one">
                      <div class="imgBox">
                      <img src="images/schedule.png">
                          </div>
                      <div class="contentBox">
                      <h3>OUR SCHEDULE</h3>

                      <a href="javascript:none" class="mybtn">View Now</a>
                      <span></span>
                      </div>
                      </div>

      </div>

  </section>


  <section>
  <div class="two-columns myspaces-one-small">

      <div class="myspaces-pics">
       <img src="assets/images/stock.png" class="image-size image-fluid d-none disapear d-sm-block">
      </div>

      <div class="myspaces-two">

       <p class="display-4 text-dark">Post Your Portfolio. </p>
       <p class="display-4 text-dark ">Here ! </p>
       <p class="lead text-dark">If your looking for a job,<br>
          NKSSA has a vast network<br>
          of various professsion<br>
          and there is a great chance<br>
          that once you join your employer<br>
          can be a member or you can be reffered. </p>
          <button class="btn  btn-lg btn-primary" type="button"style="background-color:#0275d8"
          data-toggle="modal" data-target="#regModal">View </button>

      </div>
  </div>

  </section>


  <br />

  <!-- year book section-->
 <section class="bg-primary">
     <div class="two-columns">
         <div class="myspaces-one">
             <p class="display-4 text-light">Year Book<br>
                 Pictures of Alumni <br>
                 From all Years.</p>
             <p class="lead text-light">See the faces of Alumni,<br>
                 from the Pioneers to date,<br>
                 update your own picture<br>
                 and your year of completion.<br>
                  </p>
           <button class="btn  btn-lg myblue-button" type="button"
                    data-toggle="modal" data-target="#regModal">View </button>

            </div>

            <div class="myspaces-pics">


                <img src="assets/images/yearbk.png" class="image-size-two  d-none d-sm-block">
            </div>

     </div>
 </section>
  <br />

  <!--success stories --->
 <section>
     <div class="myspaces">
         <div class="container">

             <div class="row justify-content-center">

             <div class="text-center">

            <p class="display-4 text-dark">Success Stories</p>

            <div clas= "justify-content-center">

            <ul class="navbar nav">
            <li class="nav-item">

            <a href="#" class="nav-link">
                <img src="assets/images/business.png">

                <p class="lead">Bussiness </p></a></li>

            <li class="nav-item">

            <a href="#" class="nav-link">
                <img src = "assets/images/pro.png">
                <p class="lead">Proffesionals</p></a></li>

            <li class="nav-item">


            <a href="#" class="nav-link">
                <img src = "assets/images/talent.png" class="wiggle">
                <p class="lead">Talent</p></a></li>

            <li class="nav-item">


            <a href="#" class="nav-link">
                <img src="assets/images/diaspora.png" class="wiggle">
               <p class="lead"> Diaspora </p></a></li>

            </ul>

            </div>

     </div>
 </section>
 <section class="mypad"style="background-color: dimgrey;">

     <br>
 <div class="mymain">
 <div>
 <img src="assets/images/logo.png" width="20%">
 <br>
 <br>
 <p>Nkaimurunya secondary school alumni assosiation <br>is a registered community based organisation that strive to <br>
     unite all alumni of Nkaimurunya Secondary school.  </p>
 <p>Join us there got to be more of us.</p>
 </div>
 <br>
 <br>
 <div>
 <h5><strong>Contact us</h5></strong>
 <p>Telephone: 07075868</p>
 <p>email: nkssa@gmail.com</p>
 </div>
 <br>
 <br>

 <div>
 <h5><strong>Follow us</h5></strong>
 <br>

 <div class="mymain">

         <a href="#" >
     <img src="assets/images/facebook.png"class=" icon-size"></a>



         <a href="#">
             <img src="assets/images/twitter.png" class=" icon-size"></a>



         <a href="#" >
             <img src="assets/images/insta.png" class=" icon-size"> </a>


         <a href="#">
             <img src="assets/images/whatsapp.png"  class=" icon-size"></a>

     </div>
 </div>





 </div>

 <hr>
 <br>
     <br>
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
              <p class="lead text-dark">Your Details: </p>
              <form method="post" >
                <?php echo $message;?>
                <div class="container">
                <div id = "response"></div>
                <label for="firstname" class="form-text text-dark">First Name:</label>
                <input type="text" class="form-control" id="firstname"/>
                <label for="secondname" class="form-text text-dark">Second Name:</label>
                <input type="text" class="form-control" id="secondname"/>
                <label for="phonenumber" class="form-text text-dark">Phone Number:</label>
                <input type="tel" name="phonenumber" class="form-control" id="phonenumber"/>
                <label for="email" class="form-text text-dark">Email:</label>
                <input type="text" class="form-control text-dark" id="email"/>
                <label for="password" class="form-text text-dark">Password:</label>
                <input type="password" class="form-control" id="password"/>
                <label for="confirmPassword" class="form-text text-dark">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword"/>
                <label class="form-text text-dark"  for="years">Year:</label>
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
                <p class="lead text-dark">Type of Membership:</p>
                <div class= "membership">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name = "membership" type="radio" id="inlineCheckbox1" value="ordinary">
                    <label class="form-check-label text-dark" for="inlineCheckbox1">Ordinary</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name = "membership" type="radio" id="inlineCheckbox2" value="executive">
                    <label class="form-check-label text-dark" for="inlineCheckbox2">Executive</label>
                  </div>
                </div>
                <br /><br />
                <hr class="hrOriz">
                <p class="text-dark"> Note: For ordinary membership you will be required to pay a registration fee of Ksh 300 and yearly subscription of Ksh 1200.</p>
                  <br />
                <p class="text-dark"> For Exercutive Membership you will be required to pay a registration fee of ksh 1000 and a yearly subscription of Ksh 2500. </p>
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
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>



</body>
</html>