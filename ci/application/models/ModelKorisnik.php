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
    
    public function dodajKorisnika($username, $password, $tip){
        $this->db->set("Username", $username);
        $this->db->set("Password", $password);
        $this->db->set("Tip", $tip);
        $this->db->insert("korisnik");
    }

    function updatePassword($username,$password){
        // $query=$this->db->query("update Korisnik SET Password='$password' where Username='".$username."'");
        $data = array( 'Password' => $password );
        $this->db->where('Username', $username);
        $this->db->update('Korisnik', $data); 
    }

    function updateProfil($data){
        $username = $this->session->userdata("username");
        // $query=$this->db->query("update Korisnik SET AvatarPath='$data' where Username='".$username."'");
        $data = array( 'AvatarPath' => $data );
        $this->db->where('Username', $username);
        $this->db->update('Korisnik', $data); 
    }

    public function getSlikaKorisnik($idkor){
        // $query=$this->db->query("SELECT AvatarPath FROM Korisnik WHERE IDKorisnik='".$idkor."'");
        $query=$this->db->select('AvatarPath')->from('Korisnik')->where('IDKorisnik',$idkor)->get();
        return $query->result();
    }
    
}