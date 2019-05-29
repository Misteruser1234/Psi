<div class="row mt-3">
	<div class="h4"> 
		Ostavite komentar:
	</div>
</div>
<form id="komentar" action="<?php echo site_url('RK/upis_komentara') ?>" method="post">
	<div class="row mt-2">
		<div class="col-md-9">
			<div class="form-group">
				<textarea class="form-control granica-3" name="comment" rows="6" id="comment"></textarea>
			</div>
		</div>
		<div class="col-sm-1 ml-1 mr-5 justify-content-center">
			<div class="h5">
					Ocena:
			</div>
			<select class="form-control" name="ocena" id="exampleFormControlSelect1">
     			 <option>1</option>
     			 <option>2</option>
    			 <option>3</option>
     			 <option>4</option>
    			 <option>5</option>
    		</select>
		</div>
	</div>
	<div class="row mt-1 mb-5 justify-content-center">
		<div class="col-md-4 align-self-center">
			<button type="submit" class="btn btn-primary btn-block mb-5">Posalji</button>
		</div>
	</div>
		
</form>

