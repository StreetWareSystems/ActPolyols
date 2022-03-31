
<?php


include_once('./DbConnection.php');
$obj=new db();

$conn=$obj->connect();

include_once('./crud.php');
$crud=new Crud();

$stdnumberofdrum;
$output = array();
$weight = array();
$stdweight;
$checkstd;


//$_SESSION["stdweight"] = $stdweight;
//$_SESSION["checkstd"] = $checkstd;
   
$producttypeid=$_POST['producttypeid'];
$productname=$_POST['producttypename'];
$productid=$_POST['Product'];

                $package=$_POST['Package'];
                $port=$_POST['Port'];
               //  $actmargin=(10/100);
                $actmargin=(float)($_POST['Actmargin'])/100;
                $container=$_POST['Container'];
                $pallet=$_POST['Pallet'];
                $numpacking=$_POST['val1'];
                $WegPacking=$_POST['val2'];

                $companyid=$_POST['companyidd'];
              
                                       
/*

$check=$crud->Product_Select($conn);

	if($check){
		while ($row = $check->fetch_array()) { 
             $output[]=$row['Total'];
        }
    }
*/
                //echo $productid, $companyid;
          
               // $check = $crud->company_product_by($userid,$conn);
                // $check=$crud->Check_company_product_Add($companyid,$productid,$conn);
              


              
                // if($check != null){

                    
                //         while ($row = $check->fetch_array()) { 
                           
                //             $output[]=$row['FTotal'];
                    
                //         }

                // }else{
                    
                //     $sql="select product.Total from product where product.ProductTypeId=$producttypeid && product.ProductId='".$productid."'";
                //     $query=mysqli_query($conn, $sql);
                //     while ($row = $query->fetch_array()) { 
                //         $output[] = $row['Total']; 
                //     }
                // }
                $sql="select product.Total from product where product.ProductTypeId=$producttypeid && product.ProductId='".$productid."'";
                    $query=mysqli_query($conn, $sql);
                    while ($row = $query->fetch_array()) { 
                        $output[] = $row['Total']; 
                    }
                /* product cost  */

               
                $packagename;



            /* package cost */
                    $sql="SELECT PackageName,package.CostPerton FROM `package` where package.ProductTypeID=$producttypeid && package.PackageId=".$package."";
                    $query=mysqli_query($conn, $sql);
                    while ($row = $query->fetch_array()) { 
                        $packagename=$row['PackageName'];
                        $output[] = $row['CostPerton']; 
                    }
            /* Pallet cost*/
            $sql="SELECT * FROM `pallettype` WHERE  pallettype.PalletId=".$pallet."";
            $palletweight=2;
            
            $query=mysqli_query($conn, $sql);

            while ($row = $query->fetch_array()) { 
                if($packagename == "Drums"){
                    $output[] = (float)($row['CostInDollar']) /1.2; 
                    $palletweight=(float)($row['WeightinKg']);
                }else{
                    $output[] = (float)($row['CostInDollar']) /1.365; 
                    $palletweight=(float)($row['WeightinKg']);
                }
                $palletname=$row['PalletName'];
            }

            /* Port Cost*/
            $temp=($output[0]+$output[1]) * 0.015;
            $output[]=$temp;

            /* Fob cost*/
            $temp=($output[0]+$output[1]+$output[2]+$output[3]);
            $output[]=$temp;

            /*Profit */
            $temp=$output[4] * $actmargin;
            $output[]=$temp;
            /*Product Cost per Ton*/
            $temp=$output[4] + $output[5];
            $output[]=$temp;

            /*"Num of " &: */


            if($numpacking =="Standard"){
                $checkstd = $numpacking;
                


            if($container == 20){
                $sql="SELECT 20FtPallet FROM `package` WHERE package.ProductTypeID=$producttypeid && package.PackageId=".$package."";
                $query=mysqli_query($conn, $sql);
                while ($row = $query->fetch_array()) { 
                
                        $output[] = ($row['20FtPallet']); 
                        $standardval = ($row['20FtPallet']);
                  

                
                    
                }
            }else if($container == 40){
                $sql="select 40FtPallet  FROM `package` WHERE package.ProductTypeID=$producttypeid && package.PackageId=".$package."";
                $query=mysqli_query($conn, $sql);
                while ($row = $query->fetch_array()) { 
                
                        $output[] = ($row['40FtPallet']); 
                        $standardval = ($row['40FtPallet']);
                    
                    
                }
            }
            }else{
            $numpacking= $_POST['customvalue'];
            $output[] = $numpacking; 
             $checkstd = "Custom";

            }

            /*Weight */
           
            if($WegPacking =="Standard"){
                


            $sql="select package.Weight  FROM `package` WHERE package.ProductTypeID=$producttypeid && package.PackageId=".$package."";
            $query=mysqli_query($conn, $sql);
           
            while ($row = $query->fetch_array()) { 
            
                    
                    $tweight = ($row['Weight'])*$output[7]; 
                    $weight[]= $tweight;
                    $stdweight = $row['Weight'];
                    $_SESSION["stdweight"]  = $row['Weight'];
                
            }

            }else{
            $WegPacking=$_POST['customvalue2'];
            $stdweight = $_POST['customvalue2'];
            $checkstd = "Custom";
        //    $tweight = $output[7]*$WegPacking; 
            $tweight = $output[7]*($WegPacking); 
            
            $weight[]= $tweight;
           
          //  $output[]= $tweight;
            }
        
        
            $palletweight=$palletweight/1000;
            $tweight=$tweight/1000;
            if($container == 20){
                $netweight=1.365*14;
                $grossweight=(($palletweight+ $tweight)*14)+$netweight;
    
            }else{ 
                $netweight=1.365*19;
                $grossweight=(($palletweight+ $tweight)*19)+$netweight;
            }
            $sql="select * FROM `freightrates` where `FreightSize`=".$container." and `Port`='".$port."'";
            $query=mysqli_query($conn, $sql);
            while ($row = $query->fetch_array()) { 
                $limit=($row['Limit']); 
                $Maxlimit=($row['Maxlimit']); 
            }
    
            
            if($grossweight < $Maxlimit){
                if($grossweight > $limit){
                    $net=$grossweight-$limit;
                }
           
             $output[]= $grossweight;


               /*Freigh Cost */

            
            $sql="select Rate FROM `freightrates` where `FreightSize`=".$container." and `Port`='".$port."'";
            $query=mysqli_query($conn, $sql);
                    while ($row = $query->fetch_array()) { 
                    
                            $output[] = ($row['Rate']); 
                        
                        
                    }

            /*Penalty: */
            $output[] =0;


            /*Validity Date: */
            $sql="select Validity FROM  `freightrates` where `FreightSize`=".$container." and `Port`='".$port."'";
            $query=mysqli_query($conn, $sql);
                    while ($row = $query->fetch_array()) { 
                    
                            $output[] = ($row['Validity']); 
                        
                        
                    }
            /*Total Freight*/

            $output[]=$output[10]+$output[9];
            /*Freight Cost Per Ton*/
            $output[]=$output[12]/$output[8];

            /*Total Cost Per Ton: */
            $output[]=$output[13]+$output[6];

            /*Cost Per LB*/
            $output[]=$output[14]/1000/2.2046;

            /*Total Container Cost */
            $output[]=$output[14]*$output[8];

      //      $sql2 = "INSERT INTO activity (user_id, user_email, action_made ) VALUES ('".$companyid."', '".$_SESSION['Name']."', 'User Generate A Output from syrup')";
             
    
      
      


      $sql2 = "INSERT INTO activity (user_id, user_email, ProductId, Package, Port, Container ,PalletType,ActMargin,NumOfPackaging,WeightPerPackaging, action_made ) VALUES ('".$_SESSION["Stid"]."', '".$_SESSION['Name']."','".$productid."','".$packagename."','".$port."','".$container."',    '".$palletname."','".$actmargin."','".$numpacking."','".$WegPacking."','User Generated a File from Syrup')";
  
            if ($conn->query($sql2) === TRUE) {
                //echo "New record created successfully1";
                } else {
                    
               /// echo "Error: " . $sql . "<br>" . $conn->error;
                }

          
            }else{
                
                echo '<script> alert("Total Weight Exceeds Max Limit"); $("#data").empty();</script>';
                //header("http://localhost/project/otherphpfile/StudDashboard.php");
            }
          
?>


<link rel="stylesheet" href="../assets/css/base.css">

<h1></h1>

<div class="app-card app-card-settings shadow-sm p-4">
								<div>
								
									<div class="scroll-table p-1 ">
										
										<table class="display" style="width:100%"  id="tabl1">
											<thead>
														<tr>
															<th></th>
															<th></th>
															<th></th>
															<th></th>
														</tr>
											</thead>
											<tbody  class="border-black">


                                            <tr>
                                           <td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold  bg-theme">Product Name </td>
                                           <td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold  bg-theme" style="text-align:right;"><?php echo $productid ?> </td>
                                           <td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold  bg-theme"></td>
                                           <td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold  bg-theme"></td>
                                           

                                           </tr>

                                           <!-- <tr>
                                                
                                                <td class="pt-1 px-2"><?php echo $checkstd ?> Num of <?php echo $packagename ?> </td> 
                                                <td class="pt-1 px-2" style="text-align:right;"><?php echo $output[7] ?></td>
                                                <td class="pt-1 px-2"><?php echo $checkstd ?> Weight per <?php echo $packagename ?></td>
                                                <td class="pt-1 px-2" style="text-align:right;"><?php echo  $stdweight ?></td>
                                                
                                    </tr> -->
                                         

												<tr>
                                                
															<td class="pt-1 px-2">Product Cost</td> 
															<td class="pt-1 px-2" style="text-align:right;">$<?php echo $output[0]; ?></td>
															<td class="pt-1 px-2">Num of <?php echo $packagename ?></td>
															<td class="pt-1 px-2" style="text-align:right;"><?php echo $output[7]; ?></td>
                                                </tr>

                                           
				
												<tr>
														<td class="pt-1 px-2"><?php echo $packagename ?> Cost</td>

														<td class="pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[1], 2); ?></td>
														<td class="pt-1 px-2">Total Product Weight</td>
														<td class="pt-1 px-2" style="text-align:right;"><?php echo number_format($weight[0], 2, '.', ''); ?></td>
                                                        
												</tr>
				
												<tr>
														<td class="pt-1 px-2">Pallet Cost</td>
														<td class="pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[2], 2);?></td>
													
														<td class="pt-1 px-2">Freigh Cost</td>
														<td class="pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[9], 2);?></td>

                                                   </tr>
												<tr>
														<td class="pt-1 px-2">Port Cost</td>
														<td class="pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[3], 2);?></td>
													
														<td class="pt-1 px-2">Penalty</td>
														<td class="pt-1 px-2" style="text-align:right;"><?php echo number_format($output[10], 2);?></td>

												</tr>
											    <tr>
														<td class="pt-1 px-2">Total FOB cost</td>
														<td class="pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[4], 2);?></td>
														
															<td class=" pt-1 px-2">Validity Date</td>
															<td class=" pt-1 px-2" style="text-align:right;"><?php echo $output[11];?></td>
													 </tr>
												<tr>
														<td class="pt-1 px-2">Margin</td>
														<td class="pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[5], 2);?></td>
														
														<td class=" pt-1 px-2">Total Freight</td>
														<td class=" pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[12], 2);?></td>
													 </tr>
												<tr class="border-black bg-theme">
														<td class="font-weight-bold text-dark pt-1 px-2">Total Product Cost per Ton</td>
														<td class="font-weight-bold text-dark pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[6], 2);?></td>
												
														<td class="font-weight-bold text-dark pt-1 px-2">Freight Cost Per Ton</td>
														<td class="font-weight-bold text-dark pt-1 px-2" style="text-align:right;">$<?php echo number_format($output[13], 2, '.', '');?></td>
														 </tr>

												<tr>
												
														<td class="pt-4 border-0"></td>
														<td></td>
														<td></td>
														<td></td>
												</tr>
												<tr class="border-black bg-theme">
														<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">Total Cost Per Ton</td>
														<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold" style="text-align:right;">$<?php echo number_format($output[14], 2, '.', '');?></td>
												
														<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">Cost Per LB</td>
														<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold" style="text-align:right;">$<?php  echo number_format($output[15], 2, '.', '');?></td>
														 </tr>
												<tr>
														<td class="pt-4 border-0"></td>
														<td></td>
														<td></td>
														<td></td>
												</tr>
												<tr class="border-black bg-theme">
														<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold  bg-theme" >Total Container Cost</td>
														<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold  bg-theme" style="text-align:right;">$<?php echo number_format($output[16], 2);?></td>
													
														<td></td>
														<td></td>
												</tr>
											</tbody>
										</table>
										
									
									</div>
									
								
		
		
								</div>

	
						 </div>
					

                  
          <script>

$('#tabl1').DataTable({
        searching: false, 
        paging: false, 
        info: false,
        bSort: false,
        dom: 'Bfrtip',
        buttons: [
        'excel','pdf','print','csv'
    ]
    });    


 
    </script>