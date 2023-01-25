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
          <a class="nav-link" href="addadmin.php"><i class="fa-sharp fa-solid fa-person-circle-plus fa-lg"></i></a>
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
                  <button type="button" class="dropdown-item" data-bs-toggle="modal"
                   data-bs-target="#custom">
                  <b>Customize</b>
                  </button>
             </li>
         </ul>

                 <div class="modal fade" id="custom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><label for="issues">Select Issue/s</label></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="get" action="exportCustom.php">
                  <div>
                    
                      <select id="issues" name="issues" multiple>
                        <option value="Application crash or OS blue screen">Application crash or OS blue screen</option>
                        <option value="Equipment freezes or hangs">Equipment freezes or hangs</option>
                        <option value="Damaged motherboard">Damaged motherboard</option>
                        <option value="Application won't operate">Application won't operate</option>
                        <option value="No display">No display</option>
                      </select>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="export" class="btn btn-primary">Export</button>
                </form>
              </div>
            </div>
          </div>
        </div>

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

<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script>
      new MultiSelectTag('issues')
</script>
</body>
</html>