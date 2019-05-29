<div class="register-content">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<form class="jumbotron py-4 col-lg-4 col-sm-6 col-10 offset-lg-4 offset-sm-3 offset-1 register-form">
				<div class="form-group">
					<div class="h3 text-center">Register</div>
				</div>
				<div class="form-group">
					<label for="user">Korisnicko ime:</label>
					<input type="text" class="form-control" id="user" placeholder="">
				</div>
				<div class="form-group">
					<label for="lozinka">Lozinka:</label>
					<input type="password" class="form-control" id="lozinka" placeholder="">
				</div>
				<div class="form-group">
						<label for="potvrda">Potvrda lozinke:</label>
						<input type="password" class="form-control" id="potvrda" placeholder="">
				</div>
				<div class="form-group">
						<label for="tipKorisnika">Tip korisnika:</label>
						<div>
							<label> 
									&nbsp &nbsp
									<input type="radio" name="tipKorisnika" id="standardni" value="1" checked>
								Standardni korisnik
							</label>
						</div>
						<div>
							<label> 
									&nbsp &nbsp
									<input type="radio" name="tipKorisnika" id="vlasnik" value="2">
								Vlasnik ugostiteljskog objekta
							</label>
						</div>
						
						
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary w-100">Register</button>
				</div>	
				
			</form>
		</div>
	</div>
</div>