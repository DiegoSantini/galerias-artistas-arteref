<?php
    function galeria_artista_lista(){
        $db = new db_galeria_artista_dao();
        $db_artista = $db->get(
            'wp_galeria_artista',
            array(
                'select' => '*'
            )
        );

        $galeria_artista = get_page_by_title('artista', ARRAY_A);
        $galeria_artista_url = $galeria_artista['guid'];

        ?>

        <div class="col-lg-12 galeria_artista_lista">
                <hr>
                <h4>Artistas</h4>

                <?php foreach ($db_artista as $key) { ?>
                <div class="col-lg-3">
                    <ul>
                        <a href=<?php echo $galeria_artista_url . '&id=1&id_artista=' .$key['id']; ?>><li><?php echo $key['nome_artista']  ?></li></a>
                    </ul>
                </div>

                <?php } ?>
        </div>

        <?php
    }
?>