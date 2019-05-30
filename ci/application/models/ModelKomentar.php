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
       
        $query=$this->db->query("INSERT into komiocena(idkorisnik, iduo, komentar,ocena) values ('".$idkor->IDKorisnik."','".$iduo."','".$komentar."','".$ocena."')");
    }
    public function nadji_komentar($iduo){
        //$query=$this->db->query("SELECT * from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
        $query=$this->db->query("SELECT * from pom where IDUO='".$iduo."'");
        
        foreach ($query->result() as $row)
            {
                echo $row->IDUO;
            }
    }
}

    // ne treba da pise idkom i ocena, popraviti kad se sredi autoinc
    // this->db->query("select * from phae where pice='"$.data."' ande hrane = '".dat1."', )
    //echo $idkor->IDKorisnik;
    //foreach($idkor->result() as $row)echo $row->IDKorisnik;
    //$query=$this->db->query("SELECT * from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
?>