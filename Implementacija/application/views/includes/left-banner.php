<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
	<script type="text/javascript">
		$( document ).ready(function() {
			$.ajax({url: "http://localhost:8080/ci/Reklamiranje/dohvatiSlikeOglasa/true", dataType: 'json', success: function(result){
				console.log(result)
		        for (var i = 0; i < result.length; i++) {
		        	console.log(result[i]['PutanjaDoSlike'])
			        $('#leftBanner').append('<img src="' + result[i]['PutanjaDoSlike'] + '">');
			    }
		    }});
		    $.ajax({url: "http://localhost:8080/ci/Reklamiranje/dohvatiSlikeOglasa/false", dataType: 'json', success: function(result){
				console.log(result)
		        for (var i = 0; i < result.length; i++) {
		        	console.log(result[i]['PutanjaDoSlike'])
			        $('#rightBanner').append('<img src="' + result[i]['PutanjaDoSlike'] + '">');
			    }
		    }});
		});
	</script>

	<div class="col-xs-0 col-sm-0 col-md-2">
		<div id="leftBanner" class="row banner">
		</div>
	</div>
</html>