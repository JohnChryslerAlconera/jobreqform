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
   <div class="container-fluid">
    <div class="card">
  <div class="card-header">
      <h2 class="fw-bold">DENIED REQUESTS</h2>

  </div>
  <div class="card-body">
    <table class="table table-hover text-center">
  <thead class="fs-5">
    <tr>
      <th scope="col">Form ID:</th>
      <th scope="col">Requesting department:</th>
       <th scope="col">Denied by:</th>
       <th scope="col">View details:</th>
     
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
      <td><?php echo $row['changed_status_by']?></td>
      <td><a href='view.php?id=<?php echo $id?>'><button class="btn btn-success">View</button></a></td>
    </tr>



<?php
}

?>
 </tbody>
</table>
  </div>
</div>

   
</div>
</div>
<?php

  }else{
       ?>
      <tr>
        <td colspan="20" class="text-center text-danger">No pending requests yet</td>
      </tr>
            <?php
                }
 }else{
 	echo "You do not belong here!";

 }
  include 'script.php';
 ?>
</body>
</html>