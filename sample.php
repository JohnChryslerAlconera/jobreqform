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

