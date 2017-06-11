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
			$nizUlaza[] = array("active"=>FALSE, "adresa"=> base_url() . "contact.php", "naziv"=>"Kontakt");
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
				<?php echo form_open_multipart(base_url()."Ideje/dodajSliku/" . $SifIdeja, array('name' => 'sacuvajIdeju', 'class' => 'form-horizontal', 'method'=>"POST"))?>
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
									
									<td align="right" class="col-xs-6">
											 <label for="files" class="btn" style="border: 1px solid #e60000; color: #e60000">Izaberi sliku</label>
											 <input id="files" type="file" style="display:none;" name="userfile" size="4096" />
										</td>
									</tr>
								<tr>
									<td class="col-xs-12 col-md-8" rowspan="1" colspan="2">
										<label for="comment">Opis ideje:</label>
										<textarea class="form-control" rows="10" name='tekst' id="comment"> <?php
										echo "$Tekst"; ?></textarea>
									</td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td colspan="2" align="center">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<span class="glyphicon glyphicon-floppy-disk"></span>
										<input type="button" onclick="sacuvajIdeju.submit()" value="Sacuvaj ideju"></input>
									</td>
								</tr>
							</table>
						</div>
						</form>
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

