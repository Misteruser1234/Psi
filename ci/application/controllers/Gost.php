<?php

class Gost extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model("ModelKorisnik");

    
	}

	// Dodavanje nove stranice:
	// 1. Html fajl kopirati u views folder, obrisati header i footer i rename u .php
	// 2. Ako postoji css fajl njega kopirati u psi/ci/css folder i dodati ime css fajla u 
	//    niz css fajlova koji se nalazi u header fajlovima -> views/partials/head_...
	// 3. U controleru (Gost i/ili RK) napraviti funkciju za prikaz
	// 4. Dodati link gde treba (pogledati u header fajlovima nav linkove) 
	
	//pomocna metoda koja sluzi za ucitavanje stranice posto nam se svaka stranica sadrzi iz tri dela
    private function prikazi($glavniDeo=NULL, $data=NULL){
        $this->load->view("partials/header.php");
		if ($glavniDeo != NULL) $this->load->view($glavniDeo, $data);
        $this->load->view("partials/footer.php");
	}
	
	public function lp(){
		$this->load->view("partials/header_lp.php");
		$this->load->view("lp.php");
		$this->load->view("partials/gost_dp.php");
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

	public function login(){
		$this->prikazi("login.php");
	}
	
	public function kontakt(){
		$this->prikazi("kontakt.php");
	}

	public function loginGreska(){
		$podaci['poruka'] = "Neispravni podaci!";
		$this->prikazi('login.php',$podaci);
	}

	public function ulogujse(){
		$korisnikPostoji = $this->ModelKorisnik->korisnikPostoji($this->input->post('username'));
		
		if ($korisnikPostoji) {
			$passwordIspravan = $this->ModelKorisnik->ispravanPassword($this->input->post('password'));
			if ($passwordIspravan){
				$korisnik = $this->ModelKorisnik->korisnik;
				print_r($this->session);
				
				$this->session->set_userdata('username',$korisnik->Username);
				$this->session->set_userdata('tip',$korisnik->Tip);
				redirect("Gost");
			}
		}
		$this->loginGreska();
	}

	public function rezultat_pretrage(){
        $this->prikazi("rezultatPretrage.php");
	}
	public function stranica_lokala(){
		$this->prikazi("stranicaLokala.php");
	}
}
