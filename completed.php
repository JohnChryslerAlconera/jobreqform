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
             <link rel="shortcut icon" type="x-icon" href="CH.jpg">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

   
    <?php 
    include "adminpanel.php";?>
    <div class="content">
    <div class="container-fluid">
      <div class="card">
  <div class="card-header">
    <h2 class="fw-bold">COMPLETED REQUESTS</h2>
  </div>
  <div class="card-body overflow-auto">
      <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead class="fs-5">
          <tr>
            <th scope="col">Form ID:</th>
            <th scope="col">Requesting Department:</th>
            <th scope="col">Requesting name:</th>
            <th scope="col">Edited By:</th>
            <th scope="col">View details:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            if($completed->rowCount() != 0 ){
             while ($row = $completed->fetch()) {
               $id = $row['id'];
               ?>

               <td><b><?php echo $row['form_id']; ?></b></td>
               <td><?php echo $row['req_dept']; ?></td>
               <td><?php echo $row['req_name']; ?></td>
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
   </div>
     <?php

   }else{
    ?>
    <tr>
      <td colspan='20' class='text-danger text-center'>No approved forms yet!</td>
    </tr>
      <?php
  } 
}else{
  echo "You do not belong here!";

}
include "script.php";
?>

</body>
</html>