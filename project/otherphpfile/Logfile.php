<?php



		include_once('../DatabasePhpFile/DbConnection.php');
		$obj=new db();

		$conn=$obj->connect();

		include_once('../DatabasePhpFile/crud.php');
		$crud=new Crud();
		
	?>

<div class="container py-5">
    <div class="d-flex w-100">
        <h3 class="col-auto flex-grow-1"><b>User Log Trail</b></h3>
       
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
      
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="font-weight: bold;">
                        <th class="py-1 px-2">#</th>
                        <th class="py-1 px-2">DateTime</th>
                        <th class="py-1 px-2">Username</th>
                        <th class="py-1 px-2">Product Name</th>
                        <th class="py-1 px-2">Package</th>
                        <th class="py-1 px-2">Port</th>
                        <th class="py-1 px-2">Container</th>
                        <th class="py-1 px-2">Pallet</th>
                        <th class="py-1 px-2">Act Margin</th>
                        <th class="py-1 px-2">Num of Packaging</th>
                        <th class="py-1 px-2">Weight Per Packaging</th>
                        <th class="py-1 px-2">Action Made</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $qry = $conn->query("SELECT a.*,l.Email FROM `activity` a inner join login l on a.user_id = l.Id order by  unix_timestamp(l.`date_created`) asc");
                    $i = 1;
                    while($row=$qry->fetch_assoc()):
                    ?>
                    <tr>
                        <!-- <td class="py-1 px-2"><?php echo $i++ ?></td> -->
                        <td class="py-1 px-2"><?php echo $row['Id'] ?></td>
                        <td class="py-1 px-2"><?php echo date("M d, Y H:i",strtotime($row['date_created'])) ?></td>

                        <td class="py-1 px-2"><?php echo $row['user_email'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['ProductId'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['Package'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['Port'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['Container'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['PalletType'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['ActMargin'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['NumOfPackaging'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['WeightPerPackaging'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['action_made'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <?php if($qry->num_rows <=0): ?>
                        <tr>
                            <th class="tex-center"  colspan="4">No data to display.</th>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>












		

<script>
$(document).ready(function () {
			$('#log').DataTable({
				responsive: true,
				deferRender: true,
				scrollY: 1000,
				scrollCollapse: true,
				scroller: true,
				fixedHeader: {
					header: true,
					footer: true
				}
			});

		});


        
</script>

		
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
