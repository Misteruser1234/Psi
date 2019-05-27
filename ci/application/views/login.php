<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="login-content">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<form class="jumbotron col-lg-4 col-sm-6 col-10 offset-lg-4 offset-sm-3 offset-1 login-form">
				<div class="form-group">
					<div class="h3 text-center mb-4">User login</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Korisnicko ime:</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Lozinka:</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
				</div>	
				<div class="row mt-4">
					<div class="col text-left">Nemate nalog?</div>
					<div class="col text-right">
						<a href="#" class="text-right" ><i>Registruj se!<i></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>