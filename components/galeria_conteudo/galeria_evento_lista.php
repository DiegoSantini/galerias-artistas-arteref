<?php 
    function galeria_eventos_lista($data_eventos){
        //$obra_galeria = get_page_by_title('obra_photoarts', ARRAY_A);
        //$obra_galeria_url = $obra_galeria['guid'];
        ?>
            <div class="galeria_trabalhos_grid_image row">
                <!-- Photo Grid --> 
                    <?php foreach($data_eventos as $key){ ?>
                        <div class="column">
                        <div>
                            <a href="#<?php //echo $obra_galeria_url . '&id_obra=' . $key['id']; ?>">
                                <img src="<?php echo $key["url_img_destaque"]; ?>" style="width:100%">
                                <h5> <?php echo $key["nome_evento"]; ?> </h5>
                                <p><?php echo $key['local']; ?></p>
                                <p> <i><?php echo date('d/m/Y', strtotime($key['data_inicio'])) . ' - ' . date('d/m/y', strtotime($key['data_termino'])); ?></i></p>
                            </a>
                        </div>
                        </div>
                    <?php } ?>
            </div>
        <?php
    }
?>