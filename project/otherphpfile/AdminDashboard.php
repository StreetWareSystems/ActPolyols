<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Act Polyols|Dashboard</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="../assets/Image/title.PNG"> 
    
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

		
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- App CSS -->  
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="../assets/css/footer.css">
	<link rel="stylesheet" href="../assets/css/base.css">
	
	<link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
	
<a href=""></a>

<?php
   
    
   include_once('../DatabasePhpFile/DbConnection.php');
   $obj=new db();
   $conn=$obj->connect();
   include_once('../DatabasePhpFile/crud.php');
   $crud=new Crud();

    if($_SESSION["Stid"] == null){
        header("location: ../login.php");
    }else{
		if($_SESSION["Roleid"] == 2){
            header("location: ./StudDashboard.php");
      }
	}
  
    if(isset($_POST["logout"])){
        $obj->logout();
    }

 
       
    
  ?>
</head> 
<input type="hidden" id="custId" name="custId" value="<?php  echo $_SESSION["menu"]; ?>">
<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <!-- <div class="app-search-box col">
		                <form class="app-search-form">   
							<input type="text" placeholder="Search..." name="search" class="form-control search-input">
							<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
				        </form>
		            </div>//app-search-box -->
		            
		            <div class="app-utilities col-auto">
			            
			            
					<?php echo   'Welcome '.$_SESSION["Name"].' '; ?>
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="../assets/Image/user.png" class="" alt="user profile"></a>
				            
							<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
							<form method="post">
								<li><button class="dropdown-item" type="submit" name="logout">Log Out</button></li>

								</form>
  

                          
							</ul>
							
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="" ><img class="img-fluid w-75" src="../assets/Image/logo-header.png" alt="logo"/></a>
	 <hr>
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        

							 
							<button  class="nav-link bg-white border-0" id="Overview">
								 <span class="nav-icon">
								 <i class="fas fa-home"></i>
						         </span>
		                         <span class="nav-link-text">Overview</span>
								</button>
							<!--//nav-link-->
					    </li><!--//nav-item-->
                        <hr>
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					     
							
							<button  class="nav-link bg-white border-0" id="product">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Product</span>
								</button>
			  
							<!--//nav-link-->
					    </li><!--//nav-item-->
					    
						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					      
						        
								
								 <button  class="nav-link bg-white border-0" id="pt">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Product type</span>
								</button>
			  
					       <!--//nav-link-->
					    </li><!--//nav-item-->
					   
						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->

							<button  class="nav-link bg-white border-0" id="package">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Packaging</span>
								</button>
                      <!--//nav-link-->
					    </li><!--//nav-item-->
					    
						       

						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<button  class="nav-link bg-white border-0" id="freight">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Freight</span>
								</button>
                         <!--//nav-link-->
					    </li><!--//nav-item-->
					    


						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->

							<button  class="nav-link bg-white border-0" id="Container">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Container</span>
								</button>
					       <!--//nav-link-->
					    </li><!--//nav-item-->
					    



						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							
							<button  class="nav-link bg-white border-0" id="pallet">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Pallet</span>
								</button>
					        <!--//nav-link-->
					    </li><!--//nav-item-->
					    




						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<button  class="nav-link bg-white border-0" id="duties">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Duties</span>
								</button>
					     <!--//nav-link-->
					    </li><!--//nav-item-->
					    


						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							
							<button  class="nav-link bg-white border-0" id="company">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Company</span>
								</button>
					        <!--//nav-link-->
					    </li><!--//nav-item-->
					    

					
						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							
							<button  class="nav-link bg-white border-0" id="AssignCompany">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">Assign Product</span>
								</button>
					        <!--//nav-link-->
					    </li><!--//nav-item-->


						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					       

							<button  class="nav-link bg-white border-0" id="user">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">User</span>
								</button>
					    </li><!--//nav-item-->
					    
						<li class="nav-item">
						<button  class="nav-link bg-white border-0" id="logs">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text">User Log</span>
								</button>

						</li><!--//nav-item-->

					

				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper" id="appw">
	    
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
													</div>
	    </div><!--//col-->
									  
							    
							  
	    
	    
    </div><!--//app-wrapper-->    					


<!-- FOOTER NEW -->



	

<style>
	#Footer a {
    color: #fff !important;
}
</style>
	
	<footer id="Footer"class="app-footer bottomf mainfooter" style="background-color: #62534b; color:white;  ">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <!-- <small class="copyright ml-5">Designed & Developed  by  @<a class="app-link" href="https://www.streetwaresystems.com/" target="_blank">StreetwareSystems.com</a></small>
		        -->
				<div class="widgets_wrapper" style="padding:35px 0PX 0PX 0PX; margin-left:11%">
				<div class="container">
					<div class="column one-fourth">
						<aside id="text-6" class="widget widget_text" style="margin-right: 10px;">	
									<div class="textwidget"><div class="footer-logoimg" style="padding-top: 60px;">
										<img src="https://actpolyols.com/wp-content/uploads/2020/07/logo-Footer.png">
									</div>
	</div>
		</aside>
		</div>
			<div class="column one-fourth"><aside id="text-2" class="widget widget_text" style="margin-left: 10px;"><h4 class="fhead">About Us</h4>
					<div class="textwidget">
						<p class="big" style="margin-bottom: 0px !important;">ACT Group is a collaboration between three large business groups operating in Pakistan named Akhtar Group, Ismail Iqbal Industries and Tapal Group.</p>
					<img src="" style="width:40%;">
			</div>
		</aside>	
	</div>
	<div class="column one-fourth">
		<aside id="text-4" class="widget widget_text"style="margin-left: 10px;">
			<h4 class="fhead">Useful Links</h4>			
			<div class="textwidget">
				<ul>
					<li><a href="https://actpolyols.com/about-us">About Us</a></li>
					<li><a href="https://actpolyols.com/certifications"> Our Certifications</a></li>
					<li><a href="https://actpolyols.com/products">Our Products</a></li>
				</ul>
			</div>
		</aside>
	</div>
	<div class="column one-fourth">
		<aside id="text-5" class="widget widget_text" style="margin-left: 10px;">
			<h4 class="fhead">Follow Us</h4>			
			<div class="textwidget">
				<p>
					<a href="https://www.linkedin.com/company/act-polyols-private-limited" target="_blank" rel="noopener"><img src="https://actpolyols.com/wp-content/uploads/2020/08/ColordLogo-54.png"></a> &nbsp;<a href="https://www.facebook.com/ACT-Polyols-Private-Limited-106282368365284/" target="_blank" rel="noopener"><img loading="lazy" class="alignnone size-full wp-image-491" src="https://actpolyols.actgroup.com.pk/wp-content/uploads/2021/06/fab2.png" alt="" width="28" height="28"></a>
				</p>
	</div>
		</aside></div></div></div>


		   
			<div class="footer_copy">
				<div class="container">
					<div class="column one">

						<!-- Copyrights -->
						<p class="footercopyright">	© Copyright 2020 Act Polyols. Developed By <a href="http://www.streetwaresystems.com/">StreetwareSystems</a>
						</p>


						<ul class="social"></ul>
					</div>
				</div>
			</div>
			</div>

	    </footer><!--//app-footer-->
<!-- FOOTER NEW END -->





		
    <!-- Javascript -->          
    <script src="../assets/plugins/popper.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="../assets/js/app.js"></script> 
	
    <script src="../populateadmin.js">
  </script>

 
</body>
</html> 

