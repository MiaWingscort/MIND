<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$sess = $this->session->userdata('logged_in');
$tip= $sess['tip_korisnika'];
if($tip!="A")
{
	if($tip=="I" || $tip=="P")
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
	<link href=<?php echo base_url() . "css/mindCSS.css"?> rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	body {
		background: url("<?php echo base_url() . 'slike/background.jpg'?>");
		color: #ffffff;
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
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "contact.php", "naziv"=>"Kontakt");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "reklamiranje", "naziv"=>"Postavite reklamu");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "PregledProfila", "naziv"=>"Moj profil");
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
						<div class="col-xs-12 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body" align="center">
							   <span class="glyphicon glyphicon-user"></span>
							   <label>Menjam profil</label>
							  </div>
							  <div class="panel-footer">
							  	<div class="row">
							  		<?php echo form_open_multipart('PromenaProfila/promeniAdministratora', array('method' => 'POST', 'name' => "forma_promeni_administratora"));?>
							  		<form name="forma_promeni_administratora" method="POST" action="<?php echo base_url().'PromenaProfila/promeniAdministratora'?>">
							  			
								  		<div class="col-xs-12 col-sm-3" align="center">
									  		<div class="form-group">
										  		<img src=<?php echo base_url($Slika)?> style="width:150px; height: 150px">
										  		<br>
										  		<br>
										  			<h4>Max. velicina 4MB</h4>
												<br>
										  			<label for="files" class="btn" style="border: 1px solid #e60000">Izaberi profilnu sliku</label>
										  			<input id="files" type="file" style="visibility:hidden" name="userfile" size="4096">
										  		<?php 
											 		$this->load->view('includes/error.php'); 
											 	?>
										  	</div>
									  	</div>
									  
									  	<div class="col-xs-12 col-sm-5">
									  		<?php if ($this->session->flashdata('greske-administrator')): ?>
									 		<div id="greske-administrator" class="alert alert-danger collapse in">
												<strong>GRESKA!</strong>
												<?php
													echo $this->session->flashdata('greske-administrator');
												?>
												<div align="center" style="margin-top: 5px;">
													<button type="button" class="btn btn-warning" onclick="zatvoriGreske('greske-administrator')">Pokusajte ponovo</button>
												</div>
											</div>
										  <?php endif ?> 
									  		<table class="table table-hover">
											    <tbody>
												    <tr>
									  					<td class="data_left">Ime:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="ime" value="<?php echo $Ime; ?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">Prezime:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="prezime" value="<?php echo $Prezime; ?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">E-mail:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="email" class="form-control" name="email" value="<?php echo $Email;?>">
															</div>
									  					</td>
									  				</tr>
									  				
									  				<tr>
									  					<td colspan="2" align="center">
									  						<input type="submit" value="Sacuvaj izmene"></input>
									  					</td>
								  					</tr>
								  					
											    </tbody>
										  	</table>
										  
								  		</form>
								  	</div>
								  	
							  	</div>
							  </div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="row bottomBanner">
					<img src=<?php echo base_url().'/slike/poklonShop.png'?>>
				</div>
			</div>
			<?php 
			   $this->load->view('includes/right-banner.php'); 
			?>
		</div>
	</div>
</body>
</html>