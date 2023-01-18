<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$approved = $class->getApproved();
$class->toComplete();
if(isset($userdetails)){

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Approved | Forms</title>
</head>
<body>
    <?php include "adminpanel.php";?>
    <h2 class="ms-3">APPROVED REQUESTS</h2>
      
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
            <th scope="col">Date Submitted:</th>
            <th scope="col">To Remarks:</th>
          </tr>
        </thead>
            <?php
            switch($approved){
            case null:
            echo "no approved records yet";
            break;
            default:
            foreach ($approved as $row) {
            ?>
        <tbody>
          <tr>
            <td><?php echo $row['form_id']; ?></td>
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
            <td>              
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks">
  Add
</button>

<!-- Modal -->
<div class="modal fade" id="remarks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Remarks for Completion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="get">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <input type="hidden" name="admin" value="<?php $userdetails['fullname']?>">
              <textarea name="remarks" rows="10" cols="60" placeholder="Add remarks" required=""></textarea>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="comment" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
              </form>
      	   	</td>
                       <?php
               }
              break;
              } 
              ?>
              </tr>
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