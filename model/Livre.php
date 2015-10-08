<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Livre
 *
 * @author Stagiaire
 */
class Livre {
    // Atrr
    protected $id;
    protected $letitre;
    protected $ladescription;
    protected $lasortie;
    protected $ecrivain_id;
    
    // Méthodes
    // Constructeur
    public function __construct(array $valeurs) {
        $this->trouveSetter($valeurs);
    }

    private function trouveSetter($param) {
        foreach ($param as $clef => $valeur) {
            $nom = 'set' . ucfirst($clef);
            if (method_exists($this, $nom)) {
                $this->$nom($valeur);
            }
        }
    }
    
    public function getId(){
            return $this->id;
        }
        
        public function setLetitre($string){
            // protection contre attaque
            $lestringTraite = htmlentities(strip_tags(trim($string)),ENT_QUOTES, "UTF-8");
            $this->letitre = $lestringTraite;
        }
        public function getLetitre(){
            return $this->letitre;
        }
        
        public function setLadescription($string){
            // protection contre attaque
            $lestringTraite = htmlentities(strip_tags(trim($string)),ENT_QUOTES, "UTF-8");
            $this->ladescription = $lestringTraite;
        }
        public function getLadescription(){
            return $this->ladescription;
        }
        
        public function setLasortie($string){
            // protection contre attaque
            $lestringTraite = htmlentities(strip_tags(trim($string)),ENT_QUOTES, "UTF-8");
            $this->lasortie = $lestringTraite;
        }
        public function getLasortie(){
            return $this->lasortie;
        }
        
        public function setEcrivain_id($number) {
        $lenumberTraite = (int) ($number);
        $this->ecrivain_id = $lenumberTraite;
    }

    public function getEcrivain_id() {
        return $this->ecrivain_id;
    }
}

/* test */
//$tab = ["letitre"=>"Titre", "ladescription"=>"Un texte ", "lasortie"=>"xII", "ecrivain_id"=>5];
//$lulu= new Livre($tab);
//var_dump($lulu);