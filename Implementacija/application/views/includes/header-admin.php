<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
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
</style>

</head>

<body>
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
					      <a href="#" class="navbar-left"><img src="./slike/animated_logo.gif"></a>
					      <a class="navbar-brand christmas" href="#" style="height: 100%; padding: 5px;">
					      	<img src="./slike/logoTekst.png" style="height: 60px; margin: 0 auto">
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
				      <li><a href="profile.html">Moj Profil</a></li>
				      <li><a href="gallery.html">Galerija</a></li>
				      <li><a href="#">Ideje</a></li>
				      <li><a href="contact.html">Kontakt</a></li>
				      <li class="active"><a href="-">Ukloni korisnika</a></li>
				    </ul>
				  </div>
				</nav>
			</div>
		</div>
	</div>
</body>
</html>