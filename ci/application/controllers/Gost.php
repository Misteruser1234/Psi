<?php

class Gost extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model("ModelKorisnik");
		$this->load->model("ModelLokal");
		$this->load->model("ModelKomentar");
    
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
	public function stranica_lokala($IDUO){
		$this->load->view("partials/header.php");
		$this->load->view("stranicaLokala.php");

		#Ucitavanje komentara
		$komentari = $this->ModelKomentar->dohvatiKomentareZaUO($IDUO);
		foreach ( $komentari as $komentar ) $this->load->view("partials/komentar.php", $komentar);

		#Ucitavanje forme za ostavljanje komentara
		if ($this->session->userdata("tip") != NULL) $this->load->view("partials/link-stranicaLokala-Komentari.php");
		
		#$this->prosecna_ocena();
		#$this->load->view("partials/komentari-prefix.php");
		#$this->load->view("partials/komentari.php");
		#$this->ispis_komentara();
		#$this->load->view("partials/komentari-postfix.php");
		
		$this->load->view("partials/footer.php");
	}

	public function registracija(){
		$this->prikazi("register.php");
	}

	public function registerGreska($tip, $data){
		$podaci = [];
		if (isset($tip['username'])){
			if ($tip['username'] == 'empty') $poruka['username']   = "Polje ne sme biti prazno!";
			if ($tip['username'] == 'postoji') $poruka['username'] = "Korisnik sa unetim username vec postoji!";
		}		

		if (isset($tip['emptypass'])) $poruka['password']   = "Polje ne sme biti prazno!";

		if (isset($tip['confirm'])){
			if ($tip['confirm'] == 'empty') 	$poruka['confirm']   = "Polje ne sme biti prazno!";
			if ($tip['confirm'] == 'razlicito') $poruka['confirm']   = "Unete sifre se razlikuju";
		}	
		
		$this->prikazi('register.php', array ('data'=>$data, 'poruka'=>$poruka));
	}

	public function reg(){
		// VALIDACIJA FORME
		$error = [];
		$data  = [];

		if (!$this->input->post('username')) $error['username'] = "empty";
		else $data['username'] = $this->input->post('username');

		if (!$this->input->post('password')) $error['emptypass'] = TRUE;
		else $data['password'] = $this->input->post('password');

		if (!$this->input->post('passwordconfirm'))	$error['confirm'] = "empty";

		if ( $this->input->post('passwordconfirm') != $this->input->post('password')) $error['confirm'] = "razlicito";

		$korisnikPostoji = $this->ModelKorisnik->korisnikPostoji($this->input->post('username'));
		if ($korisnikPostoji) $error['username'] = "postoji";

		if ( count($error) > 0 ) $this->registerGreska($error, $data);
		else {
			//Ubacivanje u bazu
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$confirmpass = $this->input->post('passwordconfirm');
			$tip = $this->input->post('tipKorisnika');

			$this->ModelKorisnik->dodajKorisnika($username, $password, $tip);

			$this->load->view("partials/header.php");
			$this->load->view("partials/poruka-register.php");
			$this->load->view("partials/footer.php");

			header('Refresh: 3; URL=http://localhost/psi/ci/index.php/Gost/login');
		}
	}
	
	public function naprednaPretraga(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$values = $this->pokupiPodatke();
		$pice = $values[0];
		$hrana = $values[1];
		$ambijent = $values[2];
		$ekstra = $values[3];

		$query = $this->ModelLokal->naprednaPretragaLokala($pice,$hrana,$ambijent,$ekstra);
		foreach($query->result() as $row){
			if( ($row->Pice & $pice) > 0 || ($row->Hrana & $hrana) > 0 || ($row->Ambijent & $ambijent) > 0 || ($row->Ekstra & $ekstra) > 0){
				if($row->Vidljivost != 0){
					$data['slika'] = site_url('Gost/stranica_lokala');
					$data['naziv'] = $row->Naziv;
					$data['avgocena'] = $row->AvgOcena;
					$data['adresa'] = $row->Adresa;
					$data['rv_ponpet'] = $row->PonPet;
					$data['rv_subota'] = $row->Sub;
					$data['rv_nedelja'] = $row->Ned;
					$data['opis'] = $row->Opis;
					$data['jerestoran'] = $row->JeRestoran;
					$data['jekafic'] = $row->JeKafic;
					$data['jebrzahrana'] = $row->JeBrzaHrana;

					$this->load->view("partials/rezultat_pretrage_lokal_box.php",$data);
				}
			}
		}
		
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}

	public function pokupiPodatke(){
		$pice1 = $this->input->post('s1v1');
        $pice2 = $this->input->post('s1v2');
        $pice3 = $this->input->post('s1v3');
        $pice4 = $this->input->post('s1v4');
        $pice5 = $this->input->post('s1v5');
        $pice6 = $this->input->post('s1v6');
        $pice7 = $this->input->post('s1v7');
		$pice8 = $this->input->post('s1v8');
		
		$hrana1 = $this->input->post('s2v1');
        $hrana2 = $this->input->post('s2v2');
        $hrana3 = $this->input->post('s2v3');
        $hrana4 = $this->input->post('s2v4');
        $hrana5 = $this->input->post('s2v5');
        $hrana6 = $this->input->post('s2v6');
        $hrana7 = $this->input->post('s2v7');
		$hrana8 = $this->input->post('s2v8');
		
		$ambijent1 = $this->input->post('s3v1');
        $ambijent2 = $this->input->post('s3v2');
        $ambijent3 = $this->input->post('s3v3');
        $ambijent4 = $this->input->post('s3v4');
        $ambijent5 = $this->input->post('s3v5');
        $ambijent6 = $this->input->post('s3v6');
        $ambijent7 = $this->input->post('s3v7');
		$ambijent8 = $this->input->post('s3v8');
		
		$ekstra1 = $this->input->post('s4v1');
        $ekstra2 = $this->input->post('s4v2');
        $ekstra3 = $this->input->post('s4v3');
        $ekstra4 = $this->input->post('s4v4');
        $ekstra5 = $this->input->post('s4v5');
        $ekstra6 = $this->input->post('s4v6');
        $ekstra7 = $this->input->post('s4v7');
		$ekstra8 = $this->input->post('s4v8');
		
		$pice = $pice1 + $pice2 + $pice3 + $pice4 + $pice5 + $pice6 + $pice7 + $pice8;
		$hrana = $hrana1 + $hrana2 + $hrana3 + $hrana4 + $hrana5 + $hrana6 + $hrana7 + $hrana8;
		$ambijent = $ambijent1 + $ambijent2 + $ambijent3 + $ambijent4 + $ambijent5 + $ambijent6 + $ambijent7 + $ambijent8;
		$ekstra = $ekstra1 + $ekstra2 + $ekstra3 + $ekstra4 + $ekstra5 + $ekstra6 + $ekstra7 + $ekstra8;

		return $values = array($pice,$hrana,$ambijent,$ekstra);
		
	}

	public function pretragaRestorani(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$query = $this->ModelLokal->getRestorani();
		foreach($query->result() as $row){
			$data['slika'] = site_url('Gost/stranica_lokala');
			$data['naziv'] = $row->Naziv;
			$data['avgocena'] = $row->AvgOcena;
			$data['adresa'] = $row->Adresa;
			$data['rv_ponpet'] = $row->PonPet;
			$data['rv_subota'] = $row->Sub;
			$data['rv_nedelja'] = $row->Ned;
			$data['opis'] = $row->Opis;
			$data['jerestoran'] = $row->JeRestoran;
			$data['jekafic'] = $row->JeKafic;
			$data['jebrzahrana'] = $row->JeBrzaHrana;

			$this->load->view("partials/rezultat_pretrage_lokal_box.php",$data);
		}	
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}

	public function pretragaKafici(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$query = $this->ModelLokal->getKafici();
		foreach($query->result() as $row){
			$data['slika'] = site_url('Gost/stranica_lokala');
			$data['naziv'] = $row->Naziv;
			$data['avgocena'] = $row->AvgOcena;
			$data['adresa'] = $row->Adresa;
			$data['rv_ponpet'] = $row->PonPet;
			$data['rv_subota'] = $row->Sub;
			$data['rv_nedelja'] = $row->Ned;
			$data['opis'] = $row->Opis;
			$data['jerestoran'] = $row->JeRestoran;
			$data['jekafic'] = $row->JeKafic;
			$data['jebrzahrana'] = $row->JeBrzaHrana;

			$this->load->view("partials/rezultat_pretrage_lokal_box.php",$data);
		}	
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}

	public function pretragaBrzaHrana(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$query = $this->ModelLokal->getBrzaHrana();
		foreach($query->result() as $row){
			$data['slika'] = site_url('Gost/stranica_lokala');
			$data['naziv'] = $row->Naziv;
			$data['avgocena'] = $row->AvgOcena;
			$data['adresa'] = $row->Adresa;
			$data['rv_ponpet'] = $row->PonPet;
			$data['rv_subota'] = $row->Sub;
			$data['rv_nedelja'] = $row->Ned;
			$data['opis'] = $row->Opis;
			$data['jerestoran'] = $row->JeRestoran;
			$data['jekafic'] = $row->JeKafic;
			$data['jebrzahrana'] = $row->JeBrzaHrana;

			$this->load->view("partials/rezultat_pretrage_lokal_box.php",$data);
		}	
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}	
    public function ispis_komentara(){
	   $query = $this->ModelKomentar->nadji_komentar(1);
	   foreach($query->result() as $row){
		   //echo $row->komentar;
		   $data['username'] = $row->username;
		   $data['ocena'] = $row->ocena;
		   $data['komentar'] = $row->komentar;

		   $this->load->view("partials/komentari.php", $data);
	   }
	//    //$this->load->view("partials/komentari.php");
	//    $rez = $query->row();
	//    $pom = $rez->Username;
	//    echo $pom;

	//    foreach ($query->result() as $row){
	// 	   echo "$row->Username";
	//    }$idkor = $result->row();
	}
	public function prosecna_ocena(){
		$avg['ocena'] = $this->ModelKomentar->doh_avg_ocena(1);
		//echo $avg;
		$this->load->view("partials/komentari-prefix.php", $avg);
	}
}
