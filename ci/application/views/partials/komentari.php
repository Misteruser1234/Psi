<div class="row">
	<div class="col-sm-2">
		<img src="<?php echo base_url('img/restoran.jpg');?>" alt="..." class="img-thumbnail" id="userpic">
	</div>
	<div class="col-sm-7">
		<div class="h6" id="username">
            <?php echo $username; ?>
        </div>
		<div class="text py-1" id="komentar">
            <?php echo $komentar;?>
        </div>
	</div>
	<div class="col-sm-1-off h5 bg-succes">
	<div class="row h5 mx-0 my-2">
						<div class="my-1">Ocena:</div>
						<span class="tag text-white h5 ml-2 px-3 py-1 bg-success">
							<?php echo $ocena; ?>
						</span>			
					</div>
    </div>
</div>
<hr class="linija">
