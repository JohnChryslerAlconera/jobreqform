<?php
  require_once "formclass.php";
  $dept = "IT Department";
  $data = $class->chartData($dept);
  foreach ($data as $key) {
    $months[] = $key['month'];
    $approved[] = $key['approved'];
    $denied[] = $key['denied'];
    $completed[] = $key['completed'];
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Chart | Forms</title>
</head>
<body>
<?php 
include "script.php";
include "adminpanel.php";
?>
<div class="container-static">
    <div class="col-md-6 offset-md-3 my-5">
      <div class="card">
      <div class="card-body"><h2 class="text-success text-center">MONTHLY STATISTICS OF FORMS</h2><hr>
          <select class="form-select" method="get"  name="dept" onchange="this.form.submit();" 
          aria-label="Default select example">
            <option selected value="DPWH Department">DPWH Department</option>
            <option value="IT Department">IT Department</option>
            <option value="DSWD Department">DSWD Department</option>
            <option value="Agriculture Department">Agriculture Department</option>
          </select>
      </div>
      <div class="card-body">
        <?php 
          if (empty($data)) {
              echo "No records";
          }
        ?>
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
</div>
<script>
  const ctx = document.getElementById('myChart');
  const labels = <?php echo json_encode($months)?>;
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: '# of Approved Forms',
        data: <?php echo json_encode($approved)?>,
        borderWidth: 1,
        backgroundColor: 'rgb(107, 235, 52)'
      },
      {
        label: '# of Denied Forms',
        data: <?php echo json_encode($denied)?>,
        borderWidth: 1,
        backgroundColor: 'rgb(219, 113, 99)'
      },
      {
        label: '# of Completed Forms',
        data: <?php echo json_encode($completed)?>,
        borderWidth: 1,
        backgroundColor: 'rgb(99, 133, 219)'


      }
      ]
    },
     options: {
        plugins: {
            legend: {
                display: false,
                labels: {
                    color: 'rgb(255, 99, 132)'
                }
            }
        }
    }
  });
</script>



</body>
</html>