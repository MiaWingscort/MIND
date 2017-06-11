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
		background: url("<?php echo base_url().'/slike/background.jpg'?>");
		color: #ffffff;
	}
</style>

<script type="text/javascript">

</script>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-0 col-sm-0 col-md-2">
				<div id="leftBanner" class="row banner">
					<img src=<?php echo base_url() . "/slike/nonstopshop.png"?>>
					<img src=<?php echo base_url() . "/slike/idealan.png"?>>
					<img src=<?php echo base_url() . "/slike/ludPoklon.png"?>>
				</div>
			</div>
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
						      <a href="#" class="navbar-left"><img src=<?php echo base_url() . "./slike/animated_logo.gif"?>></a>
						      <a class="navbar-brand christmas" href="#" style="height: 100%; padding: 5px;">
						      	<img src=<?php echo base_url() . "./slike/logoTekst.png"?> style="height: 60px; margin: 0 auto">
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
						      <li class="active"><a href="profileSeller">Moj Profil</a></li>
						      <li><a href="gallery.html">Galerija</a></li>
						      <li><a href="idea.html">Ideje</a></li>
						      <li><a href="contact.html">Kontakt</a></li>
						    </ul>
						  </div>
						</nav>
					</div>

					<div class="row">
						<div class="col-xs-12 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body" align="center">
							   <span class="glyphicon glyphicon-user"></span>
							   <label>Profil prodavca</label>
							  </div>
							  <div class="panel-footer">
							  	<div class="row">
							  		<form name="forma_promeni_profil_prodavca" method="POST" action=<?php echo base_url().'PromenaProfila/promeniProdavca'?>>
								  		<div class="col-xs-12 col-sm-3" align="center">
									  		<div class="form-group">
										  		<img src=<?php echo base_url($Slika)?> style="width:150px; height: 150px">
										  		<input type="button" value="Promeni sliku" align="center"></input>
										  		<h4>Max. velicina 4MB</h4>
										  	</div>
									  	</div>
									  	<div class="col-xs-12 col-sm-5"> 
									  		<table class="table table-hover">
											    <tbody>
												    <tr>
									  					<td class="data_left">Naziv:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="naziv" value="<?php echo $Naziv;?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">PIB:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="PIB" value="<?php echo $PIB;?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">E-mail:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="email" value="<?php echo $Email;?>">
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
									  					<td class="data_left">Website:</td>
									  					<td class="data_right">
									  						<div class="form-group">
															  <input type="text" class="form-control" name="website" value="<?php echo $Website;?>">
															</div>
									  					</td>
									  				</tr>
									  				<tr>
									  					<td colspan="2" align="center">
									  						<input type="submit" value="Sacuvaj izmene"></input>
									  					</td>
								  					</tr>
								  					<tr>
									  					<td colspan="2" align="center" style="display:none">
									  						<input type="text" name="tipKorisnika" value="P"></input>
									  					</td>
								  					</tr>
											    </tbody>
										  	</table>
									  	</div>
									  	<div class="col-xs-12 col-sm-4">
										    <div class="form-group">
										     <label for="sel1">Ciljna interesovanja</label>
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
					<img src=<?php echo base_url().'/slike/poklonshop.png'?>>
				</div>
			</div>
			<div class="col-xs-0 col-sm-0 col-md-2">
				<div id="rightBanner" class="row banner">
					<img src=<?php echo base_url() . "/slike/nonstopshop.png"?>>
					<img src=<?php echo base_url() . "/slike/idealan.png"?>>
					<img src=<?php echo base_url() . "/slike/ludPoklon.png"?>>
				</div>
			</div>
		</div>
	</div>
</body>
</html>