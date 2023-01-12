<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$class->addAdmin();
$session = $class->sessionAdmin();
if(isset($_POST) & !empty($_POST)){
      if(isset($_POST['csrf_token'])){
        if($_POST['csrf_token'] == $_SESSION['csrf_token']){
      } 
      }
          $max_time = 60*30;
          if(isset($_SESSION['csrf_token_time'])){
            $token_time = $_SESSION['csrf_token_time'];
            if(($token_time + $max_time) >= time()){
              $this->userInsertData();
              ?>
          <script>
            alert("Added");
            window.location.href = "submitted.php";
          </script>
          <?php
              }else{
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
                echo "CSRF Expired";
              }
              }
        }else{
          echo "Token expired! ,Please fill up again!";
           }


  $token = md5(uniqid(rand(), true));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<title></title>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:80px; height:70px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="addadmin.php">Add Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pendings.php">Pendings</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="approved.php">Approved</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="denied.php"> Denied</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="completed.php">Completed</a>
        </li>
      </ul>
      <form class="d-flex">
      <!-- <a id="logout" href="logout.php"> <button>LOGOUT</button></a> -->
        <a class="btn btn-primary" id="logout" href="logout.php"">Logout</a>
      </form>
    </div>
  </div>
</nav>

	<h1>Add Admin</h1>
		<form action="" method="post">
	<label>Admin Name:</label>
	<input type="text" name="adminname">
	<p></p>
	<label>Account ID:</label>
	<input type="text" name="employee_id"><p></p>
	<label>Password:</label>
	<input type="password" name="password">
	<p></p>	
	<input type="submit" name="submit" value="Add">
	</form>
	
</body>
</html>