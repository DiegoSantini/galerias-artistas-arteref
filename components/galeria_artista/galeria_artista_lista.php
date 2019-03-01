<?php
    function galeria_artista_lista(){
        $db = new db_galeria_artista_dao();
        $db_artista = $db->get(
            'wp_galeria_artista',
            array(
                'select' => '*'
            )
        );
        ?>

        <div class="col-lg-12 galeria_artista_lista">
                <hr>
                <h4>Artistas</h4>

                <?php foreach ($db_artista as $key) { 
                $galeria_artista_url = new link_factory('artista', array('id' => 1, 'id_artista' => $key['id']));
                ?>
                <div class="col-lg-3">
                    <ul>
                        <a href=<?php echo $galeria_artista_url->create(); ?>><li><?php echo $key['nome_artista']  ?></li></a>
                    </ul>
                </div>

                <?php } ?>
        </div>

        <?php
    }
?>