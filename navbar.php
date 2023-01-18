<?php

require_once('formclass.php');
$userdetails = $class->get_userdata();

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:80px; height:70px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <li>
    </li>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="submitted.php">Submitted Forms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Reqform.php">Request Form</a>
        </li>
      </ul>
      <form class="d-flex">
      <!-- <a id="logout" href="logout.php"> <button>LOGOUT</button></a> -->
        <a class="btn btn-primary" id="logout" href="logout.php">Logout</a>
      </form>
    </div>
  </div>
</nav>


</body>
</html>