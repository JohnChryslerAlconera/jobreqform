<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$approved = $class->getData("approved");
$class->toComplete();
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

  <title>Approved | Forms</title>
</head>
<body>

    <?php include "adminpanel.php";?>
     <div class="content">
    <div class="container-fluid">  
      <div class="card">
  <div class="card-header">
    <h2 class="fw-bold">APPROVED REQUESTS</h2>
  </div>
  <div class="card-body overflow-auto">
    <table class="table table-hover text-center">
        <thead class="fs-5">
          <tr>
            
            <th>Form ID:</th>
            <th scope="col">Requesting Department:</th>
            <th scope="col">Requesting Name:</th>
            <th scope="col">Approved By:</th>
            <th scope="col">View details:</th>
            <th scope="col">To Remarks:</th>
          </tr>
        </thead>
            <?php
            if($approved->rowCount() != 0 ){
           while ($row = $approved->fetch()) {
             $id = $row['id'];
            ?>
        <tbody>
          <tr>
            
            <td><b><?php echo $row['form_id']; ?></b></td>
            <td><?php echo $row['req_dept']; ?></td>
            <td><?php echo $row['req_name']; ?></td>
            <td><?php echo $row['changed_status_by'];?></td>
            <td><a href='view.php?id=<?php echo $id?>'><button class="btn btn-success">View</button></a></td>
                  
            <td>           

              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks<?php echo $id;?>">
  <i class="fa-solid fa-comment"></i> Add remarks
</button>

<!-- Modal -->
<div class="modal fade" id="remarks<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Remarks for Completion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="get">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
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
             
            </td>
                       <?php
               }

              }else{
                echo "<td colspan='20' class='text-danger'>No approved forms yet</td>";
              }
              ?>
              </tr>
        </tbody>
      </table>
  </div>
</div>

        
      </div>
    </div>

              <?php
       }else{
       	header("Location: index.php");
       }
       ?>
       <?php include "script.php";?>
</body>
</html> 