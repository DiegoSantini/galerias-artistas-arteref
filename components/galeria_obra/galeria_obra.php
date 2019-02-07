<?php
    function galeria_obra(){

        if (isset($_GET['artista']) &&  isset($_GET['obra'])){
            $galeria_artista = $_GET['artista'];
            $galeria_obra    = $_GET['obra'];
            galeria_obra_conteudo($galeria_artista, $galeria_obra);
        }else{
            echo '<div class="col-lg-12">nenhum artista encontrado!</div>';
        }

    }

    function galeria_obra_conteudo($galeria_artista, $galeria_obra){ 
       
        $obra = new db_galeria_artista_obras();
        $obra_resultado = $obra->get($galeria_obra);

        $artista = new db_galeria_artista();
        $artista_resultado = $artista->get($obra_resultado['id_artista']);
        
        ?>

            <div class="col-lg-6">
                <img src="<?php echo $obra_resultado['imagem_url']; ?>" alt="">
            </div>

            <div class="col-lg-6">
                <h2><?php echo $obra_resultado['nome_obra']; ?></h2>
                <h4><?php echo $artista_resultado['nome_artista']; ?></h4>
                <div>
                    <p>
                       <?php echo $obra_resultado['descricao_obra']; ?>
                    </p>
                </div>

                <div>
                    <p>
                        <p>
                            <?php echo $obra_resultado['acabamento_obra']; ?>
                        </p>
                        <p>
                            <?php echo $obra_resultado['preco']; ?>
                        </p>
                        
                    </p>
                </div>

                <div>
                    <p><button class='btn btn-default'>Entrar em contato</button></p>
                </div>

                <div class="galeria_conteudo_estilos">
                    <span>Estilos:</span>
                    <ul>
                        <li><?php echo $obra_resultado['estilo_obra']; ?></li>
                    </ul>
                </div>
                <br>

            </div>

            <div>
                <hr>
                <h2>Outras obras</h2>
                <?php galeria_trabalhos(); ?>
                <hr>
                <br>
            </div>

        <?php
    }

?>