<?php
include('formclass.php');
$user = $class->getUser();
$userdetails = $class->get_userdata();
$direct = $class->redirect();



?>
<!-- 5555 = great = $2y$10$.IYa4sl3bRWCXILUGWGz0uSqa2ZmPqoQRwNK5UMjZBzr8VxI50HwG -->
<!--  1234 = pass= $2y$10$.IYa4sl3bRWCXILUGWGz0uSqa2ZmPqoQRwNK5UMjZBzr8VxI50HwG -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JobRequestAdmin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

	<div class="card-header m-5 p-5" style="text-align:center" >
		<a href="register.php">Not yet Registered? Click this</a>
		<h1>-LOGIN-</h1>
	<form role="form" method="post">
	
	<label>AccountID:</label>
	<input type="text" name="account_id">
	<p></p>
	<p></p>
	<label>Password:</label>
	<input type="password" name="password"><p></p>
	<input type="submit" name="submit" value="Enter">
	</form>
	</div>
</body>
</html>
