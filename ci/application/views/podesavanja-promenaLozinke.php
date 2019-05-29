<!-- PROMENA LOZINKE -->
<div class="my-10 mx-10">
    <div class="h3 mt-5 mb-4">Promena Lozinke: </div>
    <form name="pass_change_form" action="<?php echo site_url('RK/promeni_password') ?>" method="post" >
        <div class="form-group row mb-1 mt-5">
        <label for="oldpass" class="col-sm-4 col-form-label text-right">Unesite staru lozinku:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control uo-polje" id="oldpass" value="">
        </div>
        <div class='text-center' style='color:red; height:24px;'>
			<?php if (isset($oldpassporuka)) echo "Neispravni podaci!"; ?>
		</div>
        </div>
            <div class="form-group row mb-1 mt-5">
        <label for="newpass" class="col-sm-4 col-form-label text-right">Unesite novu lozinku:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control uo-polje" id="newpass" value="">
        </div>
        </div>
            <div class="form-group row mb-1 mt-5">
        <label for="oldpass" class="col-sm-4 col-form-label text-right">Potvrdite novu lozinku:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control uo-polje" id="confnewpass" value="">
        </div>
        </div>
    <div class="form-group row mb-1 mt-5 justify-content-center">
        <button type="submit" class="btn btn-primary w-100 mt-3 col-sm-4">Promeni</button>
    </div>
    
    </form>
</div>