<?php 
  require_once 'app/config/sessions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Wellington Chanda, Thulani Rex">
    <title>Campaigns | Cake Bar</title>
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/carousel.css">

    <style>


.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

    </style>
</head>
<body>
    <div id="app" >

    <body>
    <header>
    <?php
    require_once 'nav/nav.php';
    ?>
  </header>

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      
        <div class="hero-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('public/images/s2.jpg');">
        <div class="hero-text">
            <h1 style="font-size:50px">Shop & Earn</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, tempore. Temporibus obcaecati aliquam praesentium tempora.</p>
            
        </div>
        </div>

      </div>
      <div class="carousel-item">
      <div class="hero-image"  style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('public/images/s1.png');">
        <div class="hero-text">
            <h1 style="font-size:50px">Cake Bar Rewards</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, tempore. Temporibus obcaecati aliquam praesentium tempora.</p>
            
        </div>
        </div>
      </div>
      <div class="carousel-item">
      <div class="hero-image"  style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('public/images/s3.jpg');">
        <div class="hero-text">
            <h1 style="font-size:50px">Get more when you shop</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, tempore. Temporibus obcaecati aliquam praesentium tempora.</p>
            
        </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-12 text-center ">
        <h2><a href="#deals">Current Campaigns</a></h2>
       
      </div>
      
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette" id="deals" >
      <div class="col-md-12">
       <campaigns-comp/>
        <!-- <p class="lead">There are no deals or promotions ath the moment check again later. </p> -->
      </div>

    </div>
  

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2019 Book Now Zambia. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
</body>
       
    </div>
    <script src="public/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a614006877.js" crossorigin="anonymous"></script>
</body>
</html>
<script>
    console.log(sessionStorage.getItem('person'));
</script>