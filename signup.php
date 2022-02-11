<?php

include "db_con.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['password'];
$create_datetime = date("Y-m-d H:i:s");


$data = "INSERT INTO credentials (MOBILE, EMAIL, PASSWORD,NAME,CREATE_DATETIME) VALUES ('$phone','$email','" . md5($pass) . "','$name','$create_datetime')";

mysqli_query($con, $data);
header('location:login.php');

?>