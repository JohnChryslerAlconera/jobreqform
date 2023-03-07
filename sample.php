<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <link rel="shortcut icon" type="x-icon" href="CH.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

  <title></title>
</head>
<body>
  <?php include "script.php"; ?>
  <div class="container-static">
 <div class="card col-md-8 offset-md-2">
  <div class="card-header"><h2 class="text-success text-center">STATISTICS FOR DEPARTMENT ISSUES PROVIDED</h2></div>
  <div class="card-body">
    <select id="mySelect" class="form-control">
      <option selected disabled>Select Department</option>
      <?php 
      require "formclass.php";
      $issues = $class->distinctIssues();
      foreach ($issues as $issue) {
                  $equip_issues1 = $issue['issue1'];
                  $equip_issues2 = $issue['issue2'];
                  $equip_issues3 = $issue['issue3'];
                  $equip_issues4 = $issue['issue4'];
                  $equip_issues5 = $issue['issue5'];
                }
      $dept = $class->departments();
      while($row = $dept->fetch()){?>
        <option value="<?php echo $row['req_dept']?>"><?php echo $row['req_dept']?></option>
        <?php
      }
      ?>
    </select>
    <div class="row">
      <div class="col" id="divGraph">
        
      </div>
    </div>
  </div>
</div>
</div>

</body>
<script>
 
$(document).ready(function(){
  $.ajax({
    url: "sampledata.php",
    type: 'post',
    data: {
      department: 'IT Department'
    },
    success: function(bar_graph){
      $("#divGraph").html(bar_graph);
        $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));

      }
    });
  $("#mySelect").change(function(){
      $.ajax({
    url: "sampledata.php",
    type: 'post',
    data: {
      department: $(this).val()
    },
    success: function(bar_graph){
      $("#divGraph").html(bar_graph);
        $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));

      }
    }); 

  });
});

  </script>
</html>