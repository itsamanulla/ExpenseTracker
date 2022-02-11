<?php

include "db_con.php";
session_start();

if(!isset($_SESSION['email'])){
    header("Location:login.php");
}





//today expense

$userid=$_SESSION['id'];
$todate=date("Y-m-d");
//echo $todate ;
$query=mysqli_query($con,"SELECT sum(item_cost) AS today_expense FROM `expenses` WHERE (expense_date)='$todate' AND user_id='$userid' ");
$row=mysqli_fetch_assoc($query);
$sum_today_expense=$row['today_expense'];
//echo $sum_today_expense;

//yesterday expense
$ydate=date("Y-m-d",strtotime("-1 days"));
$query1=mysqli_query($con,"SELECT sum(item_cost) AS yesterday_expense FROM `expenses` WHERE (expense_date)='$ydate' AND user_id='$userid' ");
$row1=mysqli_fetch_assoc($query1);
$sum_yesterday_expense=$row1['yesterday_expense'];
//echo $sum_today_expense;

//last 7 daye expenese
$l7date=date("Y-m-d",strtotime("-1 week"));
//echo $l7date;
$query2=mysqli_query($con,"SELECT sum(item_cost) AS last_expense FROM `expenses` WHERE ((expense_date) BETWEEN '$l7date' AND '$todate') AND user_id='$userid';");
$row2=mysqli_fetch_assoc($query2);
$sum_last7_expense=$row2['last_expense'];

//last month expense
$l_m_date=date("Y-m-d",strtotime("-1 month"));
//echo $l7date;
$query3=mysqli_query($con,"SELECT sum(item_cost) AS last_m_expense FROM `expenses` WHERE ((expense_date) BETWEEN '$l_m_date' AND '$todate') AND user_id='$userid';");
$row3=mysqli_fetch_assoc($query3);
$sum_last_M_expense=$row3['last_m_expense'];


//last year expense

$l_y_date=date("Y");
//echo $l_y_date;
$query4=mysqli_query($con,"SELECT sum(item_cost) AS last_y_expense FROM `expenses` WHERE (year(expense_date) = '$l_y_date') AND user_id='$userid';");
$row4=mysqli_fetch_assoc($query4);
$sum_last_y_expense=$row4['last_y_expense'];


//total expense

//$l_y_date=date("Y");
//echo $l_y_date;
$query5=mysqli_query($con,"SELECT sum(item_cost) AS total_expense FROM `expenses` WHERE user_id='$userid' ");
$row5=mysqli_fetch_assoc($query5);
$total_expense=$row5['total_expense'];


?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title></title>
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
                <li> 
                    <a class="dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ">
                        <i class="fa fa-bars" aria-hidden="true" style="font-size:18px;color:black;"></i>&nbsp; Expenses Report
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="datewise.php">Datewise Report</a></li>
                        <li><a href="monthwise.php">Monthwise Report</a></li>
                        <li><a href="yearwise.php">Yearwise Report</a></li>
                      </ul>
                </li>
                <li><a href="profile.php"><i class="fa fa-user" style="font-size:18px;color:black;"></i>&nbsp; Profile</a> </li>
                <li><a href="changepassword.php"><i class="fa fa-paste" style="font-size:18px;color:black;"></i>&nbsp; Change Password</a> </li>
                <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:18px;color:black;"></i>&nbsp; Logout</a> </li>
              </ul>
            </nav>
        </div>
        
      <div class="col-md-10">
        <h1>Dashboard</h1>
        <div class="container.fluids">
          <div class="row">
            <div class="col-md-3">
              <div style="border: solid 3px whitesmoke; width: 200px;height: 28vh;margin-top: 30px;background-color: white;" class=""shadow p-3 mb-5 bg-white rounded" >
              <label style="margin-left: 20px;margin-top: 0px;font-size: large;">Today's Expense</label>
              <div class="res-circle">
              <div class="circle-txt"; style="color: orange;font-size: large;"><?php echo $sum_today_expense ?></div> <?php if($sum_today_expense =="") echo "0"; ?>
            </div>
            </div>
            </div>
            <div class="col-md-3">
              <div style="border: solid 3px whitesmoke; width: 200px;height: 28vh;margin-top: 30px;background-color: white;" class="shadow p-3 mb-5 
              bg-white rounded">
              <label style="margin-left: 0px;margin-top: 0px;font-size: large;">Yesterday's Expense</label>
              <div class="res-circle1">
              <div class="circle-txt"; style="color: dodgerblue;font-size: large;"><?php echo $sum_yesterday_expense; if($sum_yesterday_expense =="") echo "0"; ?></div>
            </div>
            </div>
            </div>
            <div class="col-md-3">
              <div style="border: solid 3px whitesmoke; width: 210px;height: 28vh;margin-top: 30px;background-color: white;" class="shadow p-3 mb-5 
              bg-white rounded">
              <label style="margin-left: 0px;margin-top: 0px;font-size: large;">Last 7 day's Expenses</label>
              <div class="res-circle2">
              <div class="circle-txt"; style="color: lightgreen;font-size: large;"><?php echo $sum_last7_expense; if($sum_last7_expense =="") echo "0"; ?></div>
            </div>
            </div>
            </div>
            <div class="col-md-3">
              <div style="border: solid 3px whitesmoke; width: 220px;height: 29vh;margin-top: 30px;background-color: white;" class="shadow p-3 
              bg-white rounded">
              <label style="margin-left: 0px;margin-top: 0px;font-size: large;"> Last 30 day's Expenses</label>
              <div class="res-circle3">
              <div class="circle-txt"; style="color: gray;font-size: large;"><?php echo $sum_last_M_expense; if($sum_last_M_expense =="") echo "0"; ?></div>
            </div>
            </div>
            </div>
            <div class="col-md-3">
              <div style="border: solid 3px whitesmoke; width: 215px;height: 28vh;margin-top: 30px;background-color: white;" class="shadow p-3 mb-5
              bg-white rounded">
              <label style="margin-left: 0px;margin-top: 0px;font-size: large;">Current Year Expenses</label>
              <div class="res-circle4">
              <div class="circle-txt"; style="color: lightskyblue;"><?php echo $sum_last_y_expense; if($sum_last_y_expense =="") echo "0"; ?></div>
            </div>
            </div>
            </div>
            <div class="col-md-3">
              <div style="border: solid 3px whitesmoke; width: 200px;height: 28vh;margin-top: 30px;background-color: white;" class="shadow p-3 mb-5 
              bg-white rounded">
              <label style="margin-left: 25px;margin-top: 0px;font-size: large;">Total Expenses</label>
              <div class="res-circle5">
              <div class="circle-txt"; style="color: lightpink;"><?php echo $total_expense; if($total_expense =="") echo "0"; ?> </div>
            </div>
            </div>
            </div>
            
          </div>
        </div>
        
        
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
