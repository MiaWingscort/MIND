<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$sess = $this->session->userdata('logged_in');
	$tip= $sess['tip_korisnika'];
	if($tip!="I" && $tip!="P" && $tip!="A")
	{
		redirect('Welcome');
	}
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

    function izmeni() {
    	var istaSifra = document.novaSifra.sacuvaj;

    	if (istaSifra.checked) {
    		$.ajax({url: "http://localhost:8080/ci/ZaboravljenaSifra/sacuvajIstuSifru", success: function(result){
    			location.reload();
		    }});
    	} else {
    		var novaSifra = document.novaSifra.sifra.value;

    		if (novaSifra === '') {
    			alert('Niste uneli novu sifru. Zadrzite postojecu ili unesite novu');
    			return;
    		}
    		$.ajax({url: "http://localhost:8080/ci/ZaboravljenaSifra/promeniSifru/" + novaSifra, success: function(result){
    			location.reload();
		    }});
    	}
    }
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
			$data['nizUlaza']=$nizUlaza;
			$this->load->view('includes/header-logout.php',$data);
		?>
		<div id="loader">
			<img src="<?php echo base_url();?>/slike/giphy.gif">
		</div>
		<div class="row content">
			<?php 
				$this->load->view('includes/left-banner.php'); 
			?>

			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					<div class="row">
						<div class="col-xs-12 padding-5">
							<div class="panel panel-default">
							  <div class="panel-body">
							    <h5>USPESNO STE PROMENILI VASU LOZINKU<h5>
							  </div>
							  <div class="panel-footer">
							  		<form name="novaSifra">
							  			<div class="form-group">
							  				<label for="sel1">Unesite novu sifru</label>
											<input type="password" name="sifra" align="center" style="margin-top: 5px"></input>
										</div>
							  			<div class="form-group">
											<label><input type="checkbox" name="sacuvaj" value="">Zadrzi sifru</label>
										</div>
										<div class="form-group">
											<input type="button" onclick="izmeni()" value="Sacuvaj izmene" align="center" style="margin-top: 5px"></input>
										</div>
							  		</form>
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