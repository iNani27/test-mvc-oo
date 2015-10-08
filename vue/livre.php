<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>
    </head>
    <body>
        <h2>Les Poètes Francophones - Section Livre : <?php echo $LeLivre->letitre; ?> </h2>
        <?php
        include 'vue/menu.php';
        echo "<h3>".$LeLivre->letitre."</h3>";
        echo "<p>" . nl2br($LeLivre->ladescription) . "</p>";
        ?>
    </body>
</html>
