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

	function izaberiNovog(button) {
		var parentButton = $(button).parent(); 
		var id = $($($(parentButton).parent()).find(">:first-child")).text();

		$.ajax({url: "http://localhost:8080/ci/Pretraga/izaberi/" + id , dataType: 'json', success: function(result){
	        alert("USPESNO STE IZABRALI OSOBU KOJOJ CETE KUPITI POKLON");
		}});
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
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "pretraga", "naziv"=>"Pretraga korisnika");
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
					<div class="row padding-5">
						<div id="pretraga" class="col-xs-12">
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
													echo "<div class=\"form-group\">
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
																	"<td style=\"display:none\">" . $korisnik->SifKor . "</td>" .
																	"<td>" . $korisnik->Ime . "</td>" .
																	"<td>" . $korisnik->Prezime . "</td>" .
																	"<td>" . $korisnik->Adresa . "</td>" .
																	"<td>" . $korisnik->DatumRodjenja . "</td>" .
																	"<td>" . $korisnik->Pol . "</td>" .
																	"<td><input type=\"button\" onclick=\"izaberiNovog(this)\" value=\"Izaberi\" align=\"center\" ></input> </td>" .
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
					</div>
				</div>
				<div class="row bottomBanner">
					<img src=<?php echo base_url() . "/slike/poklonshop.png"?>>
				</div>
			</div>
			<?php 
				$this->load->view('includes/right-banner.php'); 
			?>
		</div>
	</div>
</body>
</html>