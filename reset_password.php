<?php
    require_once 'app/config/company.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <div id="app" style="background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('public/images/patn_blck.jpeg'); background-size: cover;
    background-repeat: no-repeat; background-position:50%; padding:20px ; ">
        <reset-password :company="'<?php echo $company_id?>'" :camplogo="'<?php echo $image_path ?>'"/>
    </div>
    <script src="public/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a614006877.js" crossorigin="anonymous"></script>
</body>
</html>