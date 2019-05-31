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

            #Provera da li se rac vec nalazi u nizu $allwords
            if (array_search($word, $allWords) === FALSE) {

                #Konvertuje da sve budu mala slova
                $word = strtolower($word);

                #Dodaje u array $allWords
                array_push($allWords, $word);
            }
        }

        return $allWords;
    }

    function dodajTagove($allWords, $IDUO){
        $tagovi = $this->ModelLokal->dohvatiTagoveUO($IDUO);

        #Dodaj reci u $allWords ukoliko ne postoje
        foreach ($tagovi as $index => $tag) {

            #Provera da li se tag vec nalazi u nizu $allwords
            if (array_search($tag, $allWords) === FALSE) {

                #Konvertuje da sve budu mala slova
                $tag = strtolower($tag);

                #Dodaje u array $allWords
                array_push($allWords, $tag);
            }
        }
        return $allWords;
    }

    public function generisiKeywordZaUO($IDUO=0){
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
            $allWords = $this->dodajTagove($allWords, $IDUO);

            #Dodavanje tipa UO u $allWords
            if ($podaciUO->JeRestoran)  $allWords = $this->dodajUnikatneReci($allWords, "restoran");
            if ($podaciUO->JeKafic)     $allWords = $this->dodajUnikatneReci($allWords, "kafic");
            if ($podaciUO->JeBrzaHrana) $allWords = $this->dodajUnikatneReci($allWords, "brza hrana");
        }

        return $allWords;
    }




}
 
    