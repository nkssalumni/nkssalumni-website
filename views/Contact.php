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

    <!-- Montserrat -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/3rdparties/bootstrap/css/bootstrap.css">

    <!--animate-->
    <link rel="stylesheet" type="text/css" href="assets/3rdparties/animate/animate.css">

    <!--custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Contact Us</title>

    <style>
    body{
    display: flexbox;
    }
    @media screen and (min-height: 480px){
        
        .cont{
            position: absolute;
            top: 30%;
            left:0;
            right:0;
            margin:auto;
            transform: translateY(-50) translateX(-50);
            
        }
    }

    @media screen and (max-height: 764px) {
        
    .cont{
        
        position: absolute;
        top: 15rem;
    }}
    @media screen and (min-height: 768px){
        
        .cont{
            position: absolute;
            top: 20%;
            left: 5%;
            align-items: center;
            
        }
    }

    ul.hlist {

        position: relative;
        top: 50%;
        left: 65%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        display: flex;
    }

    ul.hlist li.plist{
        position: relative;
        list-style: none;
        margin: 0 2px;
    }

    ul.hlist li.plist::before {

        content: '';
        position: absolute;    
        top: 10%;
        left: 0;
        bottom: -4px;
        width: 80px;
        height: 10px;
        background: #000;
        border-radius: 50%;
        transition: 0.5s;
        opacity: 0;
        filter: blur(2px);
        transform: scale(0.8);
    }

    ul.hlist li.plist:hover::before {
        transition-delay: 0.2s;
        opacity: 0.2;
        transform: scale(1);
    }

    ul.hlist li.plist a {
        width: 40px;
        height: 40px;
        display: block;
        transition: 0.5s;
    }

    ul.hlist li.plist:hover a {
        transform: translateY(-10px);
    }

    ul.hlist li.plist a span  {
        width: 100%;
        height: 100%;
    }

    ul.hlist li.plist a span::before {
        font-family: fontAwesome;
        text-align: center;
        line-height: 40px;
        position: relative;
        top: 60%;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        color: #262626;
        transform-origin: top;
        transition: transform 0.5s;
    }

    ul.hlist li.plist:hover a span::before {
        transform: rotateX(90deg) translateY(-50%);
    }

    ul.hlist li.plist a span::after {
        font-family: fontAwesome;
        text-align: center;
        line-height: 200%;
        position: absolute;
        top: 5%;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: #fff;
        color: #262626; */
        transform-origin: bottom;
        transition: transform 0.5s;
        transform: rotateX(90deg) translateY(50%);
    }

    ul.hlist li.plist:hover a span::after {
        transform: rotateX(0deg) translateY(0);
    }

    ul.hlist li.plist:nth-child(1) a span::before,

    ul.hlist li.plist:nth-child(1) a span::after {
        content: '\f09a';
    }

    ul.hlist li.plist:nth-child(2) a span::before,

    ul.hlist li.plist:nth-child(2) a span::after {
        content: '\f099';
    }

    ul.hlist li.plist:nth-child(3) a span::before,

    ul.hlist li.plist:nth-child(3) a span::after {
        content: '\f0d5';
    }

    ul.hlist li.plist:nth-child(4) a span::before,

    ul.hlist li.plist:nth-child(4) a span::after {
        content: '\f16d';
    }

    ul.hlist li.plist:nth-child(1) a span::after {
        background: #3b5999;
        color: #fff;
    }

    ul.hlist li.plist:nth-child(2) a span::after {
        background: #55acce;
        color: #fff;
    }

    ul.hlist li.plist:nth-child(3) a span::after {
        background: #dd4b39;
        color: #fff;
    }

    ul.hlist li.plist:nth-child(4) a span::after {
        background: linear-gradient(#833AB4,#F58529);
        color: #fff;
    }
    </style>
</head>



<!--Body and Background Image -->

<body>
<section>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark navbar-right ">
      <div class="container"> 
        <img src="assets/images/logo.png" width="20" class="img-set">
        <a class="navbar-brand" href="/"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> </button> 
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav text-light"> 
            <li class="nav-item"> <a class="nav-link " aria-current="page" href="/">Home</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/about">About Us</a> </li> 
            <li class="nav-item"> <a class="nav-link active"  href="/contact-us">Contact Us</a> </li> 
            <li class="nav-item"> <a class="nav-link " href="/our-activities">Our Activities</a> </li>
          </ul>
          <ul class="navbar-nav">
            <div>
              <button class="btn btn-md text-light" style="background-color:#00BFFF;" type="button"data-bs-toggle="modal" data-bs-target="#regModal"  > Register </button>
              <button class="btn btn-md text-light"  style="background-color:#00BFFF;" type="button"  data-bs-toggle="modal" data-bs-target="#loginModal">Login </button>
            </div>
          </ul>
        </div> 
      </div>
    </nav>
  </section>

    <section style="background-color: #add8e6;">
        <br>
        <div class="container">
            <div class="justify-content-between align-item-center">
                <h2>Get in Touch</h2>
                <p class="lead"> Communicate to us via our below channels. feel confortable and at home.</p>
                <br /><br /><br /><br /><br />
            </div>
        </div>
    </section>

    <section>
        <div class="container cont">
            <div class="d-sm-flex align-item-center justify-content-between contacts border border-primary shadow-lg p-3 mb-5 bg-body rounded " >
                <div class="container">
                    <form>
                        <h3> Send us a Message </h3>
                        <label for="simu">name : </label>
                        <input type="text" id="simu"  class="form-control">
                        <label for="nametwo">Phone number : </label>
                        <input type="text" id="nametwo"  class="form-control">
                        <label for="three">Message : </label>
                        <textarea id="three"  placeholder="Write us a message" class="form-control" rows="8" cols="50"></textarea>
                        <br />
                        <button class="btn bg-primary text-light">Send</button>
                        <br>
                    </form>
                </div>
                <br />
                <div class="container text-light bg-primary">
                    <br /><br />
                    <div class="contacts">
                        <h3>Contact Us</h3>
                        <p class="lead">
                        <i class="medium material-icons">phone</i>
                        0700 555 333 </p>
                        <hr />
                        <p class="lead">
                        <i class="medium material-icons">email</i>
                        Nkaimurunyalumni@gmail.com</p>
                        <hr/>
                        <p class="lead"> 
                        <i class="medium material-icons">location_on</i>
                        Ongata Rongai </p>
                        <hr />
                        <div class= "container">
                            <div class="container justify-content-center" >
                                <ul class="hlist">
                                    <li class="plist"><a href="#"><span><i class="medium material-icons">phone</i></span></a></li>
                                    <li class="plist"><a href="#"><span></span></a></li>
                                    <li class="plist"><a href="#"><span></span></a></li>
                                    <li class="plist"><a href="#"><span></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/9d623992aa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>
</html>