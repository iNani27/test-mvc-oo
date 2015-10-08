<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodeManager
 *
 * @author Stagiaire
 */
class PeriodeManager {

    protected $db;

    public function __construct($dsn, $util, $pass, $erreur = false) {
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn, $util, $pass, $erreur);
    }

    // on récupère toutes les écrivains
    public function recupTous() {
        $recupTous = $this->db->query("SELECT * FROM periode ORDER BY id DESC;");
        return $recupTous->fetchAll(PDO::FETCH_OBJ);
    }

    // on récupère un écrivain
    public function RecupUn($id) {
        $id = (int) $id;
        $recupUn = $this->db->query("SELECT * FROM periode WHERE id=$id;");

        return $recupUn->fetch(PDO::FETCH_OBJ);
    }

   

}
