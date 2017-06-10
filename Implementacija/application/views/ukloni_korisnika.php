
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tajanstveni Deda Mraz</title>

	<link href=<?php echo base_url() . "css/bootstrap.css"?> rel="stylesheet">
	<link href=<?php echo base_url() . "css/mindCSS.css"?>  rel="stylesheet">
	<meta charset="UTF-8">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		body {
			background: url('./slike/background.jpg');
			color: #ffffff;
		}
	</style>



</head>
<body >
	<div class="container-fluid">
		<?php
			$this->load->view('includes/header-admin.php');
		?>
		<div class="row content">
			<?php 
				$this->load->view('includes/left-banner.php'); 
			?>

			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="padding-10" class="col-xs-12">	
					<div class="row">
						<div id="kontakt" class="col-xs-12 col-md-4">
							<div class="panel panel-default">
								<div class="panel-body">
									<h5>IZABERITE KORISNIKA</h5>
								</div>
							  	<div class="panel-footer">
									<form action="/ci/UklanjanjeKorisnika/ukloni" method="POST" class="form-horizontal">
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="pwd">E-mail</label>
									    <div class="col-sm-8"> 
									      <input type="email" class="form-control" id="pwd" name="email" placeholder="">
									    </div>
									  </div>
									  <div class="form-group">
									  	<div class="col-sm-offset-8 col-sm-3">
										  <button type="submit" class="btn btn-default" style="color: #e60000">UKLONI</button>
									    </div>
									  </div>
								 	</form>
								 	<?php 
								 		$this->load->view('includes/error.php');
								 	?>
							  	</div>				
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
						<div class="panel panel-default">
								<div class="panel-body">
									<h5>LISTA KORISNIKA</h5>
								</div>
							  	<div class="panel-footer">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>E-mail</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
										<?php
											foreach ($korisnici as $korisnik) {
												echo "<tr>" .
														"<td>" .
															$korisnik->SifKor .
														"</td>" .
														"<td>" .
															$korisnik->{'E-mail'} .
														"</td>" .
														"<td>" .
															$korisnik->Zabranjen .
														"</td>" .
													 "</tr>";
											}
										?>
										</tbody>
									</table>
							  	</div>				
							</div>
					</div>
					</div>
					
				</div>
				<div class="row bottomBanner">
					<img src="./slike/poklonshop.png">
				</div>
			</div>
			<?php 
				$this->load->view('includes/right-banner.php'); 
			?>
		</div>
	</div>
</body>
</html>