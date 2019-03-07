<?php
    function galeria_obra_conteudo(){

    $galeria_contato_url = new link_factory('contato-galeria', array('id' => 1));

    if (isset($_GET['id_obra'])) {
        $id = $_GET['id_obra'];

        $db = new db_galeria_artista_dao();
        $data_galeria_obra = $db->get(
            'wp_galeria_artista_obras',
            array(
                'select' => '*',
                'campo'  => 'id',
                'id'     => $id
            )
        );

        $id_artista = $data_galeria_obra[0]['id_artista'];

        $db = new db_galeria_artista_dao();
        $data_galeria_artista = $db->get(
            'wp_galeria_artista',
            array(
                'select' => '*',
                'campo'  => 'id',
                'id'     => $id_artista
            )
        );

        $estilos = new recupera_nome_estilo_por_id();

    }else{
        return;
    }
        ?>
        <div class='galeria_obra_container'>
            <div class="col-lg-7">
                <img src="<?php echo $data_galeria_obra[0]['imagem_url']; ?>" alt="">
            </div>

            <div class="col-lg-5">
                <h2><?php echo $data_galeria_obra[0]['nome_obra']; ?></h2>
                <h4><?php echo $data_galeria_artista[0]['nome_artista']; ?></h4>
                <div>
                    <p>
                       <?php echo $data_galeria_obra[0]['descricao_obra']; ?>
                    </p>
                </div>
                
                <div class="galeria_conteudo_estilos">
                    <p>Estilos:

                    <?php 
                    foreach ($estilos->init($data_galeria_obra[0]['estilo_obra']) as $key) {
                      echo $key . ' - ';
                    }
                    ?> 

                    </p>
                </div>

                <div>
                    <p>
                        <p>
                            <?php echo $data_galeria_obra[0]['acabamento_obra']; ?>
                        </p>
                        <p>
                            <?php echo $data_galeria_obra[0]['preco']; ?>
                        </p>
                    </p>
                </div>

                <div>
                    <a href="<?php echo $galeria_contato_url->create(); ?>">
                        <p><button>Entrar em contato</button></p>
                    </a>
                </div>

                <br>

            </div>

            <div class='col-lg-12'>
                <hr>
                <h2>Outras obras</h2>
                <?php galeria_trabalhos($data_galeria_obra[0]['id_artista']); ?>
                <hr>
                <br>
            </div>
        </div>
        <?php
    }

?>