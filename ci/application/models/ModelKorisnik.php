<?php

class ModelKorisnik extends CI_Model {
    public $korisnik;
    
    public function __construct() {
        parent::__construct();
        $this->korisnik=NULL;
    }
    
    public function promenaPasswordaProvera($oldpass){
        $username = $this->session->userdata("username");
        $result=$this->db->where('username',$username)->get('korisnik');
        $korisnik=$result->row();

        if($korisnik->Password == $oldpass){ 
           return TRUE;
        }else{
            return FALSE;
        }
    }

    public function korisnikPostoji($username){
        $result=$this->db->where('username',$username)->get('korisnik');
        $korisnik=$result->row();
        if ($korisnik!=NULL) {
            $this->korisnik=$korisnik;
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function ispravanPassword($password){
        if ($this->korisnik->Password == $password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function updatePassword($username,$password){
        $query=$this->db->query("update Korisnik SET Password='$password' where Username='".$username."'");
    }

    // public function dohvatiAutore(){
    //     return $this->db->get('autor')->result();
    // }
    
}