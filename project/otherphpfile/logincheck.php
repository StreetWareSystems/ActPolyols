<?php

include_once('../DatabasePhpFile/DbConnection.php');
$error="";

if(isset($_POST["login"])){
   
    $email = $_POST['email'];
    $pass=$_POST['password'];
   
    if (empty($email)) {
        $error= $error."*Email is empty";
        $error =$error.'<br>';
    }

    if (empty($pass)) {
        $error= $error."*Password is empty";
        $error =$error.'<br>';
    } 

   
$obj=new db();

if($obj->check_login($email, $pass,$obj->connect())){
      

        if($_SESSION["Roleid"] == 1){
              header("location: ./AdminDashboard.php");
        }else{
       
            header("location:./StudDashboard.php");
        }
        $error="";
       //header("location: Admin.php");
    }else{
        if (empty($email) && empty($pass)) {


        }else{
            $error="*Invalid EmailID/Password";

        }
        $_SESSION["error"] = $error;
        header("location: ../login.php");

      
    }
    
  
}





?>