<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$pendings = $class->getPendings();
$class->updateStatus();
if(isset($userdetails)){

  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendings | Forms</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>


<?php 
include "adminpanel.php";?>
  <h2 class="ms-3">PENDING REQUESTS</h2>
  <div class="container-fluid">
  <table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col">Form ID:</th>      
      <th scope="col">Requesting Department:</th>
      <th scope="col">Contact Info:</th>
      <th scope="col">Department Head Name:</th>
      <th scope="col">End User Name:</th>
      <th scope="col">Position:</th>
      <th scope="col">Equipment Type:</th>
      <th scope="col">Equipment Number:</th>
      <th scope="col">Equipment Issue:</th>
      <th scope="col">Required Service:</th>
      <th scope="col">Date Submitted:</th>
    </tr>
  </thead>
  <?php 
  switch($pendings){
  case null:
  echo "No pending records yet";
  break;
  default:
  foreach ($pendings as $pending) {?>
  <tbody>
    <tr>
      <td><?php echo $pending['form_id']; ?></td>
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
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update">
  Update
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Form Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mx-auto">
         <form method="get">
          <input type="hidden" name="id" value="<?php echo $pending['id']?>">
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
        <textarea name="reason" cols="60" rows="10" placeholder="Enter reason"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="denied" class="btn btn-danger">Deny</button>
      </div>
    </div>
  </div>
</div>
</form>
        </td>
      </tr>
    <?php
}
break;
} 
  ?>  
  
  </tbody>
</table>
</div>
<?php
 }else{
 	echo "You do not belong here!";

 }
 ?>


</body>
</html>