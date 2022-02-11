<?php


if(isset($_POST['submit'])) {
    include "db_con.php";
    

    $email = $_POST['Email'];
    $pass = $_POST['password'];
    

    $data = "SELECT * FROM `credentials` WHERE email='$email'
    AND password='" . md5($pass) . "'";
       
    $result = mysqli_query($con, $data) or die("Query Failed");

    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["mobile"] = $row["mobile"];
            $_SESSION["id"] = $row["id"];
            header('location:index.php');
            
        }
    }
    else{
        echo '<script>alert("Incorrect Email or Username")</script>';
        
    }

}

?>