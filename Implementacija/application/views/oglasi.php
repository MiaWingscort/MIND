<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$sess = $this->session->userdata('logged_in');
$tip= $sess['tip_korisnika'];
if($tip!="P")
{
	if($tip=="I" || $tip=="A")
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
		background: url('<?php echo base_url();?>/slike/background.jpg');
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
	function zatvoriGreske(ime) {
		$('#' + ime).slideToggle(400);
	}

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#slikaOglasa').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
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
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "reklamiranje", "naziv"=>"Postavite reklamu");
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
					
					<div class="row  padding-5">
						<div id="oglasi" class="col-xs-12">
							<div class="panel panel-default">
							  <div class="panel-body" align="center">
							   <span class="glyphicon glyphicon-user"></span>
							   <label>Moj profil</label>
							  </div>
							  <div class="panel-footer">
							  	<div class="row">
							  		<?php echo form_open_multipart('Reklamiranje/dodajReklamu');?>
								  		<div class="col-xs-12 col-sm-4" align="center">
									  		<div class="form-group">
									  			<label>Slika oglasa</label>
										  		<img id="slikaOglasa" src=<?php echo base_url() . "/slike/pictureIcon.png" ?> style="width:250px; height: 250px">
										  		<br>
										  		<br>
										  			<h4>Max. velicina 4MB</h4>
												<br>
										  			<input type="file" name="userfile" size="4096" onchange="readURL(this);" />
										  		<?php 
											 		$this->load->view('includes/error.php'); 
											 	?>
										  	</div>
									  	</div>
									  	<div class="col-xs-12 col-sm-8" align="center">
										  	<form action="Reklamiranje/dodajReklamu" method="POST">
										  		<div class="form-group">
												  <label for="sel1">Datum Isteka Oglasa</label>
												   <input type="text" class="form-control" name="datumIsteka" placeholder="GGGG-MM-DD">
												</div>
												<div class="form-group">
												  <label for="sel1">Link Website-a</label>
												  <input type="text" class="form-control" name="website" placeholder="Unesite link svog website-a">
												</div>
												<div class="form-group">
												  <label for="sel1">Cena</label>
												  <input type="text" class="form-control" name="cena">
												</div>
												<div class="form-group" align="center">
													<input type="submit" value="Potvrdi Unos" align="center"></input>	
												</div>
											</form>
											<?php if ($this->session->flashdata('greske-oglas')): ?>
									 		<div id="greske-prodavac" class="alert alert-danger collapse in">
												<strong>GRESKA!</strong>
												<?php
													echo $this->session->flashdata('greske-oglas');
												?>
												<div align="center" style="margin-top: 5px;">
													<button type="button" class="btn btn-warning" onclick="zatvoriGreske('greske-prodavac')">Pokusajte ponovo</button>
												</div>
											</div>
										  <?php endif ?>
									  	</div>
								  	</form>
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