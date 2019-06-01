<div class="row px-3 pt-4">
				<div class="col-9"><?php echo $data->Naziv?></div>
				<div class="col-1"> <a href="<?php echo site_url('Gost/stranica_lokala/'.$data->IDUO);?>"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="<?php echo site_url('Vlasnik/brisi_UO/'.$data->IDUO); ?>"><i class="far fa-trash-alt"></i></a> </div>
			</div>