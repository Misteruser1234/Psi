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
        // $query2 = $this->db->query("SELECT * FROM UO as U, PHAE AS P  WHERE P.Pice>='".$data1."' AND P.Hrana>='".$data2."' AND P.Ambijent>='".$data3."' AND P.Ekstra>='".$data4."' AND P.IDUO = U.IDUO");
        $sql =" SELECT * FROM UO, PHAE 
                WHERE (PHAE.Pice        ^ ? & ?) = 0
                AND   (PHAE.Hrana       ^ ? & ?) = 0
                AND   (PHAE.Ambijent    ^ ? & ?) = 0
                AND   (PHAE.Ekstra      ^ ? & ?) = 0
                AND UO.IDUO = PHAE.IDUO;
              ";
        $query = $this->db->query($sql, array($data1, $data1, $data2, $data2, $data3, $data3, $data4, $data4));
        return $query;
    }

    public function getRestorani(){
        // $query = $this->db->query("SELECT * FROM UO WHERE JeRestoran = '1'");
        $query = $this->db->where('JeRestoran',1)->get('UO');
        return $query;
    }

    public function getKafici(){
    //    $query = $this->db->query("SELECT * FROM UO WHERE JeKafic = '1'");
       $query = $this->db->where('JeKafic',1)->get('UO');
       return $query;
    }

    public function getBrzaHrana(){
        // $query = $this->db->query("SELECT * FROM UO WHERE JeBrzaHrana = '1'");
        $query = $this->db->where('JeBrzaHrana',1)->get('UO');
        return $query;
    }
    
    public function getUO($iduo){
        // $query = $this->db->query("SELECT * FROM UO WHERE IDUO = '".$iduo."'");
        $query = $this->db->where('IDUO',$iduo)->get('UO');
        return $query->row();
    }

    public function getUoZaIDVlasnika($idkor){
        //$query = $this->db->query("SELECT U.IDUO, U.Naziv,U.Vidljivost,U.Odobren FROM UO AS U, JeVlasnik AS JV WHERE JV.IDKorisnik='".$idkor."' AND U.IDUO=JV.IDUO");
        $this->db->select('UO.IDUO, UO.Naziv, UO.Vidljivost, UO.Odobren');
        $this->db->from('UO');
        $this->db->join('JeVlasnik','JeVlasnik.IDUO = UO.IDUO');
        $this->db->where('JeVlasnik.IDKorisnik',$idkor);

        return $this->db->get()->result();
    }

    public function getAllUO(){
        // $query = $this->db->query("SELECT * FROM UO");
        $query = $this->db->select('*')->form('UO')->get();
        return $query->result();
    }

    public function getLokaliNaCekanju(){
        // $query = $this->db->query("SELECT * FROM UO WHERE Odobren='0'");
        $query = $this->db->select('*')->form('UO')->where('Odobren',0)->get();
        return $query->result();
    }

    public function updateOdobren($iduo){
        // $query=$this->db->query("UPDATE UO SET Odobren='1' where IDUO='".$iduo."'");
        $data = array( 'Odobren' => 1 );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data); 
    }

    public function setVidljiva($iduo){
        // $this->db->query("UPDATE UO SET Vidljivost='1' WHERE IDUO='".$iduo."'");
        $data = array( 'Vidljivost' => 1 );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data);
    }

    public function setPrivatna($iduo){
        // $this->db->query("UPDATE UO SET Vidljivost='0' WHERE IDUO='".$iduo."'");
        $data = array( 'Vidljivost' => 0 );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data);
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
    // $result=$this->db->query("SELECT * from Korisnik where Username='".$this->korisnik."'");
    $result = $this->db->where('Username',$this->korisnik)->get('Korisnik');
    $idkor = $result->row();

    // $query=$this->db->query("INSERT into uo(Opis,PonPet,Sub,Ned,AvgOcena,Adresa,Gmaps,Odobren,Vidljivost,Info1,Info2,Info3,Naziv,JeRestoran,JeKafic,JeBrzaHrana) 
    // values ('".$opis."','".$ponpet."','".$subota."','".$nedelja."','".$pom."','".$adresa."','".$mapa."','".$pom."','".$pom."','".$samenija."','".$razlike."','".$zasto."','".$naziv."','".$restoran."','".$kafic."','".$brza."')");
   
    $data = array(
        'Opis' => $opis,
        'PonPet' => $ponpet,
        'Sub' => $subota,
        'Ned' => $nedelja,
        'AvgOcena' => $pom,
        'Adresa' => $adresa,
        'Gmaps' => $mapa,
        'Odobren' => $pom,
        'Vidljivost' => $pom,
        'Info1' => $samenija,
        'Info2' => $razlike,
        'Info3' => $zasto,
        'Naziv' => $naziv,
        'JeRestoran' => $restoran,
        'JeKafic' => $kafic,
        'JeBrzaHrana' => $brza
    );
    $this->db->insert('UO', $data);


    // $maxid = $this->db->query('SELECT MAX(IDUO) AS `maxid` FROM `uo`')->row()->maxid;
    $maxid = $this->db->select_max('IDUO', 'maxid')->get('UO')->row()->maxid;

    // $query=$this->db->query("INSERT into phae(IDUO,Pice,Hrana,Ambijent,Ekstra) values ('".$maxid."','".$pice."','".$jela."','".$mesto."','".$ostalo."')");
    $data = array(
        'IDUO' => $maxid ,
        'Pice' => $pice ,
        'Hrana' => $jela ,
        'Ambijent' => $mesto ,
        'Ekstra' => $ostalo
    );
    $this->db->insert('PHAE', $data);

    // $query=$this->db->query("INSERT into jevlasnik(IDKorisnik,IDUO) values ('".$idkor->IDKorisnik."','".$maxid."')");
    $data = array(
        'IDKorisnik' => $idkor->IDKorisnik ,
        'IDUO' => $maxid 
    );
    $this->db->insert('jeVlasnik', $data);

    return $maxid;
}



public function insertUoImg($data,$id){ 

    foreach( $data as $rbr => $path){
        $this->db->set("IDUO", $id);
        $this->db->set("rbr", $rbr);
        $this->db->set("Path", $path);
        $this->db->insert("uoslike");
    }

}

public function deleteUO($iduo){

    $query=$this->db->get_where('uoslike',array('iduo'=>$iduo));
    foreach($query->result_array() as $row){
       
        unlink("img/uo/".$row['Path']);
        
    }


    // $query = $this->db->query("DELETE FROM UO where iduo='".$iduo."'");
    $query = $this->db->delete('UO', array('IDUO' => $iduo)); 
}

    public function dohvatiIDSvihUO(){
        // return $this->db->query("SELECT IDUO FROM uo")->result();
        return $this->db->select('IDUO')->get('UO')->result();

    }

    public function updateUO($iduo,$naziv,$adresa,$mapa,$restoran,$kafic,$brza,$ponpet,$subota,$nedelja,$opis,$samenija,$razlike,$zasto,$pice,$jela,$mesto,$ostalo){
        //$this->db->query("UPDATE UO set Opis='".$opis."', PonPet='".$ponpet."', Sub='".$subota."' ,Ned='".$nedelja."', Adresa='".$adresa."', Gmaps='".$mapa."', Info1='".$samenija."', Info2='".$razlike."', Info3='".$zasto."', Naziv='".$naziv."', JeRestoran='".$restoran."', JeKafic='".$kafic."', JeBrzaHrana='".$brza."' where iduo='".$iduo."'");
        $data = array(
            'Opis' => $opis,
            'PonPet' => $ponpet,
            'Sub' => $subota,
            'Ned' => $nedelja,
            'Adresa' => $adresa,
            'Gmaps' => $mapa,
            'Info1' => $samenija,
            'Info2' => $razlike,
            'Info3' => $zasto,
            'Naziv' => $naziv,
            'JeRestoran' => $restoran,
            'JeKafic' => $kafic,
            'JeBrzaHrana' => $brza
        );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data); 

        // $this->db->query("UPDATE PHAE set Pice='".$pice."', Hrana='".$jela."', Ambijent='".$mesto."', Ekstra='".$ostalo."' where iduo='".$iduo."'");
        $data = array(
            'Pice' => $pice ,
            'Hrana' => $jela ,
            'Ambijent' => $mesto ,
            'Ekstra' => $ostalo
        );
        $this->db->where('IDUO', $iduo);
        $this->db->update('PHAE', $data);
    }
    public function citajUO($iduo){
        // $queryUO=$this->db->query("SELECT naziv, ponpet, sub, ned, opis, adresa, gmaps, info1, info2, info3, JeRestoran, JeKafic, JeBrzaHrana FROM uo WHERE iduo='".$iduo."'");
        $this->db->select('naziv, ponpet, sub, ned, opis, adresa, gmaps, info1, info2, info3, JeRestoran, JeKafic, JeBrzaHrana');
        $this->db->from('UO');
        $this->db->where('IDUO', $iduo);
        $queryUO=$this->db->get();

        $data_uo=[];
        //array_push($res, $this->piceTagovi[$i]);
        $data_uo['naziv']=$queryUO->row()->naziv;
        $data_uo['ponpet']=$queryUO->row()->ponpet;
        $data_uo['sub']=$queryUO->row()->sub;
        $data_uo['ned']=$queryUO->row()->ned;
        $data_uo['opis']=$queryUO->row()->opis;
        $data_uo['adresa']=$queryUO->row()->adresa;
        $data_uo['gmaps']=$queryUO->row()->gmaps;
        $data_uo['info1']=$queryUO->row()->info1;
        $data_uo['info2']=$queryUO->row()->info2;
        $data_uo['info3']=$queryUO->row()->info3;
        $data_uo['jerestoran']=$queryUO->row()->JeRestoran;
        $data_uo['jekafic']=$queryUO->row()->JeKafic;
        $data_uo['jebrzahrana']=$queryUO->row()->JeBrzaHrana;
        $data_uo['ponpet']=explode("-",$queryUO->row()->ponpet);
        $data_uo['sub']=explode("-",$queryUO->row()->sub);
        $data_uo['ned']=explode("-",$queryUO->row()->ned);
        return $data_uo;
    }
    public function citajSlike($iduo){
        // $query=$this->db->query("SELECT * from UOSlike where iduo='".$iduo."'");
        $query=$this->db->where('IDUO',$iduo)->get('UOSlike');
        $rez = [];
        foreach($query->result() as $row)
                $rez[$row->rbr] = $row->Path;
        return $rez;
    }
    public function citajPHAE($iduo){
        //$query=$this->db->query("SELECT * from PHAE where iduo='".$iduo."'");
        $query=$this->db->where('IDUO',$iduo)->get('PHAE');
        $pice=$query->row()->Pice;
        $hrana=$query->row()->Hrana;
        $ambijent=$query->row()->Ambijent;
        $ekstra=$query->row()->Ekstra;
        $rez=[];
        array_push($rez, str_split(sprintf( "%08d", decbin( $pice ))));
        array_push($rez, str_split(sprintf( "%08d", decbin( $hrana ))));
        array_push($rez, str_split(sprintf( "%08d", decbin( $ambijent ))));
        array_push($rez, str_split(sprintf( "%08d", decbin( $ekstra ))));
    
        return $rez;
    }

    function deleteOldImg($rbr,$id){
   
        $this->db->select('Path');
        $query1=$this->db->get_where('uoslike',array('rbr'=>$rbr,'IDUO'=>$id));
        foreach($query1->result()as $row){
            unlink("img/uo/".$row->Path);
        }
    }

    public function update_uoslike($data,$id){  

        foreach( $data as $rbr => $path){
            // $preklapa=$this->db->query("SELECT id from uoslike where rbr='".$rbr."' and iduo='".$id."'");
            $this->db->select('id');
            $this->db->from('uoslike');
            $this->db->where('rbr', $rbr );
            $this->db->where('IDUO', $id );
            $preklapa=$this->db->get();

            $novi=$preklapa->row();
            if($novi == NULL){
                $this->db->set("IDUO", $id);
                $this->db->set("rbr", $rbr);
                $this->db->set("Path", $path);
                $this->db->insert("uoslike");
            }
            else{
                 
                $this->deleteOldImg($rbr,$id);
                // $this->db->query("UPDATE uoslike set iduo='".$id."', rbr='".$rbr."', path='".$path."' where id='".$novi->id."'");
                $data = array(
                    'iduo' => $pice ,
                    'rbr' => $jela ,
                    'path' => $path
                );
                $this->db->where('id', $novi->id);
                $this->db->update('uoslike', $data);
            }
        }
    }
}
 
    