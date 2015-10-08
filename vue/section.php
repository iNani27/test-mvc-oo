<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>
    </head>
    <body>
        <h2>Les Poètes Francophones - Section: <?php echo $laperiode->laperiode ?> sciècle</h2>
        <?php
        include 'vue/menu.php';
        foreach ($listeEcrivain as $value) {
            echo "<h3>" . $value->lenom . "</h3>";
            echo "<p>" . substr(nl2br($value->labio), 0, 249) . " ... <a href='?idecrivain=" . $value->id . "'>Lire plus</a></p>";
            echo "<hr />";
        }
        ?>
    </body>
</html>
