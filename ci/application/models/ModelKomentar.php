<?php

 class ModelKomentar extends CI_Model {
    public $korisnik;

    public function __construct() {
        parent::__construct();
        $this->korisnik = $this->session->userdata("username");
    }

    public function dodaj_komentar($komentar,$ocena,$iduo){

        $result=$this->db->get_where('Korisnik',array('Username'=>$this->korisnik));

        //$result=$this->db->query("SELECT * from Korisnik where Username='".$this->korisnik."'");
        
        $idkor = $result->row();
        //$query=$this->db->query("INSERT into komiocena(idkorisnik, iduo, komentar,ocena) values ('".$idkor->IDKorisnik."','".$iduo."','".$komentar."','".$ocena."')");
        $this->db->set('idkorisnik',$idkor->IDKorisnik);
        $this->db->set('iduo',$iduo);
        $this->db->set('komentar',$komentar);
        $this->db->set('ocena',$ocena);
        $this->db->insert('komiocena');

        $avg = $this->avg_ocena($iduo);


       // $query=$this->db->query("UPDATE UO SET AvgOcena='".$avg."' WHERE iduo='".$iduo."'");

       
       $data=array('AvgOcena'=>$avg);
       $this->db->where('iduo',$iduo);
       $this->update('UO',$data);
        
    }
    public function nadji_komentar($iduo){
        //$query=$this->db->query("SELECT * from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
        //$query=$this->db->query("SELECT * from pom where IDUO='".$iduo."'");
        $query=$this->db->get_where('pom',array('IDUO'=>iduo));
        return $query;
        
    }
    public function avg_ocena($iduo){
        //$query=$this->db->query("SELECT avg(ocena) as average from komiocena where IDUO='".$iduo."'");
        $query=$this->db->select_avg('ocena')->from('komiocena')->where('IDUO',$iduo);
        $avg = $query->row()->ocena;
        return $avg;
        
    }

    public function doh_avg_ocena($iduo){
        //$query=$this->db->query("SELECT avgocena from uo where IDUO='".$iduo."'");
        $query=$this->db->select('avgocena')->from('uo')->where('IDUO',$iduo);
        $avg = $query->row()->avgocena;
        return $avg;
    }

    public function dohvatiKomentareZaUO($IDUO){
        //$query=$this->db->query("SELECT Username, Komentar, Ocena, IDKomiOcena, IDUO from komiocena, korisnik where komiocena.IDKorisnik = korisnik.IDKorisnik and komiocena.IDUO=".$IDUO);
        $this->db->select('Username','Komentar','Ocena','IDKomiOcena','IDUO','AvatarPath');//// ovde nisam znao!!!!!!!!!
        $this->db->from('korisnik');
        $this->db->from('komiocena');
        $query=$this->db->get();
        return $query->result();
    }

    public function deleteKomentar($idkom,$iduo){
        $query = $this->db->query("DELETE FROM KomiOcena WHERE IDKomiOcena='".$idkom."'");
        $avgOcena = $this->avg_ocena($iduo);
        $query = $this->db->query("UPDATE UO SET AvgOcena='".$avgOcena."' WHERE iduo='".$iduo."'");
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