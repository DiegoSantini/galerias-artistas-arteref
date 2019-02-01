<?php 
    function galeria_artistas(){

        $artistas = array(
            array(
                "nome" => "Paulo Varella",
                "nome_obra" => "Garotas em Havana",
                "material_tamanho" => "meta 5mm 60x60cm fine-art",
                "url_imagem" => "https://www.photoarts.com.br/media/catalog/product/cache/2/small_image/540x720/9df78eab33525d08d6e5fb8d27136e95/g/a/garotas_em_havana_60x90.jpg",
                "url_pagina_fotografo" => "https://www.photoarts.com.br/fotografos/brasil/paulo-varella.html"
            ),
            array(
                "nome" => "Alexandre Militão",
                "nome_obra" => "Garotas em Havana",
                "material_tamanho" => "meta 5mm 60x60cm fine-art",
                "url_imagem" => "https://www.photoarts.com.br/media/catalog/product/cache/2/small_image/540x720/9df78eab33525d08d6e5fb8d27136e95/g/a/garotas_em_havana_60x90.jpg",
                "url_pagina_fotografo" => "https://www.photoarts.com.br/fotografos/brasil/paulo-varella.html"
            ),
            array(
                "nome" => "André Figueiredo",
                "nome_obra" => "Garotas em Havana",
                "material_tamanho" => "meta 5mm 60x60cm fine-art",
                "url_imagem" => "https://www.photoarts.com.br/media/catalog/product/cache/2/small_image/540x720/9df78eab33525d08d6e5fb8d27136e95/g/a/garotas_em_havana_60x90.jpg",
                "url_pagina_fotografo" => "https://www.photoarts.com.br/fotografos/brasil/paulo-varella.html"
            ),
            array(
                "nome" => "Dede Fedrizzi",
                "nome_obra" => "Garotas em Havana",
                "material_tamanho" => "meta 5mm 60x60cm fine-art",
                "url_imagem" => "https://www.photoarts.com.br/media/catalog/product/cache/2/small_image/540x720/9df78eab33525d08d6e5fb8d27136e95/g/a/garotas_em_havana_60x90.jpg",
                "url_pagina_fotografo" => "https://www.photoarts.com.br/fotografos/brasil/paulo-varella.html"
            )
        );
?>
        <div class='scroll_posts'>
                    
            <div class='scroll_container'>

                <div class='scroll_button'>
                    <button class='scroll_prev'><span class='glyphicon glyphicon-chevron-left'></span></button>
                </div>

                <div class="scrolling-wrapper">
                    <?php foreach($artistas as $key){ ?>
                        <a href="<?php echo $key['url_pagina_fotografo']; ?>">
                            <div class="card">
                                <img src="<?php echo $key['url_imagem']; ?>" alt="">
                                    <div>
                                        <?php echo $key['nome']; ?>
                                        <?php echo $key['nome_obra']; ?>
                                    </div>
                            </div>
                        </a>
                    <?php } ?>

                    <div class="post_card_ver_mais">
                        <div>
                            <a href="<?php echo '#' ?>">
                                <img src="<?php echo plugins_url(); ?>/home-arteref/content/img/saber-mais.svg" border="0" />
                                    Ver tudo!
                            </a>
                        </div>
                    </div>
                </div>
                            
                <div class='scroll_button'>
                    <button class='scroll_next'><span class='glyphicon glyphicon-chevron-right'></span></button>
                </div>

            </div>

        </div>
<?php
    }
?>