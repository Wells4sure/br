<?php
require_once('app/config/company.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake Bar Rewards | Success</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body style="background:#e9ecef;">
<div id="app">
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Please check your phone or email</strong> for information regarding your account setup.</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="index.php?q=<?php echo $hashed_comp_id;?>" role="button">Login Here</a>
  </p>
</div>
</div>
    <!-- Theme JS -->
    
    <script src="public/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a614006877.js" crossorigin="anonymous"></script>
</body>
</html>