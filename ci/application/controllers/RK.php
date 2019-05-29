<?php

class RK extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("ModelKorisnik");
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
	}
	
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php"){
		$this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php");
        $this->load->view($podStranica,$data);
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

	public function index(){
		redirect("Gost");
    }    

    public function podaci_korisnika(){
        $this->podesavanja("podesavanja-PodaciKorisnika.php");
    }

    public function promeni_lozinku(){
        $passwordIspravan = $this->ModelKorisnik->ispravanPassword($this->input->post('oldpass'));
		
		if ($passwordIspravan) {
			
		}
        $this->changePassGreska();
    }

    public function changePassGreska(){
        $podaci['oldpassporuka'] = "Neispravan stari password!";
		$this->podesavanja('podesavanja-promenaLozinke.php',$podaci);
    }

    public function logout(){
        $this->session->unset_userdata("korisnik");// brise se podatak o autoru iz sesije
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("tip");
        $this->session->sess_destroy(); //brise se sesija
        redirect("Gost");//kako vise nije ulogovan, treba da se ponasa kao sto je definisano u kontroleru gost
    }
}
