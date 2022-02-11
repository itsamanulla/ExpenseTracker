<?php

include "db_con.php";
session_start();
$id = $_SESSION['id'];

if(isset($_POST['updatedata'])){
$item_id = $_POST['update_id'];
    $date_of_expense = date('Y-m-d', strtotime($_POST['expense_date']));
    $item = $_POST['item'];
    $item_cost = $_POST['item_cost'];

    $data = "UPDATE expenses SET expense_date = '$date_of_expense', item = '$item', item_cost = '$item_cost' WHERE user_id = '$id' AND id = '$item_id' ";
    
mysqli_query($con, $data);
header("location:manageexpenses.php");

}


// if(isset($_GET['delete_data'])){
$del_id = $_GET['id'];
$query = "DELETE FROM expenses WHERE id = '$del_id' ";
mysqli_query($con,$query);
header("location:manageexpenses.php");


?>    