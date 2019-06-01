<div class="row px-3 pt-4">
		<div class="col"><input type="radio" name = "radio-status<?php echo($data->IDUO); ?>" id = "radio11" <?php if($data->Vidljivost == 1) echo('checked');?>> <a class="a" href="<?php echo site_url('Vlasnik/postavi_vidljiva/'.$data->IDUO);?>"> Vidljiva svima</a> </div>
		<div class="col"><input type="radio" name = "radio-status<?php echo($data->IDUO); ?>" id = "radio12" <?php if($data->Vidljivost == 0) echo('checked');?>> <a class="a" href="<?php echo site_url('Vlasnik/postavi_privatna/'.$data->IDUO);?>"> Privatna </a> </div>
	</div>