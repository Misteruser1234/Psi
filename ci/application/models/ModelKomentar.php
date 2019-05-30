<?php

 class ModelKomentar extends CI_Model {
    public $korisnik;

    public function __construct() {
        parent::__construct();
        $this->korisnik = $this->session->userdata("username");
    }

    public function dodaj_komentar($komentar,$ocena,$iduo){

        $result=$this->db->query("SELECT * from Korisnik where Username='".$this->korisnik."'");
        
        $idkor = $result->row();
       
        $query=$this->db->query("INSERT into komiocena(idkomiocena, idkorisnik, iduo, komentar,ocena) values ('8','".$idkor->IDKorisnik."','".$iduo."','".$komentar."','".$ocena."')");
    }
    public function ispis_komentara($komentar,$ocena,$iduo){
        
    }
}

    // ne treba da pise idkom i ocena, popraviti kad se sredi autoinc
    // this->db->query("select * from phae where pice='"$.data."' ande hrane = '".dat1."', )
    //echo $idkor->IDKorisnik;
    //foreach($idkor->result() as $row)echo $row->IDKorisnik;
?>