<?php

		include_once('../DatabasePhpFile/DbConnection.php');
		$obj=new db();

		$conn=$obj->connect();

		include_once('../DatabasePhpFile/crud.php');
		$crud=new Crud();
		$query=$crud->Container_Select($conn);
	?>


		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">


				<h1 class="app-page-title">Container</h1>
				<div class="row g-4 settings-section">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">

							<form class="settings-form" action="../DatabasePhpFile/crudimp.php"  method="post">
								<div class="row">
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Container Size</label>
											<input type="number" class="form-control" id="setting-input-3"
												value="" placeholder="20" name="ContainerSize" required>
										</div>
									</div>
									
									<div class="col-6">
										<div class="mb-3">
											<label for="setting-input-1" class="form-label">Container Pallet</label>
											<input type="number" class="form-control" id="setting-input-3"
												value="" placeholder="14" name="ContainerPallet" required>
										</div>
									</div>
								</div>
								<button type="submit" class="btn app-btn-primary" name="cadd">ADD</button>
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
										<th>Size</th>
										<th>Pallet</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="border-black">
                                     <?php
									 if($query){ 
									 while ($row = $query->fetch_array()) { 
										 echo "<tr>";
										
										 echo "<td>".$row['ContainerSize']."</td>";
			                             echo "<td>".$row['ContainerPallet']."</td>";


										 echo '<td class="tbl-btn">
										 <button title="Edit" id='.$row['ContainerId']." ";
										 echo 'class="btn btn-success Edelete" data-toggle="modal"
										 data-target="#exampleModal"><i
												 class="fas fa-pencil-alt" ></i></button>';

										 echo '<button title="Delete"  id='.$row['ContainerId']." ";
									
										 echo "class='btn btn-danger ms-lg-1 cdelete' data-toggle='modal'
										 data-target='#dmodal'><i
												 class='fas fa-times'></i></button>
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
											<h5 class="modal-title" id="exampleModalLabel">Container Edit
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
															<label for="setting-input-1" class="form-label">Container Size</label>
															<input type="number" class="form-control" id="EContainerSize"
																value="" placeholder="20" name="EContainerSize" required>
														</div>
													</div>
												
													<div class="col-6">
														<div class="mb-3">
															<label for="setting-input-1" class="form-label">Container Pallet</label>
															<input type="number" class="form-control" id="EContainerPallet"
																value="" placeholder="14" name="EContainerPallet" required>
														</div>
													</div>
													<div class="col-12">		
																	<button type="button" class="btn btn-secondary"
															      	data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" name="containerE">Update
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
														<button type="submit" class="btn btn-primary" name="containerd">yes
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
			/*function myFunction(id){
				
                
			} 

	*/
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
		$('#EContainerSize').val(data[0]);
		$('#EContainerPallet').val(data[1]);
		
													
	                                              	    
									
														
														
														
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
