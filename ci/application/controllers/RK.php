<?php

class RK extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("ModelKorisnik");
        $this->load->model("ModelKomentar");
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
	}
	
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php", $data = NULL){
		$this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php");
        $this->load->view($podStranica,$data);
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }


    public function promeni(){


    $config['upload_path'] = './img/profil';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size']    = '10000';
    $config['max_width']  = '102400';
    $config['max_height']  = '76800';
    $config['overwrite'] = false;

    $this->load->library('upload', $config);
 
    if($this->upload->do_upload("profilnasrc")){

    $fajldata=$this->upload->data();
 
     $path=$fajldata['file_name'];
     $this->ModelKorisnik->updateProfil($path);
     $this->podesavanja("podesavanja-PodaciKorisnika.php");

    // Za brisanje stare slike ako budemo hteli unlink($file);
    }
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
        $this->session->unset_userdata("idkor");
        $this->session->unset_userdata("tip");
        $this->session->sess_destroy(); //brise se sesija
        redirect("Gost");//kako vise nije ulogovan, treba da se ponasa kao sto je definisano u kontroleru gost
    }
    public function upis_komentara(){
        $komentar = $this->input->post('comment');
        $ocena = $this->input->post('ocena');
        $iduo = $this->input->post('uoid');                            //na stranici lokala postoji hidden polje uoid
        $this->ModelKomentar->dodaj_komentar($komentar,$ocena,$iduo);
       // $this->ModelKomentara->ispis_komentara($komentar,$ocena,$iduo);
        redirect("Gost/stranica_lokala/".$iduo);
    }

}
