<?php
require_once "formclass.php";
$query = $class->chartForms();
$issues = $class->distinctIssues();
$chartTable = $class->chartTable();
?>

<!DOCTYPE html>
<html lang="en">
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
  <title>Chart | Forms</title>
</head>
<body>
  <?php 
  include "script.php";
  include "adminpanel.php";
  ?>
  <div class="content">
    <div class="container">
      <div class="chart">
        <div class="col">
          <div class="card mb-5">
            <div class="card-header"><h2 class="text-success text-center">YEAR <?php echo date("Y");?> STATISTICS OF FORM STATUS BY EVERY DEPARTMENTS<br></h2>
              <?php
              if(!empty($query)){
                foreach($query as $data)
                {
                  $department[] = $data['department'];
                  $approved[] = $data['APPROVED'];
                  $denied[] = $data['DENIED'];
                  $completed[] = $data['COMPLETED'];
                  $pending[] = $data['PENDING'];
                }
                foreach ($issues as $issue) {
                  $equip_issues1 = $issue['issue1'];
                  $equip_issues2 = $issue['issue2'];
                  $equip_issues3 = $issue['issue3'];
                  $equip_issues4 = $issue['issue4'];
                  $equip_issues5 = $issue['issue5'];
                  $equip_issues6 = $issue['issue6'];
                  $equip_issues7 = $issue['issue7'];
                  $equip_issues8 = $issue['issue8'];
                  $equip_issues9 = $issue['issue9'];
                  $equip_issues10 = $issue['issue10'];
                  $equip_issues11 = $issue['issue11'];
                  $equip_issues12 = $issue['issue12'];
                  $equip_issues13 = $issue['issue13'];
                  $equip_issues14 = $issue['issue14'];
                  $equip_issues15 = $issue['issue15'];
                  $equip_issues16 = $issue['issue16'];
                  $equip_issues17 = $issue['issue17'];
                  $equip_issues18 = $issue['issue18'];
                  $equip_issues19 = $issue['issue19'];
                  $equip_issues20 = $issue['issue20'];
                  $equip_issues21 = $issue['issue21'];
                }
                if(!empty($chartTable)){
                  foreach ($chartTable as $tableData) {
                    $avgApproved = $tableData['avgApproved'];
                    $avgDenied = $tableData['avgDenied'];
                    $avgCompleted = $tableData['avgCompleted'];
                  }
                }
                ?>
                <div class="card-body">
                 <canvas id="myChartForms"></canvas>
               <?php }else{
                echo "No data to show yet";
              }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
   <div class="card col me-1 ms-1">
    <div class="card-header"><h2 class="text-success text-center">STATISTICS FOR DEPARTMENT ISSUES PROVIDED</h2></div>
    <div class="card-body">
      <select id="mySelect" class="form-control">
        <option selected>IT Department</option>
        <?php 
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
</div>


<script>
  // === include 'setup' then 'config' above ==
  const dataform = {
    labels: <?php echo json_encode($department);?>,
    datasets: [{
      label: 'Approved',
      data: <?php echo json_encode($approved);?>,
      backgroundColor: [
      'rgba(7, 245, 119, 0.8)'
      ],
      borderColor: [
      'rgba(7, 250, 119, 0.8)'
      ],
      borderWidth: 1
    },
    {
      label: 'Denied',
      data: <?php echo json_encode($denied);?>,
      backgroundColor: [
      'rgba(255, 150, 149, 0.8)'
      ],
      borderColor: [
      'rgba(244, 67, 65, 0.8)'
      ],
      borderWidth: 1
    },
    {
      label: 'Completed',
      data: <?php echo json_encode($completed);?>,
      backgroundColor: [
      'rgba(8, 65, 244, 0.8)'
      ],
      borderColor: [
      'rgba(8, 99, 244, 0.8)'
      ],
      borderWidth: 1
    }
    ]
  };

  const configforms = {
    type: 'bar',
    data: dataform,
     options: {
        scales: {
            xAxes: [{
                gridLines: {
                    display: false // Set display to false to hide the x-axis grid lines
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false // Set display to false to hide the y-axis grid lines
                }
            }]
        }
    },
  };

  const myChartForms = new Chart(
    document.getElementById('myChartForms'),
    configforms
    );
  
  $(document).ready(function(){
    $.ajax({
      url: "chartData.php",
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
        url: "chartData.php",
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
</body>
</html>