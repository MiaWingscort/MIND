<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
	<script type="text/javascript">
		var listLeft = [];
		var listRight = [];
		var counterLeft = 0;
		var counterRight = 0;

		$( document ).ready(function() {
			$.ajax({url: "http://localhost:8080/ci/Reklamiranje/dohvatiSlikeOglasa/true", dataType: 'json', success: function(result){
		        for (var i = 0; i < result.length; i++) {
		        	listLeft.push(result[i]);
			    }
		    }});

		    $.ajax({url: "http://localhost:8080/ci/Reklamiranje/dohvatiSlikeOglasa/false", dataType: 'json', success: function(result){
		        for (var i = 0; i < result.length; i++) {
		        	listRight.push(result[i]);
			    }
		    }});
		});


		setInterval(function() {
			$('#rightBanner img').attr('src', listRight[counterRight]['PutanjaDoSlike']);
			$('#rightBanner img').attr('href', listRight[counterRight]['PutanjaOdSlike']);

			counterRight = (counterRight + 1) % listRight.length;

			$('#leftBanner img').attr('src', listLeft[counterLeft]['PutanjaDoSlike']);
			$('#leftBanner img').attr('href', listLeft[counterLeft]['PutanjaOdSlike']);

			counterLeft = (counterLeft + 1) % listLeft.length;
		}, 3000)
	</script>

	<div class="col-xs-0 col-sm-0 col-md-2">
		<div id="leftBanner" class="row banner">
			<img src="" href="">
		</div>
	</div>
</html>