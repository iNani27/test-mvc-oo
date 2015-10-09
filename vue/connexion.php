<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Les Poètes Francophones</title>
    </head>
    <body>
        <h2>Les Poètes Francophones - Connexion</h2>
   
            
                <div id='monform'>
              <?php if(isset($erreur)) echo "<h3 style='color:red;'>$erreur</h3>";  ?>
                    <form action="" method="POST" name="nom">
                        Votre login : <input name="lelogin" type="text" required /><br/>
                        Votre mot de passe : <input name="lepass" type="password" required /><br/>
                        
                        <input type="submit" value="S'identifier"/>
                    </form>
                </div>
   
    </body>
</html>
