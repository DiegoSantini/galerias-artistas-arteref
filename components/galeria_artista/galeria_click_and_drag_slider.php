<?php 
    function galeria_artistas($data_eventos){
        $cards = array_slice($data_eventos, 2, 6);
        $evento = get_page_by_title('evento', ARRAY_A);
        $evento_url = $evento['guid'];å
?>
        <div class='scroll_posts'>
            <h4>Eventos</h4>       
            <div class='scroll_container'>

                <div class='scroll_button'>
                    <button class='scroll_prev'><span>&#60;</span></button>
                </div>

                <div class="scrolling-wrapper">
                    <?php foreach($cards as $key){ ?>
                        <a href="<?php echo $evento_url . '&id_evento=' . $key['id'] . '&id=1'; ?>">
                            <div class="card">
                                <!-- <img src="<?php echo $key['url_img_destaque']; ?>" alt=""/> -->
                                    <div>
                                        <?php echo $key['nome_evento']; ?>
                                        <p><?php echo date('d/m/Y', strtotime($key['data_inicio'])) . ' - ' . date('d/m/y', strtotime($key['data_termino'])); ?></p>
                                    </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                            
                <div class='scroll_button'>
                    <button class='scroll_next'><span class='galeria_artista_arrow'>&#62;</span></button>
                </div>

            </div>

        </div>
<?php
    }
?>