<?php
require_once("formclass.php");
$userdetails = $class->get_userdata();
$str = $userdetails['fullname'];
          preg_match_all('/(?<=\b)\w/iu',$str,$matches);
          $result=mb_strtoupper(implode(' ',$matches[0]));
$session = $class->sessionAdmin();
$token = $class->get_token();
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
  <title>Navbar | Forms</title>
  <style>
  </style>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark bg-gradient">
    <div class="container-fluid">
      <a href="adminchart.php">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:90px; height:80px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto ms-4">
            <li class="nav-item">
              <a href="adminchart.php" class="nav-link"><i class="fa-solid fa-chart-simple"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addadmin.php">New Admin</a>
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
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Export
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <li><a class="dropdown-item" href="exportPendings.php"><b>Pendings Forms</b></a></li>
           <li><a class="dropdown-item" href="exportApproved.php"><b>Approved Forms</b></a></li>
           <li><a class="dropdown-item" href="exportDenied.php"><b>Denied Forms</b></a></li>
           <li><a class="dropdown-item" href="exportCompleted.php"><b>Completed Forms</b></a>
           </li>
           <li><hr class="dropdown-divider"></li>
           <li><a class="dropdown-item" href="exportData.php"><b>All Forms</b></a></li>
           <li><hr class="dropdown-divider"></li>
           <li>
            <li><a class="dropdown-item" href="custom.php"><b>Customize</b></a></li>
          </li>
        </li>
      </div>
    </ul>
     <ul class="navbar-nav me-5">
        <li class="nav-item">
          <a href="" class="nav-link"><?php echo $result;?></a>
        </li>
        </ul>
    <form method="get" action="search.php" class="d-flex">
      <div class="input-group me-md-3">
        <input type="text" class="form-control" name="search" placeholder="Search Form" aria-label="search" aria-describedby="button-addon2" required>
        <button class="btn btn-outline-secondary" type="submit" name="load" id="button-addon2"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </form>
    <form class="d-flex">
      <a class="btn btn-secondary" id="logout" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </form>
  </div>
</div>
</nav>
</body>
</html>

