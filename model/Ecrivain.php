<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ecrivain
 *
 * @author Stagiaire
 */
class Ecrivain {
       // Atrr
    protected $id;
    protected $lenom;
    protected $labio;
    protected $sciecle_id;

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
        
        public function setLenom($string){
            // protection contre attaque
            $lestringTraite = htmlentities(strip_tags(trim($string)),ENT_QUOTES, "UTF-8");
            $this->lenom = $lestringTraite;
        }
        public function getLenom(){
            return $this->lenom;
        }
        
        public function setLabio($string){
            // protection contre attaque
            $lestringTraite = htmlentities(strip_tags(trim($string)),ENT_QUOTES, "UTF-8");
            $this->labio = $lestringTraite;
        }
        public function getLabio(){
            return $this->labio;
        }
        
        public function setSciecle_id($number) {
        $lenumberTraite = (int) ($number);
        $this->sciecle_id = $lenumberTraite;
    }

    public function getSciecle_id() {
        return $this->sciecle_id;
    }
}

/* test */
//$tab = ["lenom"=>"Nom", "labio"=>"Un texte<br /> trezxte " , "sciecle_id"=>2];
//$lulu= new Ecrivain($tab);
//var_dump($lulu);

