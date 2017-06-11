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
						      <a href="#" class="navbar-left"><img src=<?php echo base_url() . "/slike/animated_logo.gif"?>></a>
						      <a class="navbar-brand christmas" href="#" style="height: 100%; padding: 5px;">
						      	<img src=<?php echo base_url() . "/slike/logoTekst.png"?> style="height: 60px; margin: 0 auto">
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
						      <li class="active"><a href="#">Moj Profil</a></li>
						      <li><a href="gallery.html">Galerija</a></li>
						      <li><a href="idea.html">Ideje</a></li>
						      <li><a href="contact.html">Kontakt</a></li>
						      <li><a href="advertisement.html">Oglasi</a></li>
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
							  		<div class="col-xs-12 col-sm-3" align="center">
								  		<div class="form-group">
									  		<img src=<?php echo base_url($Slika)?> style="width:150px; height: 150px">
									  		
									  	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-5"> 
								  		<form name="forma_profil_prodavca" method="POST" action=<?php echo base_url().'PromenaProfila'?>>
									  		<table class="table table-hover">
											    <tbody>
												    <tr>
									  					<td class="data_left">Naziv:</td>
									  					<td class="data_right"><?php echo $Naziv;?></td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">PIB:</td>
									  					<td class="data_right"><?php echo $PIB;?></td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">E-mail:</td>
									  					<td class="data_right"><?php echo $Email;?></td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">Adresa:</td>
									  					<td class="data_right"><?php echo $Adresa;?></td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">Kontakt telefon:</td>
									  					<td class="data_right"><?php echo $Telefon;?></td>
									  				</tr>
									  				<tr>
									  					<td class="data_left">Website:</td>
									  					<td class="data_right"><a href=<?php echo $Website;?>><?php echo $Website;?></a></td>
									  				</tr>
									  				<tr>
									  					<td colspan="2" align="center">
									  						<input type="submit" value="Radi na profilu"></input>
									  					</td>
								  					</tr>
											    </tbody>
										  	</table>
								  		</form>
								  	</div>
								  	<div class="col-xs-12 col-sm-4">
								  		<form>
										    <div class="form-group">
										      <label for="sel1">Ciljna interesovanja</label>
											  <select multiple class="form-control" id="sel1">
											  	<option><?php echo implode('</option><option>', $Interesovanja); ?>
											  	</option>
											  </select>
										      
										    </div>
										</form>
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