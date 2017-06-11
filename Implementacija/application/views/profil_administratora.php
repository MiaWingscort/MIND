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
		background: url("<?php echo base_url() . '/slike/background.jpg'?>");
		color: #ffffff;
	}
</style>

<script type="text/javascript">

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
					$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "UklanjanjeKorisnika", "naziv"=>"Ukloni korisnika");
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
							   <label>Moj profil</label>
							  </div>
							  <div class="panel-footer">
							  	<div class="row">
							  		<div class="col-xs-12 col-sm-3" align="center">
								  		<div class="form-group">
									  		<img src=<?php echo base_url($Slika); ?> style="width:150px; height: 150px">
									  		
									  	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-5"> 
								  		<form name="forma_profil_administratora" method="POST" action=<?php echo base_url().'PromenaProfila'?>>
									  		<table class="table table-hover">
											    <tbody>
												    <tr>
									  					<td class="data_left">Ime i prezime:</td>
									  					<td class="data_right" id="ime"><?php echo $Ime; echo " "; echo $Prezime; ?></td>

									  				</tr>
									  				
									  				<tr>
									  					<td class="data_left">E-mail:</td>
									  					<td class="data_right" id="email"><?php echo $Email;?></td>
									  				</tr>
									  				
									  				<tr>
									  					<td colspan="2" align="center">
									  						<input type="submit" value="Radi na profilu"</input>
									  					</td>
								  					</tr>
											    </tbody>
										  	</table>
								  		</form>
								  	</div>
								  	<!-- <div class="col-xs-12 col-sm-4">
								  		<form>
										    <div class="form-group">
										     <label for="sel1">Interesovanja</label>
											  <select multiple class="form-control" id="sel1">
											  	<option><?php echo implode('</option><option>', $Interesovanja); ?>
											  	</option>
											  </select>
										      
										    </div>
										</form>
								  	</div> -->
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


