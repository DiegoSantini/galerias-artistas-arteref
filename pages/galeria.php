<head>
<?php get_header(); ?>
</head>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12 galeria_menu_container">
            <div class="col-lg-6">
                <span></span>
            </div>
            <div class="cole-lg-6">
                <div>
                    <?php galeria_menu(); ?> 
                </div>
            </div>
        </div>
        
        <?php galeria_logo(); ?>
        
    </div>

    <div class="row">
        <?php galeria_evento_destaque(); ?>
    </div>

    <div class="row">
       <?php galeria_conteudo(); ?>
    </div>

    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_artistas(0); ?>
        </div>
    </div>

    <div class="row">
        <?php galeria_artista_lista(); ?>
    </div>
    <hr>
    
</div>

<?php get_footer(); ?> 