<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$pendings = $class->getPendings();
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
?>
<br>
  <table class="table">
  <thead>
    <tr>
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
      <th scope="col"></th>
    </tr>
  </thead>
  <?php foreach ($pendings as $pending) {?>
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
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Approved
</button>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">
 Denied
</button>
      <form method="get">
      <input type="hidden" name="csrf_token" value="<?php echo $token;?>">

    <input type="hidden" name="changed_by" value="<?php echo $userdetails['fullname']?>">
    <input type="hidden" name="id" value="<?php echo $pending['id']?>">

<div class="modal fade" id="exampleModal" tabindex="-5" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">  
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Approval</h1>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Approval of Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <h5>
        Are you sure you want to approve this request?
 -   </h5>

      <h5>Are You Sure To Approve This Form?</h5>

      </div>

      <div class="modal-footer">
        <button name="action" type="submit" value="approved" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">  
    <div class="modal-content">
      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Denial</h1>

        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Denial of Form</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <textarea name="reason" cols="57" rows="10" required></textarea>
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
    <?php
}
break;
} 
  ?>  
  
  </tbody>
</table>

 
	



<?php
 }else{
 	echo "You do not belong here!";

 }
 ?>


</body>
</html>