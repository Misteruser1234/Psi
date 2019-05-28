<?php

class RK extends CI_Controller {

	public function __construct() {
        parent::__construct();

    
	}
	
	//pomocna metoda koja sluzi za ucitavanje stranice posto nam se svaka stranica sadrzi iz tri dela
    private function prikazi($glavniDeo=NULL){
        $this->load->view("partials/header_ulogovan_korisnik.php");
		if ($glavniDeo != NULL) $this->load->view($glavniDeo);
        $this->load->view("partials/footer.php");
    }
    
    //dodaje submeni
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php"){
		$this->load->view("partials/header_ulogovan_korisnik.php");
        $this->load->view("podesavanja-prefix.php");
        $this->load->view($podStranica);
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }
	
	public function lp(){
		$this->load->view("partials/header_ulogovan_korisnik.php");
        $this->load->view("lp.php");
        $this->load->view("partials/rk_dp.php");
		$this->load->view("partials/footer.php");
	}

	public function index(){
		$this->lp();
    }
    
	public function o_nama(){
		$this->prikazi("onama.php");
	}

	public function napredna_pretraga(){
		$this->prikazi("naprednaPretraga.php");
	}

    public function spisak_uo(){
        $this->podesavanja("podesavanja-spisakUO.php");
    }

    public function dodaj_uo(){
        $this->podesavanja("podesavanja-FormaPodaciUO.php");
    }
    
    public function kontakt(){
		$this->prikazi("kontakt.php");
    }
    public function podaci_korisnika(){
        $this->podesavanja("podesavanja-PodaciKorisnika.php");
    }
}
