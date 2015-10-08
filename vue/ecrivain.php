<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>
    </head>
    <body>
        <h2>Les Poètes Francophones - Section: <?php echo $leslivres->lenom; ?> </h2>
        <?php
        include 'vue/menu.php';
        // on affiche le nom et la bio de l'écrivain
        echo "<h3>" . $leslivres->lenom . "</h3>";
        echo "<p>" . nl2br($leslivres->labio) . "</p>";

        // on stoke dans des tableaux, les valeurs (concaténées, explosées) 
        $LesLivres = explode(" || ", $leslivres->LesLivres);
        $LesTitres = explode(" || ", $leslivres->LesTitres);
        $LesDesc = explode(" || ", $leslivres->LesDesc);

        // On boucle sur le tableau des id des livres ($LesLivres)
        // on initialise le compteur
        $i = 0;
        foreach ($LesLivres as $value) {
            echo "<h4>" . $LesTitres[$i] . "</h4>";
            echo "<p>" . substr($LesDesc[$i], 0, 100) . "... <a href='?idlivre=" . $value . "'>Lire plus</a></p>";
        // on incrémente le compteur   
            $i++;
        }
        ?>
    </body>
</html>
