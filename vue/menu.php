        <ul>
            <?php
            foreach ($menu as $value) {


                echo "<li><a href='?idperiode=$value->id'>$value->laperiode</a></li>";
            }
            if($_SESSION){
                echo "<li><a href='?deconnect'>Déconnexion</a></li>";
            }else{
                echo "<li><a href='?connect'>Connexion</a></li>";
            }
            ?>
        </ul>

