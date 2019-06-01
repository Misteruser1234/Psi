<?php

class ModelSearchKeywords extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model("ModelLokal");
    }
   
    function izbaciZnakoveInterpunkcije($data){

        $data = str_replace(". ", " ", $data);
        $data = str_replace(", ", " ", $data);
        $data = str_replace(".", "", $data);
        $data = str_replace(",", "", $data);

        return $data;
    }

    function podeliUReci($data){
        $words = explode(" ", $data);
        foreach ($words as $index => $word) {
            if (strlen($word) < 3) unset($words[$index]);
        }
        return $words;
    }

    function dodajUnikatneReci($allWords, $data){
        $data = $this->izbaciZnakoveInterpunkcije($data);
        $words = $this->podeliUReci($data);
        
        #Dodaj reci u $allWords ukoliko ne postoje
        foreach ($words as $index => $word) {

            #Konvertuje da sve budu mala slova
            $word = strtolower($word);

            #Provera da li se rac vec nalazi u nizu $allwords
            if (array_search($word, $allWords) === FALSE) {
                
                #Dodaje u array $allWords
                array_push($allWords, $word);
            }
        }

        return $allWords;
    }

    # Ukoliko rec postoji u tabeli vraca njen ID u suprotnom dodaje rec u tabelu i vraca ID
    function dohvatiWordID($word=NULL){
        if ($word==NULL) return;

        #Provera da li rec vec postoji u bazi
        $query = $this->db->where('Word',$word)->get('searchkeywords');
            
        if ($query->num_rows()) {

            #Ako rec vec postoji dohvati njen ID
            $wordID = $query->row()->IDSearchKeywords;
        }
        else{

            #Ako rec ne postoji dodaj je u bazu
            $this->db->set("Word", $word);
            $this->db->insert("searchkeywords");

            #Dohvati ID nakon INSERT
            $wordID = $this->db->where('Word',$word)->get('searchkeywords')->row()->IDSearchKeywords;
        }

        return $wordID;

    }

    public function dodajKeywordsUBazu($allWords=NULL, $IDUO=NULL){
        if ($allWords==NULL) return;
        if ($IDUO==NULL) return;

        foreach ($allWords as $index => $word){

            #Ukoliko rec postoji u tabeli vraca njen ID u suprotnom dodaje rec u tabelu i vraca ID
            $wordID = $this->dohvatiWordID($word);

            #Dodaje par WordID i IDUO u tabelu sadrzi
            $this->db->set("IDSearchKeywords", $wordID);
            $this->db->set("IDUO", $IDUO);
            $this->db->insert("sadrzi");

        }

    }

    public function izvuciKeywordsZaUO($IDUO=0){
        $allWords = NULL;

        #dohvati podatke o UO
        $podaciUO = $this->ModelLokal->getUO($IDUO);
        if ($podaciUO) {

            $allWords = [];

             #Dodavanje unikatnih reci u $allWords iz odredjenih polja UO
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Naziv);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Adresa);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Opis);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Info1);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Info2);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Info3);

            #Dodavanje tagova UO u $allWords
            $tagovi = $this->ModelLokal->dohvatiTagoveUO($IDUO);
            if (isset($tagovi)){
                $data = implode(" ", $tagovi);
                $allWords = $this->dodajUnikatneReci($allWords, $data);
            }
            

            #Dodavanje tipa UO u $allWords
            if ($podaciUO->JeRestoran)  $allWords = $this->dodajUnikatneReci($allWords, "restoran");
            if ($podaciUO->JeKafic)     $allWords = $this->dodajUnikatneReci($allWords, "kafic");
            if ($podaciUO->JeBrzaHrana) $allWords = $this->dodajUnikatneReci($allWords, "brza hrana");
        }

        return $allWords;
    }

    public function obrisiKeyWordsZaUO($IDUO=NULL){
        if ($IDUO == NULL) return;

        #Dohvata ID svih reci koje se koriste za UO sa ID -> $IDUO
        $results = $this->db->query("SELECT IDSearchKeywords FROM sadrzi WHERE IDUO = $IDUO;")->result();

        $WordIDzaIDUO = [];

        #Filtrira rezultat query-ja i stavlja samo ID reci u niz $WordIDzaIDUO
        foreach ($results as $key => $value) {
           array_push($WordIDzaIDUO, $value->IDSearchKeywords);
        }

        #Brise sve redove iz tabele sadrzi za UO sa ID -> $IDUO
        $this->db->delete('sadrzi', array('IDUO' => $IDUO));


        #Proverava za svaku rec koja se koristila za dati UO da li jos neki UO koristi istu rec
        foreach ($WordIDzaIDUO as $key => $WordID) {
            $brojRedova = $this->db->where('IDSearchKeywords',$WordID)->get('sadrzi')->num_rows();

            #Ako je broj redova = 0, to znaci da je UO bio jedini koji je koristio tu rec i rec moze da se obrise
            if ($brojRedova == 0) $this->db->delete('searchkeywords', array('IDSearchKeywords' => $WordID));
        }
        
    }

    public function generisiKeywordsZaUO($IDUO=NULL){
		if ($IDUO==NULL) return;

		#Brise iz baze sve veze iz sadrzi i same Key words ukoliko ni jedan drugi UO ih ne koristi
		$this->obrisiKeyWordsZaUO($IDUO);

		#Izvlaci iz podataka o UO unikatne key words i vraca kao niz stringova
		$keyWords = $this->izvuciKeywordsZaUO($IDUO);

		#Dodaju u bazu key words ukoliko vec ne postoje i spaja odredjeni key word sa UO u tabeli sadrzi
		$this->dodajKeywordsUBazu($keyWords, $IDUO);
    }
    
    public function dohvatiNizUOSaRecima($words){
        if ($words[0] == NULL) return NULL;
        if (count($words) == 0) return NULL;

        $queryStr = 'SELECT sadrzi.IDUO 
                     FROM searchkeywords, sadrzi 
                     WHERE searchKeywords.IDSearchKeywords = sadrzi.IDSearchKeywords AND searchKeywords.Word = "'. $words[0] .'"';

        $query = $this->db->query($queryStr);
        if ($query->num_rows() == 0) return NULL;
        
        $result = [];
        for ($i=0; $i<$query->num_rows(); $i++) $result[] = $query->result()[$i]->IDUO;
        
        foreach ($words as $index => $word){
            $queryStr = "SELECT sadrzi.IDUO 
                         FROM searchkeywords, sadrzi 
                         WHERE searchKeywords.IDSearchKeywords = sadrzi.IDSearchKeywords AND searchKeywords.Word = '$word'";

            $query = $this->db->query($queryStr);
            if ($query->num_rows() == 0) return NULL;

            $temp = [];
            for ($i=0; $i<$query->num_rows(); $i++) $temp[] = $query->result()[$i]->IDUO;

            $result = array_intersect($result, $temp);
            if (count($result) == 0) return NULL;
        }

        return $result;
    }

}
 
    