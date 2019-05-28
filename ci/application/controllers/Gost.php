<?php

class Gost extends CI_Controller {

	public function __construct() {
        parent::__construct();

    
	}

	// Dodavanje nove stranice:
	// 1. Html fajl kopirati u views folder, obrisati header i footer i rename u .php
	// 2. Ako postoji css fajl njega kopirati u psi/ci/css folder i dodati ime css fajla u 
	//    niz css fajlova koji se nalazi u header fajlovima -> views/partials/head_...
	// 3. U controleru (Gost i/ili RK) napraviti funkciju za prikaz
	// 4. Dodati link gde treba (pogledati u header fajlovima nav linkove) 
	
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
