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













// on teste le $_GET récupérer (clic sur supprimer 
// si on a confirmé la suppression
if (isset($_GET['sup']) && ctype_digit($_GET['sup'])) {
    $idcomment = (int) $_GET['sup'];

    $moi->supComment($idcomment);
    header("Location: ./");
}

// si on a cliquer sur l'icône de modif
if (isset($_GET['modif']) && ctype_digit($_GET['modif'])) {
    $idcomment = (int) $_GET['modif'];
    $affiche = $moi->recupLeComment($idcomment);
    /* var_dump($affiche); */
    if ($affiche) {
        // on appel la vue pour les afficher
        include 'vue/modif.php';
    } else {
        // Si l'id modif n'existe pas on est redirigé vers l'accueil
        header("Location: ./");
    }
}



// on a cliqué sur modifier
if (isset($_GET['modif']) && ctype_digit($_GET['modif']) && isset($_POST['tabUp'])) {
    $idcomment = (int) $_GET['modif'];
    $pour_modif = new CommentClass($_POST['tabUp']);
    /* var_dump($pour_modif); */
    // update du comment
    if ($moi->modifComment($pour_modif, $idcomment)) {
        header("Location: ./");
    } else {
        
    }
}







