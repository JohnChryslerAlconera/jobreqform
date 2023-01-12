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

	
<?php 
include "adminpanel.php";?>
<h2>Completed REQUESTS</h2>
<?php
switch($completed){
	case null:
	echo "no completed records yet";
	break;
	default:

?>
    
    
  </div>
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
      <th scope="col">Reason:</th>
    </tr>
  </thead>
 <?php foreach ($completed as $row) {?>
  <tbody>
    <tr>
      <td><?php echo $row['req_dept']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo $row['dept_head_fullname']; ?></td>
      <td><?php echo $row['euser_fullname']; ?></td>
      <td><?php echo $row['position']; ?></td>
      <td><?php echo $row['equip_type']; ?></td>
      <td><?php echo $row['equip_num']; ?></td>
      <td><?php echo $row['equip_issues']; ?></td>
      <td><?php echo $row['required_services']; ?></td>
      <td><?php echo $row['date_added']; ?></td>
      <td><?php echo $row['reason']; ?></td>
    </tr>

<?php
}
?>
  </tbody>
</table>
<?php
break;
} 
 }else{
 	echo "You do not belong here!";

 }
 ?>

</body>
</html>