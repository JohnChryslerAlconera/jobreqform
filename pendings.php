<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$pendings = $class->getData("pending");
$class->updateStatus();
if(isset($userdetails)){

  ?>

<!DOCTYPE html>
<html>
<head>
         <link rel="shortcut icon" type="x-icon" href="CH.jpg">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Pendings | Forms</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include "adminpanel.php";
?>
<div class="content">
  
  <div class="container-fluid">
    <div class="card">
  <div class="card-header">
    <h2 class="fw-bold">PENDING REQUESTS</h2>
  </div>
  <div class="card-body">
    <table class="table table-hover text-center">
  <thead class="fs-5">
    <tr>
      <th>Form ID:</th>
      <th scope="col">Requesting Department:</th>
      <th scope="col">Requesting Name:</th>
      <th scope="col">View details:</th>
      <th scope="col">Update:</th>
  
    </tr>
  </thead>
  <?php
            if($pendings->rowCount() != 0 ){
           while ($pending = $pendings->fetch()) {
             $id = $pending['id'];
            ?>
  <tbody>
    <tr>
      
      <td><b><?php echo $pending['form_id']; ?></b></td>
      <td><?php echo $pending['req_dept']; ?></td>
      <td><?php echo $pending['req_name']; ?></td>
      <td><a href='view.php?id=<?php echo $id?>'><button class="btn btn-success">View</button></a></td>
      <td colspan="3">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $id;?>"><i class="fa-regular fa-pen-to-square"></i> Update
</button>

    </td>
      </tr>
  <!-- Modal -->
<div class="modal fade" id="update<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#denied<?php echo $id;?>">
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
<div class="modal fade" id="denied<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      </div>
    </div>
  </div>
</div>
</form>    
  <?php
    }
    }else{
 ?>
                <tr>
                  <td colspan="20" class="text-center text-danger">No pending requests yet</td>
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
          echo "You do not belong here";

 }
  include 'script.php';
 ?>


</body>
</html>