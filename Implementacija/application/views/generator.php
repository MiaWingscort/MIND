<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$sess = $this->session->userdata('logged_in');
	$tip= $sess['tip_korisnika'];
	if($tip!="I")
	{
		if($tip=="A" || $tip=="P")
		{
			redirect('Welcome/ulogovan');
		}
		else 
		{
			redirect('Welcome');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tajanstveni Deda Mraz</title>

	<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/mindCSS.css" rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	body {
		background: url('./slike/background.jpg');
		color: #ffffff;
	}
	#profilePicture {
	    zoom: 2;

	    display: block;
	    margin: auto;

	    height: auto;
	    max-height: 100%;

	    width: 70%;
	    max-width: 100%;
	}
	
	.table-title {
		text-align: center;
		background-color: #e60000; 
		color:white; 
		height: 30px; 
		font-size: 16px;
		border-top-left-radius: 7px;
		border-top-right-radius: 7px;
	}

	#generatorTable tbody {
		border: 2px solid #e60000;
		padding: 20px;
		max-height: 200px;
	}

	.my-button {
		border: 2px solid #e60000;
		border-radius: 7px;
		font-size: 14px;
	}

	.my-button:hover {
		cursor: pointer;
		font-weight: bold;
	}

	#generatorTable td {
		padding: 7px 10px 7px 20px;
		vertical-align: middle;
	}

	@media (max-width: 1200px) {
		.title {
			font-size: 20px;
		}
	}


	@media (max-width: 992px) {
		.title {
			font-size: 14px;
		}
	}
</style>

<script type="text/javascript">
	function addPlayer() {
		var broj = $("#generatorTable").children().length;
		$('#generatorTable tr:last').after('<tr>\
											<td class="data_left col-xs-2">Ime:</td>\
						  					<td class="data_right col-xs-4">\
						  						<input type="text" class="form-control" name="ime_' + broj + '" placeholder="Unesite ime">\
						  					</td>\
						  					<td class="data_left col-xs-2">Email:</td>\
						  					<td class="data_right col-xs-4">\
						  						<input type="text" class="form-control" name="email_' + broj + '" placeholder="Unesite email">\
						  					</td> \
					  					</tr>');
	}
</script>

</head>
<body>
	<div class="container-fluid">
		<?php
			$sess = $this->session->userdata('logged_in');
			$tip= $sess['tip_korisnika'];
			$nizUlaza = array();
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url(), "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "pretraga", "naziv"=>"Pretraga korisnika");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "PregledProfila", "naziv"=>"Moj profil");
			$data['nizUlaza']=$nizUlaza;
			$this->load->view('includes/header-logout.php',$data);
		?>

		<div class="row content">
			<?php 
				$this->load->view('includes/left-banner.php'); 
			?>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					<div class="row">
						<div id="generator" class="col-xs-12 col-md-7 col-lg-8">
							<div class="panel panel-default">
								<div class="panel-body" align="center">
									<span class="glyphicon glyphicon-user"></span>
									<label style="font-size: 22px;">Generator</label>
								</div>
								<div class="panel-footer">
									<div class="form-group">
								      <label class="title">Zelis da igras Tajanstvenog Deda mraza sa svojim prijateljima?</label>
									  <form name="generatorForm" method="POST" action="generators/generisiIgru">
										<table class="table" id="generatorTable">
											<thead>
												<th colspan="4" class="table-title">Unesite email adrese i imena igraca i mi cemo ih rasporediti za Vas</th>
											</thead>
											<tbody>
												<tr>
								  					<td class="data_left col-xs-2">Ime:</td>
								  					<td class="data_right col-xs-4">
								  						<input type="text" class="form-control" name="ime_0" placeholder="Unesite ime">
								  					</td>
								  					<td class="data_left col-xs-2">Email:</td>
								  					<td class="data_right col-xs-4">
								  						<input type="text" class="form-control" name="email_0" placeholder="Unesite email">
								  					</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left col-xs-2">Ime:</td>
								  					<td class="data_right col-xs-4">
								  						<input type="text" class="form-control" name="ime_1" placeholder="Unesite ime">
								  					</td>
								  					<td class="data_left col-xs-2">Email:</td>
								  					<td class="data_right col-xs-4">
								  						<input type="text" class="form-control" name="email_1" placeholder="Unesite email">
								  					</td>
								  				</tr>
											</tbody>
										</table>
										<div class="row" style="margin-top: 20px">
											<div class="col-xs-1 col-md-2"></div>
											<div onclick="addPlayer()" class="col-xs-4 col-md-3 my-button" align="center">
												<span class="glyphicon glyphicon-plus"></span>
											    <span>Dodaj jos</span>
											</div>
											<div class="col-xs-2 col-md-2"></div>
											<div class="col-xs-4 col-md-3 my-button" align="center">
											    <span class="glyphicon glyphicon-send"></span>
											    <span onclick="generatorForm.submit()">Posalji</span>
											</div>
											<div class="col-xs-1 col-md-2"></div>
										</div>
									  </form>
								    </div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row bottomBanner">
					<img src="<?php echo base_url();?>/slike/poklonshop.png">
				</div>
			</div>
			<?php 
			   $this->load->view('includes/right-banner.php'); 
			?>
		</div>
	</div>
</body>
</html>