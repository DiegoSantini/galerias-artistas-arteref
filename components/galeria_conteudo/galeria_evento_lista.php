<?php 
    function galeria_eventos_lista($data_eventos){
        ?>
            <div class='scroll_posts'>
                <div class='scroll_container'>
                    <div class='scroll_button'>
                        <button class='scroll_prev'><span style="font-size: 2.5em;">&#60;</span></button>
                    </div>
                    <div class="scrolling-wrapper">
                        <?php foreach($data_eventos as $key){ 
                            $evento_url = new link_factory('evento', array('id' => 1, 'id_evento' => $key['id']));
                            ?>
                            <a href="<?php echo $evento_url->create(); ?>">
                                <div class="card">
                                    <img src="<?php echo $key['url_img_destaque']; ?>" alt="">
                                        <div>
                                            <?php echo $key['nome_evento']; ?>
                                                <p><?php echo date('d/m/Y', strtotime($key['data_inicio'])) . ' - ' . date('d/m/y', strtotime($key['data_termino'])); ?></p>
                                        </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                    <div class='scroll_button'>
                        <button class='scroll_next'><span class='galeria_artista_arrow' style="font-size: 2.5em;">&#62;</span></button>
                    </div>
                </div>
            </div>
<?php
    }
?>