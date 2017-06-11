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
				      <a class="navbar-brand christmas" href="#" style="padding: 5px;">
				      	<img src="<?php echo base_url();?>/slike/logoTekst.png" style="height: 60px; margin: 0 auto">
				      </a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav navbar-right">
				      	<li>	
				      		<div class="row">
					      		<form name="loginForm" class="form-inline" action="/ci/login" style="padding: 10px" method="POST">
								    <div class="form-group">
								      <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required="true">
								    </div>
								    <div class="form-group">
								      <input type="password" class="form-control" id="password" placeholder="Lozinka" name="password" required="true">
								    </div>
								</form>
				      		</div>
				      		<div class="row" align="right">
				      			<form name="zaboravljenaForm" action="/ci/zaboravljenaSifra" method="POST">
				      				<a onclick="zaboravljenaForm.submit();" href="#">Zaboravi li ste lozinku?</a>
				      			</form>
				      		</div>
						</li>
				        <li onclick="loginForm.submit();"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Prijavi se</a></li>
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