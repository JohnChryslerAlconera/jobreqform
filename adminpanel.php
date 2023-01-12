<?php
require_once("formclass.php");
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();



  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:80px; height:70px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <li></li>
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
        <a class="btn btn-primary" id="logout" href="logout.php"  >Logout</a>
      </form>
    </div>
  </div>


<!-- <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
        <img src="https://iloilocity.gov.ph/main/wp-content/uploads/2018/07/cropped-iloilo-city-seal-300x300.png" height="60" alt="CoolBrand">
        </li>
        <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="addadmin.php" class="nav-item nav-link active"> Add admin</a>
                    <a href="pendings.php" class="nav-item nav-link active">Pendings</a>
                    <a href="approved.php" class="nav-item nav-link active">Approved<d/a>
                    <a href="denied.php" class="nav-item nav-link active">Denied</a>
                    <a href="completed.php" class="nav-item nav-link">Completed</a>
                </div>
        </div>
      </ul>
      <a id="logout" href="logout.php"> <button>LOGOUT</button></a>
      </div>
>>>>>>> Stashed changes -->
</nav>
</body>
</html>