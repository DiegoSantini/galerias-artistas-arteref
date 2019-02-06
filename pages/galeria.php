<head>
<?php get_header(); ?>
</head>

<div class="container">
    <div class="row">

        <div class="col-lg-6">
            <?php galeria_menu(); ?> 
        </div>
        <div class="cole-lg-6 galeria_artista_titulo">
            <div>
               <span></span>
            </div>
        </div>
        
        <?php galeria_logo(); ?>
        
    </div>
    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_artistas(0); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_conteudo(); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_artistas(6); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_artistas(12); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?> 