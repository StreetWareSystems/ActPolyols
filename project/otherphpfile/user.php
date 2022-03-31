<?php

include_once('../DatabasePhpFile/DbConnection.php');
$obj = new db();

$conn = $obj->connect();

include_once('../DatabasePhpFile/crud.php');
$crud = new Crud();
$query = $crud->login_select($conn);
$query1 = $crud->Role_select($conn);
$query2 = $crud->company_product($conn);
?>


<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">


		<h1 class="app-page-title">User</h1>
		<div class="row g-4 settings-section">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">

					<form class="settings-form" action="../DatabasePhpFile/crudimp.php" method="post">
						<div class="row">

							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Name</label>
									<input type="text" class="form-control" id="setting-input-1" value="" placeholder="afzal" name="name" required>
								</div>
							</div>

							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Email</label>
									<input type="email" class="form-control" id="setting-input-1" value="" placeholder="user@gmail.com" name="email" required>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Password</label>
									<input type="password" class="form-control" id="setting-input-1" value="" placeholder="******" name="password" required>
								</div>
							</div>

							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Contact No.</label>
									<input type="number" class="form-control" id="setting-input-1" value="" placeholder="" name="contactno" required>
								</div>
							</div>














							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Role Type</label>


									<select class="form-select" name="RoleType" aria-label="Default select example" required>
										<option selected disabled value="">Role Type</option>

										<?php
										if ($query1) {
											while ($row = $query1->fetch_array()) {
												echo "<option value=" . $row['RoleId'] . ">";
												echo "" . $row['Roletype'];
												echo "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Company</label>


									<select class="form-select" name="Company" aria-label="Default select example" required>
										<option selected disabled value=""> Select Company</option>

										<?php
										$query2 = $crud->company_Select($conn);
										if ($query2) {
											while ($row = $query2->fetch_array()) {

												echo "<option value=" . $row['CompanyId'] . ">";
												echo "" . $row['CompanyName'];
												echo "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn app-btn-primary" name="loginadd">ADD</button>
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
									<th>Email</th>
									<th>Password</th>
									<th>Contact</th>
									<th>Role Type</th>
									<th>Company Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="border-black">
								<?php
								if ($query) {
									while ($row = $query->fetch_array()) {
										echo "<tr>";

										echo "<td>" . $row['Name'] . "</td>";
										echo "<td>" . $row['Email'] . "</td>";
										echo "<td>" . $row['Password'] . "</td>";
										echo "<td>" . $row['Contact'] . "</td>";
										echo "<td>" . $row['Roletype'] . "</td>";
										echo "<td>" . $row['CompanyName'] . "</td>";


										echo '<td class="tbl-btn">
										 <button title="Edit" id=' . $row['Id'] . " ";
										echo 'class="btn btn-success Edelete" data-toggle="modal"
										 data-target="#exampleModal"><i
												 class="fas fa-pencil-alt" ></i></button>';

										echo '<button title="Delete"  id=' . $row['Id'] . " ";

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
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">User Edit
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
													<label for="setting-input-1" class="form-label">Name</label>
													<input type="text" class="form-control" id="Ename" value="" placeholder="afzal" name="Ename" required>
												</div>
											</div>

											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Email</label>
													<input type="email" class="form-control" id="Eemail" value="" placeholder="user@gmail.com" name="Eemail" required>
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Password</label>
													<input type="password" class="form-control" id="Epassword" value="" placeholder="******" name="Epassword" required>
												</div>
											</div>


											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Contact</label>
													<input type="tel" class="form-control" id="Econtact" value="" name="Econtact" required>
												</div>
											</div>


											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Role Type</label>

													<select class="form-select" name="ERoleType" id="ERoleType" aria-label="Default select example">


														<?php

														$query12 = $crud->Role_select($conn);
														while ($row = $query12->fetch_array()) {
															echo "<option value=" . $row['RoleId'] . ">";
															echo "" . $row['Roletype'];
															echo "</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Company</label>


													<select class="form-select" name="ECompany" id="ECompany" aria-label="Default select example">


														<?php
														$query2 = $crud->company_Select($conn);
														if ($query2) {
															while ($row = $query2->fetch_array()) {

																echo "<option value=" . $row['CompanyId'] . ">";
																echo "" . $row['CompanyName'];
																echo "</option>";
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-12">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="LoginE">Update
												</button>
											</div>

										</div>

									</form>
								</div>

							</div>
						</div>
					</div>

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
										<button type="submit" class="btn btn-primary" name="logind">yes
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



		$('#dvv1').val(id);
		$('#Ename').val(data[0]);
		$('#Eemail').val(data[1]);
		$('#Epassword').val(data[2]);
		$('#Econtact').val(data[3]);


		var indexproduct = $('#ERoleType  option:contains(' + data[4] + ')').val();
		$('#ERoleType').val(indexproduct);

		var indexproduct = $('#ECompany  option:contains(' + data[5] + ')').val();
		$('#ECompany').val(indexproduct);



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