<?php

include_once('../DatabasePhpFile/DbConnection.php');
$obj = new db();

$conn = $obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud = new Crud();




$productid =$_POST['productid'];
$producttypeid =$_POST['producttypeid'];
$producttypename =$_POST['producttypename'];
$companyid =$_POST['company'];
?>


<style>
	@media print {

		body * {
			visibility: hidden;

		}

		#data,
		#data * {

			visibility: visible;
		}

		#data {
			position: fixed;
			top: 0;
		}

		#buttonprint {
			display: none;
		}
	}
</style>

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">


		<h1 class="app-page-title">Syrup</h1>
		<div class="row g-4 settings-section">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">

					<form class="settings-form">
						<div class="row">
							<div class="col-4 mb-3">

							<input type="hidden" id="companyidd" name="companyidd" value="<?php echo $companyid;?>">
									<input type="hidden" id="producttypename" name="producttypename" value="<?php echo $producttypename;?>">
									<input type="hidden" id="producttypeid" name="producttypeid" value="<?php echo $producttypeid;?>">
									

									<input type="hidden" id="productid" name="productid" value="<?php echo $productid;?>">

									
									

								<label>Product</label>
								<select class="form-select" name="Product" aria-label="Default select example" required>
									<option selected disabled value="">Select Product</option>
									<?php
									$_SESSION["data1"] = null;
									
									$query = $crud->Product_Select_by_ProductTYpeIDassignproduct($companyid, $producttypeid,$conn);
									while ($row = $query->fetch_array()) {
										echo '<option value="' . $row['ProductId'] . "";

										echo '">' . $row['ProductId'] . "";
										echo "</option>";
									}
									?>

								</select>
							</div>

							<div class="col-4 mb-3">
								<label>Packaging</label>
								<select class="form-select" name="Package" aria-label="Default select example" required>
									<option selected disabled value="">Select Package</option>
									<?php
									$query = $crud->package_Select_by_producttypeid(1, $conn);
									while ($row = $query->fetch_array()) {
										echo '<option value="' . $row['PackageId'] . "";

										echo '">' . $row['PackageName'] . "";
										echo "</option>";
									}
									?>

								</select>
							</div>
							<div class="col-4 mb-3">
								<label>Port</label>
								<select class="form-select" name="Port" aria-label="Default select example" required>
									<option selected disabled value="">Select Port</option>
									<?php
									$query = $crud->freight_Select1($conn);
									while ($row = $query->fetch_array()) {
										echo '<option value="' . $row['Port'] . "";

										echo '">' . $row['Port'] . "";
										echo "</option>";
									}
									?>
								</select>
							</div>
							<div class="col-4 mb-3">
								<label>Container</label>
								<select class="form-select" name="Container" aria-label="Default select example" required>
									<option selected disabled value="">Select Container</option>
									<?php
									$query = $crud->Container_Select($conn);
									while ($row = $query->fetch_array()) {
										echo '<option value="' . $row['ContainerSize'] . "";

										echo '">' . $row['ContainerSize'] . "";
										echo "</option>";
									}
									?>
								</select>

							</div>
							<div class="col-4 mb-3">
								<label>Pallet Type</label>
								<select class="form-select" name="Pallet" aria-label="Default select example" required>
									<option selected disabled value="">Select Pallet</option>
									<?php
									$query = $crud->pallettype_Select($conn);
									while ($row = $query->fetch_array()) {
										echo '<option value="' . $row['PalletId'] . "";

										echo '">' . $row['PalletName'] . "";
										echo "</option>";
									}
									?>
								</select>

							</div>
							<div class="col-4 mb-3">
								<label>Act Margin</label>
								<input class="form-control" type="text" name="Actmargin" placeholder="10%">

							</div>
						</div>


						<div class="row">
							<div class="col-6 mt-3">
								<label>Number of Packaging</label>
								<select class="form-select" name="val1" id="val1" aria-label="Default select example" required>
									<option value="Standard">Standard</option>
									<option value="Custom">Custom</option>

								</select>

							</div>
							<div class="col-6 mt-3">
								<label>Weight per Packaging</label>
								<select class="form-select" name="val2" id="val2" aria-label="Default select example" required>

									<option value="Standard">Standard </option>
									<option value="Custom">Custom</option>

								</select>

							</div>

						</div>
						<br>
						<button id="Generate" type="submit" style="background-color: #04AA6D; color: white; width: 50%; justify-content: center;"  class="btn app-btn-primary" name="GenSyrup">Generate</button>
						
					</form>

				</div>
				<!--//app-card-body-->
			

			</div>
			<!--//app-card-->

		</div>
		
	
		<!--//row-->

		<?php




		if (isset($_SESSION["data"])) {
			$output = $_SESSION["data"];


			echo '  
					
						<div class="row mt-5 settings-section" id="data">
						  <div class="app-card app-card-settings shadow-sm p-4">
							<div class="app-card-body">
							<div class="d-flex justify-content-end mb-2" >
					<input class="btn app-btn-primary" id="buttonprint" type="button" value="Print" onclick="window.print()" />
				</div>
								<div class="row">
									<div class="col-md-6" >
										<table class="display  text-dark w-100">
											<tbody  class="border-black">
												<tr>
													<td class="pt-1 px-2">Product Cost</td> 
												 <td class="pt-1 px-2">$ ' . $output[0] . "";

			echo '</td></tr>
			
												<tr>
													<td class="pt-1 px-2">Packaging Cost</td>
													<td class="pt-1 px-2">$ ' . number_format($output[1], 2, '.', '') . "";

			echo '</td> </tr>
			
												<tr>
													<td class="pt-1 px-2">Pallet Cost</td>
													<td class="pt-1 px-2">$ ' . number_format($output[2], 2, '.', '') . "";


			echo '</td></tr>
												<tr>
													<td class="pt-1 px-2">Port Cost</td>
													<td class="pt-1 px-2">$ ' . number_format($output[3], 2, '.', '') . "";

			echo '</td> </tr>
												<tr>
													<td class="pt-1 px-2">Total FOB cost</td>
													<td class="pt-1 px-2">$ ' . number_format($output[4], 2, '.', '') . "";

			echo '</td> </tr>
												<tr>
													<td class="pt-1 px-2">Profit</td>
													<td class="pt-1 px-2">$ ' . number_format($output[5], 2, '.', '') . "";


			echo '</td> </tr>
											</tbody>
											<tfoot class="border-black bg-theme">
												<tr>
													<td class="font-weight-bold text-dark pt-1 px-2">Total Product Cost per Ton</td>
													<td class="font-weight-bold text-dark pt-1 px-2">$ ' . number_format($output[6], 2, '.', '') . "";

			echo '</td> </tr>
											</tfoot>
			
										</table>
									</div>
									<div class="col-md-6 mt-md-0 mt-3" >
										<table class="display  text-dark w-100" >
											<tbody class="border-black">
												<tr>
													<td class="pt-1 px-2">Num of Packaging </td>
													<td class="pt-1 px-2">' . $output[7] . "";

			echo '</td> </tr>
													
												</tr>
			
												<tr>
													<td class="pt-1 px-2">Total Weight</td>
													<td class="pt-1 px-2">' . number_format($output[8], 2, '.', '') . "";

			echo '</td> </tr>
													
											    <tr>
													<td class="pt-1 px-2">Freigh Cost</td>
													<td class="pt-1 px-2">$ ' . number_format($output[9], 2, '.', '') . "";
			echo '</td> </tr>
												<tr>
													<td class="pt-1 px-2">Penalty</td>
													<td class="pt-1 px-2">$ ' . number_format($output[10], 2, '.', '') . "";
			echo '</td> </tr>
												<tr>
													<td class=" pt-1 px-2">Validity Date</td>
													<td class=" pt-1 px-2">' . $output[11] . "";
			echo '</td> </tr>
												<tr>
													<td class=" pt-1 px-2">Total Freight</td>
													<td class=" pt-1 px-2">$ ' . number_format($output[12], 2, '.', '') . "";
			echo '</td> </tr>
										</tbody>
										<tfoot class="border-black bg-theme">
												<tr>
													<td class="font-weight-bold text-dark pt-1 px-2">Freight Cost Per Ton</td>
													<td class="font-weight-bold text-dark pt-1 px-2">$ ' . number_format($output[13], 2, '.', '') . "";
			echo '</td> </tr>
											</tfoot>
			
										</table>
									</div>
								</div>
								
								<div class="row mt-4">
									<div class="col-md-6">
										<table class="display w-100  text-dark" >
											<tbody> 
												<tr class="border-black bg-theme">
													<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">Total Cost Per Ton</td>
													<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">$ ' . number_format($output[14], 2, '.', '') . "";
			echo '</td> </tr>
										<tr>
											<td class="pt-4 border-0"></td>
										</tr>
												<tr class="border-black bg-theme">
													<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">Total Container Cost</td>
													<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">$ ' . number_format($output[16], 2, '.', '') . "";
			echo '</td> </tr>
												
											</tbody>
			
										</table>
									</div>
									<div class="col-md-6 mt-md-0 mt-3">
										<table class="display  text-dark w-100">
											<tbody>
												<tr class="border-black bg-theme">
													<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">Cost Per LB</td>
													<td class="font-weight-bold text-dark  pt-1 px-2 font-weight-bold">$ ' . number_format($output[15], 2, '.', '') . "";

			echo '</td> </tr>
			
												
												
											</tbody>
			
										</table>
									</div>
								</div>
	
	
							</div>
							<!--//app-card-body-->
	
						</div>
						<!--//app-card-->
	
					</div>
					

				
					';
		} else {
		}

		?>


		<!--//row-->




	</div>
	<!--//container-fluid-->
</div>
<!--//app-content-->






<script>
	$(".settings-form").on("submit", function(event){
						event.preventDefault();
					
				
						var formValues= $(this).serialize();
				        var producttypename=$("#producttypename").val();
						
						
						if(producttypename == "Sorbitol"){
							
							$.post("../DatabasePhpFile/sorbitol.php", formValues, function(data){
								// Display the returned data in browser
								$("#data").html(data);
							
							});
						}else{
								$.post("../DatabasePhpFile/notsorbitol.php", formValues, function(data){
								// Display the returned data in browser
								console.log(data);
								$("#data").html(data);
							
							});
						}
						
                });


			
			

	$(document).ready(function() {





		$("#val1").on('change', function() {
			var text = $(this).children("option:selected").text();

			if (text == "Custom") {

				//<input class="form-control" type="text" value="10%" disabled>

				var text = '<div id="numcustom" class="mt-2"><label>Custom Value</label> <input type="number" step="any" class="form-control" id="customvalue"  name="customvalue" required> </div>';
				$(this).parent().append(text);
			} else {
				$("#numcustom").remove();
			}

		});

		$("#val2").on('change', function() {

			var text = $(this).children("option:selected").text();

			if (text == "Custom") {

				//<input class="form-control" type="text" value="10%" disabled>

				var text = '<div id="wegcustom" class="mt-2"><label>Custom Value</label> <input type="number" step="any" class="form-control" id="customvalue2"  name="customvalue2" required> </div>';
				$(this).parent().append(text);
			} else {
				$("#wegcustom").remove();
			}

		});





		$('#example').DataTable({
			responsive: true,
			deferRender: true,
			scrollY: 500,
			scrollCollapse: true,
			scroller: true,
			fixedHeader: {
				header: true,
				footer: true
			}
		});

	});
</script>