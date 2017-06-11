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


		<?php if ($this->session->flashdata('greske-prodavac')): ?>
      	<?php echo "$('#tab-prodavac').click();";
		?>
		<?php endif ?>
	}

	function zatvoriGreske(ime) {
		$('#' + ime).slideToggle(400);
	}
</script>

</head>
<body onload="initializer()">
	<div class="container-fluid">
		<div class="row">
			<?php 
			   $this->load->view('includes/left-banner.php'); 
			?>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					<div class="row">
						<nav class="navbar navbar-inverse">
						  <div class="container-fluid">
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>                        
						      </button>
						      <a href="#" class="navbar-left"><img src=<?php echo base_url().'/slike/animated_logo.gif'?>></a>
						      <a class="navbar-brand christmas" href="#" style="height: 100%; padding: 5px;">
						      	<img src=<?php echo base_url().'/slike/logoTekst.png'?> style="height: 60px; margin: 0 auto">
						      </a>
						    </div>
						    <div class="collapse navbar-collapse" id="myNavbar">
						      <ul class="nav navbar-nav navbar-right">
						        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Odjavi se</a></li>
						      </ul>
						    </div>
						  </div>
						</nav>
					</div>

					<div class="row">
						<nav class="navbar navbar-default">
						  <div class="container-fluid">
						    <ul class="nav navbar-nav">
						      <li class="active"><a href="profile.html">Moj Profil</a></li>
						      <li><a href="gallery.html">Galerija</a></li>
						      <li><a href="idea.html">Ideje</a></li>
						      <li><a href="contact.html">Kontakt</a></li>
						      <li><a href="generator.html">Generator</a></li>
						    </ul>
						  </div>
						</nav>
					</div>

					<div class="row">
						<div class="col-xs-12 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body" align="center">
							   <span class="glyphicon glyphicon-user"></span>
							   <label>Moj profil</label>
							  </div>
							  <div class="panel-footer">
							  	<div class="row">
							  		<?php echo form_open_multipart('PromenaProfila/promeniIgraca', array('method' => 'POST', 'name' => "playerProfileForm"));?>
							  		<form name="playerProfileForm" method="POST" action="<?php echo base_url().'PromenaProfila/promeniIgraca'?>">
								  		<div class="col-xs-12 col-sm-3" align="center">
									  		<div class="form-group">
										  		<img src=<?php echo base_url($Slika)?> style="width:150px; height: 150px">
										  		<br>
										  		<br>
										  			<h4>Max. velicina 4MB</h4>
												<br>
										  			<label for="files" class="btn" style="border: 1px solid #e60000">Izaberi profilnu</label>
										  			<input id="files" type="file" style="visibility:hidden;" name="userfile" size="4096" />
										  		<?php 
											 		$this->load->view('includes/error.php'); 
											 	?>
										  	</div>
									  	</div>
									  	<div class="col-xs-12 col-sm-5">
									  		<?php if ($this->session->flashdata('greske-igrac')): ?>
									 		<div id="greske-igrac" class="alert alert-danger collapse in">
												<strong>GRESKA!</strong>
												<?php
													echo $this->session->flashdata('greske-igrac');
												?>
												<div align="center" style="margin-top: 5px;">
													<button type="button" class="btn btn-warning" onclick="zatvoriGreske('greske-igrac')">Pokusajte ponovo</button>
												</div>
											</div>
										  <?php endif ?> 
									  		<table class="table table-hover">
											    <tbody>
												    <tr>
									  					<td class="data_left">Ime:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="ime" value="<?php echo $Ime;?>">
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
									  				
									  					<td class="data_left"><label>Datum rodjenja</label></td>
										    			
										    			<td class="data_right">
										    			
															<select name="dan">
												  				<option value="<?php $time=strtotime($DatumRodjenja);
																			echo date('j',$time);?>">
																			
																</option>
															</select>
															<select name="mesec">
												  				<option value="<?php $time=strtotime($DatumRodjenja);
																			echo date('n',$time);?>">
																			
																</option>
															</select>
															<select name="godina">
												  				<option value="<?php $time=strtotime($DatumRodjenja);
																			echo date('Y',$time);?>">
																			
																</option>
															</select>
										    			
										  				</td>
										  		</tr>
									  				<tr>
									  					<td class="data_left">Pol</td>
									  					<td class="data_right">
									  						<div class="radio">
															  <label><input type="radio" name="pol" value="M" checked="<?php if ($Pol == 'M') {echo 'true';}else if ($Pol == 'Z'){echo 'false';}?>">Muški</label>
															  <label><input type="radio" name="pol" value="Z" checked="<?php if ($Pol == 'M'){echo 'false';}else if ($Pol == 'Z'){echo 'true';}?>">Zenški</label>
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
									  					<td class="data_left">Adresa:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="adresa" value="<?php echo $Adresa;?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">Kontakt telefon:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="telefon" value="<?php echo $Telefon;?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">Primalac poklona:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="primalac" value="<?php echo $PrimalacIme; echo " "; echo $PrimalacPrezime; ?>">
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
									  	</div>
									  	<div class="col-xs-12 col-sm-4">
										    <div class="form-group">
										     <label for="sel1">Interesovanja</label>
											  <select multiple class="form-control" id="sel1" name="interesovanja[]">
											    <?php
											    	foreach ($SvaInteresovanja as $interesovanje) {
											    		if (array_key_exists($interesovanje, $MojaInteresovanja))
											    			echo '<option value="'.$interesovanje.'" selected>'.$interesovanje.'</option>';
											    		else echo '<option value="'.$interesovanje.'">'.$interesovanje.'</option>';
											    	}
											    ?>
											  </select>
										      <br>
										      <div class="row" align="center">
										      	<span class="glyphicon glyphicon-plus"></span>
										      	<span onclick="addInterest()">Dodaj interesovanje</span>
										      	<span class="glyphicon glyphicon-remove"></span>
										      	<span onclick="removeInterest()">Ukloni interesovanje</span>
										      </div>
										    </div>
									  	</div>
								  </form>
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