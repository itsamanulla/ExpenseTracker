<?php

include "db_con.php";
session_start();
$id = $_SESSION['id'];

if(isset($_POST['submit'])){
    if($_POST['new'] == $_POST['conf'] ){
        
    
    $new_p = $_POST['conf'];

    $data = "UPDATE credentials SET password = '" . md5($new_p) . "' WHERE id = '$id' ";
    mysqli_query($con, $data);
    header("location:index.php");
    }
    else{
        echo '<script>alert("Current Password and New Password does not match")</script>';
    }
    

}
else{
    echo "Failed to update password";
}
?>
