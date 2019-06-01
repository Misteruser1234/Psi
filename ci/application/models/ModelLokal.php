<?php

class ModelLokal extends CI_Model {
    
    public $piceTagovi      = array('Bezalkoholna pica', 'Likeri', 'Vitaminski napici', 'Kokteli', 'Vina', 'Zestina', 'Kafa special', 'Craft pivo' );
    public $hranaTagovi     = array('Sendvici', 'Sushi', 'Pecenje', 'Obrok salate', 'Pizza', 'Rostilj', 'Dnevni meni', 'Kuvana jela' );
    public $ambijentTagovi  = array('Splav', 'Chill', 'Ziva svirka', 'Balkon', 'Centar', 'Reka', 'Pogled', 'Basta' );
    public $extraTagovi     = array('TV', 'Happy hour', 'Dostava', 'No Smoking zona', 'Baby oprema', 'Parking', 'Pet Frendly', 'WiFi' );


    public function __construct() {
        parent::__construct();
        $this->korisnik=$this->session->userdata("username");
    }
    public function naprednaPretragaLokala($data1,$data2,$data3,$data4){
        $query2 = $this->db->query("SELECT * FROM UO as U, PHAE AS P  WHERE P.Pice>='".$data1."' AND P.Hrana>='".$data2."' AND P.Ambijent>='".$data3."' AND P.Ekstra>='".$data4."' AND P.IDUO = U.IDUO");
        return $query2;
    }

    public function getRestorani(){
        $query = $this->db->query("SELECT * FROM UO WHERE JeRestoran = '1'");
        return $query;
    }

    public function getKafici(){
       $query = $this->db->query("SELECT * FROM UO WHERE JeKafic = '1'");
       return $query;
    }

    public function getBrzaHrana(){
        $query = $this->db->query("SELECT * FROM UO WHERE JeBrzaHrana = '1'");
        return $query;
    }
    
    public function getUO($iduo){
        $query = $this->db->query("SELECT * FROM UO WHERE IDUO = '".$iduo."'");
        return $query->row();
    }

    public function getUoZaIDVlasnika($idkor){
        $query = $this->db->query("SELECT U.IDUO, U.Naziv,U.Vidljivost,U.Odobren FROM UO AS U, JeVlasnik AS JV WHERE JV.IDKorisnik='".$idkor."' AND U.IDUO=JV.IDUO");
        return $query->result();
    }

    public function getAllUO(){
        $query = $this->db->query("SELECT * FROM UO");
        return $query->result();
    }

    public function getLokaliNaCekanju(){
        $query = $this->db->query("SELECT * FROM UO WHERE Odobren='0'");
        return $query->result();
    }

    function updateOdobren($iduo){
        $query=$this->db->query("UPDATE UO SET Odobren='1' where IDUO='".$iduo."'");
    }


   #    VRACA STRING ARRAY TAGOVA UO SA DATIM $ID
   public function dohvatiTagoveUO($id){

        #Dohvatanje reda iz PHAE tabele za UO sa id-jem -> $id
        $query = $this->db->get_where('phae', array('IDUO' => $id));

        #Ukoliko red sa datim ID ne postoji vracja NULL
        if ($query->num_rows() == 0) return NULL;
        
        #Odvajanje vrednosti kolona u pojedinacne INT promenljive
        $piceINT       = $query->result()[0]->Pice;
        $hranaINT      = $query->result()[0]->Hrana;
        $ambijentINT   = $query->result()[0]->Ambijent;
        $extraINT      = $query->result()[0]->Ekstra;

        #pretvara INT u binarni broj, dodaje nule na pocetku do duzine 8 bita i vraca kao String
        $piceBIN = sprintf( "%08d", decbin( $piceINT ));
        $hranaBIN = sprintf( "%08d", decbin( $hranaINT ));
        $ambijentBIN = sprintf( "%08d", decbin( $ambijentINT ));
        $extraBIN = sprintf( "%08d", decbin( $extraINT ));

        #pretvara binarni broj u niz bita od 8 elemenata
        $piceBinArray       = str_split($piceBIN);
        $hranaBinArray      = str_split($hranaBIN);
        $ambijentBinArray   = str_split($ambijentBIN);
        $extraBinArray      = str_split($extraBIN);

        #Proverava da li je bit postavljen i ako jeste dodaje string tag u $res array
        $res = [];
        for ($i=0; $i<8; $i++) if ($piceBinArray[$i])      array_push($res, $this->piceTagovi[$i]);
        for ($i=0; $i<8; $i++) if ($hranaBinArray[$i])     array_push($res, $this->hranaTagovi[$i]);
        for ($i=0; $i<8; $i++) if ($ambijentBinArray[$i])  array_push($res, $this->ambijentTagovi[$i]);
        for ($i=0; $i<8; $i++) if ($extraBinArray[$i])     array_push($res, $this->extraTagovi[$i]);
        
        return $res;        
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

    return $maxid;
}



public function insertUoImg($data,$id){ 
    foreach($data as $pod){
        $this->db->set("IDUO", $id);
        $this->db->set("Path", $pod);
        $this->db->insert("uoslike");
    }
}
public function deleteUO($iduo){
    $query=$this->db->query("DELETE FROM UO where iduo='".$iduo."'");
}
}
 
    