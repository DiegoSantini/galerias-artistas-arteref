<?php 
    function galeria_trabalhos(){

        $obras_all = new db_galeria_artista_obras(); 
        $obras_photoarts = $obras_all->get_all();

        $obras_photoarts_collum_1 = array_slice($obras_photoarts, 0, 6);
        $obras_photoarts_collum_2 = array_slice($obras_photoarts, 6, 6);
        $obras_photoarts_collum_3 = array_slice($obras_photoarts, 12, 6);
        $obras_photoarts_collum_4 = array_slice($obras_photoarts, 18, 6);
           
        ?>
            <div class="galeria_trabalhos_grid_image row">
                <!-- Photo Grid -->

                <div class="column">
                    <?php foreach($obras_photoarts_collum_1 as $key){ ?>
                        <div>
                            <a href="<?php echo get_home_url() . '/galeria/trabalhos-galeria/obra_photoarts/?artista=/dba&obra=' . $key['id']; ?>">
                                <img src="<?php echo $key["imagem_url"]; ?>" style="width:100%">
                                <h5> <?php echo $key["nome_obra"]; ?> </h5>
                                <p><?php echo $key["acabamento_obra"]; ?></p>
                                <p><a href="/galeria/contato-galeria/"> Entrar em contato </a></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="column">
                    <?php foreach($obras_photoarts_collum_2 as $key){ ?>
                        <div>
                            <a href="<?php echo get_home_url() . '/galeria/trabalhos-galeria/obra_photoarts/?artista=/dba&obra=' . $key['id']; ?>">
                                <img src="<?php echo $key["imagem_url"]; ?>" style="width:100%">
                                <h5> <?php echo $key["nome_obra"]; ?> </h5>
                                <p><?php echo $key["acabamento_obra"]; ?></p>
                                <p><a href="/galeria/contato-galeria/"> Entrar em contato </a></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <div class="column">
                    <?php foreach($obras_photoarts_collum_3 as $key){ ?>
                        <div>
                            <a href="<?php echo get_home_url() . '/galeria/trabalhos-galeria/obra_photoarts/?artista=/dba&obra=' . $key['id']; ?>">
                                <img src="<?php echo $key["imagem_url"]; ?>" style="width:100%">
                                <h5> <?php echo $key["nome_obra"]; ?> </h5>
                                <p><?php echo $key["acabamento_obra"]; ?></p>
                                <p><a href="/galeria/contato-galeria/"> Entrar em contato </a></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <div class="column">
                    <?php foreach($obras_photoarts_collum_4 as $key){ ?>
                        <div>
                            <a href="<?php echo get_home_url() . '/galeria/trabalhos-galeria/obra_photoarts/?artista=/dba&obra=' . $key['id']; ?>">
                                <img src="<?php echo $key["imagem_url"]; ?>" style="width:100%">
                                <h5> <?php echo $key["nome_obra"]; ?> </h5>
                                <p><?php echo $key["acabamento_obra"]; ?></p>
                                <p><a href="/galeria/contato-galeria/"> Entrar em contato </a></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>

            </div>
        <?php
    }
?>