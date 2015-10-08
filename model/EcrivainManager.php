<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EcrivainManager
 *
 * @author Stagiaire
 */
class EcrivainManager {

    protected $db;

    public function __construct($dsn, $util, $pass, $erreur = false) {
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn, $util, $pass, $erreur);
    }

    // on récupère toutes les écrivains
    public function recupTous() {
        $recupTous = $this->db->query("SELECT * FROM ecrivain;");
        return $recupTous->fetchAll(PDO::FETCH_OBJ);
    }

    // on récupère un écrivain
    public function RecupUn($id) {
        $id = (int) $id;
        $recupUn = $this->db->query("SELECT * FROM ecrivain WHERE id=$id;");

        return $recupUn->fetch(PDO::FETCH_OBJ);
    }

    // récupérer tous les écrivains d'une periode
    public function recupEcrivainPeriode($idperiode) {
        $idperiode = (int) $idperiode;
        $recup = $this->db->query(
                "SELECT e.* 
	FROM ecrivain e
	WHERE sciecle_id=$idperiode");


        return $recup->fetchAll(PDO::FETCH_OBJ);
    }

    // on récupère un écrivain au hasard
    public function RecupUnHasard() {

        $recupUnHasard = $this->db->query("SELECT * FROM ecrivain  ORDER BY RAND() LIMIT 1;");

        return $recupUnHasard->fetch(PDO::FETCH_OBJ);
    }

}
