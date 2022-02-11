<?php

include "db_con.php";
session_start();

if(!isset($_SESSION['email'])){
    header("Location:login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href=" style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title> Expense Tracker</title>
  </head>
  <body>
      <label class="st">Daily Expense tracker</label>
      <div class="container-fluids">
        <div class="row">
          <div class="col-md-2">
        <nav >
          <ul class="navi">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard" style="font-size:18px;color:black;"></i>&nbsp; Dashboard</a> </li>
            <li>
            
              <a class="dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ">
                <i class="fa fa-bars" aria-hidden="true" style="font-size:18px;color:black;"></i>&nbsp; Expenses
              </a>
              <ul class="dropdown-menu">
                <li><a href="Addexpense.php">Add Expense</a></li>
                <li><a href="manageexpenses.php">Manage Expense</a></li>
              </ul>
            
          </li>
            <li> <a href=""><i class="fa fa-bars" aria-hidden="true" style="font-size:18px;color:black;"></i>&nbsp;Expenses Report</a> </li>
            <li><a href="profile.php"><i class="fa fa-user" style="font-size:18px;color:black;"></i>&nbsp; Profile</a> </li>
            <li><a href="changepassword.php"><i class="fa fa-paste" style="font-size:18px;color:black;"></i>&nbsp; Change Password</a> </li>
            <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:18px;color:black;"></i>&nbsp; Logout</a> </li>
          </ul>
        </nav>
        </div>
        

    <div class="col-md-4">
        
        <form action="add_expenses_db.php" method="post" style="margin-top: 20px;">
            <label style="font-size: 30px; color: rgb(0 0 0 / 45%)">Expense</label>
            <div class="form-group">
                <label for="item">Date of Expense</label>
                <input type="date" class="form-control" name = "date" id="date" >
            </div>
            <div class="form-group">
              <label for="item">Item</label>
              <input type="text" class="form-control" name="item" id="item" >
              
            </div>
            <div class="form-group">
              <label for="Cost">Cost of item</label>
              <input type="number" class="form-control" name="itemCost" id="Cost" >
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
        </div>
        
    <script src="https://use.fontawesome.com/99be0dae8f.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>