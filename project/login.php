<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    
    if(isset($_SESSION["Stid"])){
        
        if($_SESSION["Roleid"] == 1){
            header("location: ./otherphpfile/AdminDashboard.php");
      }else{
     
          header("location: ./otherphpfile/StudDashboard.php");
      }
    }
    
    ?>
<head>
  <title>Act Polyols|Login</title>
  <link rel="shortcut icon" href="./assets/Image/title.PNG"> 
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="./assets/css/login.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</head>

<body>
  <div class="login-container container-fluid d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-center w-75" >
      
        <div class="d-none d-sm-none d-md-block">
          <img class="img-fluid h-100" src="./assets/Image/Glucose-syrup.jpg"
            alt="logo" />

        </div>
        <div class="w-auto bg-white p-md-5  py-5">
          <form method="post" action="./otherphpfile/logincheck.php">
            <div class="w-75 mx-auto mb-3">
              <img class="ml-lg-2 img-fluid" src="./assets/Image/logo-header.png" />
             
            </div>
            <div class="form-group w-75 mx-auto mb-0">
              <label class="form-text" for="exampleInputEmail1">Email</label>
              <input class="form-feild" type="email"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" />
            </div>
            <div class="form-group w-75 mx-auto pswrd-show-btn">
              <label class="form-text" for="InputPswrd">Password</label>
              <input class="form-feild" type="password" name="password" id="InputPswrd" placeholder="Password" />
              <span onclick="show_hide_pswrd()"><i id="eye" class="fas fa-eye-slash"></i></span>
            </div>
            <div class="w-75 mx-auto">
              <button type="submit" name="login" class="btn login-btn w-100">
                Login
              </button>
              <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span style='color: red'>$error</span>";
                    }
                ?> 
            </div>
           
          </form>
        </div>
   
    </div>
  </div>
  <script>
    function show_hide_pswrd() {
  var x = document.getElementById("InputPswrd");
  var eye = document.getElementById("eye");
 
  if (x.type === "password") {
    x.type = "text";
    eye.classList.add("fa-eye");
    eye.classList.remove("fa-eye-slash");
  } else {
    x.type = "password";
    eye.classList.add("fa-eye-slash");
    eye.classList.remove("fa-eye");
  }
}
  </script>
</body>

</html>