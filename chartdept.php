<?php
require "formclass.php";
$department = $_POST['department'];
$year = date("Y");
$conn = $class->openConnection();
 $stmt = $conn->prepare("SELECT MONTHNAME(date_added) AS MONTH,
        SUM(form_status = :approved) as APPROVED, 
        SUM(form_status = :denied) as DENIED,
        SUM(form_status = :pending) as PENDING,
        SUM(form_status = :completed) as COMPLETED FROM requests 
        WHERE req_dept = :department AND YEAR(date_added) = :year GROUP BY MONTH ORDER BY date_added ASC");
      $stmt->execute(["department" => $department, "approved" => "approved", 
      "denied" => "denied", "completed" => "completed", "pending" => "pending", "year" => $year]);

      $fetch = $stmt->fetchAll();
      foreach($fetch as $data)
                {
                  $month[] = $data['MONTH'];
                  $approved[] = $data['APPROVED'];
                  $denied[] = $data['DENIED'];
                  $completed[] = $data['COMPLETED'];
                  $pending[] = $data['PENDING'];
                }
                ?>
                <script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month);?>;
  const data = {
    labels: labels,
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
    document.getElementById('myChartForms'),
    config
  );
</script>
<?php echo ;
?>
