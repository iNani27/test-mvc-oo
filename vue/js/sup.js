/* 
 * Fonction pour la suppression 
 */

function sup(id){
    if(confirm("Voulez-vous supprimer ce commentaire ?")){
        // redirect en JS
        document.location.href="?sup="+id;
    }
}

