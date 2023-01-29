<?php
require_once "formclass.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  
  <title>Chart | Forms</title>
</head>
<body>
  <?php 
  include "script.php";
  include "adminpanel.php";
  ?>
  <div class="chart">
    <div class="container-static">
      <div class="col-md-6 offset-md-3 my-5">
        <div class="card">
          <div class="card-body"><h2 class="text-success text-center">MONTHLY STATISTICS OF FORMS</h2><hr>
            <form method="get">
              <select class="form-select" name="dept" id="dept" 
              aria-label="Default select example">
              <?php
              $dept = "IT Department";
              $data = $class->chartData($dept);
              foreach ($data as $row) {
                $months[] = $row['month'];
                $approved[] = $row['approved'];
                $denied[] = $row['denied'];
                $completed[] = $row['completed'];
              }
              if(isset($_POST['department']) ? $department = $_POST['department'] : $department = "")

                $dept_name = $class->departments();
              while ($row = $dept_name->fetch()) { 
                ?>
                <option value="<?php echo $row['req_dept'];?>"><?php echo $row['req_dept'];?></option>
                <?php
              }
              ?>
            </select>
          </form>
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
<?php 
//db connection here
$trnid = $_POST['ref_id']; //from ajax
$reslt = array(); // for results

$selAtt2 = $pdo->prepare("SELECT * FROM tbl_name WHERE column_name ='$trnid' ");
$selAtt2->execute();
while($res2 = $selAtt2->fetch()){
  $reslt[] = array(
    'remarks' => ucfirst($res2['remarks']),
    'verifier' => ucwords($res2['Full_Name']),
    'verificationsection' => strtoupper($res2['verification_section'])
  );
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($reslt);
?>
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url:"adminchart.php",
      type: "post",
      data: {
        department: "IT Department"
      },
      success: function(bar_graph){
        $("#divGraph"). html(bar_graph);
        $("#graph").chart = new Chart($("#graph"));
      }
    });
    $("#dept").change(function(){
       $(document).ready(function(){
    $.ajax({
      url:"adminchart.php",
      type: "post",
      data: {
        department: $(this).val()
      },
      success: function(bar_graph){
        $("#divGraph"). html(bar_graph);
        $("#graph").chart = new Chart($("#graph"));
      }
    });
    });
  });
</script> -->
<!-- ajax code -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.form-select').on('change', function(){
      var name = $('.form-select option:selected').val();

      $.ajax({
    url: "adminchart.php", // referrence php code above
    type: "POST",
    data:{"ref_id":name}
  }).done(function(data){
    var result ="";
    for (var i = 0; i < data.length; i++) {
      result = data[i].remarks; 
    }
      // to display result use this
      $('.chart').html(result);
    });
});
  });
</script>


</body>
</html>