<div class="row mt-3">
	<div class="h4"> Ostavite komentar:</div>
</div>
	<form id="komentar" action="<?php echo site_url('RK/dodaj_komentar') ?>">
		<div class="row mt-2">
			<div class="col-md-9">
				<div class="form-group">
					<textarea class="form-control granica-3" rows="6" id="comment" name="comment"></textarea>
				</div>
			</div>
			<div class="col-sm-2 ml-1 mr-5 justify-content-center">
				<div class="h5">Ocena:</div>
					<input type="text" style="width: 100px" class="form-control granica-3" id="ocena" maxlength="4">
						<div class="h5 mt-2">0.00-5.00</div>
				</div>
			</div>
			<div class="row mt-1 mb-5 justify-content-center">
				<div class="col-md-4 align-self-center">
					<button type="submit" class="btn btn-primary btn-block mb-5">Posalji</button>
				</div>
			</div>
		
	</form>