<?php

include_once('../DatabasePhpFile/DbConnection.php');
$obj = new db();

$conn = $obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud = new Crud();
$query = $crud->Product_Select($conn);
$query1 = $crud->Ptype_Select($conn);
?>

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">


		<h1 class="app-page-title">Product</h1>
		<div class="row g-4 settings-section">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">

					<form class="settings-form" action="../DatabasePhpFile/crudimp.php" method="post">
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Product ID</label>
									<input type="text" class="form-control" id="setting-input-1" value="" placeholder="ORS DE28" name="Pid" required>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Product Name</label>
									<input type="text" class="form-control" id="setting-input-1" value="" placeholder="OCRS28" name="Pname" required>
								</div>
							</div>

							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Usd Per Ton</label>
									<input type="number" class="form-control" id="setting-input-3" value="" placeholder="630" name="PUsd" required>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Product Desc</label>

									<textarea rows="12" cols="60" name="Pdescription" class="form-control textarea-height" placeholder="Enter details here..."></textarea>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Discount in Percentage</label>
									<input type="number" step="any" class="form-control" id="setting-input-3" value="" placeholder="2" name="PDis" required>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Product Type</label>


									<select class="form-select" name="Ptype" aria-label="Default select example" required>
										<option selected disabled value="">Product Type</option>
										<?php
										if ($query1) {
											while ($row = $query1->fetch_array()) {
												echo "<option value=" . $row['ProductTypeId'] . ">";
												echo "" . $row['Type'];
												echo "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>

						</div>
						<button type="submit" class="btn app-btn-primary" name="productadd">ADD</button>

						<?php
						echo '<br>';
						if (isset($_SESSION["Perror"])) {
							$error = $_SESSION["Perror"];
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
				<div class="app-card-body">
					<div class="scroll-table">
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>

									<th>Product Id</th>

									<th>Product Name</th>
									<th>Usd Per Ton</th>
									<th>Product Description</th>

									<th>Dis%</th>
									<th>Dis Value</th>
									<th>Total</th>
									<th>ProductType</th>

									<th>Action</th>
								</tr>
							</thead>
							<tbody class="border-black">
								<?php
								if ($query) {
									while ($row = $query->fetch_array()) {
										echo "<tr>";
										echo "<td>" . $row['ProductId'] . "</td>";
										echo "<td>" . $row['ProductName'] . "</td>";
										echo "<td>" . $row['UsdPerTon'] . "</td>";
										echo "<td>" . $row['ProductDesc'] . "</td>";
										echo "<td>" . $row['DiscountInPercentage'] . "</td>";
										echo "<td>" . $row['DiscountValue'] . "</td>";
										echo "<td>" . $row['Total'] . "</td>";
										echo "<td>" . $row['Type'] . "</td>";
										$d = $row['ProductId'];
										echo '<td class="tbl-btn">
												<button title="Edit" id="' . $d . "";
										echo '"class="btn btn-success Edelete" data-toggle="modal"
												data-target="#exampleModal"><i
														class="fas fa-pencil-alt" ></i></button>';





										echo '<button title="Delete"  id="' . $d . "";



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
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Product Edit
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form class="settings-form" action='../DatabasePhpFile/crudimp.php' method='post'>
										<div class="row">
											<input type="hidden" name="Evalue" value="" id="dvv1">

											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Product Name</label>
													<input type="text" class="form-control" id="Ename" value="" placeholder="Ename" name="Ename" required>
												</div>
											</div>


											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Usd Per Ton</label>
													<input type="number" class="form-control" id="EUsd" value="" placeholder="630" name="EUsd" required>
												</div>
											</div>

											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Product Desc</label>

													<textarea id="Edescription" rows="12" cols="60" name="Edescription" class="form-control textarea-height">
																	</textarea>
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Discount in Percentage</label>
													<input type="number" step="any" class="form-control" id="EDis" value="" placeholder="630" name="EDis" required>
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Product Type</label>


													<select class="form-select" name="Etype" id="Eproducttypeid" required>

														<?php
														$query12 = $crud->Ptype_Select($conn);

														while ($row1 = $query12->fetch_array()) {
															echo "<option value=" . $row1['ProductTypeId'] . ">";
															echo "" . $row1['Type'];
															echo "</option>";
														}
														?>
													</select>
												</div>
											</div>


											<div class="col-12">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="productE">Update
												</button>
												<div>
												</div>

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


<div class="modal fade" id="dmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Confirm
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="row">

					<div class="col-6">
						<div class="mb-3">
							<label for="setting-input-1" class="form-label">Are you sure want to delete?</label>

						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<form class="settings-form" action='../DatabasePhpFile/crudimp.php' method='post'>
					<input type="hidden" name="dvalue" value="" id="dvv">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary" name="productd">yes
					</button>
				</form>
			</div>
		</div>
	</div>
</div>




<script>
	$('.cdelete').click(function() {
		var id = $(this).attr("id");

		$('#dvv').val(id);
	});

	$('.Edelete').click(function() {
		var id = $(this).attr("id");
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function() {
			return $(this).text();
		}).get();

		for (i = 0; i < 10; i++) {
			console.log("data values" + data[7]);
		}
		$('#dvv1').val(id);
		$('#Ename').val(data[1]);
		$('#EUsd').val(data[2]);
		$('#Edescription').val(data[3]);
		$('#EDis').val(data[4]);
		$('#Eproducttypeid').val(data[7]);


		var indexproduct = $('#Eproducttypeid  option:contains(' + data[7] + ')').val();
		$('#Eproducttypeid').val(indexproduct);

	});

	$(document).ready(function() {
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