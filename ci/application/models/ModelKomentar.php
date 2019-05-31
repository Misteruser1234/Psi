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

        $avg = $this->avg_ocena($iduo);

        $query=$this->db->query("UPDATE UO SET AvgOcena='".$avg."' WHERE iduo='".$iduo."'");
        
    }
    public function nadji_komentar($iduo){
        //$query=$this->db->query("SELECT username, komentar, ocena from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
        $query=$this->db->query("SELECT * from pom where IDUO='".$iduo."'");
        //print_r($query->result());
        return $query->result();
        // $kk = $query->result();
        // echo $kk->row()->komentar;
    }
    public function avg_ocena($iduo){
        $query=$this->db->query("SELECT avg(ocena) as average from komiocena where IDUO='".$iduo."'");
        $avg = $query->row()->average;
        return $avg;
        
    }

    public function doh_avg_ocena($iduo){
        $query=$this->db->query("SELECT avgocena from uo where IDUO='".$iduo."'");
        $avg = $query->row()->avgocena;
        return $avg;
    }
}

    // ne treba da pise idkom i ocena, popraviti kad se sredi autoinc
    // this->db->query("select * from phae where pice='"$.data."' ande hrane = '".dat1."', )
    //echo $idkor->IDKorisnik;
    //foreach($idkor->result() as $row)echo $row->IDKorisnik;
    //$query=$this->db->query("SELECT * from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
    // $query = $this->db->query("UPDATE uo set avgocena where iduo='".$avg."'");
    // foreach ($query->result() as $row)
    //     {
    //         echo $row->IDUO;
    //     }

?>