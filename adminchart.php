<?php 
  require('formclass.php');
  if(isset($_POST['department'])){
  $dept_name = $_POST['department'];

$form1 = "denied";
$form2 = "approved";
$form3 = "completed";
  $data1 = $class->deniedData($form1, $dept_name);
      // $stmt->bindValue(':req_dept', $dept_name, PDO::PARAM_STR);
      // $stmt->execute();
      // $department = $stmt->fetch();
  //     $data = array($denials, $approvals, $department);
  // foreach($data as $row)
  // {
  //   $month[] = $row['monthnames'];
  // //   $denials[] = $row['denials'];
  // //   $approvals[] = $row['approvals'];
   //   // $completed[] = $row['completed']
 }
 $conn = $class->openConnection();
 $query = $conn->prepare("SELECT MONTHNAME(date_added) as month FROM requests");
 $query->execute();
 $data = $query->fetchAll();
 foreach ($data as $row) {
   $month = $row['month'];
 }


;
?>
<!doctype html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Request Form Statistics</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(54, 162, 235, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(54, 162, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>
  </head>
  <body>
    <?php include "adminpanel.php"?>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
        <div class="selectBox">
          <form method="POST">
      <select name="department" onchange="this.form.submit();">
        <option value="DPWH Department">DPWH Department</option>
        <option value="Agriculture Department">Agriculture Department</option>
        <option value="IT Department">IT Department</option>
        <option value="DSWD Department">DSWD Department</option>
      </select>
<!--       <select name="form_status" onchange="this.form.submit()">
        <option value="denied">Denied</option>
        <option value="approved">Approved</option>
        <option value="completed">Completed</option>

      </select> -->
      </form>
    </div>
      </div>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const label = <?php echo json_encode($dept_name)?>;
  const labels = ;
    const data = {
      labels: <?php echo json_encode($month);?>,
      datasets: [{
        label: label,
        data: <?php echo json_encode($data1) ?>;,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script>

  </body>
</html>