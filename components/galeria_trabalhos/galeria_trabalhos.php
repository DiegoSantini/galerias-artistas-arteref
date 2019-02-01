<?php 
    function galeria_trabalhos(){

        $obras = array(
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/nuclear-weapons-test-nuclear-weapon-weapons-test-explosion-73909.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/people-peoples-homeless-male.jpg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-57905.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-89095.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            )
        );
        $obras_2 = array(
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-556669.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-566641.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-595747.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            )
        );
        $obras_3 = array(
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-1012982.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-1038041.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-910214.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            )
        );
        $obras_4 = array(
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-325045.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-220071.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            ),
            array(
                "img_url" => "https://arteref.com/wp-content/uploads/2019/01/pexels-photo-206064.jpeg",
                "titulo_obra" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "acabamento_obra" => "Acabamento Metacrilato 5mm",
                "link_obra" => "#"
            )
        )
        ?>  
            <div class="galeria_trabalhos_grid_image row">

                <?php //print_r(array_slice($obras, 0, 4)); ?> 
                <?php //print_r(count($obras)); ?> 

                <!-- Photo Grid -->
                
                <div class="column">
                    <?php foreach($obras as $key){ ?>
                        <div>
                            <img src="<?php echo $key["img_url"]; ?>" style="width:100%">
                            <h5> <?php echo $key["titulo_obra"]; ?> </h5>
                            <p><?php echo $key["acabamento_obra"]; ?></p>
                            <p><a href="#"> Entrar em contato </a></p>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="column">
                    <?php foreach($obras_2 as $key){ ?>
                        <div>
                            <img src="<?php echo $key["img_url"]; ?>" style="width:100%">
                            <h5> <?php echo $key["titulo_obra"]; ?> </h5>
                            <p><?php echo $key["acabamento_obra"]; ?></p>
                            <p><a href="#"> Entrar em contato </a></p>
                        </div>
                    <?php } ?>
                </div>

                <div class="column">
                    <?php foreach($obras_3 as $key){ ?>
                        <div>
                            <img src="<?php echo $key["img_url"]; ?>" style="width:100%">
                            <h5> <?php echo $key["titulo_obra"]; ?> </h5>
                            <p><?php echo $key["acabamento_obra"]; ?></p>
                            <p><a href="#"> Entrar em contato </a></p>
                        </div>
                    <?php } ?>
                </div>

                <div class="column">
                    <?php foreach($obras_4 as $key){ ?>
                        <div>
                            <img src="<?php echo $key["img_url"]; ?>" style="width:100%">
                            <h5> <?php echo $key["titulo_obra"]; ?> </h5>
                            <p><?php echo $key["acabamento_obra"]; ?></p>
                            <p><a href="#"> Entrar em contato </a></p>
                        </div>
                    <?php } ?>
                </div>

            </div>
        <?php
    }
?>