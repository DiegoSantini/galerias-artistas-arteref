<?php
    function galerias_home_estilos(){

    $db = new db_galeria_artista_dao();
    $db_estilos= $db->get(
        'wp_galeria_artista_obras_estilos',
        array(
            'select' => '*',
            'campo' => 'obra_destaque',
            'id'    => 1
        )
    );
        ?>
        
            <div class="col-lg-12 galerias_home_estilos">
                <h4>Encontre obras por estilo</h4>
                <?php 
                    foreach ($db_estilos as $key) {
                       $estilo_url = new link_factory('estilo', array('estilo' => $key['estilo_obra']));
                       ?>
                        <div class="col-lg-3">
                            <a href="<?php echo $estilo_url->create(); ?>">
                                <button>
                                    <?php echo $key['estilo_obra']; ?>
                                </button>
                            </a>
                        </div>
                       <?php
                    }
                ?>
            </div>

        <?php
    }
?>