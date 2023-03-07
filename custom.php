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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>Custom Export | Forms</title>
</head>
<style>
  body {
/*    background-image: url('https://upload.wikimedia.org/wikipedia/en/3/33/Iloilo_City_Hall.jpg');
*//*    background-repeat: no-repeat;
    background-attachment: fixed;*/
    background-size: cover;
  }
</style>

<body>

  <?php include "adminpanel.php";?>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col text-center mt-3">
          <h2>Customize Export</h2>
          <hr>
        </div>
      </div>
      <div class="row justify-content-center text-center mb-3">
        <div class="col ms-3">
          <h4 class="fw-bold">Select fields to filter data<h4>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-10">
          <form method="GET" action="exportCustom.php">
            <div class="form-floating">
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
            <label for="issues" class="fw-bold fs-5 text-center">Select Issues</label>

        </div>
      </div>
    </div>
      <div class="row mt-3">
        <div class="col text-center">
          <p><i>or</i></p>
        </div>
      </div>
      <div class="row justify-content-center text-center">
          <div class="col">
            <h5 class="fw-bold">Select inclusive date:</h5>
          </div>
      </div>
      <div class="row justify-content-center text-center mb-3">
          <div class="col-2">
              <label for="exportfrom" class="form-label"><b>From:</b></label>
              <input type="date" name="fromdate" class="form-control col-1" id="exportfrom">
          </div>
          <div class="col-2">
            <label for="exportto" class="form-label" ><b>To:</b></label>
            <input type="date" name="todate" class="form-control" id="exportto">
          </div>
        </div>
        <div class="row">
        <div class="col text-center">
          <p><i>or</i></p>
          <p class="fw-bold fs-5">Select department</p>
        </div>
      </div>
        <div class="row">
          <div class="col-10 mx-auto mb-3 mt-3">
            <div class="form-floating">
             <select name="department" id="department" class="form-control">
              <option selected disabled>---</option>
              <?php 
              $dept = $class->departments();
              while($row = $dept->fetch()){?>
                <option value="<?php echo $row['req_dept']?>"><?php echo $row['req_dept']?></option>
                <?php
              }
              ?>
            </select>
            <label for="department">Select Department:</label>
          </div> 
          </div>
        </div>
          <div class="row">
            <div class="col text-center">
              <p><i>or</i></p>
              <p class="fw-bold fs-5">Select status:</p>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-10 mx-auto">
              <div class="form-floating">
              <select name="form" id="status" class="form-control">
                <option selected disabled>
                  ---
                </option>
                <option value="pending">
                  Pending
                </option>
                <option value="approved">
                  Approved
                </option>
                <option value="denied">
                  Denied
                </option>
                <option value="completed">
                  Completed
                </option>
              </select>
              <label for="form">Select Status</label>
            </div>
            </div>
          </div>
          <div class="row mb-5 mt-5">
            <div class="col-8 text-center mx-auto">
              <div class="gap-2 d-grid">
              <button id="submitButton" class="btn btn-success" type="submit" name="submitExport">Export</button>
            </div>
            </div>
          </div>
          

      </div>
    </div>
  </div>


    <?php include "script.php";?>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
      new MultiSelectTag('issues')
    </script>
  </body>
  </html>


