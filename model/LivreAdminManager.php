<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LivreAdminManager
 *
 * @author Stagiaire
 */
class LivreAdminManager extends LivreManager {

    // liste des livres par écrivain
    public function recupLesLivres($id) {
        $id = (int) $id;
        $recupLes = $this->db->exec("SET SESSION group_concat_max_len = 1000000");
        $recupLes = $this->db->query("SELECT l.ecrivain_id AS idecrivain, 
		e.lenom, e.labio,
        GROUP_CONCAT(l.id SEPARATOR ' || ') AS LesLivres, 
        GROUP_CONCAT(l.letitre SEPARATOR ' || ') AS LesTitres, 
        GROUP_CONCAT(l.ladescription SEPARATOR ' || ') AS LesDesc, 
        GROUP_CONCAT(l.lasortie SEPARATOR ' || ') AS LesDates
	FROM ecrivain e 
    INNER JOIN livre l
    ON e.id=l.ecrivain_id
    WHERE e.id=$id
    GROUP BY l.ecrivain_id;");

        return $recupLes->fetch(PDO::FETCH_OBJ);
    }



}
