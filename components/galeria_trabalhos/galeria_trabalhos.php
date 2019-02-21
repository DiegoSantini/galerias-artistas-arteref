<?php 
    function galeria_trabalhos($id_Artista){
        $db = new db_galeria_artista_dao();
        if ($id_Artista == '*') {
            $data_obras = $db->get(
                'wp_galeria_artista_obras',
                array(
                    'select' => '*'
                )
            );
        }else{
            $data_obras = $db->get(
                'wp_galeria_artista_obras',
                array(
                    'select' => '*',
                    'campo'  => 'id_artista',
                    'id'     => $id_Artista
                )
            );
        }
        $obra_galeria = get_page_by_title('obra_photoarts', ARRAY_A);
        $obra_galeria_url = $obra_galeria['guid'];
        ?>
            <div class="galeria_trabalhos_grid_image row">
                <!-- Photo Grid --> 
                    <?php foreach($data_obras as $key){ ?>
                        <div class="column">
                        <div>
                            <a href="<?php echo $obra_galeria_url . '&id_obra=' . $key['id']; ?>">
                                <img src="<?php echo $key["imagem_url"]; ?>" style="width:100%">
                                <h5> <?php echo $key["nome_obra"]; ?> </h5>
                                <p><?php echo $key["acabamento_obra"]; ?></p>
                                <p><a href="/galeria/contato-galeria/"> Entrar em contato </a></p>
                            </a>
                        </div>
                        </div>
                    <?php } ?>
            </div>
        <?php
    }
?>