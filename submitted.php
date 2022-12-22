<?php


require_once('formclass.php');
$userdetails = $class->get_userdata();
$submitted = $class->getSubmitted();
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
	<h1>Submitted REQUESTS</h1>
<a href="userpanel.php"><button>Go Back to home</button></a>
<a href="reqform.php"><button>Create Request</button></a>
<?php 
switch($submitted){
	case null:
	echo "no submitted requests yet";
	break;
	default:

foreach ($submitted as $row) {
?>


<div class="container">
<div class="card" style="width: 20rem; padding: 10px; background-color: gray;">
  <div class="card-header">

  	<?php echo $row['req_name']; ?>
    
  </div>
  <ul class="list-group list-group-flush">
  	
    <li class="list-group-item"><?php echo $row['req_dept']; ?></li>
    <li class="list-group-item"><?php echo $row['contact']; ?></li>
    <li class="list-group-item"><?php echo $row['dept_head_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['euser_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['position']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_type']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_num']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_issues']; ?></li>
    <li class="list-group-item"><?php echo $row['required_services']; ?></li>
    <li class="list-group-item"><?php echo $row['date_added']; ?></li>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <input type="hidden" name="form_status" value="<?php echo $row['form_status'];?>">
         <li class="list-group-item"><textarea name="reason" rows="6" cols="30" placeholder="remarks"></textarea></li>
         <input type="submit" name="comment" value="Comment">
</form>

  </ul>
</div>
		

<?php
}
break;
} 

 
 ?>

</body>
</html>


