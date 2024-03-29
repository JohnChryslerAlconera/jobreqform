<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$submitted = $class->getSubmitted();
if(isset($userdetails)){
  if($userdetails['access'] == 'user'){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <link rel="shortcut icon" type="x-icon" href="CH.jpg">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
      <title>Submitted Forms</title>
    </head>
    <body>
     <?php include 'navbar.php';?>
     <div class="content">
      <div class="container-fluid">
        <div class="card">

        <div class="card-header">
        <h2 class="fw-bold">SUBMITTED REQUESTS</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover text-center">
            <thead class="fs-5">
              <tr>
                <th scope="col">Form ID</th>
                <th scope="col">End User Name</th>
                <th scope="col">Status</th>
                <th scope="col">View details</th>
                <th scope="col">Print</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if($submitted->rowCount() != 0){
                while ($row = $submitted->fetch()) {
                  ?>
                  <tr>
                    <td class="fw-semibold"><?php echo $row['form_id']; ?></td>
                    <td><?php echo $row['euser_fullname']; ?></td>
                    <td><?php echo $row['form_status']; ?></td>
                    <td><a href='view.php?id=<?php echo $row['id'];?>'><button class="btn btn-success">View</button></a></td>
                    <td>
                      <form method="get" action="make_fpdf.php" target="_blank">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" class="btn btn-success btn-md" name="printpdf"><i class="fas fa-print"></i> Print</button>
                      </form>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="10" class="text-center">No submitted requests found.</td>
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
  
}else{?><script>
  alert("Log in first to enter");
  window.Location.href="index.php";
</script>
<?php
}
}else{?><script>
  alert("You're not logged in");
  window.Location.href="index.php";
</script>
<?php
}
include 'script.php';
?>
</div>
</div>

</body>
</html>


