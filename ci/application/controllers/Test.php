<?php

class Test extends CI_Controller {

    /**
    * Kreiranje nove instance
    *
    * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model("ModelLokal");
        $this->load->model("ModelKomentar");
        $this->load->model("ModelSearchKeywords");
        $this->load->model("ModelKorisnik");
        
        // PRISTUP DOZVOLJEN SAMO AKO JE USER TIP ADMIN
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
        if (($this->session->userdata('tip')) != 'admin') redirect("Gost");
    }

    //Ovde treba dodati sve test funkcije
    public function index(){
        #Stupar Milos 2015/0669
        $this->test_restorani();
        $this->test_korisnikPostoji();
        $this->test_korisnikNePostoji();



        #Milica Soljaga 2013/0656




        #Viktor Galindo 2013/0655
        
        
        
        
        #Lazar Ristic 2015/0658
    }


    //Test funkcije

    public function test_restorani(){
        $restorani = $this->ModelLokal->getRestorani()->result();
        $testProsao = 1;
        foreach($restorani as $restoran) $testProsao *= $restoran->JeRestoran;
        echo $this->unit->run($testProsao, 1, "Test za ModelLokal->getRestorani()");
    }

    public function test_korisnikPostoji(){
        $adminPostoji = $this->ModelKorisnik->korisnikPostoji("admin");
        echo $this->unit->run($adminPostoji, true, "Test za ModelKorisnik->korisnikPostoji() - Uspesan");
    }

    public function test_korisnikNePostoji(){
        $adminPostoji = $this->ModelKorisnik->korisnikPostoji("Adminaksjhdakjshdakjsh");
        echo $this->unit->run($adminPostoji, FALSE, "Test za ModelKorisnik->korisnikPostoji() - Neuspesan");
    }


}