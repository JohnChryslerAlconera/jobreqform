<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$str = $userdetails['fullname'];
          preg_match_all('/(?<=\b)\w/iu',$str,$matches);
          $result=mb_strtoupper(implode(' ',$matches[0]));
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
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:90px; height:80px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto ms-4">
        <li class="nav-item">
          <a class="nav-link" href="submitted.php">Submitted Forms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Reqform.php">Request Form</a>
        </li>
      </ul>
      <ul class="navbar-nav me-5">
        <li class="nav-item">
          <a href="" class="nav-link"><?php echo $result;?></a>
        </li>
        </ul>
                 <form class="d-flex">
      <!-- <a id="logout" href="logout.php"> <button>LOGOUT</button></a> -->
        <a class="btn btn-secondary" id="logout" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
      </form>
       

    </div>
  </div>
</nav>


</body>
</html>