<?php

class RK extends CI_Controller {

	public function __construct() {
        parent::__construct();

        if (($this->session->userdata('username')) == NULL) redirect("Gost");
	}
	
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php"){
		$this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php");
        $this->load->view($podStranica);
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

	public function index(){
		redirect("Gost");
    }
    
    public function spisak_uo(){
        $this->podesavanja("podesavanja-spisakUO.php");
    }

    public function dodaj_uo(){
        $this->podesavanja("podesavanja-FormaPodaciUO.php");
    }

    public function podaci_korisnika(){
        $this->podesavanja("podesavanja-PodaciKorisnika.php");
    }

    public function logout(){
        $this->session->unset_userdata("korisnik");// brise se podatak o autoru iz sesije
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("tip");
        $this->session->sess_destroy(); //brise se sesija
        redirect("Gost");//kako vise nije ulogovan, treba da se ponasa kao sto je definisano u kontroleru gost
    }
}
