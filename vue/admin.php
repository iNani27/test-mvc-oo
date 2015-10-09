<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>
  
    </head>

    <body>
        <h2>Bienvenue Admin, sur Les Poètes Francophones</h2>
        <?php include 'vue/menu.php'; ?>
        <?php
        /* Dans cette vue 
         * 	l'admin 
         * + ajouter des écrivaine dans les époques : radio époques/ dropdownlist
         * + ajouter des livres aux écrivains
         * ++ modifier, supprimer
         */
        ?>
        <div id='formecrivain'>
            <h3>Ajouter un écrivain</h3>
            <form action="" method="post" name="new">
                Le nom de l'écrivain: <input type="text" name="new[lenom]" required><br/>
                La biographie de l'écrivain: <textarea name="new[labio]"></textarea><br/>
                <?php
                /* boucle d'affichage des choix de période */
                foreach ($menu as $value) {

                    echo "<input type='radio' name='new[sciecle_id]' value='$value->id' />$value->laperiode<br/>";
                }
                ?>
                <input type="submit" value="Ajouter un écrivain" />
            </form>
        </div>   

        <div id='formelivre'>
            <h3>Ajouter un livre</h3>
            <form action="" method="post" name="livre">
                Le nom du livre: <input type="text" name="livre[letitre]" required><br/>
                La description du livre: <textarea name="livre[ladescription]"></textarea><br/>
                La sortie du livre: <input type="text" name="livre[lasortie]" required><br/>
                <?php
                /* boucle d'affichage des choix des écrivains */
                foreach ($boucle as $value) {

                    echo "<input type='radio' name='livre[ecrivain_id]' value='$value->id' />$value->lenom<br/>";
                }
                ?>
                <input type="submit" value="Ajouter un livre" />
            </form>
        </div> 
       












    </body>
</html>
