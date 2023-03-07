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
      </ul>
      </div>
    
    <form class="d-flex">
      <button  type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#searchmodal"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
      <a class="btn btn-secondary" id="logout" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </form>
  </div>
</div>
</nav>



<!-- Modal -->
<div style="font-size: 12px;"> 
<div class="modal fade" id="searchmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">Search Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="search" class="form-control ms-4 " placeholder="Search..." style="width: 20rem;" autofocus> 
        <table class="table table-hover mt-3">
          <thead>
          <tr>
            <th></th>
            <th scope="col">Form ID:</th>
            <th scope="col">Requesting department:</th>
            <th scope="col">Requesting name:</th>
            <th scope="col">Status:</th>
        </tr>
        </thead>
        <tbody id="search-result" class="text-center"></tbody>
        </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
    </div>
  </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
      $("#search").keyup(function(){
        var search = $(this).val();
        if(search !== ''){
          $.ajax({
            url:"searchresult.php",
            method:"POST",
            data:{search:search},
            dataType:"json",
            success:function(response){
              if(response && response.length > 0){
                var html = '';
                $.each(response, function(index, row){
                  html += '<tr>';
                  html += '<td><a href="view.php?id='+row.id+'"><i class="fa-solid fa-magnifying-glass"></i></button></a></td>';
                  html += '<td><a href="view.php?id='+row.id+'">'+row.form_id+'</a></td>';
                  html += '<td><a href="view.php?id='+row.id+'">'+row.req_dept+'</a></td>';
                  html += '<td><a href="view.php?id='+row.id+'">'+row.req_name+'</a></td>';
                  html += '<td><a href="view.php?id='+row.id+'">'+row.form_status+'</a></td>';
                  html += '</tr>';
                });
                $("#search-result").html(html);
              } else {
                $("#search-result").html('<tr><td colspan="20" class="text-center">No results found</td></tr>');
              }
            },
            error:function(xhr, status, error){
              console.log("Error: " + error);
            }
          });
        } else {
          $("#search-result").html('');
        }
      });
    });
</script>


</body>
</html>

