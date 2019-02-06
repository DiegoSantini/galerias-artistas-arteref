<?php 
    function galeria_artistas($range){
        $db_artista = new db_galeria_artista_obras();
        $db_artista_resultado = array_slice($db_artista->get_all(), $range, 6);
?>
        <div class='scroll_posts'>
                    
            <div class='scroll_container'>

                <div class='scroll_button'>
                    <button class='scroll_prev'><span class='glyphicon glyphicon-chevron-left'></span></button>
                </div>

                <div class="scrolling-wrapper">
                    <?php foreach($db_artista_resultado as $key){ ?>
                        <a href="<?php echo get_home_url() . '/galeria/trabalhos-galeria/obra_photoarts/?artista=/dba&obra=' . $key['id']; ?>">
                            <div class="card">
                                <img src="<?php echo $key['imagem_url']; ?>" alt="">
                                    <div>
                                        <?php echo $key['nome_obra']; ?>
                                    </div>
                            </div>
                        </a>
                    <?php } ?>
                    
                    <!--
                    <div class="post_card_ver_mais">
                        <div>
                            <a href="<?php //echo '#' ?>">
                                <img src="<?php //echo plugins_url(); ?>/home-arteref/content/img/saber-mais.svg" border="0" />
                                    Ver tudo!
                            </a>
                        </div>
                    </div>
                    -->
                </div>
                            
                <div class='scroll_button'>
                    <button class='scroll_next'><span class='glyphicon glyphicon-chevron-right'></span></button>
                </div>

            </div>

        </div>
<?php
    }
?>