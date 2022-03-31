<?php

include_once('./DbConnection.php');
$obj=new db();

$conn=$obj->connect();

include_once('./crud.php');
$crud=new Crud();








/* ADD */
if(isset($_POST['padd'])){
    
    $ptype = $_POST['ptype'];
    $crud->Ptype_Add($ptype,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a new Product Type [$ptype]')";
    

    $_SESSION["menu"]=1;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['productadd'])){
    
    $productid = $_POST['Pid'];
    $productname = $_POST['Pname'];
    $UsdperTon = $_POST['PUsd'];
    $ProductDes = $_POST['Pdescription'];
    $DisInP = $_POST['PDis'];
    $productype = $_POST['Ptype'];

    

    
    $check=$crud->Product_check_id($productid,$conn);
    $error="";
        
    if($check == 0){
         
          $check=$crud->Product_check_name($productname,$conn);
          
          $error=$error."ProductID Already used";
          
          if($check == 0){
            $error=$error."<br>";
            $error=$error."ProductName Already used";
            $_SESSION["Perror"]=$error;
          }else{
            $_SESSION["Perror"] = $error;
          }
   
       
        
    }else{
        
        $check=$crud->Product_check_name($productname,$conn);
        if($check == 0){
            $error=$error."<br>";
            $error= $error."ProductName Already used";
            $_SESSION["Perror"] = $error;
            
          }else{
            $_SESSION["Perror"]=null;
          }
    }
       


 if(isset($_SESSION["Perror"])){
    
    $_SESSION["menu"]=2;
    header("location: ../otherphpfile/AdminDashboard.php");
    

 }else{
    $crud->Product_Add($productid, $productname,$UsdperTon,$ProductDes,$DisInP,$productype,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Product [$productid]')";
    $_SESSION["menu"]=2;
    header("location: ../otherphpfile/AdminDashboard.php");  
 }

      



    
}

if(isset($_POST['packageadd'])){
    
    $packagename = $_POST['PackageName'];
    $costperunit = $_POST['CostperUnit'];
    $weight = $_POST['Weight'];
    $twentyft = $_POST['20FtPallet'];
    $fortyft = $_POST['40FtPallet'];
    $unitweight = $_POST['UnitWeight'];
    $ProductTypeID = $_POST['Ptype'];

    if($_POST['bagperpallet'] !=Null){
        $bagsperP = $_POST['bagperpallet'];
    }else{
        $bagsperP = NUll;
    }

    
    $check=$crud->Package_check_name($packagename,$conn);
    $error="";
        
    if($check == 0){
         
           
          $error="Package Name Already used";
          
          $_SESSION["Packerror"] = $error;
   
       
        
    }else{
        $_SESSION["Packerror"]=null;
       
    }
       


    if(isset($_SESSION["Packerror"])){
        
        
        $_SESSION["menu"]=3;
        header("location: ../otherphpfile/AdminDashboard.php");

    }else{
      
        $crud->package_Add($packagename,$costperunit,$weight,$twentyft,$fortyft,$unitweight,$bagsperP,$ProductTypeID,$conn);
    
        
        // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Package [$packagename]')";
        // if ($conn->query($sql2) === TRUE) {
        //  //   echo "New record created successfully1";
        //     } else {
                
        //   //  echo "Error: " . $sql . "<br>" . $conn->error;
        //     }

        
        $_SESSION["menu"]=3;
        header("location: ../otherphpfile/AdminDashboard.php");
    }

  

    
}


if(isset($_POST['freightadd'])){
    
    

    $Port=$_POST['Port'];
    $Country=$_POST['country'];
    $FreightSize=$_POST['Fsize'];
    $PortName=$_POST['Portname'];
    $Rate=$_POST['Rate'];
    $Limit=$_POST['Limit'];
    $Maxlimit=$_POST['Maxlimit'];
    $OWPenalty=$_POST['OWPenalty'];
    
    $row=$crud->frieght_getvalue_from_package("Drums",$FreightSize,$conn);
    $PerTonInDrums= $row[0];
    
    $row=$crud->frieght_getvalue_from_package("SpaceKraft",$FreightSize,$conn);
    $PerTonInTotes=$row[0];
   
    $PerTonInDrums= (float)($Rate+$OWPenalty)/$PerTonInDrums;
    $PerTonInTotes= (float)($Rate+$PerTonInDrums)/$PerTonInTotes;
    $Validity=$_POST['Validity'];
  
    $crud->freight_Add($Port,$Country,$FreightSize,$PortName,$Rate,$Limit,$Maxlimit,$OWPenalty,$PerTonInDrums,$PerTonInTotes,$Validity,$conn); 

   // echo $_SESSION['Name'];
  //  $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION['CompanyId']."', '".$_SESSION['Name']."', 'Added a New Freight Rate')";
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Freight Rate in [$Port]')";
    //     if ($conn->query($sql2) === TRUE) {
    //      //   echo "New record created successfully1";
    //         } else {
                
    //       //  echo "Error: " . $sql . "<br>" . $conn->error;
    //         }
  
    // if ($conn->query($sql2) === TRUE) {
    //     echo "New record created successfully1";
    //     } else {
            
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }


   $_SESSION["menu"]=4;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}


if(isset($_POST['cadd'])){
    
    $cs = $_POST['ContainerSize'];
    $cp = $_POST['ContainerPallet'];
    $crud->Container_Add($cs,$cp,$conn);
    
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Container')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=5;
    header("location: ../otherphpfile/AdminDashboard.php");

    
}



if(isset($_POST['palletadd'])){
    
    $pn = $_POST['PalletName'];
    $cost = $_POST['CostInDollar'];
    $weight = $_POST['WeightinKg'];
    $crud->pallettype_Add($pn,$cost,$weight,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Pallet [$pn]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    $_SESSION["menu"]=6;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}


if(isset($_POST['dutiesadd'])){
    
    $country = $_POST['country'];
    $producttype = $_POST['Ptype'];
    $Dv = $_POST['Dv'];
    
    $crud->duties_Add($country,$producttype,$Dv,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Duty in [$country]')";
    //     if ($conn->query($sql2) === TRUE) {
    //      //   echo "New record created successfully1";
    //         } else {
                
    //       //  echo "Error: " . $sql . "<br>" . $conn->error;
    //         }
    $_SESSION["menu"]=7;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

// if(isset($_POST['genoutput'])){

//   $ProductId = $_POST['Product'];
//   $Packaging = $_POST['Package'];
//   $Port = $_POST['Port'];
//   $Container = $_POST['Container'];
//   $PalletType = $_POST['Pallet'];
//   $ActMargin = $_POST['Actmargin'];
//   $NumOfPackaging = $_POST['val1'];
//   $WeightPerPackaging = $_POST['val2'];


//   $crud->userlog($ProductId,$Packaging,$Port,$Container,$PalletType,$ActMargin,$NumOfPackaging,$WeightPerPackaging,$conn);

//   $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Data inserted in USER_LOG [$ProductId]')";
//   if ($conn->query($sql2) === TRUE) {
//    //   echo "New record created successfully1";
//       } else {
          
//     //  echo "Error: " . $sql . "<br>" . $conn->error;
//       }

  
//   $_SESSION["menu"]=8;
//   header("location: ../otherphpfile/AdminDashboard.php");

// }


if(isset($_POST['loginadd'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contactno'];
    $roleid= $_POST['RoleType'];
    $companyid=$_POST['Company'];
  


    $crud->login_Add($name,$email,$password,$contact,$roleid,$companyid,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New User [$name]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    $_SESSION["menu"]=8;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}


if(isset($_POST['companyadd'])){
    
    $name = $_POST['companyname'];
    $files = $_FILES['photo'];
    

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextstored))
    {
         $destinationfile = '../DatabasePhpFile/Company/'.$filename;
         move_uploaded_file($filetmp,$destinationfile);  
    }

    $crud->company_Add($name,$destinationfile,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Added a New Company [$name]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
  

    $_SESSION["menu"]=9;

    header("location: ../otherphpfile/AdminDashboard.php");
    

}



if(isset($_POST['Product_Assign_Companyadd'])){
    
    $productid = $_POST['Product'];
    $companyid = $_POST['Company'];
    $total = $_POST['Total'];


    $check=$crud->Check_company_product_Add($companyid,$productid,$conn);
    $error="";
    
    if($check != null){
         
           
          $error="Product Already Assign to Company";
          
          $_SESSION["Prcerror"] = $error;
   
       
        
    }else{
        echo 'dwa';
        $_SESSION["Prcerror"]=null;
       
    }
       


    if(isset($_SESSION["Prcerror"])){
        
      
       $_SESSION["menu"]=10;
        header("location: ../otherphpfile/AdminDashboard.php");

    }else{
  
      $crud->company_product_Add($companyid,$productid,$total,$conn) ;
      // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Assigned a New Product [$productid]')";
      // if ($conn->query($sql2) === TRUE) {
      //  //   echo "New record created successfully1";
      //     } else {
              
      //   //  echo "Error: " . $sql . "<br>" . $conn->error;
      //     }
     $_SESSION["menu"]=10;
      header("location: ../otherphpfile/AdminDashboard.php");
    }



 
    
}

/* End ADD */

/*Delete */

if(isset($_POST['producttypeD'])){
    
    $id = $_POST['dvalue'];
    $crud->duties_Add($country,$producttype,$Dv,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted Product type [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    
    $_SESSION["menu"]=1;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['productd'])){
    
    $id = $_POST['dvalue'];
    
 
    $crud->Product_delete($id,$conn);
    $crud->Ptype_delete($id,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Product [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    
    $_SESSION["menu"]=2;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['packaged'])){
    
    $id = $_POST['dvalue'];
    

    
    $crud->package_delete($id,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Package [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    

    $_SESSION["menu"]=3;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['freightd'])){
    
    $id = $_POST['dvalue'];
    
 
    $crud->freight_delete($id,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Freight Rate [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    

    $_SESSION["menu"]=4;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}
if(isset($_POST['containerd'])){
    
    $id = $_POST['dvalue'];
    
    
    $crud->Container_delete($id,$conn);
    $crud->duties_Add($country,$producttype,$Dv,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Container [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    $_SESSION["menu"]=5;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['palletd'])){
    

    

    $id = $_POST['dvalue'];
    $crud->duties_Add($country,$producttype,$Dv,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Pallet [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    
    
    $crud->pallettype_delete($id,$conn);
    $_SESSION["menu"]=6;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['dutiesd'])){
    
    $id = $_POST['dvalue'];
    
    
    $crud->duties_delete($id,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Duty [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    

    $_SESSION["menu"]=7;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['logind'])){
    
    $id = $_POST['dvalue'];
    
    
    $crud->login_delete($id,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted User[$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    

    $_SESSION["menu"]=8;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

// if(isset($_SESSION['Companyid']))
// {

//   $crud->Company_selectuser($Companyid,$conn);

// }



if(isset($_POST['companyd'])){
    
    $id = $_POST['dvalue'];
    
    
    $crud->company_delete($id,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted a Company [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    $_SESSION["menu"]=9;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['Product_Assign_Companyd'])){
    
    $id = $_POST['dvalue'];
    
    
    $crud->company_product_delete($id,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Deleted an Assigned Product [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    
    $_SESSION["menu"]=10;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}




/*Edit */

if(isset($_POST['producttypeE'])){
    
    $id = $_POST['Evalue'];
    $Type= $_POST['Eptype'];
    
    $crud->Ptype_update($id,$Type,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a Product Type [$id] [$Type]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    

    $_SESSION["menu"]=1;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['productE'])){
    
    $id = $_POST['Evalue'];
    $productname = $_POST['Ename'];
    $UsdperTon = $_POST['EUsd'];
    $ProductDes = $_POST['Edescription'];
    $DisInP = $_POST['EDis'];
    $productype = $_POST['Etype'];
    
    
    $crud->Product_update($id,$productname,$UsdperTon,$ProductDes,$DisInP,$productype,$conn);
    //$crud->duties_Add($country,$producttype,$Dv,$conn);
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a Product [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

$_SESSION["menu"]=2;
   header("location: ../otherphpfile/AdminDashboard.php");
    
}


if(isset($_POST['packageE'])){
    
    $id = $_POST['Evalue'];
 
    $costperunit = $_POST['ECostperUnit'];
    $weight = $_POST['EWeight'];
    $twentyft = $_POST['E20FtPallet'];
    $fortyft = $_POST['E40FtPallet'];
    $unitweight = $_POST['EUnitWeight'];
    $ProductTypeID = $_POST['Etype'];


    if(isset($_POST['bagperpallet'])){

        if($_POST['bagperpallet'] != Null){
            $bagsperP = $_POST['bagperpallet'];
        }else{
            $bagsperP = NUll;
        }
    }else{
            $bagsperP = NUll;
        }
   
    
    
    $crud->package_update($id,$costperunit,$weight,$twentyft,$fortyft,$unitweight,$bagsperP,$ProductTypeID,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a Package [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }


    $_SESSION["menu"]=3;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}



if(isset($_POST['freightE'])){
    
    $id = $_POST['Evalue'];
    $Port=$_POST['EPort'];
    $Country=$_POST['Ecountry'];
    $FreightSize=$_POST['EFsize'];
    $PortName=$_POST['EPortname'];
    $Rate=$_POST['ERate'];
    $Limit=$_POST['ELimit'];
    $Maxlimit=$_POST['EMaxlimit'];
    $OWPenalty=$_POST['EOWPenalty'];
   
                           

    $row=$crud->frieght_getvalue_from_package("Drums",$FreightSize,$conn);
    $PerTonInDrums= $row[0];
    $row=$crud->frieght_getvalue_from_package("SpaceKraft",$FreightSize,$conn);
    $PerTonInTotes=$row[0];

    $PerTonInDrums= (float)($Rate+$OWPenalty)/$PerTonInDrums;
    $PerTonInTotes= (float)($Rate+$PerTonInDrums)/$PerTonInTotes;
   $Validity=$_POST['EValidity'];
 
    
    

     $sql2="UPDATE `freightrates` SET `Port`='$Port',`Country`='$Country',`FreightSize`=$FreightSize,`PortName`='$PortName',`Rate`=$Rate,`Limit`=$Limit,`Maxlimit`=$Maxlimit,`OWPenalty`=$OWPenalty,`PerTonInDrums`=$PerTonInDrums,`PerTonInTotes`=$PerTonInTotes,`Validity`='$Validity' WHERE FreightRateId=".$id;

      if ($conn->query($sql2) === TRUE) {
       echo "New record created successfully1";
        } 
        else {
            
          echo "Error: " . $sql . "<br>" . $conn->error;
              } 
    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited Freight [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

   $_SESSION["menu"]=4;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}
if(isset($_POST['containerE'])){
    
    $id = $_POST['Evalue'];
    $cs = $_POST['EContainerSize'];
    $cp = $_POST['EContainerPallet'];
    
    $crud->Container_update($id,$cs,$cp,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a Container [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=5;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['palletE'])){
    

    

    $id = $_POST['Evalue'];
    $pn = $_POST['EPalletName'];
    $cost = $_POST['ECostInDollar'];
    $weight = $_POST['EWeightinKg'];
    
    $crud->pallettype_update($id, $pn,$cost,$weight,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a Pallet [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=6;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['dutiesE'])){
    
    $id = $_POST['Evalue'];
    $country = $_POST['Ecountry'];
    $producttype = $_POST['EPtype'];
    $Dv = $_POST['EDv'];
    
    $crud->duties_update($id,$country,$producttype,$Dv,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited Duties [$id]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=7;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}



if(isset($_POST['companyE'])){
    
    $id = $_POST['Evalue'];
    $company = $_POST['Ecompname'];
    $files = $_FILES['Elogo'];
    

    // $filename = $files['name'];
    // $fileerror = $files['error'];
    // $filetmp = $files['tmp_name'];

    // $fileext = explode('.',$filename);
    // $filecheck = strtolower(end($fileext));
    // $fileextstored = array('png','jpg','jpeg');

    // if(in_array($filecheck,$fileextstored))
    // {
    //      $destinationfile = '../DatabasePhpFile/Company/'.$filename;
    //      move_uploaded_file($filetmp,$destinationfile);  
    // }
    // $files = $_FILES['logo'];
   

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextstored))
    {
         $destinationfile = '../DatabasePhpFile/Company/'.$filename;
         move_uploaded_file($filetmp,$destinationfile);  
    }

    
    
    $crud->company_update($id,$company,$destinationfile,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a Company [$company]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=9;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}

if(isset($_POST['Product_Assign_CompanyE'])){

    $id = $_POST['Evalue'];
    $productid = $_POST['EProduct'];
    $companyid = $_POST['ECompany'];
    $total = $_POST['ETotal'];

    $crud->company_product_update($id,$companyid,$productid,$total,$conn) ;

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited an Assigned Product [$productid]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=10;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}


if(isset($_POST['LoginE'])){
    $id = $_POST['Evalue'];
    $name = $_POST['Ename'];
    $email = $_POST['Eemail'];
    $password = $_POST['Epassword'];
    $contact =$_POST['Econtact'];
    $roleid= $_POST['ERoleType'];
    $companyid=$_POST['ECompany'];

    $crud->login_update($id,$name,$email,$password,$contact,$roleid,$companyid,$conn);

    // $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."', 'Edited a User [$id] [$name]')";
    // if ($conn->query($sql2) === TRUE) {
    //  //   echo "New record created successfully1";
    //     } else {
            
    //   //  echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    $_SESSION["menu"]=8;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}
/*Edit */


if(isset($_POST[''])){

    $id = $_POST['Evalue'];
    $productid = $_POST['EProduct'];
    $companyid = $_POST['ECompany'];
    $total = $_POST['ETotal'];

    $crud->company_product_update($id,$companyid,$productid,$total,$conn) ;
    $_SESSION["menu"]=10;
    header("location: ../otherphpfile/AdminDashboard.php");
    
}


?>