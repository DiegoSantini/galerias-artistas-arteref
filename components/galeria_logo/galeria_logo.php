<?php 
    function galeria_logo($data_galeria){

        if ($data_galeria != null) {
            $nome_galeria = $data_galeria[0]['nome_galeria'];
            $logo_url     = $data_galeria[0]['logo_url'];
            $local        = $data_galeria[0]['local'];
        }else{
            $nome_galeria = 'Photoarts Gallery';
            $logo_url     = 'https://arteref.com/wp-content/uploads/2019/01/Logo-Photoarts-cracha-low-for-site.png';
            $local        = 'São Paulo';
        }

        ?>
            <div class="col-lg-12 galeria_artista_logo">
    
                <div class="col-lg-6">
                <h1><?php echo $nome_galeria; ?></h1>
                <p>
                    <?php echo $local; ?>
                </p>
                </div>

                <div class="col-lg-6 galeria_logo_img">
                    <img src="<?php echo $logo_url; ?>" alt="">
                </div>
                
            </div>
        <?php
    }
?>