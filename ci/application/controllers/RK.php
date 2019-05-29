<?php

class RK extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("ModelKorisnik");
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
	}
	
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php", $data = NULL){
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
        $this->podesavanja("podesavanja-promenaLozinke");
    }

    public function promeni_password(){
        $oldpasswordIspravan = $this->ModelKorisnik->promenaPasswordaProvera($this->input->post('oldpass'));
		
		if ($oldpasswordIspravan) {
            $this->changePassIspravan();
            $pass1 = $this->input->post('newpass');
            $pass2 = $this->input->post('confnewpass');
                if ($pass1 != "") {
                    $this->passIspravan();
                    if($pass1 == $pass2){
                        $this->comparePasswordsIspravan();
                        $this->uspesnaPromenaPassworda();
                        $update = $this->ModelKorisnik->updatePassword($this->session->userdata('username'), $pass1);
                        // TODO UBACIVANJE U BAZU I PORUKA O USPEHU
                    }else{
                        $this->uspesnaPromenaPasswordaClear();
                        $this->comparePasswordsGreska();
                    }
                }else{
                    $this->uspesnaPromenaPasswordaClear();
                    $this->passGreska();
                }
		}else{
            $this->uspesnaPromenaPasswordaClear();
            $this->changePassGreska();
        }
        $this->refresh();
    }

    public function refresh(){
        $this->podesavanja('podesavanja-promenaLozinke.php');
    }

    public function changePassGreska(){
        $podaci = "Neispravan stari password!";
        $this->session->set_userdata('oldpassporuka',$podaci);
    }

    public function changePassIspravan(){
        $this->session->unset_userdata('oldpassporuka');
    }

    public function comparePasswordsGreska(){
        $podaci = "Ne poklapaju se lozinke!";
        $this->session->set_userdata('comppassgreska',$podaci);
    }

    public function comparePasswordsIspravan(){
        $this->session->unset_userdata('comppassgreska');
    }

    public function passGreska(){
        $podaci = "Nova lozinka ne sme biti prazna!";
        $this->session->set_userdata('passgreska',$podaci);
    }

    public function passIspravan(){
        $this->session->unset_userdata('passgreska');
    }

    public function uspesnaPromenaPassworda(){
        $podaci = "Uspesno promenjena lozinka";
        $this->session->set_userdata('uspesnapromena',$podaci);
    }

    public function uspesnaPromenaPasswordaClear(){
        $this->session->unset_userdata('uspesnapromena');
    }
    public function logout(){
        $this->session->unset_userdata("korisnik");// brise se podatak o autoru iz sesije
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("tip");
        $this->session->sess_destroy(); //brise se sesija
        redirect("Gost");//kako vise nije ulogovan, treba da se ponasa kao sto je definisano u kontroleru gost
    }
}
