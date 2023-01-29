<?php
require_once("formclass.php");
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$class->addAdmin();
$token = $class->get_token();
$token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
  <title></title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="adminchart.php">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:90px; height:80px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <li></li>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="adminchart.php" class="nav-link"><i class="fa-solid fa-chart-simple"></i></a>
            </li>
            <li class="nav-item">
              <button type="button" data-bs-toggle="modal"
              data-bs-target="#addadmin" class="bg-dark"><i class="fa-sharp fa-solid fa-person-circle-plus fa-lg"></i></button>
              <!-- Modal -->
              <div class="modal fade" id="addadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add admin</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                      <div class="container-fluid">
                        <div class="card-body">
                          <div class="card-body">
                            <form action="" method="post">
                              <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
                              <label>First Name:</label>
                              <input type="text" name="fname" class="form-control">
                              <label>Last Name:</label>
                              <input type="text" name="lname" class="form-control">
                              <label>Account ID:</label>
                              <input type="text" name="employee_id" class="form-control">
                              <label>Password:</label>
                              <input type="password" name="password" class="form-control">
                              <p></p> 
                            </div>
                          </div>
                        </div>                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="add">Add</button>
                      </form>
                    </div>
                  </div>
                </div>

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
               <li><a class="dropdown-item" href="exportCompleted.php"><b>Completed Forms</b></a>
               </li>
               <li><hr class="dropdown-divider"></li>
               <li><a class="dropdown-item" href="exportData.php"><b>All Forms</b></a></li>
               <li><hr class="dropdown-divider"></li>
               <li>
                <li><a class="dropdown-item" href="custom.php"><b>Customize</b></a></li>
              </li>
            </div>
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
  </div>

</body>
</html>

