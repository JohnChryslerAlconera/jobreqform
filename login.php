<?php
include('formclass.php');
$user = $class->getUser();
$gettoken = $class->get_token();
if(!isset($gettoken)){
	$token = md5(uniqid(rand(), true));
		$_SESSION['csrf_token'] = $token;
		$_SESSION['csrf_token_time'] = time();
}



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
	<style>
    body {
      background-image: url("https://www.iloilotoday.com/wp-content/uploads/2022/03/1-735x400.jpg");
      background-size: 100rem 80rem;
      background-image:no-repeat;
    }

    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>
</head>
<body>

	<div class="card-header m-5 p-5" style="text-align:center" >
		<a href="register.php">Not yet Registered? Click this</a>
		<h1>-LOGIN-</h1>
	<form method="post">
	<input type="hidden" name="csrf_token" value="<?php echo $token;?>">

	<label>AccountID:</label>
	<input type="text" name="employee_id">
	<p></p>
	<p></p>
	<label>Password:</label>
	<input type="password" name="password"><p></p>
	<input type="submit" name="submit" value="Enter">
	</form>
	</div>
</body>
</html>
