<?php
require_once "formclass.php";
$userdetails = $class->get_userdata();
$class->toComplete();
$class->updateStatus();
$id = $_GET['id'];
$formdetails = $class->viewDetails($id);
while($row = $formdetails->fetch()){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Details | Forms</title>
	<link rel="shortcut icon" type="x-icon" href="CH.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css"></head>

<body class="bg-dark">
	<div class="container">
		<div class="col">
					<button onclick="history.back()" class="btn btn-secondary btn-lg mb-4 mt-4"><i class="fa-solid fa-backward"></i> Back</button>
					</div>
				<div class="card">
						
					<div class="card-header">
				
							<h1 class="text-success fw-bold">
							Form ID: <?php echo $row['form_id']?></h1>
							<?php
							 	if($row['form_status'] == 'pending' && $userdetails['access'] == 'administrator'){
							 		//Diri kalng sa style design ka button
							 			?>
							 			<div class="col">
							 			<button class="btn btn-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#update"><i class="fa-regular fa-pen-to-square"></i> Update</button>
							 			</div>
							 			<?php
							 	}
							 	if($row['form_status'] == 'approved' && $userdetails['access'] == 'administrator'){
							 			?>
							 			<div class="col">
							 			<button class="btn btn-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#remarks"><i class="fa-solid fa-comment"></i> Add remarks</button>
							 			</div>
							 			<?php
							 	}
							 	if($userdetails['access'] == 'user'){
							 		?>
							 		<form method="get" action="make_fpdf.php" target="_blank">
				                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
				                        <button type="submit" class="btn btn-primary btn-lg" name="printpdf"><i class="fas fa-print"></i> Print</button>
			                     	</form>
			                     	<?php
							 	}


							?>

					</div>
					<table class="table table-hover table-striped">
					<tbody>
						<tr>

							<th class="text-end">Requesting Name:</th>
							<td><?php echo $row['req_name']?></td>
						</tr>
						<tr>
							<th class="text-end">Requesting Department:</th>
							<td><?php echo $row['req_dept']?></td>
						</tr>
						<tr>
							<th class="text-end">Employee ID:</th>
							<td><?php echo $row['employee_id']?></td>
						</tr>
						<tr>
							<th class="text-end">Contact:</th>
							<td><?php echo $row['contact']?></td>
						</tr>
						<tr>
							<th class="text-end">Department Head Name:</th>
							<td><?php echo $row['dept_head_fullname'] ?></td>
						</tr>
						<tr>
							<th class="text-end">Division:</th>
							<td><?php echo $row['division']?></td>
						</tr>
						<tr>
							<th class="text-end">End User Name:</th>
							<td><?php echo $row['euser_fullname']?></td>
						</tr>
						<tr>
							<th class="text-end">Equipment Type:</th>
							<td> <?php echo $row['equip_type']?></td>
						</tr>
						<tr>
							<th class="text-end">Equipment Number:</th>
							<td><?php echo $row['equip_num']?></td>
						</tr>
						<tr>
							<th class="text-end">Equipment Issues:</th>
							<td><?php echo $row['equip_issues']?></td>
						</tr>
						<tr>
							<th class="text-end">Required Services:</th>
							<td><?php echo $row['required_services']?></td>
						</tr>
						<tr>
							<th class="text-end">Date Requested:</th>
							<td><?php echo date("M d, Y",strtotime($row['date_added'])); ?></td>
						</tr>
						<tr>
							<th class="text-end">Form Status:</th>
							<td><?php echo ucfirst($row['form_status'])?></td>
						</tr>
						<tr>
							<th class="text-end">Reason/Remarks:</th>
							<td><?php echo $row['reason']?></td>
						</tr>
					</tbody>
					</table>

		</div>
	</div>
              
<!-- Modal for approved to complete-->
<div class="modal fade" id="remarks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Remarks to complete <br>
        	<?php echo $row['form_id']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="get">
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <input type="hidden" name="admin" value="<?php echo $userdetails['fullname']?>">
              <textarea name="remarks" class="form-control" rows="10" cols="55" placeholder="Add remarks" required></textarea>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="comment" class="btn btn-primary">Save</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--End of approved to complete-->

<!--From pendings to approved/denied-->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Form Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mx-auto">
         <form method="get">
          <input type="hidden" name="id" value="<?php echo $id?>">
           <input type="hidden" name="admin" value="<?php echo $userdetails['fullname'];?>">
          <button type="submit" name="approved" class="btn btn-primary">
            Approved
          </button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#denied">
            Denied
          </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Modal for Denied-->
<div class="modal fade" id="denied" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason of Denial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" name="reason" cols="55" rows="10" placeholder="Enter reason"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="denied" class="btn btn-danger">Deny</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--End of modal from pendings-->




<?php
}
include "script.php";
?>
</body>
</html>