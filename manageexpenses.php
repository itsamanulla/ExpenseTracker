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
    <title>Manage Expenses</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

  </head>

  <body>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          <div class="modal-body"><form action="edit_expenses.php" method="POST">
            <input type="hidden" name="update_id" id="update_id" >  
            
              <div class="form-group">
                <label >Item</label>
                <input type="text" class="form-control" name="item" id="item">

              </div>
              <div class="form-group">
                <label for="Cost">Cost of item</label>
                <input type="number" class="form-control" name="item_cost"  id="item_cost">
              </div>
              <div class="form-group">
                <label for="item">Date of Expense</label>
                <input type="date" class="form-control" name="expense_date" id="expense_date">
              </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name ="updatedata" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <label class="st">Daily Expense tracker</label>
    <div class="container-fluids">
      <div class="row">
        <div class="col-md-2">
          <nav>
            <ul class="navi">
              <li class="active"><a href="index.php"><i class="fa fa-dashboard"
                    style="font-size:18px;color:black;"></i>&nbsp; Dashboard</a> </li>
              <li>

                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ">
                <i class=" fa fa-bars" aria-hidden="true" style="font-size:18px;color:black;"></i>&nbsp; Expenses
                </a>
                <ul class="dropdown-menu">
                  <li><a href="Addexpense.php">Add Expense</a></li>
                  <li><a href="manageexpenses.php">Manage Expense</a></li>
                </ul>

              </li>
              <li> <a href=""><i class="fa fa-bars" aria-hidden="true"
                    style="font-size:18px;color:black;"></i>&nbsp;Expenses Report</a> </li>
              <li><a href="profile.php"><i class="fa fa-user" style="font-size:18px;color:black;"></i>&nbsp;
                  Profile</a> </li>
              <li><a href="changepassword.php"><i class="fa fa-paste" style="font-size:18px;color:black;"></i>&nbsp; Change Password</a>
              </li>
              <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:18px;color:black;"></i>&nbsp;
                  Logout</a> </li>
            </ul>
          </nav>
        </div>

        <div class="col-md-8" >
          <table class="table">
            <label style="font-size: 30px; color: rgb(0 0 0 / 45%)">Expenses</label>
            <table class="table table-bordered" id="example">
              <thead>
                <tr>
                  <th scope="col">Sr.no</th>
                  <th scope="col">Expense Item</th>
                  <th scope="col">Expense Cost</th>
                  <th scope="col">Expense Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "db_con.php";
                $id = $_SESSION['id'];
              $s_no = 0;
              
                $sql = "SELECT * FROM `expenses` WHERE user_id = '$id' ";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                  $s_no++;
                  $_SESSION['item_id'] = $row['id'];
                  echo "
                  <tr>
                    <td scope='row'>". $row['id'] ."</td>
                    <td>". $row['item'] ."</td>
                    <td>". $row['item_cost'] ."</td>
                    <td>". $row['expense_date'] ."</td>
                    <td> 
                      <button type='button' class='btn btn-success editbtn' name= 'submit'>
                      Edit
                  </button>  <a href='edit_expenses.php?id=".$row['id']."' name = 'delete_data' class='btn btn-danger'>Delete</a></td>
                  </tr>";
                  
                }
                

                ?>

              </tbody>
            </table>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/99be0dae8f.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
    </script>
    <script>
      $(document).ready(function () {
        $('#example').DataTable();
      });
    </script>
    
<Script>
$(document).ready(function (){
      $('.editbtn').on('click', function(){
        $('#editModal').modal('show'); 
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();
        console.log(data);

        $('#update_id').val(data[0]);
        $('#item').val(data[1]);
        $('#item_cost').val(data[2]);
        $('#expense_date').val(data[3]);
      
      
    });
    });
</Script>

  </body>

</html>