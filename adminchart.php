
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

<?php 
  require_once('formclass.php');
   $conn = $class->openConnection();
      $query = "SELECT MONTHNAME(date_added) as monthnames, COUNT(req_dept) as departments
       FROM requests GROUP BY monthnames ";
    $stmt = $conn->prepare($query);
    $stmt->execute(); 
    $data = $stmt->fetchAll();
  
  foreach($data as $row)
  {
    $month[] = $row['monthnames'];
    $dept[] = $row['departments'];
  }

?>

<div class="card">
  <div class="card-header">
    </div>
    <div class="card-body">
    <div style="width: 500px;" class="bg-dark">
  <canvas id="myChart"></canvas>
</div>
  </div>
  </div>

<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($dept) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),config
  );
</script>

</body>
</html>
