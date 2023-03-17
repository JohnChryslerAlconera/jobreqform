  <?php
  require_once("formclass.php");
  $userdetails = $class->get_userdata();
  $session = $class->sessionAdmin();

  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="shortcut icon" type="x-icon" href="CH.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      .search-item {
        position: relative;
      }
    .my-list {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 999;
    background-color: #fff;
    border: 1px solid #ddd;
    border-top: none;
    width: 30rem;
    padding: 5px 0;
    overflow-y: auto;
    max-height: 300px;
    display: none;
  }

      </style>

      <title>Navbar | Forms</title>
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
              <ul class="navbar-nav ms-4">
                <li class="nav-item">
                  <a href="adminchart.php" class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'adminchart.php') { echo 'active'; }?>"><i class="fa-solid fa-chart-simple"></i> Chart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'addadmin.php') { echo 'active'; }?>" href="addadmin.php">New Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'pendings.php') { echo 'active'; }?>" href="pendings.php">Pendings</a>
                </li>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'approved.php') { echo 'active'; }?>" href="approved.php">Approved</a>
              </li>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'denied.php') { echo 'active'; }?>" href="denied.php">Denied</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'completed.php') { echo 'active'; }?>" href="completed.php">Completed</a>
            </li>
            <li class="nav-item">
             <li class="nav-item dropdown">
              <a class="nav-link fs-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            </ul>
          </li>
        </li>

        <li class="nav-item search-item">
           <input type="text" id="search" class="form-control ms-4" placeholder="Search..." autofocus> 
           <div class="my-list" id="search-result"></div>
         </li>
</ul>
    <form class="d-flex">
      <a class="btn btn-secondary" id="logout" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </form>
        
 
      
    </div>
    </div>
  </nav>

  

  <script type="text/javascript">

</script>


</body>
</html>

