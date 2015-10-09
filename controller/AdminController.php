<?php

// pour la connexion PDO
require 'model/maPDOClass.php';
// appel de la classe connect
require 'model/connect.php';
/* * ************
 * Pour menu
 * *********** */
// appel de la classe periode
require 'model/Periode.php';
// appel de la classe periodeManager
require 'model/PeriodeManager.php';

/* * *************************************
 * Pour insérer un nouvel écrivain
 * ********************************** */
// appel des classes
require 'model/Ecrivain.php';
require 'model/EcrivainManager.php';
require 'model/EcrivainAdminManager.php';

require 'model/Livre.php';
require 'model/LivreManager.php';
require 'model/LivreAdminManager.php';



// Se déconnecter
// //Vérification de validité de la session
if (!isset($_SESSION['idsession']) || $_SESSION['idsession'] != session_id()) {
    // destruction de la session
    connect::decoUser();
    header("Location: ./");
}




// je suis connecté en Admin
// 
// on affiche  
if (empty($_GET) && empty($_POST)) {

    // On affiche la liste des périodes pour menu
    $menul = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
    $menu = $menul->recupTous();


// Liste des écrivains
    $listeEcrivain = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
    $boucle = $listeEcrivain->recupTous();

    // on appel la vue pour les afficher
    include 'vue/admin.php';
}


//
// si le formulaire d'ajout d'écrivain est envoyé


if (isset($_POST['new'])) {

// créer une instance d'écrivain
    $newEcrivain = new Ecrivain($_POST['new']);
// création d'un écrivain
    $ecrivain = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
    // si ajout d'un écrivain
    if ($ecrivain->insertEcrivain($newEcrivain)) {
        header("Location: ./");
    }
}

//
// si le formulaire d'ajout de livre est envoyé
if (isset($_POST['livre'])) {
// Liste des écrivains
    $listeEcrivain = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
    $boucle = $listeEcrivain->recupTous();


// créer une instance de livre
    $newLivre = new Livre($_POST['livre']);
// création d'un livre
    $livre = new LivreManager(DB_SELECT, DB_USER, DB_PWD, true);
    // si ajout d'un livre
    if ($livre->insertLivre($newLivre)) {
        header("Location: ./");
    }
}



// Si l'admin veut modifier 

if (isset($_GET['modif_livre'])) {
    // Afficher tous les livres avec modif
    $recup_tous = new LivreManager(DB_SELECT, DB_USER, DB_PWD, true);

    $lesLivres = $recup_tous->recupTous();
    // on appel la vue pour les afficher
    include 'vue/modif.php';
}


// Si l'admin a cliqué sur "Modifier" 
if (isset($_GET['modif_livre']) && ctype_digit($_GET['modif_livre']) && isset($_POST['lesmodif'])) {
    $idlivre = (int) $_POST['lesmodif[id]'];
    $pour_modif = new Livre($_POST['lesmodif']);
    $livre_modifie = new LivreManager(DB_SELECT, DB_USER, DB_PWD, true);
    // update du livre
            if ($livre_modifie->modifLivre($pour_modif, $idlivre)) {
        header("Location: ./");
    }
}












