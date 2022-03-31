
	<?php

include_once('../DatabasePhpFile/DbConnection.php');
$obj=new db();

$conn=$obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud=new Crud();
$query=$crud->freight_Select($conn);

?>



		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">


				<h1 class="app-page-title">Freight </h1>
				<div class="row g-4 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">

							<form class="settings-form" action="../DatabasePhpFile/crudimp.php"  method="post">
								<div class="row">
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Port Code</label>
											<input type="text" class="form-control" id="setting-input-1"
												value="" placeholder="Los Angeles" name="Port" required>
										</div>
									</div>
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
											<label for="setting-input-1" class="form-label">Freight Size</label>
											<select class="form-select" name="Fsize" aria-label="Default select example" required>
															<option selected disabled value=""> Select Size</option>
															<option value="20">20</option>
															<option value="40">40</option>
                                       </select>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Port Name</label>
											<input type="text" class="form-control" id="setting-input-1"
												value="" placeholder="LA-20" name="Portname" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Rate</label>
											<input type="number" step="any" class="form-control" id="setting-input-1"
												value="" placeholder="13000" name="Rate" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Limit</label>
											<input type="number" step="any" class="form-control" id="setting-input-1"
												value="" placeholder="13.5" name="Limit" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Max limit</label>
											<input type="number" step="any" class="form-control" id="setting-input-1"
												value="" placeholder="3.5" name="Maxlimit" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">OW Penalty</label>
											<input type="number" step="any" class="form-control" id="setting-input-1"
												value="" placeholder="1400" name="OWPenalty" required>
										</div>
									</div>
									
									
									
									<div class="col-6">
										<div class="mb-3">	
											<label for="setting-input-1" class="form-label">Validity Date</label>
											<input type="Date" class="form-control" id="setting-input-1"
												value="" name="Validity" required>

												<!-- <input type="Date" data-date-format="DD MMMM YYYY" value="2015-Aug-09" 
											class="datewithmonth" placeholder="date" id="setting-input-1"
												name="Validity" required>  -->
										</div>
									</div>
								</div>
								<button type="submit" class="btn app-btn-primary" name="freightadd">ADD</button>
							</form>

						</div>
						<!--//app-card-body-->

					</div>
					<!--//app-card-->

				</div>
				<!--//row-->

				<div class="row mt-5 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">
							<div class="scroll-table">
							<table id="example" class="display" style="width:100%">
								<thead>
									<tr>
									
										<th>Port Code </th>
										<th>Country</th>
										<th>Size</th>
										<th>Port Name</th>

										<th>Rate</th>
										<th>Limit</th>
										<th>Max limit</th>
										<th>OW Penalty</th>

										

										
										<th>Validity</th>
									


										<th>Action</th>
									</tr>
								</thead>
								<tbody class="border-black">
								<?php
									if($query){ 
									 while ($row = $query->fetch_array()) { 
										 echo "<tr>";
										 echo "<td>".$row['Port']."</td>";
										 echo "<td>".$row['Country']."</td>";
										
										 echo "<td>".$row['FreightSize']."</td>";
										 echo "<td>".$row['PortName']."</td>";

										 echo "<td>".$row['Rate']."</td>";
										 echo "<td>".$row['Limit']."</td>";
										 echo "<td>".$row['Maxlimit']."</td>";
										 echo "<td>".$row['OWPenalty']."</td>";
									

										// echo "<td>".$row['PerTonInDrums']."</td>";
										// echo "<td>".$row['PerTonInTotes']."</td>";
										 echo "<td class='dd'>".$row['Validity']."</td>";

								
			                           
										   echo '<td class="tbl-btn">
										   <button title="Edit" id='.$row['FreightRateId']." ";
										   echo 'class="btn btn-success Edelete" data-toggle="modal"
										   data-target="#exampleModal"><i
												   class="fas fa-pencil-alt" ></i></button>';
  
										   echo '<button title="Delete"  id='.$row['FreightRateId']." ";
									  
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
											<h5 class="modal-title" id="exampleModalLabel">Freight Edit
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
															<label for="setting-input-1" class="form-label">Port</label>
															<input type="text" class="form-control" id="EPort"
																value="" placeholder="Los Angeles" name="EPort" required>
														</div>
													</div>
													
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
															<label for="setting-input-1" class="form-label">Freight Size</label>
															

																<select class="form-select" id= "EFsize" name="EFsize" aria-label="Default select example" required>
														
															<option value="20">20</option>
															<option value="40">40</option>
															
															
														</select>
														</div>
													</div>
													<div class="col-6">
														<div class="mb-3">
															<label for="setting-input-1" class="form-label">Port Name</label>
															<input type="text" class="form-control" id="EPortname"
																value="" placeholder="LA-20" name="EPortname" required>
														</div>
													</div>
													<div class="col-6">
														<div class="mb-3">
															<label for="setting-input-1" class="form-label">Rate</label>
															<input type="number" step="any" class="form-control" id="ERate"
																value="" placeholder="3.5" name="ERate" required>
														</div>
													</div>
														<div class="col-6">
														<div class="mb-3">
															<label for="setting-input-1" class="form-label">Limit</label>
															<input type="number" step="any" class="form-control" id="ELimit"
																value="" placeholder="3.5" name="ELimit" required>
														</div>
													</div>
													<div class="col-6">
														<div class="mb-3">
															<label for="setting-input-1" class="form-label">Max limit</label>
															<input type="number" step="any" class="form-control" id="EMaxlimit"
																value="" placeholder="3.5" name="EMaxlimit" required>
														</div>
													</div>
													
													<div class="col-6">
														<div class="mb-3">
															<label for="setting-input-1" class="form-label">OW Penalty</label>
															<input type="number" step="any" class="form-control" id="EOWPenalty"
																value="" placeholder="3.5" name="EOWPenalty" required>
														</div>
													</div>
									
									
													
													<div class="col-6">
														<div class="mb-3">
														<label for="setting-input-1" class="form-label">Validity Date</label>
															<input type="Date" class="form-control" id="EValidity"
																value=""  name="EValidity"  required>

															<!-- <input type="Date" data-date-format="DD MMMM YYYY" value="2015-Aug-09" 
											                class="datewithmonth" id="EValidity"
											                  	name="EValidity" required> -->
														</div>
													</div>
													<div class="col-12">		
																	<button type="button" class="btn btn-secondary"
															      	data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" name="freightE">Update
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
														<button type="submit" class="btn btn-primary" name="freightd">yes
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
		$('#EPort').val(data[0]);

		var indexproduct=$('#Ecountry  option:contains('+ data[1] + ')').val();
        $('#Ecountry').val(indexproduct);
	 	var indexproduct=$('#EFsize  option:contains('+ data[2] + ')').val();

        $('#EFsize').val(indexproduct);	
		$('#EPortname').val(data[3]);
		$('#ERate').val(data[4]);
		$('#ELimit').val(data[5]);
		$('#EMaxlimit').val(data[6]);
		$('#EOWPenalty').val(data[7]);
	    $('#EValidity').val(data[8]);  
      										
		 							
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
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>


</body>

</html>