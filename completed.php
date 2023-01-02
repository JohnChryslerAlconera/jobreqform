<?php

require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$completed = $class->getCompleted();


if(isset($userdetails)){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

	<h2>Completed REQUESTS</h2>
<?php 
switch($completed){
	case null:
	echo "no completed records yet";
	break;
	default:
foreach ($completed as $row) {
?>

<div class="container">
<div class="card" style="width: 20rem; padding: 10px; background-color: gray;">
  <div class="card-header">

  	<?php echo $row['req_name']; ?>
    
    
  </div>
  <ul class="list-group list-group-flush">
  	
    <li class="list-group-item"><?php echo $row['req_dept']; ?></li>
    <li class="list-group-item"><?php echo $row['contact']; ?></li>
    <li class="list-group-item"><?php echo $row['dept_head_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['euser_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['position']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_type']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_num']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_issues']; ?></li>
    <li class="list-group-item"><?php echo $row['required_services']; ?></li>
    <li class="list-group-item"><?php echo $row['date_added']; ?></li>
     <li class="list-group-item"><?php echo $row['reason']; ?></li>

  </ul>
</div>
	

<?php
}
break;
} 
 }else{
 	echo "You do not belong here!";

 }
 ?>

</body>
</html>