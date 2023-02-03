var trnid = $('.refid selected option').text(); // or .val();

$.ajax({
			url: "getref.php",
			type: "POST",
			data:{"ref_trn":trnid}
		}).done(function(data) {
			var reslts ="";
			for (var i = 0; i < data.length; i++) {
				reslts += '<tr><td>'+data[i].section+'</td><td>'+data[i].remarks+'</td></tr>';
			}
			$('#resltTable').html(reslts);
		});



$var = $_POST['ref_trn'];
$reslt = array();

// query 

   $(document).ready(function(){
      $("#dept").change(function(){
        $("#dept").val();
        var id = $("#dept").val();
        $.ajax({
          url: 'adminchart.php',
          method: 'post',
          data: 'id' + id
        }).done(function(){

        })
      })
    })
       <option selected value="<?php echo $row['req_dept'];?>"><?php echo $row['req_dept'];?></option>
                  <?php
                }
                ?>
                <?php
require_once "formclass.php";
$dept = "DSWD Department";
$query = $class->chartForms();

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
    <div class="chart">
      <div class="container-static">
        <div class="col-md-6 offset-md-3 my-5">
          <div class="card">
            <div class="card-header"><h2 class="text-success text-center">MONTHLY STATISTICS OF FORM STATUS<br>
              <i>for year <?php echo date("Y");?></i></h2><hr>
              <select class="form-control" id="department">
                <?php
                
                foreach($query as $data)
                {
                  $month[] = $data['MONTH'];
                  $approved[] = $data['APPROVED'];
                  $denied[] = $data['DENIED'];
                  $completed[] = $data['COMPLETED'];
                  $pending[] = $data['PENDING'];
                }
                  $dept_name = $class->departments();
                while ($row = $dept_name->fetch()) { 
                  ?>
                  <option selected value="<?php echo $row['req_dept'];?>"><?php echo $row['req_dept'];?></option>
                  <?php
                }

                ?>
                </select>
                </form>
                <div class="card-body">
                 <canvas id="myChartForms"></canvas>
               </div>
          </div>
           
          </div>
      </div>
    </div>
  </div>
       <div class="container-static">
         <div class="card col-md-6 offset-md-3 my-5">
          <div class="card-header"><h2 class="text-success text-center">STATISTICS FOR DEPARTMENT ISSUES PROVIDED</h2></div>
           <div class="card-body">
                 <canvas id="myChartIssues"></canvas>
           </div>
         </div>
       </div>
</div>



<script>
</script>
<script>
  $(document).ready(function(){
        $("#department").change(function() {
    var x = document.getElementById("department").value;
    $.ajax({
      url: "chartdept.php",
      method: "POST",
      data:{
        department: x
      },
      success: function(data){
        $("#myChartForms").html(data);

      }
    });
  });
});

</script>
</body>
</html>