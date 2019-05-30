<?php

class ModelLokal extends CI_Model {
    
    public $piceTagovi      = array('Bezalkoholna pica', 'Likeri', 'Vitaminski napici', 'Kokteli', 'Vina', 'Zestina', 'Kafa special', 'Craft pivo' );
    public $hranaTagovi     = array('Sendvici', 'Sushi', 'Pecenje', 'Obrok salate', 'Pizza', 'Rostilj', 'Dnevni meni', 'Kuvana jela' );
    public $ambijentTagovi  = array('Splav', 'Chill', 'Ziva svirka', 'Balkon', 'Centar', 'Reka', 'Pogled', 'Basta' );
    public $extraTagovi     = array('TV', 'Happy hour', 'Dostava', 'No Smoking zona', 'Baby oprema', 'Parking', 'Pet Frendly', 'WiFi' );


    public function __construct() {
        parent::__construct();
    }
    public function naprednaPretragaLokala($data1,$data2,$data3,$data4){
        //$query = $this->db->get('PHAE');
        //$query=$this->db->query("SELECT * FROM PHAE WHERE Pice='".$data1."' AND Username='".$username."'");
        //$query=$this->db->query("SELECT * FROM PHAE WHERE Pice='".$data1."' AND Hrana='".$data2."' AND Ambijent='".$data3."' AND Ekstra='".$data4."'");

        /*foreach ($query->result() as $row)
            {

                echo $row->IDUO;

            }*/
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
}
 
    