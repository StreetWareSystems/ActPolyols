
	<?php

include_once('../DatabasePhpFile/DbConnection.php');
$obj=new db();

$conn=$obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud=new Crud();
$query=$crud->duties_Select($conn);
$query1=$crud->Ptype_Select($conn);
?>


		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">


				<h1 class="app-page-title">Duties</h1>
				<div class="row g-4 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">

							<form class="settings-form" action="../DatabasePhpFile/crudimp.php"  method="post">
								<div class="row">
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Country</label>
											<select class="form-select" name="country" aria-label="Default select example" required>
												<option selected disabled value="">Country</option>
												<option value="US">US</option>
												<option value="CA">CA</option>
												<option value="MX">MX</option>
											  </select>
										</div>
									</div>
									
									
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Product Type</label>
											

												<select class="form-select" name="Ptype" aria-label="Default select example" required>
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
											<label for="setting-input-1" class="form-label">Cost</label>
											<input type="number" step="any" class="form-control" id="setting-input-1"
												value="" placeholder="3.5" name="Dv" required>
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn app-btn-primary" name="dutiesadd">Add</button>
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
										<th>Country</th>
										<th>Product Type</th>
										<th>Duties Value</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="border-black">
								<?php
									 

									 if($query){
											while ($row = $query->fetch_array()) { 
												echo "<tr>";
												
												echo "<td>".$row['Country']."</td>";
												echo "<td>".$row['Type']."</td>";
												echo "<td>".$row['DutiesValue']."</td>";



												echo '<td class="tbl-btn">
												<button title="Edit" id='.$row['DutiesId']." ";
												echo 'class="btn btn-success Edelete" data-toggle="modal"
												data-target="#exampleModal"><i
														class="fas fa-pencil-alt" ></i></button>';

												echo '<button title="Delete"  id='.$row['DutiesId']." ";
											
												echo "class='btn btn-danger ms-lg-1 cdelete' data-toggle='modal'
												data-target='#dmodal'><i
														class='fas fa-times' ></i></button>
												</td>";


												
										
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
												<h5 class="modal-title" id="exampleModalLabel">Duties Edit
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
																<label for="setting-input-1" class="form-label">Country</label>
																<select class="form-select" id="Ecountry" name="Ecountry" aria-label="Default select example" required>
																
																    <option value="US">US</option>
																	<option value="CA">CA</option>
																	<option value="MX">MX</option>
																</select>
															</div>
														</div>
														
														
														<div class="col-6">
															<div class="mb-3">
																<label for="setting-input-1" class="form-label">Product Type</label>
																
					
																	<select class="form-select" id="EPtype" name="EPtype" aria-label="Default select example" required>
																		
																		<?php
																								 $query12=$crud->Ptype_Select($conn);
																							 if($query12){

																								while ($row = $query12->fetch_array()) { 
																									$var=$row['ProductTypeId'];
																									echo "<option value=".$var.">";
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
																<label for="setting-input-1" class="form-label">DutiesValue</label>
																<input type="number" step="any" class="form-control" id="EDv"
																	value="" placeholder="3.5" name="EDv" required>
															</div>
														</div>
														<div class="col-12">		
																	<button type="button" class="btn btn-secondary"
															      	data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" name="dutiesE">Update
																</button>
																</div>
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
														<button type="submit" class="btn btn-primary" name="dutiesd">yes
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
	

		var indexproduct=$('#Ecountry  option:contains('+ data[0] + ')').val();
        $('#Ecountry').val(indexproduct);
	 	var indexproduct=$('#EPtype  option:contains('+ data[1] + ')').val();
        $('#EPtype').val(indexproduct);
		$('#EDv').val(data[2]);										
	                                              	    
									
														
														
														
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
	</script>
