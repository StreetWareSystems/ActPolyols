
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
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- App CSS -->  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
	<link id="theme-style" rel="stylesheet" href="../assets/css/base.css">
	<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
--> 

	<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
<a href=""></a>

<?php
   
    
   include_once('../DatabasePhpFile/DbConnection.php');
   $obj=new db();
    if($_SESSION["Stid"] == null){
        header("location: ../login.php");
    }else{
		if($_SESSION["Roleid"] == 1){
            header("location: ./AdminDashboard.php");
      }
	}
  
    if(isset($_POST["logout"])){
        $obj->logout();
    }
	$conn=$obj->connect();

	include_once('../DatabasePhpFile/crud.php');
	$crud=new Crud();

	$userid= $_SESSION["Stid"];
	$Companyid = $_SESSION["CompanyId"];
	
	$query=$crud->company_product_by($userid,$conn);
	

 
       
    
  ?>
</head> 

<input type="hidden" id="custId" name="custId" value="<?php  echo $_SESSION["CompanyId"]; ?>">
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
				
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
							<!-- Image area --  -->
					<?php
						
							                          
						$sql1 = " SELECT *, company.img FROM login LEFT JOIN company ON login.CompanyId=company.CompanyId WHERE company.CompanyId=$Companyid Limit 1";
						$sql1=mysqli_query($conn, $sql1);
							if($query->num_rows > 0){
								while ($row = mysqli_fetch_array($sql1)) { 
									echo "<tr>";
									
									echo "<td ><img  src=".$row['img']." style='width: 70px; height: 40px;'></td>";
									echo "</tr>";
											
									
										
								} 

							}
							
							?>

					<!-- Image area close -->
				            
							<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
							
								<li>
								<form method="post">
								
								<button class="dropdown-item" type="submit" name="logout">Log Out</button>
								</form>
							</li>

								
  

                          
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
					
		            <a class="app-logo" href=""><img class="img-fluid w-75" src="../assets/Image/logo-header.png" alt="logo"/></a>
					<hr>
		        </div><!--//app-branding-->  
				
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">


				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">

					<button  class="nav-link bg-white border-0"  >
								 <span  class="nav-icon">
								<a style="text-decoration: none; color: black;" href="./StudDashboard.php" > <i class="fas fa-home"></i>
						         </span>
		                         <span class="nav-link-text">Overview</span></a>
								</button>
							<!--//nav-link-->
					    </li><!--//nav-item-->
<!-- 
					<button  class="nav-link bg-white border-0" id="syrup">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text" >Syrup</span>
								</button>

								<button  class="nav-link bg-white border-0" id="sorbitol">
								 <span class="nav-icon">
								 <i class="fas fa-arrow-right"></i>
						         </span>
		                         <span class="nav-link-text" >Sorbitol</span>
								</button> -->
								<!-- 	<div class="subnav-content">
     							 <a href="#company">Company</a>
    						     <a href="#team">Team</a>
   							     <a href="#careers">Careers</a>
                                </div>
  
							//nav-link
					    </li>//nav-item-->
				 
  <script>

      


  </script>
		
					  
					  <?php

					  
				
					

// echo '<button  class="nav-link bg-white border-0" id="prodtype">';
// echo '<span class="nav-icon">';
// echo '<i class="fas fa-arrow-right"></i>';
// echo '</span>';
// echo '<span class="nav-link-text">Product Typesss</span>';
// echo '</button>';
// echo '';
// echo '<div class="subnav-content">';
//echo '<a href="">'.$row['Type'].'</a>';

// echo '</div>';

$query=$crud->Ptype_Select($conn);
	

if($query){ 

	while ($row = $query->fetch_array()) { 

	// 	echo "<button  class='nav-link bg-white border-0' id='prodtype' >";
	// 	echo "<span class='nav-icon'>";
	// 	echo "<i class='fas fa-arrow-right'>" ;
	// 	echo "</i>";
	// 	echo "</span>";
    //    echo '<a style="color: black; font-weight: bold;" href="">'.$row['Type'].'</a>';
	//   echo "</button>";

	// 	echo '<a href="">'.$row['Type'].'</a>';
	

	
 
	//print_r($row['ProductTypeId'] . " ". $row['Type']." ");
	//die;

	echo '<li class="nav-item"> 
		<button  class="nav-link bg-white border-0 sidemenu" id="'.$row['ProductTypeId'];
		
	   echo '">  <span class="nav-icon">
					<i class="fas fa-arrow-right"></i>
					</span>
					
					<span class="nav-link-text">'.$row['Type'].'</span>
					
					
				<input type="hidden" name="Evalue" value="'.$row['ProductTypeId'].'" id="productnamecheck">
					</button>
	  </li>';


	}
   } 






					  
					 
					//   if($query){ 
					// 	while ($row = $query->fetch_array()) { 
						
						   
						

					// 	   echo '<li class="nav-item"> 
						   
					// 	    <button  class="nav-link bg-white border-0 sidemenu" id="'.$row['ProductTypeId'];
					// 	   echo '">  <span class="nav-icon">
					// 					<i class="fas fa-arrow-right"></i>
					// 					</span>
										
					// 				    <span class="nav-link-text">'.$row['ProductId'].'</span>
									
					// 					<input type="hidden" name="Evalue" value="'.$row['Type'].'" id="productnamecheck">
					// 					</button>
					// 	   </li>';
						 
						   


						   
						  
								
							   

						   
					// 	} 
					//    } 
					 
					 ?>


   <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
  
					     <!--//nav-link-->
					  
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					      
							
							
							<button  class="nav-link bg-white border-0" id="sorbitol">
								
							<!--//nav-link-->
					    <!--//nav-item-->
					    
					
					   

					


					    


					    




					    




						
					    







					    </li><!--//nav-item-->					    
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper" id="appw">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl" style="margin-bottom:44%;">
			    
			    <h1 class="app-page-title">Overview</h1>

				<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
   		
        <div class="col-md-6">
            <h2><strong>Information</strong></h2><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
				<?php

						
							                          
						//$sql = " SELECT *,login.Name, login.Email, login.Contact FROM login LEFT JOIN company ON login.CompanyId=company.CompanyId WHERE company.CompanyId=$Companyid Limit 1";
						$sql = " SELECT *,login.Name, login.Email, login.Contact, role.Roletype FROM login LEFT JOIN company ON login.CompanyId=company.CompanyId LEFT JOIN role oN login.RoleId = role.RoleId WHERE company.CompanyId=$Companyid Limit 1";
						$query=mysqli_query($conn, $sql);
							if($query->num_rows > 0){
								while ($row = mysqli_fetch_array($query)) { 
									echo "<tr>";
									// echo "<td>".$row['CompanyName']."</td>";
									echo "<td>";
									echo "<strong>";
									echo " <span class='glyphicon glyphicon-user  text-primary'></span>";
									echo "Company Name </strong>";
									echo "</td>";

									echo"<td class='text-primary'>
									".$row['CompanyName']." </td>";
									echo "</tr>";

									// User Name

									echo "<tr>";
									// echo "<td>".$row['CompanyName']."</td>";
									echo "<td>";
									echo "<strong>";
									echo " <span class='glyphicon glyphicon-user  text-primary'></span>";
									echo "User Name </strong>";
									echo "</td>";

									echo"<td class='text-primary'>
									".$row['Name']." </td>";
									echo "</tr>";
											
									
									// User Email

									echo "<tr>";
									// echo "<td>".$row['CompanyName']."</td>";
									echo "<td>";
									echo "<strong>";
									echo " <span class='glyphicon glyphicon-user  text-primary'></span>";
									echo "User Email </strong>";
									echo "</td>";

									echo"<td class='text-primary'>
									".$row['Email']." </td>";
									echo "</tr>";
										
										// User Contact

										echo "<tr>";
										// echo "<td>".$row['CompanyName']."</td>";
										echo "<td>";
										echo "<strong>";
										echo " <span class='glyphicon glyphicon-user  text-primary'></span>";
										echo "Contact </strong>";
										echo "</td>";
	
										echo"<td class='text-primary'>
										".$row['Contact']." </td>";
										echo "</tr>";
											
												// User Role

												echo "<tr>";
												// echo "<td>".$row['CompanyName']."</td>";
												echo "<td>";
												echo "<strong>";
												echo " <span class='glyphicon glyphicon-user  text-primary'></span>";
												echo "Role </strong>";
												echo "</td>";
			
												echo"<td class='text-primary'>
												".$row['Roletype']." </td>";
												echo "</tr>";
													
												// User Creation date

												echo "<tr>";
												// echo "<td>".$row['CompanyName']."</td>";
												echo "<td>";
												echo "<strong>";
												echo " <span class='glyphicon glyphicon-user  text-primary'></span>";
												echo "Date Created </strong>";
												echo "</td>";
			
												echo"<td class='text-primary'>
												".$row['date_created']." </td>";
												echo "</tr>";
								} 

							}
							



							?>              
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>                                        

				<!-- OVERVIEW USER INFORMATION CLOSE -->

			    

			  
			
				
				
			
		   </div><!--//col-->
									  
							    
							  
</div>
	    
    </div><!--//app-wrapper-->    					

<!-- FOOTER NEW START -->


	
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




<!-- FOOTER NEW END -->
    <!-- Javascript -->          
    <script src="../assets/plugins/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Page Specific JS -->
    <script src="../assets/js/app.js"></script> 



	<script>

		$(document).ready(function(){



		});

		$('.sidemenu').click(function(){
			var producttypeid=$(this).attr("id");
       
			var producttypename=$(this).children().eq(1).text();
			var companyid=$("#custId").val();
	            
			
			$('#appw').empty();

				
					$.ajax({
						url: "./productuser.php",
						type: 'POST',
						data: { producttypeid: producttypeid,producttypename:producttypename,company:companyid} ,
						success: function(data){
							$('#appw').append(data);
						}
					}); 
					
				
           
		});
	
		</script>
	<script src="../populateuser.js">

		

	// <script>
	// 		$(document).ready(function () {
	// 			$('#Overview').click(function(){
	// 				ov(); 

    // 			});


	// 			function ov(){
	// 			$('#appw').empty();
	// 					$.ajax({
	// 						url: "./StudDashboard.php",
	// 						success: function(data){
								
	// 							$('#appw').append(data);
	// 							console.log(data);
	// 						}
	// 					}); 
	// 			}
	// 		})
	// 	</script>	


</body>
</html> 

