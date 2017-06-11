<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
	<div class="row header">
		<div class="col-xs-12">
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
					   <div>
					   		<form name="logoutForm" action="/ci/login/logout"></form>
					   </div>
					   <div class="collapse navbar-collapse" id="myNavbar">
					      <ul class="nav navbar-nav navbar-right">
					         <li onclick="logoutForm.submit();"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Odjavi se</a></li>
					      </ul>
					   </div>
					</div>
				</nav>
			</div>

			<div class="row">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <ul class="nav navbar-nav">
				    	<?php 
							$data['nizUlaza']=$nizUlaza;
							$this->load->view('includes/glavniMeni.php', $data);
						?>
				    </ul>
				  </div>
				</nav>
			</div>
		</div>
	</div>
</html>