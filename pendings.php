<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$pendings = $class->getPendings();
$status = $class->updateStatus();
if(isset($userdetails)){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>


<?php 
include "adminpanel.php";?>
  <h2>PENDING REQUESTS</h2>  
<?php
switch($pendings){
	case null:
	echo "no pending records yet";
	break;
	default:
foreach ($pendings as $pending) {
?>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">req_dept</th>
      <th scope="col">contact</th>
      <th scope="col">dept_head_fullname</th>
      <th scope="col">euser_fullname</th>
      <th scope="col">position</th>
      <th scope="col">equip_type</th>
      <th scope="col">equip_num</th>
      <th scope="col">equip_issues</th>
      <th scope="col">required_services</th>
      <th scope="col">date_added</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $pending['req_dept']; ?></td>
      <td><?php echo $pending['contact']; ?></td>
      <td><?php echo $pending['dept_head_fullname']; ?></td>
      <td><?php echo $pending['euser_fullname']; ?></td>
      <td><?php echo $pending['position']; ?></td>
      <td><?php echo $pending['equip_type']; ?></td>
      <td><?php echo $pending['equip_num']; ?></td>
      <td><?php echo $pending['equip_issues']; ?></td>
      <td><?php echo $pending['required_services']; ?></td>
      <td><?php echo $pending['date_added']; ?></td>
      <td><?php echo $pending['reason']; ?></td>
      <td>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Approved
</button>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">
 Denied
</button>
<!--Modal for Approved-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">  
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Approval</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5>
        Are you sure you want to approve this request?
      </h5>
      </div>
      <div class="modal-footer">
        <form method="post">
    <input type="hidden" name="changed_by" value="<?php echo $userdetails['fullname']?>">
    <input type="hidden" name="id" value="<?php echo $pending['id']?>">
        <button name="action" type="submit" value="approved" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Modal for Denied-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">  
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Denial</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea name="reason" cols="60" rows="10" required></textarea>
      </div>
      <div class="modal-footer">
         <button name="action" type="submit" value="denied" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


	</form>
	</div>
</td>
    </tr>
  </tbody>
</table>
			<?php
}
break;
} 
	?>	



<?php
 }else{
 	echo "You do not belong here!";

 }
 ?>


</body>
</html>