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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"   integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">

 </script>

    <!--animate-->
    <link rel="stylesheet" type="text/css" href="assets/3rdparties/animate/animate.css">

    <!--custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <style>
      .row{
        display: flex;
        flex-wrap: wrap;
        padding: 0 4px;
      }
      /* Create four equal columns that sits next to each other */
    
      .column {
        flex: 25%;
        max-width: 33.3%;
        padding: 0 4px;
      }
    
      .column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
        filter: grayscale(1) brightness(0.5);
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s linear;
      }
    
      .column img:hover {
        filter: grayscale(0);
      }
    
      .kati
      {   
        z-index: 99 !important; 
      }
      .reform
      {
        z-index: 2 !important; 
      }
    </style>

    <title>NKSSAA</title>
  </head>
  <body>

  <section>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark navbar-right ">
      <div class="container"> 
      
        <a class="navbar-brand" href="/">  <img src="assets/images/logo.png" width="20" class="img-set"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> </button> 
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav text-light"> 
            <li class="nav-item"> <a class="nav-link " aria-current="page" href="/">Home</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/about">About Us</a> </li> 
            <li class="nav-item"> <a class="nav-link" href="/contact-us">Contact Us</a> </li> 
            <li class="nav-item"> <a class="nav-link active" href="/our-activities">Our Activities</a> </li>
          </ul>
          <!-- <ul class="navbar-nav">
            <div>
              <button class="btn btn-md text-light" style="background-color:#00BFFF;" type="button"data-bs-toggle="modal" data-bs-target="#regModal"  > Register </button>
              <button class="btn btn-md text-light"  style="background-color:#00BFFF;" type="button"  data-bs-toggle="modal" data-bs-target="#loginModal">Login </button>
            </div>
          </ul> -->
        </div> 
      </div>
    </nav>
  </section>


    <div class="text-center">
      <br />
      <h2 class="display-6"> Our Fun Moments In Pictures</h2>
      <p> These are pictures of alumni from meetings that takes palce occasionally</p>  
    </div>

	  <div class="container-fluid">
		  <div class="row">
		    <div class="column">
          <img src="assets/images/cert.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 " onclick="large('img2')" ondblclick="small('img2')" id="img2"/>
          <img src="assets/images/malile.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img3')" ondblclick="small('img3')" id="img3" />
          <img src="assets/images/food.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500"onclick="large('img4')" ondblclick="small('img4')" id="img4" />
          <img src="assets/images/big-crew.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500"onclick="large('img5')" ondblclick="small('img5')" id="img5" />
          <img src="assets/images/large.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500"onclick="large('img6')" ondblclick="small('img6')" id="img6" />
        </div>
        <div class="column">
          <img src="assets/images/kamangu.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img7')" ondblclick="small('img7')" id="img7">
          <img src="assets/images/sch.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img8')" ondblclick="small('img8')" id="img8">
          <img src="assets/images/new.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"  onclick="large('img9')" ondblclick="small('img9')" id="img9">
          <img src="assets/images/mm.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" onclick="large('img10')" ondblclick="small('img10')" id="img10">
        </div>
        <div class="column">
          <img src="assets/images/funmoments.png?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img1')" ondblclick="small('img1')" id="img1"/>
          <img src="assets/images/kitambo.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img11')" ondblclick="small('img11')" id="img11" />
          <div>
            <img src="assets/images/onyi.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img12')" ondblclick="small('img12')" id="img12">						
          </div>
          <img src="assets/images/mamen.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img13')" ondblclick="small('img13')" id="img13">
          <img src="assets/images/bazu.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" onclick="large('img14')" ondblclick="small('img14')" id="img14">
		    </div>
		  </div>
	  </div>


    <script>  
      function large(id)
      {  
        img = document.getElementById(id);
        img.style.transform="scale(1.5)";
        img.style.transition= "transform 0.25 ease";
        img.style.width= '40%';
        img.style.position = "absolute";
        img.style.left='30%';
        img.style.top='60%';
        img.classList.add("kati");
          
      }
      function small(id)
      {     
        img=document.getElementById(id);
        img.style.transform="scale(1)"; 
        img.style.transition="transform 0.25 ease";
        img.style.position="relative";
        img.style.width = '100%';
        img.style.top='0%';
        img.style.left='0%';
        img.classList.add("reform");  
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    
  </body>
</html>

