<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
?>
<head>
         <link rel="shortcut icon" type="x-icon" href="CH.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark bg-gradient">
  <div class="container-fluid">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:80px; height:80px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center d-flex" id="mynavbar">
<span class="text-light fw-bold ms-2 h2 me-5">J.E.R.R.M.S</span>
      <ul class="navbar-nav me-auto ms-5">
        
        <li class="nav-item">
          <a class="nav-link fs-4 <?php if (basename($_SERVER['PHP_SELF']) == 'submitted.php') { echo 'active'; }?>" 
            href="submitted.php">Submitted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4 <?php if (basename($_SERVER['PHP_SELF']) == 'reqform.php') { echo 'active'; }?>" href="reqform.php">Request</a>
        </li>
      
        <li class="nav-item">
          <a href="profile.php" class="nav-link fs-4 <?php if (basename($_SERVER['PHP_SELF']) == 'profile.php') { echo 'active'; }?>">Profile</a>
        </li>
        <!--   <li class="nav-item">
          <a class="nav-link disable fs-1 "style="text-align: center;"> G.E.R.R.M.S</a></a>
        </li> -->
        </ul>
          
         
                 <form class="d-flex">
      <!-- <a id="logout" href="logout.php"> <button>LOGOUT</button></a> -->
        <a class="btn btn-secondary" id="logout" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> 
        Logout</a>
      </form>
       

    </div>
  </div>

</nav>


</body>
</html>