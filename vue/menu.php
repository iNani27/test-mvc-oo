        <ul>
            <?php
            foreach ($menu as $value) {


                echo "<li><a href='?idperiode=$value->id'>$value->laperiode</a></li>";
            }
            ?>
        </ul>

