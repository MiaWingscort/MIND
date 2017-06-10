<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
		background: url("<?php echo base_url();?>/slike/background.jpg");
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
			$nizUlaza = array();
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> "#", "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "UklanjanjeKorisnika", "naziv"=>"Ukloni korisnika");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "reklamiranje", "naziv"=>"Postavite reklamu");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "pretraga", "naziv"=>"Pretraga korisnika");
			$data['nizUlaza']=$nizUlaza;
			$this->load->view('includes/header-logout.php',$data);
		?>

		<div id="loader">
			<img src="<?php echo base_url();?>/slike/giphy.gif">
		</div>
		<div class="row content">
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
						<div class="col-xs-12 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body">
							    <h5>Dobro dosli na nas sajt<h5>
							  </div>
							  <div class="panel-footer">
							  	<p>
							  		Igra "Tajanstveni Deda Mraz" je originalno predpraznična igra za društvo, gde grupa ljudi tajno raspodeli ko kome kupuje poklon, i uoči praznika (Nove Godine, Božića...) obraduje dodeljenu osobu.
							  		<br>
							  		<br>Misija sajta je da igru proširimo na celu Srbiju!
							  		<br>
							  		<br>Povežite se sa ljudima iz svih delova zemlje, obradujte nekoga i neka neko obraduje Vas!
							  		<br>
							  		<br>Ukoliko je ovo Vaš prvi put na našem sajtu, možete se registrovati sa desne strane, ili ulogovati u gornjem desnom uglu. 
							  		<br>Kao gost možete pogledati ideje za poklone na blogu koji je deo našeg sajta, klikom na "Ideje".
							  		<br>Takođe, možete pogledati poklone koje su primili naši igrači iz prethodnih igara, klikom na "Galeriju".
							  		<br>Za sva pitanja, kliknite na "Kontakt" i obratite nam se!
							  		<br>
							  		<br>Puno zabave Vam želimo!

							  	</p>
							  </div>
							</div>
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