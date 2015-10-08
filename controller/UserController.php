<?php

// Contrôleur de l'affichage hors connexion
/*
 * Appel des dépendances
 */

// pour la connexion PDO
require 'model/maPDOClass.php';

require 'model/ecrivain.php';
require 'model/ecrivainManager.php';

require 'model/livre.php';
require 'model/livreManager.php';
require 'model/livreAdminManager.php';

require 'model/periode.php';
require 'model/periodeManager.php';

/* * *******************************************
  // si on a PAS cliqué sur un lien du menu
 * ****************************************** */

if (isset($_GET) && empty($_GET)) {
    // On affiche un écrivaine au hasard
    $managerHasard = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
    $RecupUnHasard = $managerHasard->RecupUnHasard();

    // On affiche la liste des périodes pour menu
    $menul = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
    $menu = $menul->recupTous();

    // appel la vue de la page d'accueil
    include 'vue/accueil.php';
}


/* * **************************************
  // Si on a cliqué sur un lien du menu
 * **************************************** */
// On affiche la liste des périodes pour menu
$menul = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
$menu = $menul->recupTous();

// on récupoère l'id   
if (isset($_GET['idperiode'])) {
    $idperiode = (int) $_GET['idperiode'];

    // la période cliquée pour le titre
    $manager = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
    $laperiode = $manager->RecupUn($idperiode);

    // la liste des ecrivains par périodes
    $managerE = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
    $listeEcrivain = $managerE->recupEcrivainPeriode($idperiode);

    // appel la vue de la section Période
    include 'vue/section.php';
}

/* * *****************************************************
  // Si on a cliqué sur le lire plus d'un ecrivain
 * ****************************************************** */
// On affiche la liste des périodes pour menu
$menul = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
$menu = $menul->recupTous();


if (isset($_GET['idecrivain'])) {
    $idecrivain = (int) ($_GET['idecrivain']);
    
    // Les Livres de cet écrivain
    $managerLivre = new LivreAdminManager(DB_SELECT, DB_USER, DB_PWD, true);

    $leslivres = $managerLivre->recupLesLivres($idecrivain);

    // appel la vue de l'écrivain
    include 'vue/ecrivain.php';
}

/* * *****************************************************
  // Si on a cliqué sur le lire plus d'un livre
 * ****************************************************** */
// On affiche la liste des périodes pour menu
$menul = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
$menu = $menul->recupTous();

if (isset($_GET['idlivre'])) {
    $idlivre = (int) ($_GET['idlivre']);
    // Récup le livre
    $managerLeLivre = new LivreManager(DB_SELECT, DB_USER, DB_PWD, true);
    $LeLivre = $managerLeLivre->RecupUn($idlivre);

    // appel la vue du Livre
    include 'vue/livre.php';
}
?>