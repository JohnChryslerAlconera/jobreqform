<?php
require_once "formclass.php";
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$get_token = $class->get_token();
$class->addAdmin();
$token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="x-icon" href="CH.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Add Admin | Forms</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'adminpanel.php';?>
	<div class="content">   
		<div class="card text-center">
			<div class="card-header">
				<h3>Add User Admin</h3>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="col-md-4">
						<input type="hidden" name="csrf_token" value="<?php echo $token;?>">
						<label>First Name:</label>
						<input type="text" name="fname" class="form-control" required>
						<label>Last Name:</label>
						<input type="text" name="lname" class="form-control" required>
						<label>Account ID:</label>
						<input type="text" name="employee_id" class="form-control"required>
						<label>Password:</label>
						<input type="password" name="password" class="form-control" required>
						<br>
					</div>
					<button class="btn btn-primary" name="add" type="submit">Add</button>
				</form>
			</div>

		</div>                                    
	</div>
	<?php include "script.php";?>        
</body>
</html>