<?php
/* 
 * Appel des dépendances
 */

// pour la connexion PDO
/*require 'model/maPDOClass.php';*/
// appel de la classe UserManagerClass
require 'model/connect.php';


// si il on essaye de se déconnecter
if(isset($_GET['deconnect'])){
    // appel de la fonction static
    connect::decoUser();
    header("Location: ./");
}


// si il a cliqué sur s'identifier
if(isset($_POST['lelogin'])){
  
    
           $admin= connect::verifUser($_POST['lelogin'], $_POST['lepass']);
    
    // si on trouve l'admin (un utilisateur en tout cas)
    if($admin){
        // on met ses champs en session
       
        $_SESSION['idsession']=session_id(); // validité de session
        // redirection
        header("Location: ./");
   
       
    }else{ // sinon
        $erreur = "Login et/ou mot de passe incorrectes";
    }
}

// si il on essaye de se connecter
if(isset($_GET['connect'])){
    // appel de la vue
    include("vue/connexion.php");
}
