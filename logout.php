<?php
require_once 'app/config/config.php';
$comp_link = $_SESSION["hashed_query"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/carousel.css">
</head>
<body>
    <div id="app"></div>
</body>
</html>
<script src="public/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a614006877.js" crossorigin="anonymous"></script>
<script>
    sessionStorage.clear();
</script>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('Location:index.php?q='.$comp_link.'');
exit();
?>