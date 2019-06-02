<?php

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model("ModelLokal");
        $this->load->model("ModelKomentar");
        
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
        // ucitavanje prefiksa 
        $this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php", array("subMenu"=> 2));
        $this->load->view("partials/podesavanja-spisakUO-prefiks.php");

        // for each iz dohvacenog iz baze load view partial/single uo izlistan
        $uoList = $this->ModelLokal->getAllUO();
        foreach ($uoList as $uo){
            $this->load->view("partials/podesavanja-spisakUO-single-uo.php", array ("data"=>$uo));
        }

        //ucitavanje midfixa
        $this->load->view("partials/podesavanja-spisakUO-midfix.php");

        //foreach ispisivanje vidljivosti lokala
        foreach($uoList as $uo){
            if($uo->Odobren == 1) {
                $this->load->view("partials/podesavanja-spisakUO-single-status.php", array ("data"=>$uo));
            }else{
                $this->load->view("partials/podesavanja-spisakUO-single-odobrenje.php");
            }
        }

        //ucitavanje postfixa 
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

    public function stranice_na_cekanju(){
        // ucitavanje prefiksa 
        $this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php", array("subMenu"=> 4));
        $this->load->view("partials/podesavanja-odobri-stranicu-prefix.php");

        $uonacekanju = $this->ModelLokal->getLokaliNaCekanju();

        foreach ($uonacekanju as $uo){
            $this->load->view("partials/podesavanja-odobrenje-single-uo.php", array ("data"=>$uo));
        }

        //ucitavanje postfixa 
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

    public function odobri_stranicu($iduo){
        $this->ModelLokal->updateOdobren($iduo);
        redirect('Admin/stranice_na_cekanju');
    }

    public function obrisi_komentar($idkom, $iduo){
        $this->ModelKomentar->deleteKomentar($idkom,$iduo);
        redirect('Gost/stranica_lokala/'.$iduo);
    }

}
