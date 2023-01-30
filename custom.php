<?php
require_once("formclass.php");
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
           <link rel="shortcut icon" type="x-icon" href="CH.jpg">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Custom Export | Forms</title>
</head>
<body>
  <?php include "adminpanel.php";?>
  <div class="content">
  <div class="card text-center">
  <div class="card-header">
     <h2>Customize Export</h2>
  </div>
  <div class="card-body text-center">
     <form method="get" action="exportCustom.php">
        <h3>You can choose both to filter data</h3>
        <label for="issues" class="form-label"><b>Select Issue/s</b></label>
        <select id="issues" name="issues[]" multiple>
          <option value="Application crash or OS blue screen">Application crash or OS blue screen</option>
          <option value="Equipment freezes or hangs">Equipment freezes or hangs</option>
          <option value="Damaged motherboard">Damaged motherboard</option>
          <option value="Application won't operate">Application won't operate</option>
          <option value="No display">No display</option>
          <option value="Damaged Hard drive">Damaged Hard drive</option>
          <option value="Unservicesable">Unservicesable</option>
          <option value="Printer bunking">Printer bunking</option>
          <option value="Damaged memory">Damaged memory</option>
          <option value="Equipment won't boot or power up">Equipment won't boot or power up</option>
          <option value="Equipment shuts down or reboots">Equipment shuts down or reboots</option>
          <option value="Display issue">Display issue</option>
          <option value="Can't access the internet">Can't access the internet</option>
          <option value="Virus or malware">Virus or malware</option>
          <option value="Equipment is slow">Equipment is slow</option>
          <option value="Won't print">Won't print</option>
          <option value="No internet connection">No internet connection</option>
          <option value="Handset no dial tone">Handset no dial tone</option>
          <option value="Application won't open">Application won't open</option>
          <option value="Installation(OS, Apps, Internet)">Installation(OS, Apps, Internet)</option>
          <option value="Inspection">Inspection</option>
        </select> 
        <br>
        <p><i>or</i></p>   
        <br>
        <h5>Select inclusive date:</h5>
          <label for="exportfrom" class="form-label"><b>Export from:</b></label>
          <input type="date" name="fromdate" class="form-control" id="exportfrom">
          <label for="exportto" class="form-label"><b>To:</b></label>
          <input type="date" name="todate" class="form-control" id="exportto">
           <button type="submit" name="exportcustom" class="btn btn-success">
      Export
    </button>
    </form>
    </div>

</div>
</div>



  <div class="card">
    <div class="card-header text-center">
     
    </div>
 
  </div>
    <?php include "script.php";?>
  </body>
  <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
  <script>
    new MultiSelectTag('issues')
  </script>
  <!-- <script type="text/javascript">
    $(document).ready(function() {
  $('#submit-button').on('submit', function(e){
      $('#results').modal('show');
      e.preventDefault();
  });
});
  </script> -->
  <script src="jquery-3.6.3.js"></script>
  </html>