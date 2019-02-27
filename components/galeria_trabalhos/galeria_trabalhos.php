<?php 
    function galeria_trabalhos($id_Artista){
        $db = new db_galeria_artista_dao();

        if (gettype ( $id_Artista ) === 'array') {
                if (isset($id_Artista['estilo'])) {
                    
                    $data_obras = $db->get(
                        'wp_galeria_artista_obras',
                        array(  
                            'select' => '*',
                            'campo'  => 'estilo_obra', 
                            'id'     => '"' . $id_Artista['estilo'] . '"'
                        )
                    );
                }else{
                    $replace_string = new replace_string($id_Artista);
                    $data_obras = $db->get(
                        'wp_galeria_artista_obras',
                        array(  
                            'select' => '*',
                            'campo'  => 'id', 
                            'id'     =>  $replace_string->id_query()
                        )
                    );
                }
        }
        if ($id_Artista === '*') {
            $data_obras = $db->get(
                'wp_galeria_artista_obras',
                array(
                    'select' => '*'
                )
            );
        }
        if (gettype ( $id_Artista ) !== 'array' && $id_Artista !== '*') {
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

        $galeria_contato = get_page_by_title('contato-galeria', ARRAY_A);
        $galeria_contato_url = $galeria_contato['guid'];
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
                                    <p><a href="<?php echo $galeria_contato_url . '&id=1'; ?>"> Entrar em contato </a></p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        <?php
    }
?>