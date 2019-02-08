<?php
    function galeria_artista_lista(){
        $db_artista = new db_galeria_artista();
        $db_artista_resultado = $db_artista->get_all();
        $db_artista_resultado_1 = array_slice($db_artista_resultado, 3, 3);
        $db_artista_resultado_2 = array_slice($db_artista_resultado, 6, 3);
        $db_artista_resultado_3 = array_slice($db_artista_resultado, 9, 3);
        $db_artista_resultado_4 = array_slice($db_artista_resultado, 12, 3);
        ?>

        <div class="col-lg-12 galeria_artista_lista">
                <hr>
                <h4>Artistas</h4>
                <div class="col-lg-3">
                    <ul>
                        <?php foreach ($db_artista_resultado_1 as $key) {
                            echo '<li>'. $key['nome_artista']  .'</li>';
                        } ?>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <ul>
                        <?php foreach ($db_artista_resultado_2 as $key) {
                            echo '<li>'. $key['nome_artista']  .'</li>';
                        } ?>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <ul>
                        <?php foreach ($db_artista_resultado_3 as $key) {
                            echo '<li>'. $key['nome_artista']  .'</li>';
                        } ?>
                    </ul>
                </div>

           
                <div class="col-lg-3">
                    <ul>
                        <?php foreach ($db_artista_resultado_4 as $key) {
                            echo '<li>'. $key['nome_artista']  .'</li>';
                        } ?>
                    </ul>
                </div>

        </div>

        <?php
    }

?>