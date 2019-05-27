<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" href="css/nav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/login.css">
		<title>Click and Chill</title>
	</head>
	<body>


<!-- NAVIGACIJA -->

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href="#">Click and Chill</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="mr-auto">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Restorani</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Kafici</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Brza hrana</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Napredna pretraga</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">O nama</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Kontakt</a>
				</li>
				
			</ul>
		</div>

		<!-- OVO JE DROPDOWN KOJI VIDE ULOGOVANI KORISNICI -->
		<div class="dropdown">
			<button class="btn btn-outline-light my-sm-0" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Username	<!-- OVDE TREBA UBACITI USERNAME KORISNIKA -->
				<i class="fas fa-user-cog"></i>
			</button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Podesavanja</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Logout</a>
			</div>
		</div>
			
	</div>
</nav>

<!-- END NAVIGACIJA -->