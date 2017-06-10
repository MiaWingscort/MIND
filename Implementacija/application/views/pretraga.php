<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tajanstveni Deda Mraz</title>

	<link href=<?php echo base_url() . "css/bootstrap.css"?> rel="stylesheet">
	<link href=<?php echo base_url() . "css/mindCSS.css"?>  rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	body {
		background: url(<?php echo base_url() . '/slike/background.jpg'?>);
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
</style>

<script type="text/javascript">
	function disableTextArea() {
		var mojaInteresovanja = document.interesovanja.mojaInteresovanja;

		if (mojaInteresovanja.checked) {
			document.interesovanja.unetaInteresovanja.disabled = true;
			mojaInteresovanja.value = "da";
		} else {
			document.interesovanja.unetaInteresovanja.disabled = false;
			mojaInteresovanja.value = "ne";
		}
	}
</script>

</head>
<body>
	<div class="container-fluid">
	<?php
			$nizUlaza = array();
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> "#", "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "UklanjanjeKorisnika", "naziv"=>"Ukloni korisnika");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "reklamiranje", "naziv"=>"Postavite reklamu");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "pretraga", "naziv"=>"Pretraga korisnika");
			$data['nizUlaza']=$nizUlaza;
			$this->load->view('includes/header-logout.php',$data);
		?>

		<div class="row content">
			<?php 
				$this->load->view('includes/left-banner.php'); 
			?>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					<div class="row padding-5">
						<div id="pretraga" class="col-xs-6 col-md-7 col-lg-8">
							<div class="panel panel-default">
								<div class="panel-body" align="center">
									<span class="glyphicon glyphicon-search"></span>
									<label>PRETRAGA</label>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-xs-12">
											<form name="interesovanja" action=<?php echo base_url() . "Pretraga/pretrazi" ?> method="POST">
												<div class="form-group">
													<div class="checkbox">
													  <label><input name="mojaInteresovanja" type="checkbox" value="ne" onchange="disableTextArea()">Ista interesovanja kao moja</label>
													</div>
												</div>
												<div class="form-group">
													<label for="sel1">Interesovanja</label>
													<textarea name="unetaInteresovanja" class="form-control" rows="5" placeholder="Unesite interesovanja"></textarea>
												</div>
												<div class="form-group">
													<input type="submit" value="Pretrazi korisnika" align="center" style="margin-top: 5px"></input>
												</div>
											</form>

											<?php if (isset($korisnici)) {
													echo "<div class=\"fopen(filename, mode)rm-group\">
															<h4> Pronadjeni korisnici</h4>
															<table class=\"table\">
																<thead>
																	<th>Ime</th>
																	<th>Prezime</th>
																	<th>Adresa</th>
																	<th>Datum rodjenja</th>
																	<th>Pol</th>
																</thead>
																<tbody>";
													foreach ($korisnici as $korisnik) {
															echo "<tr>" .
																	"<td>" . $korisnik->Ime . "</td>" .
																	"<td>" . $korisnik->Prezime . "</td>" .
																	"<td>" . $korisnik->Adresa . "</td>" .
																	"<td>" . $korisnik->DatumRodjenja . "</td>" .
																	"<td>" . $korisnik->Pol . "</td>" .
																 "</tr>";
													}
													echo	   "</tbody>
															</table>
														</div>";
												} 

											?>

											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-5 col-lg-4">
							<div class="panel panel-default">
								<div class="panel-body" align="center">
									<span class="glyphicon glyphicon-user"></span>
									<label>Petar Petrovic</label>
								</div>
								<div class="panel-footer">
									<div class="row">
										<table class="table">
										    <tbody>
								  				<tr>
								  					<td class="data_left">Datum rodjenja:</td>
								  					<td rowspan="4" align="center">
								  						<img id="profilePicture" src=<?php echo base_url() . "/slike/profilnaSlika.png"?>>
								  						<input type="button" value="Promeni sliku" align="center" style="margin-top: 5px"></input>
								  					</td>
								  				</tr>
								  				<tr>
								  					<td class="data_right">&nbsp&nbsp 1.1.1995</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left">Pol</td>
								  				</tr>
								  				<tr>
								  					<td class="data_right">&nbsp&nbsp Muski</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left">Email:</td>
								  					<td class="data_right">pera@gmail.com</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left">Adresa:</td>
								  					<td class="data_right">Gandijeva 15</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left">Obrazovanje:</td>
								  					<td class="data_right">/</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left">Primalac poklona:</td>
								  					<td class="data_right">Marija Petrovic</td>
								  				</tr>
								  				<tr>
								  					<td colspan="2">
								  						<label for="sel1">Interesovanja</label>
														<select multiple class="form-control" id="sel1">
															<option>Automobili</option>
															<option>Knjige</option>
															<option>Vina</option>
														</select>
								  					</td>
								  				</tr>
							  				</tbody>
						  				</table>
									</div>
								</div>
							</div>
						</div>
					</div>
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