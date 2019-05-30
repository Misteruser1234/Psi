<div class="container" style="border:1px solid black;">
	<input type="hidden" id="uoid" name="uoid" value="0">
	<!-- GALERIJA -->
	<div class="row mt-5 mb-1 ml-2">
		<div class="col-5 ">
		</div>
		<!-- INFO -->
		<div class="col-7">
			<div>
				<div class="ml-5" >
					<div class="row">
						<div class="col-sm-6">
							<div class="h3" id="naziv-ocena-lokala">Naziv Lokala &#40 Ocena &#41</div>
							<div class="row mt-4">
								<div class="col-sm">
									<div class="h4" id="ulica-lokala">Ulica i broj</div>
								</div>
							</div>
							<div class="row mt-4 mb-1">
								<div class="col-sm-4 ">
									<button type="button" class="btn btn-success btn-block granica-dugme" id="restoran">Restoran</button>
								</div>
								<div class="col-sm-4">
									<button type="button" class="btn btn-success btn-block granica-dugme" id="kafic">Kafic</button>
								</div>
								<div class="col-sm-4">
									<button type="button" class="btn btn-success btn-block granica-dugme" id="brza">Brza Hrana</button>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-sm">
									<div class="h4" id="radno">Radno vreme:</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-sm">
									<div class="h5" id="radno-vreme-pon">pon-pet: od 09 do 23</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-sm">
									<div class="h5" id="radno-vreme-pon">sub: od 09 do 23</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-sm">
									<div class="h5" id="radno-vreme-pon">ned: od 09 do 23</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6"><img class="img-fluid padding-right-5" src="<?php echo base_url('img/restoran.jpg');?>"  alt="First slide"></div>
					</div>
					
					<!-- TAGOVI -->
					<div class="row mt-2">
						<div class="col-sm-1 h3 mt-2">Tagovi:</div>
						<div class="col-sm-10 mt-2 ml-5">
							<div class="row">
								<div class="col-sm-3 "><button type="button" class="btn btn-light btn-block granica-dugme-2" id="tag1">Tag1</button></div>
								<div class="col-sm-3"><button type="button" class="btn btn-light btn-block granica-dugme-2" id="tag2">Tag2</button></div>
								<div class="col-sm-3"><button type="button" class="btn btn-light btn-block granica-dugme-2" id="tag3">Tag3</button></div>
								<div class="col-sm-3"><button type="button" class="btn btn-light btn-block granica-dugme-2" id="tag4">Tag4</button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- HEADER STRANICE LOKALA -->
<div class="container">
	<div class="row rez-uo rez-form jumbotron py-3" >
		<div class="row">

			<!-- LEVI DEO ZAGLAVLJA -->
			<div class="col-md-5 pr-5 pl-0">
				<!-- CAROUSEL -->
				<div id="carouselExampleControls" class="carousel slide  granica" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="<?php echo base_url('img/restoran.jpg');?>" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo base_url('img/restoran.jpg');?>" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo base_url('img/restoran.jpg');?>" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!-- END CAROUSEL -->
			</div>
			<!-- END LEVI DEO ZAGLAVLJA -->


			<!-- DESNI DEO ZAGLAVLJA -->
			<div class="col-md-7 mb-8 px">
				
				<!-- NAZIV LOKALA I OCENA -->
				<div class="row">
					<div class="h4">
						Naziv lokala
						<span class="tag h6 py-1 text-white ml-2 px-3 bg-success">XX.X</span>	
					</div>
				</div>
				<!-- END NAZIV LOKALA I OCENA -->
				
				<div class="row">
					<div class="col-sm-7">
						<!-- ADRESA -->
							<div class="row mb-2">
								<div class="h6">Adresa XX</div>
							</div>	
						<!-- END ADRESA -->

						<!-- TAG VRSTA UO -->
						<div class="row mb-2">
							<span class="tag mr-2 px-3 bg-primary text-white">Kafić</span>
							<span class="tag mr-2 px-3 bg-light">Restoran</span>
							<span class="tag mr-2 px-3 bg-light">Brza hrana</span>
						</div>
						<!-- END TAG VRSTA UO -->

						<!-- RADNO VREME BLOCK -->
						<div class="row">
							<div class="h5">Radno vreme:</div>
						</div>
						<div class="row mb-2">
							<div class="h6 col-sm-6">pon-pet:</div>
							<div class="h6 col-sm-6">9:00 - 23:00</div>
							<div class="h6 col-sm-6">subota:</div>
							<div class="h6 col-sm-6">9:00 - 23:00</div>
							<div class="h6 col-sm-6">nedelja:</div>
							<div class="h6 col-sm-6">9:00 - 23:00</div>
						</div>
						<!-- END RADNO VREME BLOCK -->
					</div>
					<div class="col-sm-5">
						<div class="">
							<img class="img-fluid img-thumbnail w-100"  src="<?php echo base_url('img/restoran.jpg');?>" alt>
						</div>
					</div>
				</div>
				<!-- TAGOVI -->
				<div class="row mt-2">
					<span class="h5 mr-2">Tagovi:</span>						
					<span class="tag text-white bg-info h6 mr-1 px-3">Bezalkoholna pica</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Likeri</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Vitaminski napici</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Kokteli</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Vina</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Zestina</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Kafa special</span>
					<span class="tag text-white bg-info h6 mr-1 px-3">Craft pivo</span>
				</div>
				<!-- END TAGOVI -->

				<div class="col-sm-12">
					<div class="col-sm">
						<div class="row">
							<div class=" col-sm-5">
								
								
							</div>	
							
							<div class="col-sm-7">
								
								
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-5">

							

							</div>
							
							<div class="col-sm-7">
								
								
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
	</div>
</div>

<div class="container" style="border:1px solid black;">
		<!--THUMBNAILOVI-->
		
		<div class="row ml-5 mr-5 mt-5 mb-5 justify-content-center">
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-1"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-2"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-3"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-4"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-5"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-6"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-7"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-8"></a></div>
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-9"></a></div>
		</div>
		
		
		
		
		<!--Opis-->
		
		<div class="jumbotron mt-5 mb-5 ml-5 mr-5">
				<div class="h3">Opis:</div>
				<div id="opis"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
		
		</div>
		<!--OSTALE-->
		<div class="row mt-5 mb-5 ml-5 mr-5 justify-content-center">
			<div class="col-sm-3 ml-4 mr-4 jumbotron">
				<div >
					<div class="h3">Izdvajamo sa menija:</div>
					<div class="mt-3 text-center" id="samenija">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi</div>
				</div>
			</div>
			<div class="col-sm-3 ml-4 mr-4 jumbotron">
				<div >
					<div class="h3">Po cemu se razlikujemo od drugih:</div>
					<div class="mt-3 text-center" id="razlike">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi</div>
				</div>
			</div>
		<div class="col-sm-3 ml-4 mr-4 jumbotron">
				<div >
					<div class="h3">Zasto da dodjete kod nas:</div>
					<div class="mt-3 text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi</div>
				</div>
			</div>
				
		</div>
		
		
		<!--Komentari-->
		
		
		<div class="containter-fluid mb-5 ml-5 mr-5 mt-5 justify-content-center">
			<div class="h2 mb-4" > Komentari:</div>
			
			<div class="row">
					<div class="col-sm-2">
						<img src="<?php echo base_url('img/restoran.jpg');?>" alt="..." class="img-thumbnail" id="userpic">
					</div>
					
					<div class="col-sm-7">
						<div class="h3" id="username">USERNAME</div>
						<div class="text" id="komentar">asdihoasihdoiahsofhsfoghiaosfigpoahfsgoahifoghaofhjoafhaipjhpojafhpojapdohjpofaj[oiahpguhafgph</div>
					</div>
					
					<div class="col-sm-1-off h5">Ocena:X.XX</div>
			
			</div>
			
			<hr class="linija">
				<div class="row">
					<div class="col-sm-2">
						<img src="<?php echo base_url('img/restoran.jpg');?>" alt="..." class="img-thumbnail" id="userpic">
					</div>
					
					<div class="col-sm-7">
						<div class="h3" id="username">USERNAME</div>
						<div class="text" id="komentar">asdihoasihdoiahsofhsfoghiaosfigpoahfsgoahifoghaofhjoafhaipjhpojafhpojapdohjpofaj[oiahpguhafgph</div>
					</div>
					
					<div class="col-sm-1-off h5">Ocena:X.XX</div>
			
			</div>
			<hr class="linija">
			
			<!--OSTAVLJANJE KOMENTARA FORMA-->
			
			<?php 
			if ($this->session->userdata("tip") != NULL) 
				$this->load->view("partials/link-stranicaLokala-Komentari.php");
			?>
		
</div>