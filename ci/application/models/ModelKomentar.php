<?php

 class ModelKomentar extends CI_Model {
    public $korisnik;

    public function __construct() {
        parent::__construct();
        $this->korisnik = $this->session->userdata("username");
    }

    public function dodaj_komentar($korisnik,$ocena){
        echo $korisnik;
    }
}

?>