<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Tajanstveni Deda Mraz</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/mindCSS.css" rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	body {
		background: url('./slike/background.jpg');
		color: #ffffff;
	} 
	#loader {
        position: fixed;
        left: 0px;
        top: 70px;
        width: 100%;
        height: calc(100% - 70px);
        z-index: 9999;
        background: 50% 50% no-repeat rgb(160,160,160);
    }
    #loader img {
        transform: scale(0.8, 0.8);
        -ms-transform: scale(0.8, 0.8);
        -webkit-transform: scale(0.8, 0.8);
        -moz-transform: scale(0.8, 0.8);
        display: flex;
        margin: auto;
        max-width: 100%;
        height: 100%;
        width: 100%;
    }
</style>

<script type="text/javascript">
	function openRegisterTab(tabName, element) {
	    var activeTab = $('#' + tabName + '-tab');

	   	var tabContents = $('.tab-content').first()
	   	tabContents = $(tabContents[0]).children();

	   	for (var i = 0; i < tabContents.length; i++) {
	   		$(tabContents[i]).removeClass('active');
	   		if (tabContents[i] !== activeTab){
	   			$(tabContents[i]).removeClass('fade');
	   		}
	   	}
	   
	   	$(activeTab).addClass('active');

	    var tabHeaders = $('.nav-tabs');

	    tabHeaders = $(tabHeaders[0]).children();

	    for (var i = 0; i < tabHeaders.length; i++) {
	   		$(tabHeaders[i]).removeClass('active');
	   	}

	   	$(element).addClass('active');

	}

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

	$(window).on('load', function() {
        $('#loader').fadeOut(2000, function(){

        });
    });
</script>

</head>
<body onload="initializer()">
	<div class="container-fluid">
		<?php
			$this->load->view('includes/header-login.php');
		?>

		<div id="loader">
			<img src="./slike/giphy.gif">
		</div>
		<div class="row content">
			<div class="col-xs-0 col-sm-0 col-md-2">
				<div id="leftBanner" class="row banner">
					<img src="./slike/nonstopshop.png">
					<img src="./slike/idealan.png">
					<img src="./slike/ludPoklon.png">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-7 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body">
							    <h5>Dobro dosli na nas sajt<h5>
							  </div>
							  <div class="panel-footer">
							  	<p>
							  		ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							  	</p>
							  </div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-5 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body">
							    <h5>Registracija<h5>
							  </div>
							  <div class="panel-footer">
						  		<ul class="nav nav-tabs" role="tablist" style="margin-left: 0">
								    <li class="active" onclick="openRegisterTab('korisnik', this)"><a href="#">Korisnik</a></li>
								    <li id="tab-prodavac" onclick="openRegisterTab('prodavac', this)"><a href="#" >Prodavac</a></li>    
								</ul>
								<div class="tab-content">
								    <div id="korisnik-tab" class="tab-pane fade in active">
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
								      <h6>Podaci o korisniku</h6>
								      <form name="registerForm" action="/ci/registracija/noviIgrac" class="form-horizontal" method="POST">
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="ime">Ime*</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" id="email" name="ime" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Prezime*</label>
										    <div class="col-sm-7"> 
										      <input type="text" class="form-control" id="pwd" name="prezime" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Adresa*</label>
										    <div class="col-sm-7"> 
										      <input type="text" class="form-control" id="pwd" name="adresa" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Telefon*</label>
										    <div class="col-sm-7"> 
										      <input type="text" class="form-control" id="pwd" name="telefon" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">E-mail*</label>
										    <div class="col-sm-7"> 
										      <input type="email" class="form-control" id="pwd" name="email" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Šifra*</label>
										    <div class="col-sm-7"> 
										      <input type="password" class="form-control" id="pwd" name="sifra" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Ponovite šifru*</label>
										    <div class="col-sm-7"> 
										      <input type="password" class="form-control" id="pwd" name="ponovljena_sifra" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Pol*</label>
										    <div class="col-sm-7"> 
										      <label class="radio-inline"><input type="radio" value="M" name="pol">Muski</label>
											    <label class="radio-inline"><input type="radio" value="Z" name="pol">Zenski</label>
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-12" for="pwd">Datum rodjenja*</label>
										    <div class="col-sm-2"></div>
										    <div class="col-sm-10" style="margin-top: 10px">
												<select class="col-sm-3 no-padding margin-right-5" name="dan">
												  	<option value="">DD</option>
												</select>
												<select class="col-sm-3 no-padding margin-right-5" name="mesec">
													<option value="">MM</option>
												</select>
												<select class="col-sm-4 no-padding margin-right-5" name="godina">
												  	<option value="">GGGG</option>
												</select>
										    </div>
										  </div>
										  <div class="form-group"> 
										    <div class="col-sm-offset-6 col-sm-3">
										      <button type="submit" class="btn btn-default" style="color: #e60000">Registruj se</button>
										    </div>
										  </div>
										</form>
								    </div>
								    <div id="prodavac-tab" class="tab-pane fade">
								      <?php if ($this->session->flashdata('greske-prodavac')): ?>
								 		<div id="greske-prodavac" class="alert alert-danger collapse in">
											<strong>GRESKA!</strong>
											<?php
												echo $this->session->flashdata('greske-prodavac');
											?>
											<div align="center" style="margin-top: 5px;">
												<button type="button" class="btn btn-warning" onclick="zatvoriGreske('greske-prodavac')">Pokusajte ponovo</button>
											</div>
										</div>
									  <?php endif ?>
								      <h6>Podaci o prodavcu</h6>
								      <form class="form-horizontal" action="/ci/registracija/noviProdavac" method="POST">
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="ime">Naziv firme*</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" id="email" name="naziv" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">PIB*</label>
										    <div class="col-sm-7"> 
										      <input type="text" class="form-control" id="pwd" name="pib" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Adresa*</label>
										    <div class="col-sm-7"> 
										      <input type="text" class="form-control" id="pwd" name="adresa" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Telefon*</label>
										    <div class="col-sm-7"> 
										      <input type="text" class="form-control" id="pwd" name="telefon" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">E-mail*</label>
										    <div class="col-sm-7"> 
										      <input type="email" class="form-control" id="pwd" name="email" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Šifra*</label>
										    <div class="col-sm-7"> 
										      <input type="password" class="form-control" id="pwd" name="sifra" placeholder="">
										    </div>
										  </div>
										  <div class="form-group">
										    <label class="control-label col-sm-5" for="pwd">Ponovite šifru*</label>
										    <div class="col-sm-7"> 
										      <input type="password" class="form-control" id="pwd" name="ponovljena_sifra" placeholder="">
										    </div>
										  </div>
										  <div class="form-group"> 
										    <div class="col-sm-offset-6 col-sm-3">
										      <button type="submit" class="btn btn-default" style="color: #e60000">Registruj se</button>
										    </div>
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
					<img src="./slike/poklonshop.png">
				</div>
			</div>
			<div class="col-xs-0 col-sm-0 col-md-2">
				<div id="rightBanner" class="row banner">
					<img src="./slike/nonstopshop.png">
					<img src="./slike/idealan.png">
					<img src="./slike/ludPoklon.png">
				</div>
			</div>
		</div>
	</div>
</body>
</html>