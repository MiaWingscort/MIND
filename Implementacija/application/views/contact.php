<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$sess = $this->session->userdata('logged_in');
$tip= $sess['tip_korisnika'];
if($tip=="A")
{
	redirect('Welcome/ulogovan');
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
	textarea {
	    resize: none;
	}
</style>

<script type="text/javascript">
	function zatvoriGreske(ime) {
		$('#' + ime).slideToggle(400);
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
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			if($tip=="A")
			{
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "UklanjanjeKorisnika", "naziv"=>"Ukloni korisnika");
			}
			if($tip=="P")
			{
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "reklamiranje", "naziv"=>"Postavite reklamu");
			}
			if($tip=="I")
			{

				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "pretraga", "naziv"=>"Pretraga korisnika");
			}
			
			if($tip=="I" || $tip=="P" || $tip=="A")
			{
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "PregledProfila", "naziv"=>"Moj profil");
				$data['nizUlaza']=$nizUlaza;
				$this->load->view('includes/header-logout.php',$data);
			}
			else 
			{
				$data['nizUlaza']=$nizUlaza;
				$this->load->view('includes/header-login.php',$data);
			}
		?>
		<div class="row content">

			<?php 
				$this->load->view('includes/left-banner.php'); 
			?>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					<div class="row">
					
						<div class="col-xs-1 col-md-3"></div>
						<div id="kontakt" class="col-xs-10 col-md-6">
							<div class="panel panel-default">
							  <div class="panel-body">
							  <?php if ($this->session->flashdata('greske-kontakt')): ?>
								<div id="greske-kontakt" class="alert alert-danger collapse in">
									<strong>GRESKA!</strong>
									<?php
										echo $this->session->flashdata('greske-kontakt');
									?>
										<div align="center" style="margin-top: 5px;">
										<button type="button" class="btn btn-warning" onclick="zatvoriGreske('greske-kontakt')">Pokusajte ponovo</button>
								</div>
							</div>
						<?php endif ?>
							    	<h5>KONTAKTIRAJTE NAS</h5>
							  	</div>
							  	<div class="panel-footer">
									<form action="Kontakt/posalji" name="posaljiMejl" method="POST" class="form-horizontal">
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="ime">Ime</label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="email" name="ime" placeholder="">
									    </div>
									  </div>
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="pwd">Prezime</label>
									    <div class="col-sm-8"> 
									      <input type="text" class="form-control" id="pwd" name="prezime" placeholder="">
									    </div>
									  </div>
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="pwd">E-mail</label>
									    <div class="col-sm-8"> 
									      <input type="email" class="form-control" id="pwd" name="email" placeholder="">
									    </div>
									  </div>
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="pwd">Poruka</label>
									    <div class="col-sm-8"> 
									      <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
									    </div>
									  </div>
									  <div class="form-group">
									  	<div class="col-sm-offset-8 col-sm-3">
										  <button type="submit" class="btn btn-default" style="color: #e60000">POSALJI</button>
									    </div>
									  </div>
								 	</form>
							  	</div>				
							</div>
						</div>
						<div class="col-xs-1 col-md-3"></div>
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