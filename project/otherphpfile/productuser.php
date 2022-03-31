

<?php



include_once('../DatabasePhpFile/DbConnection.php');

$obj=new db();


$conn=$obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud=new Crud();



$output = array();

$producttypeid =$_POST['producttypeid'];
$producttypename =$_POST['producttypename'];
$companyid =$_POST['company'];








//$query1=$crud->Product_Select_by_ProductTYpeID($id,$conn);
$query2=$crud->package_Select_by_producttypeid($producttypeid,$conn);
$query3=$crud->freight_Select1($conn);
$query4=$crud->Container_Select($conn);
$query5=$crud->pallettype_Select($conn);
$query6=$crud->Product_Select($conn);
$query7=$crud->getContainerTypeValue($conn);
$query8=$crud->getContainerTypeValue($conn);
$query9=$crud->getContainerTypeValue($conn);
//$query7=$crud->checkstd($packagename,$producttypeid,$conn);

 //include_once('../DatabasePhpFile/notsorbitol.php');

// $producttypeid=$_POST['producttypeid'];
// $productname=$_POST['producttypename'];
// $productid=$_POST['productid'];
// $package=$_POST['Package'];


//require_once '/config.php' and  require_once '/xampp/htdocs/FinalActPolyols/project/DatabasePhpFile/notsorbitol.php';
//include '../DatabasePhpFile/notsorbitol.php';





?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

	
	<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">

				<h1 class="app-page-title" id="producttypename"><?php echo $producttypename ?></h1>
				<div class="row g-4 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4 w-50 mx-auto">
						<div class="app-card-body">

							<form class="settings-form" id="formid"  method="post">
								<div class="row">
								

								<!-- /	 Change the code style form -->

								<div class="col-9 mb-3 d-flex">
											
								  <input type="hidden" id="companyid1" name="companyidd" value="<?php echo $companyid;?>">
									<input type="hidden" id="producttypename" name="producttypename" value="<?php echo $producttypename;?>">
									<input type="hidden" id="producttypeid" name="producttypeid" value="<?php echo $producttypeid;?>">
									
								

								
									<label class="col-2 control-label">Product</label>
										<select style="position:relative; top:-5px" class="form-select col-12 offset-1 mg-3" name="Product" aria-label="Default select example" required>
											<option selected disabled value="">Select Product</option>
											<?php
											$_SESSION["data1"] = null;
											
											$query = $crud->Product_Select_by_ProductTYpeIDassignproduct($companyid,$producttypeid ,$conn);
											while ($row = $query->fetch_array()) {
												echo '<option value="' . $row['ProductId'] . "";

												echo '">' . $row['ProductDesc'] . "";
												echo "</option>";
											}
											?>

										</select>


										
										<!-- Getting Standard Value from DATABASE Dynamic -->

										<select  style="display: none;" class="" name="test" id="" >
												<?php
														 
														  while ($row = $query7->fetch_array()) { 
														  echo '<option value="'.$row['20FtPallet']."";

								 echo '" id ="'.$row['PackageId'].'_20FtPallet">'.$row['20FtPallet']."";
														  echo "</option>";
													  }
										        ?>
												
											  </select>
											 <select  style="display: none;" class="" name="test2" id="" >
												<?php
														 
														  while ($row = $query8->fetch_array()) { 
														  echo '<option value="'.$row['40FtPallet']."";

								 echo '" id ="'.$row['PackageId'].'_40FtPallet">'.$row['40FtPallet']."";
														  echo "</option>";
													  }
										        ?>
												
											  </select>

											  <select  style="display: none;" class="" name="test3" id="" >
												<?php
														 
														  while ($row = $query9->fetch_array()) { 
														  echo '<option value="'.$row['Weight']."";

								 echo '" id ="'.$row['PackageId'].'_Weight">'.$row['Weight']."";
														  echo "</option>";
													  }
										        ?>
												
											  </select>

									</div>

									<!-- END Getting Standard Value from DATABASE Dynamic -->




									<div class="col-9 mb-3 d-flex">  <!-- making div varticaly -->
									
										<label class="col-2 control-label">Packaging</label>
										<select style="position:relative; top:-5px" class="form-select offset-1 col-12 mg-3" name="Package" id="selectpack" onchange="getpackage(); callVal();" aria-label="Default select example" required>
												<option selected disabled value="">Select Packaging</option>
												<?php
														 
														  while ($row = $query2->fetch_array()) { 
														  echo '<option value="'.$row['PackageId']."";
														
														  echo '">'.$row['PackageName']."";
														  echo "</option>";
													  }
										        ?>
												
											  </select>
									</div>

								

								

									<div class="col-9 mb-3 d-flex">
										<label class="col-2 control-label">Port</label>
										<select style="position:relative; top:-5px" class="form-select offset-1 col-12 mg-3" name="Port" aria-label="Default select example" id="port" required>
												<option selected disabled value="">Select Port</option>
												<?php
														 
														  while ($row = $query3->fetch_array()) { 
														  echo '<option value="'.$row['Port']."";
														
														  echo '">'.$row['Port']."";
														  echo "</option>";
													  }
										        ?>
                                          </select>
									</div>
									<div class="col-9 mb-3 d-flex">  
										<label class="col-2 control-label">Container</label>
										<select style="position:relative; top:-5px" class="form-select offset-1 col-12 mg-3" name="Container" onchange="callVal()" aria-label="Default select example" id="containerid" required>
												<option selected disabled value="">Select Container</option>
												<?php
														 
														  while ($row = $query4->fetch_array()) { 
														  echo '<option value="'.$row['ContainerSize']."";
														
														  echo '">'.$row['ContainerSize']."";
														  echo "</option>";
													  }
										        ?>
                                          </select>

									</div>
									<div class="col-9 mb-3 d-flex">
										<label class="col-2 control-label" style="position:relative; top:-10px">Pallet Type</label>
										<select style="position:relative; top:-5px" class="form-select offset-1 col-12 mg-3" name="Pallet" aria-label="Default select example" id="pallt" required>
												<option selected disabled value="">Select Pallet</option>
												<?php
														  
														  while ($row = $query5->fetch_array()) { 
														  echo '<option value="'.$row['PalletId']."";
														
														  echo '">'.$row['PalletName']."";
														  echo "</option>";
													  }
										        ?>
                                          </select>

									</div>
									<div class="col-9 mb-4 d-flex">
										<label class="col-2 control-label"  style="position:relative; top:-10px">Act Margin</label>
										<input class="form-control offset-1 col-12" style="position:relative; top:-5px" type="text" style="border: 0.5ox solid;" name="Actmargin" placeholder="10%" required>

									</div>
								</div>

							

								<div class="row">
									<div class="col-6 mt-6">
										<label id="val1label1">Number of Packaging</label>
										<select class="form-select mt-2" name="val1" id="val1" aria-label="Default select example" required>
										<option selected disabled value="">Select Packaging Type</option>	
										<option value="Standard" id="stdval">Standard </option>
										
											<option value="Custom">Custom</option>
											
										</select>

									</div>

								
									<div class="col-6 mt-6" >
										<label id="val1label2">Weight per Packaging</label>
										<select class="form-select mt-2" name="val2" id="val2" aria-label="Default select example" id="w_of_pack" required>
                                        <option selected disabled value="">Select Weight Type</option>	
										<option value="Standard" id="stdval2"> Standard  </option>
										
										<option value="Custom">Custom</option>
											
										</select>
									<!-- end style form -->
									</div>
									
								</div>
								<br>
								<button type="submit" class="btn app-btn-primary" style="background-color: #04AA6D; color: white; width: 100%" name="genoutput" id="genoutput">Generate</button>
								
								
								
							</form>
						


						</div>
						<!--//app-card-body-->

					</div>
				
					<!--//app-card-->
					<!-- ........... -->

					<!-- record table div-->
					 <div class="row mt-2 settings-section col-6 p-4 h-100 mx-auto"  id="data"> 
						 
					
	
				      	</div> 

				</div>
				<!--//row-->

             
				
				
				
				 
					
						
					

				
					
			

			
				
			
				<!--//row-->




			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-content-->

<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>

<script>

	function getpackage() {  

			document.getElementById('val1label1').innerHTML =
			("Number of "+formid.Package[formid.Package.selectedIndex].text);

			document.getElementById('val1label2').innerHTML =
			("Weight per "+formid.Package[formid.Package.selectedIndex].text);

	
	}



// GETTING THE STANDARD VALUE IN SELECT BOX for Num of Packaging/Weight Per Packaging
	function callVal() 
	{
		var containerType=$("#containerid").val();
		var packType=$("#selectpack").val();
		if(containerType != null)
		{
			if(containerType == "20")
			{

			var test = "#"+packType+"_20FtPallet"; 
			var packType_val=$(test).val();

			document.getElementById("stdval").innerHTML = "Standard ("+ packType_val +")";

			var test1 = "#"+packType+"_Weight"; 
			var packType_val1=$(test1).val();

			document.getElementById("stdval2").innerHTML = "Standard ("+ packType_val1 +")";
			}
			else if(containerType == "40")
			{

				var test = "#"+packType+"_40FtPallet"; 
			var packType_val=$(test).val();

			document.getElementById("stdval").innerHTML = "Standard ("+ packType_val +")";

			var test1 = "#"+packType+"_Weight"; 
			var packType_val1=$(test1).val();

			document.getElementById("stdval2").innerHTML = "Standard ("+ packType_val1 +")";
			}
			
		}
		else {
			//alert(containerType+" "+ packType);
	
		}
		

	  }
	</script>

 <!-- END GETTING THE STANDARD VALUE IN SELECT BOX for Num of Packaging/Weight Per Packaging -->




	<script>

			  
      
				$(".settings-form").on("submit", function(event){
						event.preventDefault();
					
				
						var formValues= $(this).serialize();
				        var producttypename=$("#producttypename").val();
					
						
						if(producttypename == "Sorbitol"){
							
							$.post("../DatabasePhpFile/sorbitol.php", formValues, function(data){

								
								// Display the returned data in browser
								$("#data").html(data);
								// create an array to store info
								
								
							
							});
						}else{
								$.post("../DatabasePhpFile/notsorbitol.php", formValues, function(data){
								// Display the returned data in browser
								console.log(data);
								$("#data").html(data);
							
							});
						}
						
                });
				
				
			$(document).ready(function () {
				var producttypeid=$("#producttypename").text();
				var package=$("#selectpack").val();
			//	alert(producttypeid+package);
                  if(producttypeid == "Sorbitol"){
					$("#val1label1").text("Number of bag per pallet");
					$("#val1label2").text("Number of Pallets Per  Container");
				
				  }else{
				
					$("#val1label1").text("Number of Packaging");
					$("#val1label2").text("Weight per Packaging");
					
					
				  }
				
						$("#val1").on('change', function() {
							var text=$(this).children("option:selected").text();

							if(text == "Custom"){
								
								//<input class="form-control" type="text" value="10%" disabled>
	                    		var text=  '<div id="val1numcustom" class="mt-2"><label>Custom Value</label> <input type="number" step="any" class="form-control" id="customvalue"  name="customvalue" required> </div>'; 
			            	$(this).parent().append(text);
                     		}else{
		                       	$("#val1numcustom").remove();
								  
								    var id=$("#val1label1").text();
								    var producttypeid=$("#producttypename").text();
									var package=$("#selectpack").val();
									var container=$("#containerid").val();
									var standard = $("#val1").val();
									
									
				
	
	


									
							//alert(producttypeid+container+package+standard);
									//var weight=$("#containerid").val();
									
								   
								  // var container=$("#container").val();;
								if($producttypeid == "Sorbitol")
							
								{
								
								





								
									
								
									
								}else{
									alert(producttypeid+package);
									
								}
								
							
                   
							
							}

						});

					

						
						
						
						
		
						$("#val2").on('change', function() {

							var text=$(this).children("option:selected").text();

							if(text == "Custom"){
								
													//<input class="form-control" type="text" value="10%" disabled>

								var text=  '<div id="val2wegcustom" class="mt-2"><label>Custom Value</label> <input type="number" step="any" class="form-control" id="customvalue2"  name="customvalue2" required> </div>'; 
									$(this).parent().append(text);
							}else{
								$("#val2wegcustom").remove();
							
							}


						
                                  
						

							
						});

					
			
			
				

		});
	</script>


