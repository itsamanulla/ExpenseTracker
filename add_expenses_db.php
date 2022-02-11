<?php
include "db_con.php";
session_start();
$email = $_SESSION['email'];
$data1 = "select * from credentials where email='$email'";
$result = mysqli_query($con, $data1);
$row = mysqli_fetch_assoc($result);
$id = $row["id"];


       

    $date_of_expense = date('Y-m-d', strtotime($_POST['date']));
    $item = $_POST['item'];
    $item_cost = $_POST['itemCost'];

   
    
    
    
    $data = "INSERT INTO expenses (expense_date, item, item_cost,user_id) VALUES ('$date_of_expense','$item','$item_cost',$id)";
    
    mysqli_query($con, $data);
    header('location:manageexpenses.php');





?>