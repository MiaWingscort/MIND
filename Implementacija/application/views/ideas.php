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
	<?php

			$sess = $this->session->userdata('logged_in');
			$tip= $sess['tip_korisnika'];

			$nizUlaza = array();
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url(), "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			if($tip=="A")
			{
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "UklanjanjeKorisnika", "naziv"=>"Ukloni korisnika");
			}
			if($tip=="P")
			{
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "reklamiranje", "naziv"=>"Postavite reklamu");
			}
			if($tip=="I")
			{

				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Generators", "naziv"=>"Generator");
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "pretraga", "naziv"=>"Pretraga korisnika");
			}
			if($tip=="A" || $tip=="P" || $tip=="I")
			{
				$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "PregledProfila", "naziv"=>"Moj profil");
				$data['nizUlaza']=$nizUlaza;
				$this->load->view('includes/header-logout.php',$data);
			}
			else
			{
				$data['nizUlaza']=$nizUlaza;
				$this->load->view('includes/header-login.php',$data);
			}
		?>
		<div class="row content">
			<?php 
				$this->load->view('includes/left-banner.php'); 
			?>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="main" class="col-xs-12">	
					
					<div class="row">
						<div id="ideje" class="col-xs-0">
						<?php 
								$sess = $this->session->userdata('logged_in');
								$tip= $sess['tip_korisnika'];
								if($tip=="A")
								{
									echo "<tr>
											<td colspan=\"2\" align=\"center\" >
												<form method=\"post\" action=\"" . base_url() . "Ideje/nova\" >
													<input type=\"submit\" style=\"color:#e60000; margin:2px;\"  value=\"Dodaj novu ideju\"></input>
												</form>
											</td>
										</tr>";
								}
						?>
							<table style="margin-left: 30px; margin-right: 30px;">								
								<?php
									foreach ($resultset as $result) {
										echo "<tr>
												<td class=\"title\" colspan=\"1\"><a href='Ideje/otvoriIdeju/" . $result['SifIdeja']."'>" . $result['Naziv'] . "
												</td>	
										</tr>
										<tr>
											<td colspan=\"3\" class=\"col-xs-6\">
												<div>
													<img src=" . $result['PutanjaDoSlike'] . ">
													<p align=\"justify\">" . $result['Tekst'] . "</p>
												</div>
											</td>
										</tr>";
								echo "<tr>
								<td colspan=\"2\">
										&nbsp;
									</td>
									<td colspan=\"2\">
										&nbsp;
									</td>
								</tr>";

								$sess = $this->session->userdata('logged_in');
								$tip= $sess['tip_korisnika'];
								if($tip=="A")
								{
									echo "<tr>
										<td align=\"center\">
											<span class=\"glyphicon glyphicon-remove\"></span>
											<span style=\"color:#e60000;\"><a href=\"Ideje/obrisi/". $result['SifIdeja']."\" onclick=\" return  confirm('Da li ste sigurni da zelite da obrisete ideju?')\">Obrisi</span>
										</td>
										<td align=\"center\">
											<span class=\"glyphicon glyphicon-pencil\"></span>
											<span style=\"color:#e60000;\"><a href=\"Ideje/uredi/" . $result['SifIdeja']. "\"> Uredi</span>
										</td>
										<td>
											
										</td>
									</tr>";
								}
							}
						?>

							</table>
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