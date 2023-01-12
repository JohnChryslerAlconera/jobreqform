<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$approved = $class->getApproved();
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
    <?php include "adminpanel.php"?>
    <h2>APPROVED REQUESTS</h2>
    <?php
    switch($approved){
    	case null:
    	echo "no approved records yet";
    	break;
    	default:
      ?>
      
    <div class="container-fluid">   
        <table class="table">
        <thead>
          <tr>
            <th scope="col">req_dept</th>
            <th scope="col">contact</th>
            <th scope="col">dept_head_fullname</th>
            <th scope="col">euser_fullname</th>
            <th scope="col">position</th>
            <th scope="col">equip_type</th>
            <th scope="col">equip_num</th>
            <th scope="col">equip_issues</th>
            <th scope="col">required_services</th>
            <th scope="col">date_added</th>
            <th scope="col"></th>
          </tr>
        </thead>
            <?php
            foreach ($approved as $row) {
            ?>
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
            <td>              
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?php $row['id']?>">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="$row['id']" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
              <form method="post">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <input type="hidden" name="form_status" value="<?php echo $row['form_status'];?>">
              <li class="list-group-item"><textarea name="reason" rows="6" cols="30" placeholder="remarks"></textarea></li>
              <input type="submit" name="comment" value="Comment">
              </form>
      	   	<td>
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