
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Tajanstveni Deda Mraz</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/mindCSS.css" rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		body {
			background: url('./slike/background.jpg');
			color: #ffffff;
		}
	</style>

<script type="text/javascript">
	function initializer() {
		var month = document.getElementsByName('mesec')[0];
		var day = document.getElementsByName('dan')[0];
		var year = document.getElementsByName('godina')[0];

		for (var i = 1; i <=31; i++) {
			$(day).append('<option value="' + i + '">' + i + '</option>');
		}

		for (var i = 1; i <=12; i++) {
			$(month).append('<option value="' + i + '">' + i + '</option>');
		}

		for (var i = 2017; i >= 1950; i--) {
			$(year).append('<option value="' + i + '">' + i + '</option>');
		}
	}
</script>


</head>
<body onload="initializer()">
	<div class="container-fluid">
		<?php
			$nizUlaza = array();
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> "#", "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			$data['nizUlaza']=$nizUlaza;
			$this->load->view('includes/header-login.php',$data);
		?>
		<div class="row content">
			<?php 
			   $this->load->view('includes/left-banner.php'); 
			?>

			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="padding-10" class="col-xs-12">	
					<div class="row">
						<div class="col-xs-1 col-md-3"></div>
						<div id="kontakt" class="col-xs-10 col-md-6">
							<div class="panel panel-default">
								<div class="panel-body">
									<h5>PONISTITE SVOJU LOZINKU</h5>
								</div>
							  	<div class="panel-footer">
									<form action="/ci/zaboravljenaSifra/ponisti" method="POST" class="form-horizontal">
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="pwd">E-mail</label>
									    <div class="col-sm-8"> 
									      <input type="email" class="form-control" id="pwd" name="email" placeholder="">
									    </div>
									  </div>
									  <div class="form-group">
									  	<div class="col-sm-offset-8 col-sm-3">
										  <button type="submit" class="btn btn-default" style="color: #e60000">PONISTI</button>
									    </div>
									  </div>
								 	</form>
								 	
								 	<?php 
								 		$this->load->view('includes/error.php'); 
								 	?>

							  	</div>				
							</div>
						</div>
					</div>
					<div class="col-xs-1 col-md-3"></div>
				</div>
				<div class="row bottomBanner">
					<img src="./slike/poklonshop.png">
				</div>
			</div>
			<?php 
			   $this->load->view('includes/right-banner.php'); 
			?>
		</div>
	</div>
</body>
</html>