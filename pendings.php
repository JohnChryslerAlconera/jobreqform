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
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:80px; height:70px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="addadmin.php">Add Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pendings.php">Pendings</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="approved.php">Approved</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="denied.php"> Denied</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="completed.php">Completed</a>
        </li>
      </ul>
      <form class="d-flex">
      <!-- <a id="logout" href="logout.php"> <button>LOGOUT</button></a> -->
        <a class="btn btn-primary" id="logout" href="logout.php"">Logout</a>
      </form>
    </div>
  </div>
</nav>
</body>
</html>


	<h2>PENDING REQUESTS</h2>
<?php 
switch($pendings){
	case null:
	echo "no pending records yet";
	break;
	default:
foreach ($pendings as $pending) {
?>

<div class="container">
<div class="card" style="width: 20rem; padding: 10px; background-color: gray;">
  <div class="card-header">

  	<?php echo $pending['req_name']; ?>
    
  </div>
  <ul class="list-group list-group-flush">
  	
    <li class="list-group-item"><?php echo $pending['req_dept']; ?></li>
    <li class="list-group-item"><?php echo $pending['contact']; ?></li>
    <li class="list-group-item"><?php echo $pending['dept_head_fullname']; ?></li>
    <li class="list-group-item"><?php echo $pending['euser_fullname']; ?></li>
    <li class="list-group-item"><?php echo $pending['position']; ?></li>
    <li class="list-group-item"><?php echo $pending['equip_type']; ?></li>
    <li class="list-group-item"><?php echo $pending['equip_num']; ?></li>
    <li class="list-group-item"><?php echo $pending['equip_issues']; ?></li>
    <li class="list-group-item"><?php echo $pending['required_services']; ?></li>
    <li class="list-group-item"><?php echo $pending['date_added']; ?></li>
  </ul>
</div>
		


																		
	
	<!-- Button trigger modal -->
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