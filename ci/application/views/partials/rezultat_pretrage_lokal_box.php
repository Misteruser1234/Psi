<a href="<?php echo site_url('Gost/stranica_lokala');?>" class="a">
			<div class="row rez-uo rez-form jumbotron py-3" >
				<div class="row">
					<div class="col-md-3 slika">
						<div class="col-sm-12  slika-korisnika">
							<img class="img-fluid img-thumbnail w-100"  src="<?php echo base_url('img/restoran.jpg');?>" alt>
						</div>
					</div>
					<div class="col-md-9 mb-8 px">
						<div class="col-sm-12">
							<div class="col-sm">
								<div class="row">
									<div class=" col-sm-5">
										<div class="row">
											<div class="h4">
                                            <?php echo $naziv;?>
											</div>
										</div>
										<div class="row h5 mt-1">
											Ocena:
											<span class="tag text-white h6 ml-2 px-3 py-1 bg-success">
                                            <?php if($avgocena != NULL){ echo $avgocena;} else { echo '0';}?>
											</span>
										</div>
									</div>	
									
									<div class="col-sm-7">
										<div class="row">
											<div class="h6">
                                                <?php echo $adresa;?>
											</div>
										</div>
										<div class="row">
											<span class="tag h6 ml-2 px-3 py-1 bg-<?php if($jerestoran) {echo 'primary text-white';}else{echo 'light';}?>">
												Restoran
											</span>
											<span class="tag h6 ml-2 px-3 py-1 bg-<?php if($jekafic) {echo 'primary text-white';}else{echo 'light';}?>">
												Kafić
											</span>
											<span class="tag h6 ml-2 px-3 py-1 bg-<?php if($jebrzahrana) {echo 'primary text-white';}else{echo 'light';}?>">
												Brza hrana
											</span>
										</div>
									</div>		
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="row">
											<div class="h5">
												Radno vreme:
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="row">
													<div class="h6">
														pon-pet:
													</div>
												</div>	
												<div class="row">
													<div class="h6">
														subota:
													</div>
												</div>
												<div class="row">
													<div class="h6">
														nedelja:
													</div>
												</div>
											</div>
											<div class="col-sm-6">
											<div class="row">
												<div class="h6">
                                                    <?php echo $rv_ponpet;?>
												</div>
											</div>	
											<div class="row">
												<div class="h6">
                                                    <?php echo $rv_subota;?>
												</div>
											</div>
											<div class="row">
												<div class="h6">
                                                    <?php echo $rv_nedelja;?>
												</div>
											</div>
										</div>
										</div>
										
									</div>
									
									<div class="col-sm-7">
										<div class="row">
											<div class="h5">
												Opis:
											</div>
										</div>
										<div class="row">
											<p>
                                            <?php echo $opis;?>
											</p>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="h5 mr-2">
						Tagovi:   
					</div>						
					<span class="tag text-white bg-info h6 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h6 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h6 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h6 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h6 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h6 ml-1 px-3">
						Kafić
					</span>
				</div>	
			</div>
    </a> 

        

