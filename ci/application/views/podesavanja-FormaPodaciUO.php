<div class="my-5 mx-5">
	<div class="h3 mt-5 mb-4">Podaci o ugostiteljskom objektu: </div>
	<form>
		<!-- NAZIV -->
		<div class="form-group row mb-1">
		<label for="naziv" class="col-sm-4 col-form-label text-right">Naizv:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control uo-polje" id="naziv" value="" required>
		</div>
		</div>

		<!-- ADRESA -->
		<div class="form-group row mb-1">
			<label for="adresa" class="col-sm-4 col-form-label text-right">Adresa:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control uo-polje" id="adresa" value="">
			</div>
		</div>

		<!-- GOOGLE MAPS -->
		<div class="form-group row mb-1">
			<label for="gmaps" class="col-sm-4 col-form-label text-right">Google maps:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control uo-polje" id="gmaps" value="">
			</div>
		</div>

		<!-- TIP UGOSTITELJSKOG OBJEKTA -->
		<div class="my-5 py-2 row jumbotron pl-3">
			<div class="h5 col-sm-4">Tip ugostiteljskog objekta: </div>
			<div class="col-sm-8">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="restoran" value="1">
					<label class="form-check-label" for="restoran">Restoran</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="kafic" value="2">
					<label class="form-check-label" for="kafic">Kafic</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="brza-hrana" value="3">
					<label class="form-check-label" for="brza-hrana">Brza hrana</label>
				</div>
			</div>
		</div>

		<!-- RADNO VREME -->
		<div class="py-2">
			<div class="h5">Radno vreme: </div>
			<div class="form-group row mb-1">
				<label for="naziv" class="col-sm-4 col-form-label text-right">Pon - Pet:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control uo-polje" id="pon-pet" value="">
				</div>
			</div>
			<div class="form-group row mb-1">
				<label for="adresa" class="col-sm-4 col-form-label text-right">Subota:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control uo-polje" id="subota" value="">
				</div>
			</div>
			<div class="form-group row mb-1">
				<label for="gmaps" class="col-sm-4 col-form-label text-right">Nedelja:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control uo-polje" id="nedelja" value="">
				</div>
			</div>
		</div>

		<!-- TAGOVI -->
		<div class="py-2">
			<div class="h5 my-4">Tagovi:</div>
			<div class="form-group">
				<div class="row jumbotron">
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Pice:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v1">
							<label class="form-check-label" for="s1v1">Craft pivo</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v2">
							<label class="form-check-label" for="s1v2">Kafa special</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v3">
							<label class="form-check-label" for="s1v3">Zestina</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v4">
							<label class="form-check-label" for="s1v4">Vina</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v5">
							<label class="form-check-label" for="s1v5">Kokteli</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v6">
							<label class="form-check-label" for="s1v6">Vitaminski napici</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v7">
							<label class="form-check-label" for="s1v7">Likeri</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v8">
							<label class="form-check-label" for="s1v8">Bezalkoholna pica</label>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Hrana:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v1">
							<label class="form-check-label" for="s1v1">Kuvana jela</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v2">
							<label class="form-check-label" for="s1v2">Dnevni meni</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v3">
							<label class="form-check-label" for="s1v3">Rostilj</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v4">
							<label class="form-check-label" for="s1v4">Pizza</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v5">
							<label class="form-check-label" for="s1v5">Obrok salate</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v6">
							<label class="form-check-label" for="s1v6">Pecenje</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v7">
							<label class="form-check-label" for="s1v7">Sushi</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v8">
							<label class="form-check-label" for="s1v8">Sendvici</label>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Ambijent:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v1">
							<label class="form-check-label" for="s1v1">Basta</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v2">
							<label class="form-check-label" for="s1v2">Pogled</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v3">
							<label class="form-check-label" for="s1v3">Reka</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v4">
							<label class="form-check-label" for="s1v4">Centar</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v5">
							<label class="form-check-label" for="s1v5">Balkon</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v6">
							<label class="form-check-label" for="s1v6">Ziva svirka</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v7">
							<label class="form-check-label" for="s1v7">Chill</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v8">
							<label class="form-check-label" for="s1v8">Splav</label>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Extra:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v1">
							<label class="form-check-label" for="s1v1">WiFi</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v2">
							<label class="form-check-label" for="s1v2">Pet Frendly</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v3">
							<label class="form-check-label" for="s1v3">Parking</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v4">
							<label class="form-check-label" for="s1v4">Baby oprema</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v5">
							<label class="form-check-label" for="s1v5">No Smoking zona</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v6">
							<label class="form-check-label" for="s1v6">Dostava</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v7">
							<label class="form-check-label" for="s1v7">Happy hour</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v8">
							<label class="form-check-label" for="s1v8">TV</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SLIKE -->
		<div class="py-2">
			<div class="h5 mb-5">Slike: </div>

			<!-- PRVI RED SLIKA -->
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
			</div>

			<!-- DRUGI RED SLIKA -->
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
			</div>

			<!-- TRECI RED SLIKA -->
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php echo base_url('img/restoran.jpg') ?> " alt="">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"></input>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- OPIS -->
		<div class="pt-5 pb-2">
				<div class="h5 mb-3">Opis:</div>
				<textarea class="w-100 ml-3" name="opis" id="opis" rows="10"></textarea>
		</div>

		<!-- IZDVAJAMO SA MENIA -->
		<div class="pt-5 pb-2">
			<div class="h5 mb-3">Izdvajamo sa menia:</div>
			<textarea class="w-100 ml-3" name="info1" id="info1" rows="10"></textarea>
		</div>

		<!-- PO CEMU SE RAZLIKUJEMO OD DRUGIH -->
		<div class="pt-5 pb-2">
				<div class="h5 mb-3">Po cemu se razlikujemo od drugih:</div>
				<textarea class="w-100 ml-3" name="info2" id="info2" rows="10"></textarea>
		</div>

		<!-- ZASTO TREBA DA DODJETE KOD NAS -->
		<div class="pt-5 pb-2">
			<div class="h5 mb-3">Zasto treba da dodjete kod nas:</div>
			<textarea class="w-100 ml-3" name="info3" id="info3" rows="10"></textarea>
		</div>

		<div class="row py-5">
			<div class="col-md-6">
					<button class="btn btn-primary w-100 my-3 py-3">
						<i class="fas fa-save mx-2"></i>
						Sacuvaj izmene
					</button>
			</div>
			<div class="col-md-6">
					<button class="btn btn-primary w-100 my-3 py-3">
						<i class="fas fa-eraser mx-2"></i>
						Odbaci izmene
					</button>
			</div>
		</div>

	</form>
</div>	
