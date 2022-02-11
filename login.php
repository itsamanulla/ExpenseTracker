<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href=" style.css">
    <title>Login</title>
    <script>
      function check(){
         var email=document.getElementById("Email");
         var pass=document.getElementById("password");
          var ergx=/^[a-zA-Z][a-zA-Z\d\._]*[@][a-zA-Z]+[\.][a-zA-Z]+$/;
          document.getElementById("emailid").style.visibility="hidden";
        email.style.border="none";
        document.getElementById("passid").style.visibility="hidden";
        pass.style.border="none";
          if(email.value.trim().length==""){
            
            document.getElementById("emailid").innerHTML="This field is required";
            document.getElementById("emailid").style.color="red";
            document.getElementById("emailid").style.visibility="visible";
            email.style.border="solid 2px red";
            return false;
          }
          else if(!email.value.trim().match(ergx)){
            document.getElementById("emailid").innerHTML="Please enter valid email id";
            document.getElementById("emailid").style.color="red";
            document.getElementById("emailid").style.visibility="visible";
            email.style.border="solid 2px red";
            return false;
          }
          else if(pass.value.trim().length==""){
         
         document.getElementById("passid").innerHTML="This field is required";
         document.getElementById("passid").style.color="red";
         document.getElementById("passid").style.visibility="visible";
         pass.style.border="solid 2px red";
         return false;
       }
          else true;
      }
     
    </script>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="col-4 dm border border-dark">
              <h4 style="color: red; margin-bottom:0px; ">Login</h4>
              <br>
              <form action="loginhelp.php" method="post" novalidate onsubmit="return check()">
                <div class="mb-3 ">
                  <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
                  <small style="visibility: hidden;" id="emailid">Invalid</small>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  <small style="visibility: hidden;" id="passid">Invalid</small>
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Login">
                 <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Don't have an account? <a href=" register.php" class="txt">Sign up</a></span>  
                </div>
                
              </form>
            </div>
          </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>