<?php
    require_once 'app/config/company.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pin Request</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body style="background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('public/images/patn_blck.jpeg'); background-size: cover;
    background-repeat: no-repeat; background-position:50%; padding:20px ; ">
    <div id="app">
        <reset-comp
            :company="'<?php echo $company_id?>'" 
            :complogo="'<?php echo $image_path ?>'" 
            :comphash="'<?php echo $hashed_comp_id ?>'">
            
        </reset-comp>
    </div>
    <script src="public/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a614006877.js" crossorigin="anonymous"></script>
</body>
</html>