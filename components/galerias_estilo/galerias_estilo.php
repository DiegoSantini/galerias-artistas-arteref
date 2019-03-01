<?php
    function galerias_estilo(){
        $db = new db_galeria_artista_dao();
        $data_estilos = $db->get(
            'wp_galeria_artista_obras_estilos',
            array(
                'select' => 'estilo_obra'
            )
        );

        $data_artista = $db->get(
            'wp_galeria_artista',
            array(
                'select' => '*'
            )
        );
        if (isset($_GET['estilo'])) {
            $res_estilo = $_GET['estilo'];
        }else{
            $res_estilo = '';
        }

        ?>
        <div class="col-lg-3 galerias_estilo">
            <h4>Estilos</h4>
            <ul>
            <?php
                foreach ($data_estilos as $key) {
                   $estilos_url = new link_factory('estilo', array('estilo' => $key['estilo_obra']));
                   ?>
                   <a  
                        class='<?php 
                                    if ($res_estilo === $key['estilo_obra']) {
                                        echo 'galeria_estilo_li_button';
                                    } 
                               ?>'
                        href="<?php echo $estilos_url->create(); ?>">
                        <li>
                            <?php echo $key["estilo_obra"];  ?>
                        </li>
                   </a>
                   <?php
                }
            ?>
            </ul>
            <h4>Artistas</h4>
            <ul>
                <?php
                foreach ($data_artista as $key) {
                $artista_url = new link_factory('artista', array('id' => 1, 'id_artista' => $key['id']));
                ?>

                <a href="<?php echo $artista_url->create(); ?>">
                    <li>
                        <?php echo $key["nome_artista"];?>
                    </li>
                </a>

                <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
?>