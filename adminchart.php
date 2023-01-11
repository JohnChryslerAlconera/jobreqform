
<?php 
  require('formclass.php');
  if(isset($_POST['department'])){
  $dept_name = $_POST['department'];
}
  $form1 = 'denied';
  $form2 = 'approved';
//   AND req_dept = :req_dept MONTHNAME(date_added) as monthnames GROUP BY monthnames
      $conn = $class->openConnection();
      $stmt = $conn->prepare("SELECT COUNT(*) FROM requests WHERE 
        form_status = :form_status");
      $stmt->bindValue(':form_status', $form1, PDO::PARAM_STR);
      $stmt->execute();
      $denied = $stmt->fetchColumn();
      $stmt->bindValue(':form_status', $form2, PDO::PARAM_STR);
      $stmt->execute();
      $approved = $stmt->fetchColumn();
      // $stmt->bindValue(':req_dept', $dept_name, PDO::PARAM_STR);
      // $stmt->execute();
      // $department = $stmt->fetch();
  //     $data = array($denials, $approvals, $department);
  // foreach($data as $row)
  // {
  //   $month[] = $row['monthnames'];
  // //   $denials[] = $row['denials'];
  // //   $approvals[] = $row['approvals'];
  //   // $completed[] = $row['completed'];
  // }                        
?>
<!doctype html>
<html lang="en">
  <head>
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
    <div class="chartMenu">
    </div>
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
      labels: "MONTHS",
      datasets: [{
        label: label,
        data: <?php echo json_encode($denied) ?>;,
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
      },{
        label: label,
        data: <?php echo json_encode($approved) ?>;,
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


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>
