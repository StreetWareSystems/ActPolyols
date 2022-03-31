



<?php

use function PHPSTORM_META\sql_injection_subst;

class Crud{

public function Role($conn){

    $sql = "INSERT INTO role 
    VALUES (NULL,'adwawd')";
    
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();


    


}

 public function Role_select($conn){
    $sql="select * FROM  role";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo 'not select';
    }

 }       

 public function countclient($id,$conn){
    $sql="select COUNT(*) FROM login  WHERE login.RoleId=".$id;
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }

 }      
 
 
 public function login_select($conn){
    $sql="select * FROM login join role on login.RoleId=role.RoleId join company on login.CompanyId=company.CompanyId";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }

 }     

 

//  public function userlog($ProductId,$Packaging,$Port,$Container,$PalletType,$ActMargin,$NumOfPackaging,$WeightPerPackaging,$conn)
//  {

//     $sql = "INSERT into user_log Values ('$ProductId','$Packaging','$Port',$Container,'$PalletType',$ActMargin,'$NumOfPackaging','$WeightPerPackaging')";

    
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//         exit();
        
//         } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//         }
    
//     }

 public function login_Add($name,$email,$password,$contact,$roleid,$companyid,$conn) {
   $sql = "INSERT INTO login (Name,Email,Password,Contact,RoleId,CompanyId) VALUES ('$name','$email','$password','$contact',$roleid,$companyid)";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}


public function login_delete($id,$conn){

    $sql ="delete FROM login WHERE Id=".$id;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function login_update($id, $name,$email,$password,$contact,$roleid,$companyid,$conn){
    $sql ="update login SET Name='$name',Email='$email',Password='$password',Contact='$contact',RoleId=$roleid ,CompanyId=$companyid WHERE Id=".$id;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}






public function freight_Add($Port,$Country,$FreightSize,$PortName,$Rate,$Limit,$Maxlimit,$OWPenalty,$PerTonInDrums,$PerTonInTotes,$Validity,$conn) {


   
    $sql = "INSERT INTO freightrates VALUES (Null,'$Port','$Country',$FreightSize,'$PortName',$Rate,$Limit,$Maxlimit,$OWPenalty,$PerTonInDrums,$PerTonInTotes,'$Validity')";
  
    

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
        
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}




public function freight_delete($FreightRateId,$conn){

    $sql ="delete FROM freightrates WHERE FreightRateId=".$FreightRateId;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function freight_update($FreightRateId,$Port,$Country,$FreightSize,$PortName,$Rate,$Limit,$Maxlimit,$OWPenalty,$PerTonInDrums,$PerTonInTotes,$Validity,$conn){
    $sql ="update  freightrates  SET Port='$Port',Country='$Country',FreightSize=$FreightSize,PortName='$PortName',Rate=$Rate,Limit=$Limit,Maxlimit=$Maxlimit,OWPenalty=$OWPenalty,PerTonInDrums=$PerTonInDrums,PerTonInTotes=$PerTonInTotes,Validity='$Validity'
    WHERE FreightRateId=".$FreightRateId."";
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        
}


public function freight_Select($conn){


    $sql="select * FROM  freightrates";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}

public function freight_Select1($conn){


    $sql="select DISTINCT(`Port`) FROM freightrates";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}

public function frieght_getvalue_from_package($type,$size,$conn){

    if($size == 20){

        $sql="select 20FtinMt FROM package where PackageName='".$type."'";
    }else if($size == 40){
        $sql="select 40FtinMt FROM package where PackageName='".$type."'";
    }
 
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       
        $row = $query->fetch_array();
        return $row;
          
    
    }
    else{
        echo '';
    }

    
}


public function Ptype_Add($Type,$conn) {


   
    $sql = "INSERT INTO producttype VALUES (NULL,'$Type')";
    
    if ($conn->query($sql) === TRUE) {
    echo "";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}


public function Ptype_delete($ProductTypeId,$conn){

    $sql ="delete FROM producttype WHERE ProductTypeId=".$ProductTypeId;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function Ptype_update($ProductTypeId,$Type,$conn){
    $sql ="update  producttype SET Type='$Type' WHERE ProductTypeId=".$ProductTypeId;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
     
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}


public function Ptype_Select($conn){

    $sql="select * FROM  producttype";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}




public function pallettype_Add($PalletName,$CostInDollar,$WeightinKg,$conn) {


   
    $sql = "INSERT INTO pallettype  VALUES (NULL,'$PalletName',$CostInDollar,$WeightinKg)";
    
    if ($conn->query($sql) === TRUE) {
    echo "";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}


public function pallettype_delete($ProductTypeId,$conn){

    $sql ="delete FROM pallettype  WHERE PalletId=".$ProductTypeId;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function pallettype_update($PalletId,$PalletName,$CostInDollar,$WeightinKg,$conn){
    $sql ="update  pallettype  SET PalletName='$PalletName',CostInDollar=$CostInDollar ,WeightinKg=$WeightinKg WHERE PalletId=".$PalletId;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}


public function pallettype_Select($conn){

    $sql="select * FROM  pallettype";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}







public function Product_Add($productid, $productname,$UsdperTon,$ProductDes,$DisInP,$productype,$conn) {


    $Dis=(float)($DisInP * 0.6)*($UsdperTon/100);
    $total=$UsdperTon-$Dis;
    $sql = "INSERT INTO product VALUES ('$productid','$productname',$UsdperTon,'$ProductDes',$DisInP,$Dis,$total,$productype)";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
   

}


public function Product_delete($productid,$conn){

    $sql ="delete FROM product WHERE ProductId='".$productid."'";
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function Product_update($productid,$productname,$UsdperTon,$ProductDes,$DisInP,$productype,$conn){
    $Dis=(float)($DisInP * 0.6)*($UsdperTon/100);
    $total=$UsdperTon-$Dis;
    $sql ="update product SET ProductName='$productname',UsdPerTon=$UsdperTon,ProductDesc='$ProductDes',DiscountInPercentage=$DisInP,DiscountValue=$Dis,Total=$total,ProductTypeId=$productype WHERE ProductId='".$productid."'";
    

    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
                

}


public function Product_check_id($productid,$conn){

    $sql="select * FROM product where ProductId='".$productid."'";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return 0;
          
    
    }
    else{
        return 1;

    }
}

public function Product_check_name($productname,$conn){

    $sql="select * FROM product where ProductName='".$productname."'";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return 0;
          
    
    }
    else{
        return 1;

    }
}

public function Product_Select($conn){

    $sql="select * FROM product join producttype on product.ProductTypeId=producttype.ProductTypeId";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}


public function  Product_Select_by_ProductTYpeIDassignproduct($companyid,$producttypeid, $conn){
    $sql="SELECT * FROM `product` join company_product on product.ProductId = company_product.ProductId  where company_product.CompanyId=$companyid and product.ProductTypeId=".$producttypeid;
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}
public function Product_Select_by_ProductTYpeID($id,$conn){

    $sql="select * FROM product join producttype on product.ProductTypeId=producttype.ProductTypeId where product.ProductTypeId=".$id;
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}


    public function Product_count($conn){
                $sql="select COUNT(*) FROM product";
                $query=mysqli_query($conn, $sql);

                if($query->num_rows > 0){
                

                    return $query;
                    
                
                }
                else{
                    echo '';
                }

    }     

 
 public function Product_countsingle($id,$conn){
    $sql="select COUNT(*) FROM product where product.ProductTypeId=".$id;
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }

 }      
 


public function package_Add($packagename,$costperunit,$weight,$twentyft,$fortyft,$unitweight,$bagsperP,$ProductTypeID,$conn) {

    $Costperton=(float)($costperunit/$weight);
    
    if($bagsperP == Null){
        $twentyftinMT=(float) ($twentyft*$weight);
        $fortyftinMT=(float) ($fortyft*$weight);
        $sql = "INSERT INTO package VALUES (NULL,'$packagename',$costperunit,$weight,$Costperton,$twentyft,$fortyft,$twentyftinMT,$fortyftinMT,$unitweight,NULL,$ProductTypeID)";
    
    }else{

        $twentyftinMT=(float) ($twentyft*$weight*$bagsperP);
        $fortyftinMT=(float) ($fortyft*$weight*$bagsperP);
        $sql = "INSERT INTO package VALUES (NULL,'$packagename',$costperunit,$weight,$Costperton,$twentyft,$fortyft,$twentyftinMT,$fortyftinMT,$unitweight,$bagsperP,$ProductTypeID)";
    
    }
 
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
   

}


public function package_delete($PackageId,$conn){

    $sql ="delete FROM package WHERE 	PackageId =".$PackageId;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function package_update($packageid,$costperunit,$weight,$twentyft,$fortyft,$unitweight,$bagsperP,$ProductTypeID,$conn){

    $Costperton=(float)($costperunit/$weight);
  


    if($bagsperP == Null){
        $twentyftinMT=(float) ($twentyft*$weight);
        $fortyftinMT=(float) ($fortyft*$weight);
        $sql ="update package SET CostperUnit=$costperunit,Weight=$weight,CostPerton=$Costperton,20FtPallet=$twentyft,40FtPallet=$fortyft,20FtinMt=$twentyftinMT,40FtinMt=$fortyftinMT ,UnitWeight=$unitweight,ProductTypeID=$ProductTypeID WHERE PackageId=".$packageid;
    
    }else{

        $twentyftinMT=(float) ($twentyft*$weight*$bagsperP);
        $fortyftinMT=(float) ($fortyft*$weight*$bagsperP);
        $sql ="update package SET CostperUnit=$costperunit,Weight=$weight,CostPerton=$Costperton,20FtPallet=$twentyft,40FtPallet=$fortyft,20FtinMt=$twentyftinMT,40FtinMt=$fortyftinMT ,UnitWeight=$unitweight,BagPerPallet=$bagsperP ,ProductTypeID=$ProductTypeID WHERE PackageId=".$packageid;
    
    }
    
  
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}


public function package_Select($conn){

    $sql="select * FROM package join producttype on package.ProductTypeID=producttype.ProductTypeId";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo 'not select';
    }
}

public function Package_check_name($packagename,$conn){

    $sql="select * FROM package where PackageName='".$packagename."'";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return 0;
          
    
    }
    else{
        return 1;

    }
}


public function package_Select_by_producttypeid($id,$conn){

    $sql="select * FROM package join producttype on package.ProductTypeID=producttype.ProductTypeId where package.ProductTypeID=".$id;
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}


 public function getContainerTypeValue($conn)
 {
    $sql="select * FROM package";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
        return $query;
    }
    else{
        echo '';
    }
}


public function Container_Add($ContainerSize,$ContainerPallet,$conn) {


   
    $sql = "INSERT INTO container VALUES (NULL,$ContainerSize,$ContainerPallet)";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}


public function Container_delete($containerid,$conn){

    $sql ="delete FROM container WHERE ContainerId=".$containerid;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function Container_update($containerid, $ContainerSize,$ContainerPallet,$conn){
    $sql ="update container SET ContainerSize=$ContainerSize,ContainerPallet=$ContainerPallet WHERE ContainerId=".$containerid;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}


public function Container_Select($conn){

    $sql="select * FROM container";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       
           return $query;
            /*while ($row = $query->fetch_array()) { 
                echo $row['ContainerSize'];
                echo '<br>';
            } */
            
        
    }
    else{
        echo '';
    }
}






public function duties_Add($country, $producttype,$Dv,$conn) {


   
    $sql = "INSERT INTO duties VALUES (NULL,'$country',$producttype,$Dv)";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}


public function duties_delete($DutiesId,$conn){

    $sql ="delete FROM duties WHERE DutiesId=".$DutiesId;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function duties_update($DutiesId,$country,$producttype,$Dv,$conn){
    $sql ="update  duties SET Country='$country',ProductTypeId=$producttype,DutiesValue=$Dv WHERE DutiesId=".$DutiesId;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}


public function duties_Select($conn){

    $sql="select * FROM duties join producttype on duties.ProductTypeId=producttype.ProductTypeID";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}



// public function display_img($photo,$conn){
//     $sql = "Select * from img";
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//         } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//         }
  
// }


public function company_Add($companyname,$photo,$conn) {


   
    $sql = "INSERT INTO company VALUES (NULL,'$companyname','$photo')";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}

public function company_update($CompanyId,$companyname,$photo,$conn){
    $sql ="update  company SET CompanyName='$companyname',img='$photo' WHERE CompanyId=".$CompanyId;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}

public function company_delete($CompanyId,$conn){


    $sql ="delete FROM company WHERE CompanyId=".$CompanyId;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

// public function Company_selectuser ($Companyid,$conn){

// $sql = "SELECT * from company LEFT JOIN login ON company.CompanyId=login.CompanyId WHERE login.Id=".$Companyid;

// $query=mysqli_query($conn, $sql);

// // if($query->num_rows > 0){
   

// //     return $query;
      

// // }
// // else{
// //     echo '';
// // }

// }

public function company_Select($conn){

    $sql="select * FROM company";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}







public function company_product($conn){

    $sql="select * FROM `company_product` join company on company_product.CompanyId=company.CompanyId join product on company_product.ProductId=product.ProductId join producttype on product.ProductTypeId=producttype.ProductTypeId";
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}


public function company_product_by($userid,$conn){
     
    $sql="select * FROM `company_product` join company 
    on company_product.CompanyId=company.CompanyId join product 
    on company_product.ProductId=product.ProductId join producttype 
    on product.ProductTypeId=producttype.ProductTypeId join login 
    on company.CompanyId=login.CompanyId where login.Id=".$userid;
    $query=mysqli_query($conn, $sql);

    if($query->num_rows > 0){
       

        return $query;
          
    
    }
    else{
        echo '';
    }
}

// Log file creation

function logfileadd($userid,$email,$logtime,$conn)

{
$sql = "INSERT INTO Logs VALUES (NULL,'$userid','$email','$logtime')";
    
if ($conn->query($sql) === TRUE) {
echo "New Log created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// public function logfileselect($conn){

//     $sql="select * FROM Logs";
//     $query=mysqli_query($conn, $sql);

//     if($query->num_rows > 0){
       

//         return $query;
          
    
//     }
//     else{
//         echo '';
//     }
// }





public function company_product_delete($Id,$conn){

    $sql ="delete FROM company_product WHERE Comp_Product_Id=".$Id;
    if ($conn->query($sql) === TRUE) {
        echo "delete record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
}

public function company_product_update($id,$companyid,$productid,$total,$conn) {


   
    $sql ="update  company_product SET CompanyId=$companyid,ProductId='$productid' ,FTotal=$total WHERE Comp_Product_Id =".$id;
    if ($conn->query($sql) === TRUE) {
        echo "Update record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    
  

}

public function company_product_Add($companyid,$productid,$total,$conn) {


   
    $sql = "INSERT INTO company_product VALUES (NULL,$companyid,'$productid',$total)";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  

}

public function checkstd($packagename,$producttypeid,$conn){
    
    
    $sql="select package.Weight  FROM package WHERE package.ProductTypeID=$producttypeid && package.PackageId=".$packagename."";
    $query=mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    


}

public function Check_company_product_Add($companyid,$productid,$conn){

    $sql="select * FROM company_product where ProductId='$productid' and CompanyId=".$companyid;
  
    $query=mysqli_query($conn, $sql);
   return $query;
    // if($query->num_rows > 0){
       

    //     return $query;
        
    // }
    // else{
    //     return null;
      

    // }
}






}





?>
