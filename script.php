<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
  function togglePassword(id, button) {
      var passwordInput = document.getElementById(id);
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        button.innerHTML = '<i class="fa-solid fa-eye-slash"></i> Hide';
      } else {
        passwordInput.type = "password";
        button.innerHTML = '<i class="fa-solid fa-eye"></i> Show';

      }
    }
  </script>
  <script>
  	$(document).ready(function(){
    $("#search").keyup(function(){
      var search = $(this).val();
      if(search !== ''){
        $.ajax({
          url:"searchresult.php",
          method:"POST",
          data:{search:search},
          dataType:"json",
          success:function(response){
            if(response && response.length > 0){
              var html = '';
              $.each(response, function(index, row){
                html += '<ul class="list-group">';
                html += '<a href="view.php?id='+row.id+'">';
                html += '<li class="list-group-item" id="searchresult"><i class="fa-solid fa-magnifying-glass"></i></button> '+row.form_id+' | '+row.req_dept+' | '+row.req_name+'</li>';
                html += '</a>';
                html += '</ul>';
              });
              $("#search-result").html(html);
              $("#search-result").css('display', "block");
            } else {
              $("#search-result").html('<li>No results found</li>');
            }
          },
          error:function(xhr, status, error){
            console.log("Error: " + error);
          }
        });
      } else {
        $("#search-result").html('');
        $("#search-result").css("display", "none");
      }
    });
  });
  </script>
  <script>
  	
 // Get the checkbox element
const checkbox = $("#checkEdit");

// Get all input fields with the readonly attribute
const readonlyInputs = $("input[readonly]");

// Get the submit button
const submitButton = $("#editBtn");
submitButton.hide();
// Add event listener to the checkbox
checkbox.on("click", function() {
  if ($(this).is(":checked")) {
    // If checkbox is checked, remove the readonly attribute from all input fields
    readonlyInputs.prop("readonly", false);
    // Show the submit button
    submitButton.show();
  } else {
    // If checkbox is not checked, set the readonly attribute to all input fields
    readonlyInputs.prop("readonly", true);
    // Hide the submit button
    submitButton.hide();
  }
});
  </script>