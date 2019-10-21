<?php
  require_once 'config.php';
    // Get the company logo
    $image_path='';
    $primary_color='';
    $company_id='';
    if(isset($_REQUEST['q'])){

        $hashed_comp_id = $_REQUEST['q'];

        $_SESSION["hashed_query"] = $hashed_comp_id;

        $stmt = "SELECT * FROM company WHERE hashed_comp_id ='$hashed_comp_id'";

        $runStmt = $db->query($stmt) or die('Error : Call I.T support' .$db->error);
        
        if($runStmt->num_rows){
            while($row =$runStmt->fetch_assoc()){
                $company_id = $row["id"];
                $image_path = $row["logo_name"];
                $primary_color = $row["primary_color"];
            }

        }else{
            echo '<script>alert("Error here");</script>';
        }
        
    }
?>