<?php

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();

        // PRISTUP DOZVOLJEN SAMO AKO JE USER TIP VLASNIK
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
        if (($this->session->userdata('tip')) != 'admin') redirect("Gost");
	}
	
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php"){
		$this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php");
        $this->load->view($podStranica);
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

	public function index(){
        redirect(Gost);
    }
    
    public function spisak_uo(){
        $this->podesavanja("podesavanja-spisakUO.php");
    }

}
