
<?php


/*
$host = "localhost";
$username  = "root";
$passwd = "";
$dbname = "test";

//Creating a connection
$con = new mysqli($host, $username, $passwd, $dbname);

if($con->connect_errno){
   print("Connection Failed ");
}else{
   print("Connection Established Successfully");
}

//Closing the connection
$con -> close(); */


?>



<?php

session_start();
class db{

private $hostname;
private $dbusername;
private $dbpass;
private $dbname; 

public $conn;
public Function  connect(){
    $hostname="localhost";
    $dbusername= "root";
    $dbpass="";
    $dbname="actdb"; 

    $conn=new mysqli($hostname,$dbusername,$dbpass,$dbname);
    
    
        if($conn->connect_errno){
            echo "Connection Failed".$conn->connect_errno;
        }else{
         // echo "Connection Established Successfully";
      
        }
      return $conn;
}
               

public function check_login($email, $password,$conn) {
   
    $sql = "select * FROM login where Email='$email' AND Password='$password' ";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
        $row = $query->fetch_array();
        $_SESSION["Stid"] = $row['Id'];
        $_SESSION["Roleid"] = $row['RoleId'];
        $_SESSION["CompanyId"] = $row['CompanyId'];
     //   $_SESSION["Package"] = $row['PackageName'];
        $_SESSION["Name"] = $row['Name'];
        $_SESSION["menu"]=0;
        $_SESSION["Perror"]=null;
        $_SESSION["Packerror"]=null;
        $_SESSION["PEerror"]=null;
        $_SESSION["Prcerror"]=null;
        

       // $sql2 = "INSERT INTO activity (user_id, user_email, action_made )
       // VALUES ('".$row['Id']."', '".$row['Name']."', 'Logged In')";
        // $obj=new db();
        // $conn =  $obj->connect();
       // $geting = mysqli_query($conn, $sql2);
        /*if ($conn->query($sql) === TRUE) {
            return True;
            //  echo "New record created successfully";
        }
        */


        return True;
    
    }


    else{
        return false;
    }
   
}



public function logout(){
   
    header("location: ../login.php");
//     $sql2 = "INSERT INTO activity (user_id, user_email, action_made )
// VALUES ('".$_SESSION['Stid']."', '".$_SESSION['Name']."', 'Logged Out')";
//    $obj=new db();
//    $conn =  $obj->connect();

// $geting = mysqli_query($conn,$sql2);
session_destroy();
}


}





/*

$obj=new db();

if($obj->check_login("admin@gmail.com","Abc@12",$obj->connect())){
echo 'login';
}else{
    echo 'fail';
}
*/

?>
