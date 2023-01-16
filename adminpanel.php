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
    <a href="adminchart.php">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:80px; height:70px;"></a>
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
          <a class="nav-link" href="denied.php">Denied</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="completed.php">Completed</a>
        </li>
         <li class="nav-item">
          <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          Export
          </button>
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
             <li><a class="dropdown-item" href="exportPendings.php"><b>Pendings Forms</b></a></li>
             <li><a class="dropdown-item" href="exportApproved.php"><b>Approved Forms</b></a></li>
             <li><a class="dropdown-item" href="exportDenied.php"><b>Denied Forms</b></a></li>
             <li><a class="dropdown-item" href="exportCompleted.php"><b>Completed Forms</b></a></li>
             <li><a class="dropdown-item" href="exportData.php"><b>All Forms</b></a></li>
         </ul>
        </div>
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-primary" id="logout" href="logout.php">Logout</a>
      </form>
    </div>
  </div>
</nav>
</body>
</html>