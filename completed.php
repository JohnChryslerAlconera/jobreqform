<?php

require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$completed = $class->getData("completed");

if(isset($userdetails)){
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Completed | Forms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  </head>
  <body>

   
    <?php 
    include "adminpanel.php";?>
    <h2 class="ms-3">COMPLETED REQUESTS</h2>
    <div class="container-fluid">
      <table class="table table-bordered table-striped">
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
            <th scope="col">Reason:</th>
            <th scope="col">Edited By:</th>
          </tr>
        </thead>
        <tbody class="table-striped">
          <tr>
            <?php
            if($completed->rowCount() != 0 ){
             while ($row = $completed->fetch()) {
               $id = $row['id'];
               ?>
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
               <td><?php echo ucfirst($row['reason']); ?></td>
               <td><?php echo $row['changed_status_by']?></td>
             </tr>

             <?php
           }
           ?>
         </tbody>
       </table>
     </div>
     <?php

   }else{
    echo "No records yet";
  } 
}else{
  echo "You do not belong here!";

}
include "script.php";
?>

</body>
</html>