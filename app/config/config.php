<?php

session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'dotcomrewards');

/* Attempt to connect to MySQL database */
$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . $db->connect_error);
}

//Global Functions

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// messages 
$errors =[];
$success =[];
$warning =[];
if(isset($_REQUEST['message'])){
    $message =$_REQUEST['message'];
    echo '
      <script> 
        alert("Message \n '.$message.'");
      </script>
    ';
  }