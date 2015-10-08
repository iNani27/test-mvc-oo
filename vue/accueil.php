<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>
    </head>
    <body>
        <h2>Bienvenue sur Les Poètes Francophones</h2>
<?php include 'vue/menu.php';?>
        <h3>Ecrivain au hasard</h3>
        <h4><?php echo $RecupUnHasard->lenom ?></h4>
        <p>
            <?php echo nl2br($RecupUnHasard->labio) ?>
        </p>



    </body>
</html>