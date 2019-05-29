<?php

class ModelLokal extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

   public function naprednaPretragaLokala($data1,$data2,$data3,$data4){
        //$query = $this->db->get('PHAE');
        //$query=$this->db->query("SELECT * FROM PHAE WHERE Pice='".$data1."' AND Username='".$username."'");
        $query=$this->db->query("SELECT * FROM PHAE WHERE Pice='".$data1."' AND Hrana='".$data2."' AND Ambijent='".$data3."' AND Ekstra='".$data4."'");
        // $result = $this->db->where('Pice',$data1);
        // $result = $this->db->where('Hrana',$data2);
        // $result = $this->db->where('Ambijent',$data3);
        // $result = $this->db->where('Ekstra',$data4);

        foreach ($query->result() as $row)
            {
                echo $row->IDUO;
            }

   }
}
 
    