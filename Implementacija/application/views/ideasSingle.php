<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tajanstveni Deda Mraz</title>

	<link href= "<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href= "<?php echo base_url();?>css/mindCSS.css" rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"?>></script>
  	<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"?>></script>

<style type="text/css">
	body {
		background: url("<?php echo base_url();?>/slike/background.jpg");
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


	#ideje {
		color: #e60000;
	}

	.title {
		font-size: 18px;
		font-weight: bold;
	}

	#ideje img {
    	float: left;
    	margin: 0 20px 20px 0;
    	width: 200px;
    	height: 200px;
	}

	#ideje p {
	    text-align: justify;
	    text-indent: 2em;
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
				
					<img src="<?php echo base_url();?>/slike/nonstopshop.png">
					<img src="<?php echo base_url();?>/slike/idealan.png">
					<img src="<?php echo base_url();?>/slike/ludPoklon.png">
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
						      <a href="#" class="navbar-left"><img src="<?php echo base_url();?>/slike/animated_logo.gif"></a>
						      <a class="navbar-brand christmas" href="#" style="height: 100%; padding: 5px;">
						      	<img src="<?php echo base_url();?>/slike/logoTekst.png" style="height: 60px; margin: 0 auto">
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
						      <li><a href="profile.html">Moj Profil</a></li>
						      <li><a href="gallery.html">Galerija</a></li>
						      <li class="active"><a href="../../Ideje">Ideje</a></li>
						      <li><a href="contact.html">Kontakt</a></li>
						    </ul>
						  </div>
						</nav>
					</div>

					<div class="row">
						<div id="ideje" class="col-xs-12">
							<table style="margin-left: 30px; margin-right: 30px;">
								<div>
									<?php
										echo 
										"<div class=\"container-fluid\">
						    				<tr>
									<td align=\"center\">
										<span class=\"glyphicon glyphicon-remove\"></span>
										<span style=\"color:#e60000;\"><a href=\"Ideje/obrisi/". $SifIdeja ."\" onclick=\" return  confirm('Da li ste sigurni da zelite da obrisete ideju?')\">Obrisi</span>
									</td>
									<td align=\"center\">
										<span class=\"glyphicon glyphicon-pencil\"></span>
										<span style=\"color:#e60000;\"><a href=\"../../Ideje/uredi/" . $SifIdeja . "\"> Uredi</span>
									</td>
									<td>
										
									</td>
									</tr>
						  				</div>";
									?>

								</div>
							<div>
								<?php
										echo "<tr>
												<td class=\"title\" colspan=\"3\">" 
													. $Naziv . 
											 "</td>	
												</tr>
													<tr>
														<td colspan=\"3\" class=\"col-xs-6\">
														<div>
														<img src=" . base_url()
														.$PutanjaDoSlike .
														">
														<p align=\"justify\">" . $Tekst . "</p>
											</div>
									</td>
								</tr>";
								?>
								</div>
							</table>
						</div>
					</div>
				</div>
				<div class="row bottomBanner">
					<img src="<?php echo base_url();?>/slike/poklonshop.png">
				</div>
			</div>
			<div class="col-xs-0 col-sm-0 col-md-2">
				<div id="rightBanner" class="row banner">
					<img src="<?php echo base_url();?>/slike/nonstopshop.png">
					<img src="<?php echo base_url();?>/slike/idealan.png">
					<img src="<?php echo base_url();?>/slike/ludPoklon.png">
				</div>
			</div>
		</div>
	</div>
</body>
</html>