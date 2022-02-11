<?php

include "db_con.php";
session_start();
$id = $_SESSION['id'];

if(isset($_POST['update_profile'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $data = "UPDATE credentials SET name = '$name', email = '$email', mobile = '$phone' WHERE id = '$id' ";

    mysqli_query($con, $data);
    header("location:profile.php");

}
?>