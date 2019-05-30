<?php

 class ModelKomentar extends CI_Model {
    public $korisnik;

    public function __construct() {
        parent::__construct();
        $this->korisnik = $this->session->userdata("username");
    }

    public function dodaj_komentar($komentar,$ocena,$iduo){

        $result=$this->db->query("SELECT * from Korisnik where Username='".$this->korisnik."'");
        //foreach($idkor->result() as $row)echo $row->IDKorisnik;
        $idkor = $result->row();
        //echo $idkor->IDKorisnik;

        // this->db->query("select * from phae where pice='"$.data."' ande hrane = '".dat1."', );

        $query=$this->db->query("INSERT into komiocena(idkorisnik,iduo,komentar,ocena) values ('".$idkor->IDKorisnik."','".$iduo."','".$komentar."','".$ocena."')");
      
    }
}

?>