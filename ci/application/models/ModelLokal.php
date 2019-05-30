<?php

class ModelLokal extends CI_Model {
    
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
 
    