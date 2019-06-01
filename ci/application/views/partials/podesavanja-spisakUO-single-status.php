<div class="row px-3 pt-4">
					<div class="col"><input type="radio" name = "radio-status<?php echo($data->IDUO); ?>" id = "radio11" <?php if($data->Vidljivost == 1) echo('checked');?>> Vidljiva svima</div>
					<div class="col"><input type="radio" name = "radio-status<?php echo($data->IDUO); ?>" id = "radio12" <?php if($data->Vidljivost == 0) echo('checked');?>> Privatna </div>
				</div>