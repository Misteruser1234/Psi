<?php

class Gost extends CI_Controller {

	public function __construct() {
        parent::__construct();

    
	}
	
	//pomocna metoda koja sluzi za ucitavanje stranice posto nam se svaka stranica sadrzi iz tri dela
    private function prikazi($glavniDeo=NULL){
        $this->load->view("partials/header_gost.php");
		if ($glavniDeo != NULL) $this->load->view($glavniDeo);
        $this->load->view("partials/footer.php");
	}
	
	
	public function index(){
		$this->prikazi();
	}

	public function o_nama(){
		$this->prikazi("onama.php");
	}

	public function napredna_pretraga(){
		$this->prikazi("naprednaPretraga.php");
	}

	public function login(){
		$this->prikazi("login.php");
	}
    
}
