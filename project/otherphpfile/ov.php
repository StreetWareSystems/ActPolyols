
<?php
   
    
   include_once('../DatabasePhpFile/DbConnection.php');
   $obj=new db();
   $conn=$obj->connect();
   include_once('../DatabasePhpFile/crud.php');
   $crud=new Crud();

  ?>

 
       
   

<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" style="margin-bottom:30%;">
			    
			    <h1 class="app-page-title">Overview</h1>
			
			  
				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Client</h4>

							
							    <div class="stats-figure">
									
									<?php
								         $query=$crud->countclient(2,$conn);
								 
											while ($row = $query->fetch_array()) { 
												echo $row[0];
												
											}
								    ?>
								</div>
							   
										</div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
								<div class="col-6 col-lg-3">
									<div class="app-card app-card-stat shadow-sm h-100">
										<div class="app-card-body p-3 p-lg-4">
											<h4 class="stats-type mb-1">Total Product</h4>
											<div class="stats-figure">
												
											
												<?php
													$query=$crud->Product_count($conn);
											
														while ($row = $query->fetch_array()) { 
															echo $row[0];
															
														}
												?>
										
										
										</div>
										
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Syrup</h4>
							    <div class="stats-figure">
								
												<?php
													$query=$crud->Product_countsingle(1,$conn);
											
														while ($row = $query->fetch_array()) { 
															echo $row[0];
															
														}
												?>
								


								</div>
							    
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Sorbitol</h4>
							    <div class="stats-figure">
									
								<?php
													$query=$crud->Product_countsingle(2,$conn);
											
														while ($row = $query->fetch_array()) { 
															echo $row[0];
															
														}
												?>
								</div>
							 
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			
	    </div><!--//col-->
	