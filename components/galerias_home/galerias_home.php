<?php
    function galerias_home_slide($data){
        $galeria_evento = get_page_by_title('evento', ARRAY_A);
        $galeria_evento_url = $galeria_evento['guid'];

        $obra_galeria = get_page_by_title('obra_photoarts', ARRAY_A);
        $obra_galeria_url = $obra_galeria['guid'];
        ?>
           
        <div class="col-lg-12 galeria_home_slide">

            <div class='scroll_posts galeria_home_scroll_posts'>  
                <div class='scroll_container'>

                    <div class='scroll_button'>
                        <button class='scroll_prev scroll_arrow_home'><span>&#60;</span></button>
                    </div>

                    <div class="scrolling-wrapper">
                        <?php foreach($data as $key){ ?>
                            <div class="galeria_home_card">
                                <img src="<?php echo @$key['imagem_url']; echo @$key['url_img_destaque']; ?>" alt="">
                                <div class='galeria_home'>
                                    <h4>
                                       <?php echo @$key['nome_evento']; echo @$key['nome_obra']; ?>
                                    </h4>
                                   <p>
                                       <?php echo @$key['descricao_resumida']; echo @$key['descricao_obra'];?>
                                   </p>
                                   <a href="
                                        <?php
                                            if (isset($key['nome_evento'])) {
                                                echo $galeria_evento_url . '&id_evento=' . $key['id'] . '&id=1';
                                            }
                                            if (isset($key['nome_obra'])) {
                                                echo $obra_galeria_url . '&id_obra=' . $key['id'];
                                            }
                                        ?>
                                   ">
                                    <button> 
                                    <?php 
                                            if (isset($key['nome_evento'])) {
                                                echo 'Detalhes do evento';
                                            }
                                            if (isset($key['nome_obra'])) {
                                                echo 'Ver obra';
                                            }
                                    ?>
                                    </button>
                                   </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                                
                    <div class='scroll_button'>
                        <button class='scroll_next scroll_arrow_home'><span class='galeria_artista_arrow'>&#62;</span></button>
                    </div>

                </div>
            </div>

        </div>
        <?php
    }
?>