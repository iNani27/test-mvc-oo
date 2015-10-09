<ul>
    <?php
    if ($_SESSION) {
        echo "<p><a href='?deconnect'>Déconnexion</a> | <a href='?modif_livre'>Modifier un livre</a></p>";
    } else {
        foreach ($menu as $value) {


            echo "<li><a href='?idperiode=$value->id'>$value->laperiode</a></li>";
        }
        echo "<li><a href='?connect'>Connexion</a></li>";
    }
    ?>
</ul>

