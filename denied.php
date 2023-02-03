<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$denied = $class->getData("denied");
if(isset($userdetails)){

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
           <link rel="shortcut icon" type="x-icon" href="CH.jpg">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
  <title>Denied | Forms</title>
</head>
<body>
  
<?php include "adminpanel.php";?>
<div class="content">
  <h2 class="ms-3">DENIED REQUESTS</h2>
   <div class="container-fluid">
   <table class="table table-striped table-bordered">
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
      <th scope="col">Date Requested:</th>
       <th scope="col">Denied By:</th>
      <th scope="col">Reason:</th>
     
    </tr>
  </thead>
  <tbody>
         <?php
            if($denied->rowCount() != 0 ){
           while ($row = $denied->fetch()) {
             $id = $row['id'];
            ?>
     <tr>
      <td><b><?php echo $row['form_id']; ?></b></td>      
      <td><?php echo $row['req_dept']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo $row['dept_head_fullname']; ?></td>
      <td><?php echo $row['euser_fullname']; ?></td>
      <td><?php echo $row['position']; ?></td>
      <td><?php echo $row['equip_type']; ?></td>
      <td><?php echo $row['equip_num']; ?></td>
      <td><?php echo $row['equip_issues']; ?></td>
      <td><?php echo $row['required_services']; ?></td>
      <td><?php echo date("M d, Y",strtotime($row['date_added'])); ?></td>
      <td><?php echo $row['changed_status_by']?></td>
      <td><?php echo ucwords($row['reason']); ?></td>    
    </tr>



<?php
}

?>
 </tbody>
</table>
</div>
</div>
<?php

  }else{
    echo "No records yet";
  }
 }else{
 	echo "You do not belong here!";

 }
  include 'script.php';
 ?>
</body>
</html>