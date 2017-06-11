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


	#ideje {
		color: #e60000;
	}

	.title {
		font-size: 18px;
		font-weight: bold;
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
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
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
						<nav class="navbar navbar-default">
						  <div class="container-fluid">
						    <ul class="nav navbar-nav">
						      <li><a href="profile.html">Moj Profil</a></li>
						      <li><a href="gallery.html">Galerija</a></li>
						      <li class="active"><a href="idea.html">Ideje</a></li>
						      <li><a href="contact.html">Kontakt</a></li>
						      <li><a href="generator.html">Generator</a></li>
						    </ul>
						  </div>
						</nav>
					</div>
				<div class="row">
					<form name="urediIdeju" action="../../Ideje/potvrdiUredjivanje/<?php echo "$SifIdeja"; ?>" class="form-horizontal" method="POST">
						<div id="ideje" class="col-xs-6 col-md-7 col-lg-8">
							<table style="margin-left: 30px; margin-right: 30px;">
								<tr>
									<td class="title" colspan="2">
										<div class="form-group">
										  <label> Ime ideje:</label>
										  <input type="text" name='naziv' value= "<?php 
										echo "$Naziv"; ?> " class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<td class="col-xs-12 col-md-4">
										<img class="tablePicture" src="<?php echo base_url();?><?php echo "$PutanjaDoSlike"?>">
									</td>
									<td class="col-xs-12 col-md-8" rowspan="2">
										<label for="comment">Opis ideje:</label>
										<textarea class="form-control" rows="10" name='tekst' id="comment"> <?php
										echo "$Tekst"; ?></textarea>
									</td>
								</tr>
								<tr>
									<td align="center">
										<input type="button" value="Dodaj sliku ideje"></input>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<span class="glyphicon glyphicon-floppy-disk"></span>
										<input type="button" onclick="urediIdeju.submit()" value="Sacuvaj ideju"></input>
									</td>
								</tr>
							</table>
						</div>
						</form>
						<div class="col-xs-6 col-md-5 col-lg-4">
							<div class="panel panel-default">
								<div class="panel-body" align="center">
									<span class="glyphicon glyphicon-user"></span>
									<label>ADMINISTRATOR</label>
								</div>
								<div class="panel-footer">
									<div class="row">
										<table class="table">
										    <tbody>
								  				<tr>
								  					<td class="data_left">Datum rodjenja:</td>
								  					<td rowspan="4" align="center">
								  						<img class="tablePicture" src="<?php echo base_url();?>/slike/profilnaSlika.png">
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
								  					<td colspan="2">
								  						<label for="sel1">Interesovanja</label>
														<select multiple class="form-control" id="sel1">
															<option>Automobili</option>
															<option>Knjige</option>
															<option>Vina</option>
														</select>
								  					</td>
								  				</tr>
								  				<tr>
								  					<td colspan="2">
								  						<input type="button" value="Nova ideja"></input>
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
					<img src="<?php echo base_url();?>/slike/poklonshop.png">
				</div>
			</div>
			<?php 
			   $this->load->view('includes/right-banner.php'); 
			?>
		</div>
	</div>
</body>
</html>

