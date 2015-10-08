<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Periode
 *
 * @author Stagiaire
 */
class Periode {
   
    // Atrr
    protected $id;
    protected $laperiode;
    
    
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
        
        public function setLaperiode($string){
            // protection contre attaque
            $lestringTraite = htmlentities(strip_tags(trim($string)),ENT_QUOTES, "UTF-8");
            $this->laperiode = $lestringTraite;
        }
        public function getLaperiode(){
            return $this->laperiode;
        }
    
    
}
/* test */
//$tab = ["laperiode"=>"XIIII"];
//$lulu= new Periode($tab);
//var_dump($lulu);

