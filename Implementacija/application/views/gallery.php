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
	#profilePicture {
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

			$sess = $this->session->userdata('logged_in');
			$tip= $sess['tip_korisnika'];

			$nizUlaza = array();
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url(), "naziv"=>"Početna strana");
			$nizUlaza[] = array("active"=>TRUE, "adresa"=> base_url() . "Galerija", "naziv"=>"Galerija");
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Ideje", "naziv"=>"Ideje");
			if($tip!="A")
			{
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "Kontakt", "naziv"=>"Kontakt");
			}
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
						<div id="galerija" class="col-xs-12">
							
							<?php 
							foreach ($resultset as $result) {
								if($result['Odobrena']>0)
								{
									echo "<div class=\"col-lg-4 col-md-6 col-xs-12 thumb\"><a class=\"thumbnail\" href=\"#\">
					                    <img class=\"img-responsive\" style=\"width: auto;height:200px;\" src=\"" . $result['PutanjaDoSlike'] ."\" alt=\"\">
					                </a>
					                </div>";
					            }
							}
				               
				            ?>
						</div>
					</div>

					<?php
						$sess = $this->session->userdata('logged_in');
						$tip= $sess['tip_korisnika'];
						if($tip=="I")
						{
							echo "<tr>
								<td colspan=\"2\" align=\"center\">
									<form method=\"post\" action=\""  . base_url() . "Galerija/dodaj\" >
							<input type=\"submit\" style=\"color:#e60000;\" value=\"Dodaj sliku poklona\"></input>
						</form>
						</td>
						</tr>";
						}
				?>
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