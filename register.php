<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
    <title>Expense Tracker</title>
    
    <script>
     function check(){
        var name=document.getElementById("Name");
        var phone=document.getElementById("phone");
        var email=document.getElementById("Email");
        var pass=document.getElementById("password");
        var con=document.getElementById("confirm_password");
        var nrgx=/^[a-z A-Z]+$/;
        var prgx=/^[6-9][\d]+$/;
        var ergx=/^[a-zA-Z][a-zA-Z\d\._]*[@][a-zA-Z]+[\.][a-zA-Z]+$/;
        document.getElementById("nameid").style.visibility="hidden";
        name.style.border="none";
        document.getElementById("mobid").style.visibility="hidden";
        phone.style.border="none";
        document.getElementById("emailid").style.visibility="hidden";
        email.style.border="none";
        document.getElementById("passid").style.visibility="hidden";
        pass.style.border="none";
        document.getElementById("coid").style.visibility="hidden";
        con.style.border="none";
        if(name.value.trim().length==""){
          document.getElementById("nameid").innerHTML="This field is required";
          document.getElementById("nameid").style.color="red";
          document.getElementById("nameid").style.visibility="visible";
          name.style.border="solid 2px red";
          return false;
        }
        else if(name.value.trim().length<4){
          document.getElementById("nameid").innerHTML="Length should be greater than or equal to 4";
          document.getElementById("nameid").style.color="red";
          document.getElementById("nameid").style.visibility="visible";
          name.style.border="solid 2px red";
          return false;
        }
        else if(!name.value.trim().match(nrgx)){
          document.getElementById("nameid").innerHTML="Name should not contain integers";
          document.getElementById("nameid").style.color="red";
          document.getElementById("nameid").style.visibility="visible";
          name.style.border="solid 2px red";
          return false;
        }
        else if(phone.value.trim().length==""){
          document.getElementById("mobid").innerHTML="This field is required";
          document.getElementById("mobid").style.color="red";
          document.getElementById("mobid").style.visibility="visible";
          phone.style.border="solid 2px red";
          return false;
        }
        else if(!phone.value.trim().match(prgx)){
          document.getElementById("mobid").innerHTML="Please enter valid phone number";
          document.getElementById("mobid").style.color="red";
          document.getElementById("mobid").style.visibility="visible";
          phone.style.border="solid 2px red";
          return false;
        }
        else if(phone.value.trim().length<10 || phone.value.trim().length>10){
          document.getElementById("mobid").innerHTML="Phone no should be of 10 digits";
          document.getElementById("mobid").style.color="red";
          document.getElementById("mobid").style.visibility="visible";
          phone.style.border="solid 2px red";
          return false;
        }
        else if(email.value.trim().length==""){
         
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
       else if(pass.value.trim().length<6){
         
         document.getElementById("passid").innerHTML="Password should be of atleast 6 characters";
         document.getElementById("passid").style.color="red";
         document.getElementById("passid").style.visibility="visible";
         pass.style.border="solid 2px red";
         return false;
       }
       else if(!pass.value.trim().match(/[a-z]/)){
         document.getElementById("passid").innerHTML="Atleast one lowecase letter required";
         document.getElementById("passid").style.color="red";
         document.getElementById("passid").style.visibility="visible";
         pass.style.border="solid 2px red";
         return false;
       }
       else if(!pass.value.trim().match(/[A-Z]/)){
         document.getElementById("passid").innerHTML="Atleast one uppercase letter required";
         document.getElementById("passid").style.color="red";
         document.getElementById("passid").style.visibility="visible";
         pass.style.border="solid 2px red";
         return false;
       }
       else if(!pass.value.trim().match(/[\d]/)){
         document.getElementById("passid").innerHTML="Atleast one integer required";
         document.getElementById("passid").style.color="red";
         document.getElementById("passid").style.visibility="visible";
         pass.style.border="solid 2px red";
         return false;
       }
       else if(!pass.value.trim().match(/[!@#$%^&*]/)){
         document.getElementById("passid").innerHTML="Atleast one special character letter required";
         document.getElementById("passid").style.color="red";
         document.getElementById("passid").style.visibility="visible";
         pass.style.border="solid 2px red";
         return false;
       }
       else if(con.value.trim().length==""){
         
         document.getElementById("coid").innerHTML="This field is required";
         document.getElementById("coid").style.color="red";
         document.getElementById("coid").style.visibility="visible";
         con.style.border="solid 2px red";
         return false;
       }
        else if(pass.value.trim()!=con.value.trim()){
          
         document.getElementById("coid").innerHTML="Password not matched";
         document.getElementById("coid").style.color="red";
         document.getElementById("coid").style.visibility="visible";
         con.style.border="solid 2px red";
         return false
       }
        else return true;
      }
    </script>
  </head>
  <body >
     <div class="container">
        <div class="row">
          <div class="col">
            <div class="col-4 cm border border-dark">
              <h4 style="color: red; margin-bottom:0px; ">Register</h4>
              <br>
              <form action="signup.php" method="post" onsubmit="return check()" novalidate>
                
                <div>
                    <input type="text" class="form-control" name="name" id="Name" placeholder="Name" >
                    <small style="visibility: hidden;" id="nameid">Invalid</small>
                </div>
                <div>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Mobile no">
                    <small style="visibility: hidden;" id="mobid">Invalid</small>
                </div>
                <div >
                  <input type="email" class="form-control" name="email" id="Email" placeholder="Email">
                  <small style="visibility: hidden;" id="emailid">Invalid</small>
                </div>
                <div>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                  <small style="visibility: hidden;" id="passid">Invalid</small>
                </div>
                <div>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <small style="visibility: hidden;" id="coid">Invalid</small>
                  </div>
                <div >
                  <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Register" >
                  <span>&nbsp;&nbsp; Already have an account? <a href="login.php" class="txt">Sign in</a></span>
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