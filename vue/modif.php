<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>

    </head>

    <body>
        <h2>Bienvenue Admin, sur Les Poètes Francophones</h2>
        <p><a href='?deconnect'>Se déconnecter</a></p>
        <?php
        if (isset($_GET['modif_livre'])) {

            foreach ($lesLivres as $value) {
                ?>

                <div id='lesmodif'>
                    <form action="" method="POST" name="lesmodif">
                        <input name="lesmodif[id]" type="hidden" value='<?php echo $value->id ?>' />
                        Le titre du livre : <input name="lesmodif[letitre]" type="text" value='<?php echo $value->letitre ?>' /><br/>
                        La description du livre : <textarea name='lesmodif[ladescription]'><?php echo $value->ladescription ?></textarea><br/>
                        Le sortie du livre :

                        <input type="text" name='lesmodif[lasortie]' value='<?php echo $value->lasortie ?>'>

                        <input type="submit" value='Modifier'/>
                    </form>
                </div>
        <hr />
                <?php
            }
        }
        ?>












    </body>
</html>
