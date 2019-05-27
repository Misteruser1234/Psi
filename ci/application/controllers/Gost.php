<?php

class Gost extends CI_Controller {

	public function __construct() {
        parent::__construct();

    
	}
	
	//pomocna metoda koja sluzi za ucitavanje stranice posto nam se svaka stranica sadrzi iz tri dela
    private function prikazi(){
        $this->load->view("partials/header_gost.php");

        $this->load->view("partials/footer.php");
	}
	
	public function index(){
		$this->prikazi();
	}
    
}
