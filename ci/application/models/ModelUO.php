<?php

class ModelUO extends CI_Model {
  
    
    public function __construct() {
        parent::__construct();
        $this->korisnik=$this->session->userdata("username");
  
       
    }
       
   public function insertUO($naziv,$adresa,$mapa,$restoran,$kafic,$brza,$ponpet,$subota,$nedelja,$pice,$jela,$mesto,$ostalo,$opis,$samenija,$razlike,$zasto){
        $pom=0;
        $result=$this->db->query("SELECT * from Korisnik where Username='".$this->korisnik."'");
        $idkor = $result->row();
        $query=$this->db->query("INSERT into uo(Opis,PonPet,Sub,Ned,AvgOcena,Adresa,Gmaps,Odobren,Vidljivost,Info1,Info2,Info3,Naziv,JeRestoran,JeKafic,JeBrzaHrana) 
        values ('".$opis."','".$ponpet."','".$subota."','".$nedelja."','".$pom."','".$adresa."','".$mapa."','".$pom."','".$pom."','".$samenija."','".$razlike."','".$zasto."','".$naziv."','".$restoran."','".$kafic."','".$brza."')");
        $maxid = $this->db->query('SELECT MAX(IDUO) AS `maxid` FROM `uo`')->row()->maxid;
        $query=$this->db->query("INSERT into phae(IDUO,Pice,Hrana,Ambijent,Ekstra) values ('".$maxid."','".$pice."','".$jela."','".$mesto."','".$ostalo."')");
        $query=$this->db->query("INSERT into jevlasnik(IDKorisnik,IDUO) values ('".$idkor->IDKorisnik."','".$maxid."')");
   }
 public function insertUoImg($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9){

 }
    
}