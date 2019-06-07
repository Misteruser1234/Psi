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
        $query=$this->db->query("update Korisnik SET Password='$password' where Username='".$username."'");
    }


    function updateProfil($data){
        $username = $this->session->userdata("username");
       
        $query=$this->db->query("update Korisnik SET AvatarPath='$data' where Username='".$username."'");

    }

    function deleteOldImg(){
       
        $username = $this->session->userdata("username");
        $this->db->select('AvatarPath');
        $query1=$this->db->get_where('Korisnik',array('Username'=>$username));
        foreach($query1->result()as $row){
            unlink("img/profil/".$row->AvatarPath);
        }
    }

    public function getSlikaKorisnik($idkor){
        $query=$this->db->query("SELECT AvatarPath FROM Korisnik WHERE IDKorisnik='".$idkor."'");
        return $query->result();
    }

    // public function dohvatiAutore(){
    //     return $this->db->get('autor')->result();
    // }
//     $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";
    
}