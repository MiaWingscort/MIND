<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		background: url('<?php echo base_url();?>/slike/background.jpg');
		color: #ffffff;
	}
	.tablePicture {
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

</script>

</head>
<body>
	<div class="container-fluid">
	<?php
			$nizUlaza = array();
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url(), "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
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
						<div id="galerija" class="col-xs-6 col-md-7 col-lg-8">
							<table style="margin-left: 30px; margin-right: 30px;">
								<tr>
									<td colspan="2">
										<img class="tablePicture" src="<?php echo base_url();?>/slike/giftBox.png">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										&nbsp;
									</td>
								</tr>
								<tr>
									<?php echo form_open_multipart('Galerija/dodajSliku', array('name' => 'izaberiSliku'));?>
										<td align="right" class="col-xs-6">
											 <label for="files" class="btn" style="border: 1px solid #e60000; color: #e60000">Izaberi sliku</label>
											 <input id="files" type="file" style="display:none;" name="userfile" size="4096" />
										</td>
										<td align="left" class="col-xs-6">
											<label onclick="izaberiSliku.submit()"class="btn" style="border: 1px solid #e60000; color: #e60000">Dodaj sliku</label>
										</td>
									</form>
								</tr>
							</table>
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
								  						<img class="tablePicture" src="./slike/profilnaSlika.png">
								  						<input type="button" value="Promeni sliku" align="center" style="margin-top: 5px"></input>
								  					</td>
								  				</tr>
								  				<tr>
								  					<td class="data_right">&nbsp;&nbsp; 1.1.1995</td>
								  				</tr>
								  				<tr>
								  					<td class="data_left">Pol</td>
								  				</tr>
								  				<tr>
								  					<td class="data_right">&nbsp;&nbsp; Muski</td>
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