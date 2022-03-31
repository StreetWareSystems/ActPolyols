<?php

include_once('../DatabasePhpFile/DbConnection.php');
$obj=new db();

$conn=$obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud=new Crud();
$query=$crud->package_Select($conn);
$query1=$crud->Ptype_Select($conn);
?>


		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">


				<h1 class="app-page-title">Packaging</h1>
				<div class="row g-4 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">

							<form class="settings-form" id="formPackageAdd"  action="../DatabasePhpFile/crudimp.php"  method="post">
								<div class="row">
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Package Name</label>
											<input type="text" class="form-control" id="setting-input-1"
												value="" placeholder="Drums" name="PackageName" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Cost per Unit</label>
											<input type="number" step="any" class="form-control" id="setting-input-1"
												value="" placeholder="15.26" name="CostperUnit" required>
										</div>
									</div>
									
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Max Weight</label>
											<input type="number"  step="any" class="form-control" id="setting-input-3"
												value="" placeholder="0.322" name="Weight" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">20 Ft Pallet</label>
											<input type="number"  class="form-control" id="setting-input-3"
												value="" placeholder="76" name="20FtPallet" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">40 Ft Pallet</label>
											<input type="number"  class="form-control" id="setting-input-3"
												value="" placeholder="96" name="40FtPallet" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											    <label for="setting-input-1" class="form-label">Product Type</label>
											

												<select class="form-select" name="Ptype" id="producttypeid" aria-label="Default select example" required>
													<option selected disabled value="">Product Type</option>
													   <?php
													 if($query1){
																	while ($row = $query1->fetch_array()) { 
																	echo "<option value=".$row['ProductTypeId'].">";
																	echo "".$row['Type'];
																	echo "</option>";
																}
															}		
												         ?>
												  </select>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Unit Weight</label>
											<input type="number" step="any" class="form-control" id="setting-input-3"
												value="" placeholder="0.03" name="UnitWeight" required>
										</div>
									</div>
								</div>
								<button type="submit" class="btn app-btn-primary" name="packageadd">ADD</button>
								<?php
												echo '<br>';
									if(isset($_SESSION["Packerror"])){
										$error = $_SESSION["Packerror"];
										echo "<span style='color: red'>$error</span>";
									}
								?> 
						
							</form>

						</div>
						<!--//app-card-body-->

					</div>
					<!--//app-card-->

				</div>
				<!--//row-->

				<div class="row mt-5 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body ">
							<div class="scroll-table">
								<table id="example" class="display" style="width:100%">
									<thead>
										<tr>
											<th>Name</th>
											<th>Cost per Unit</th>
											<th>Max Weight</th>
											<th>Cost Per ton</th>
											<th>20Ft Pallet</th>
											<th>40Ft Pallet</th>
											<th>20Ft in Mt</th>
											<th>40Ft in Mt</th>
											<th>Unit Weight</th>
											<th>Bag Per Pallet</th>
											<th>Product Type</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="border-black">
									<?php 
									if($query){	
										while ($row = $query->fetch_array()) { 
											echo "<tr>";
											
											echo "<td>".$row['PackageName']."</td>";
											echo "<td>".$row['CostperUnit']."</td>";
											echo "<td>".$row['Weight']."</td>";

											echo "<td>".number_format($row['CostPerton'], 2, '.', ' ')."</td>";

											echo "<td>".$row['20FtPallet']."</td>";
											echo "<td>".$row['40FtPallet']."</td>";
											echo "<td>".number_format($row['20FtinMt'], 2, '.', ' ')."</td>";
											echo "<td>".number_format($row['40FtinMt'], 2, '.', ' ')."</td>";
										
											echo "<td>".$row['UnitWeight']."</td>";
											echo "<td>".$row['BagPerPallet']."</td>";
											echo "<td>".$row['Type']."</td>";
											

											echo '<td class="tbl-btn">
											<button title="Edit" id='.$row['PackageId']." ";
											echo 'class="btn btn-success Edelete" data-toggle="modal"
											data-target="#exampleModal"><i
													class="fas fa-pencil-alt" ></i></button>';

											echo '<button title="Delete"  id="'.$row['PackageId']."";
										
									

											echo '"class="btn btn-danger ms-lg-1 cdelete" data-toggle="modal"
											data-target="#dmodal"><i
													class="fas fa-times" ></i></button>
											</td>';


											
											
											echo "</tr>";
												

											
										} 
									}	
									?>
								</tbody>
								</table>
						    </div>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
							    aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Packaging Edit
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
											<form class="settings-form" action='../DatabasePhpFile/crudimp.php' method='post'>
													<div class="row">
													    <input type="hidden" name="Evalue" value="" id="dvv1">
														
														
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">Cost per Unit</label>
																<input type="number" step="any" class="form-control" id="ECostperUnit"
																	value="" placeholder="15.26" name="ECostperUnit" required>
															</div>
														</div>
														
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">Weight</label>
																<input type="number" step="any" class="form-control" id="EWeight"
																	value="" placeholder="0.3" name="EWeight" required>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">20 Ft Pallet</label>
																<input type="number"  class="form-control" id="E20FtPallet"
																	value="" placeholder="76" name="E20FtPallet" required>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">40 Ft Pallet</label>
																<input type="number"  class="form-control" id="E40FtPallet"
																	value="" placeholder="96" name="E40FtPallet" required>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">Product Type</label>
																
					
																	<select class="form-select" name="Etype" id="Eproducttypeid" required>
																		
																								 <?php
																								 $query12=$crud->Ptype_Select($conn);
																							
																								while ($row = $query12->fetch_array()) { 
																								$var=$row['ProductTypeId'];
																								echo "<option value=".$var.">";
																								echo "".$row['Type'];
																								echo "</option>";
																								}
																								
																				
																    ?>
																	</select>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">Unit Weight</label>
																<input type="number" step="any" class="form-control" id="EUnitWeight"
																	value="" placeholder="0.3" name="EUnitWeight" required>
															</div>
														</div>
													</div>
													<div class="col-12">		
																	<button type="button" class="btn btn-secondary"
															      	data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" name="packageE">Update
																</button>
																</div>
													</div>
													
												</form>
											</div>
											
										</div>
									</div>
						    </div>

							<div class="modal fade" id="dmodal" tabindex="-1" role="dialog"
							       aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Delete Confirm
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
											
													<div class="row">
														
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">Are  you sure want to delete?</label>
																 
				                                        	</div>
														</div>
													</div>
												
											</div>
											<div class="modal-footer">
											    <form class="settings-form" action='../DatabasePhpFile/crudimp.php' method='post'>
												   <input type="hidden" name="dvalue" value="" id="dvv">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">No</button>
														<button type="submit" class="btn btn-primary" name="packaged">yes
															</button>
												</form>
											</div>
										</div>
								   </div>
						    </div>
						</div>
						<!--//app-card-body-->

					</div>
					<!--//app-card-->

				</div>
				<!--//row-->




			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-content-->



	
	<script>


$('.cdelete').click(function () {
		var id=$(this).attr("id");
		$('#dvv').val(id);
	 });

	 $('.Edelete').click(function () {
		var id=$(this).attr("id");
		$tr=$(this).closest('tr');
		var data=$tr.children("td").map(function(){
				return $(this).text();
			}).get();

      

		$('#dvv1').val(id);
	
		$('#ECostperUnit').val(data[1]);
		$('#EWeight').val(data[2]);
		$('#E20FtPallet').val(data[4]);
		$('#E40FtPallet').val(data[5]);
		$('#EUnitWeight').val(data[8]);
	                                              	    
	    var indexproduct=$('#Eproducttypeid  option:contains('+ data[10] + ')').val();
        $('#Eproducttypeid').val(indexproduct);										
														
														
	 });

		$(document).ready(function () {
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

		$('#Eproducttypeid').on('change', function() {
				  var text=$(this).children("option:selected").text();
					if(text == "Syrup"){
					      
				     $('#Ebage').remove();
						
					}else if(text == "Sorbitol"){

						var text=  '<div class="col-6" id="Ebage"> <div class="mb-3"> <label for="setting-input-1" class="form-label">Bag Per Pallet</label><input type="number" step="any" class="form-control" id="Ebagepallet"  name="bagperpallet" required> </div>	</div>'; 
						$(this).parent().parent().parent().append(text);
						
					}
			

				});

			$('#producttypeid').on('change', function() {
				  var text=$(this).children("option:selected").text();
					if(text == "Syrup"){
					      
				     $('#bage').remove();
						
					}else if(text == "Sorbitol"){

						var text=  '<div class="col-6" id="bage"> <div class="mb-3"> <label for="setting-input-1" class="form-label">Bag Per Pallet</label><input type="number" step="any" class="form-control" id="setting-input-3" value="" placeholder="26.0" name="bagperpallet" required> </div>	</div>'; 
						$(this).parent().parent().parent().append(text);
						
					}
			

				});
	

	</script>
</body>

</html>