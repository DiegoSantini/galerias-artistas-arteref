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
        <hr>
        <div class="col-lg-12 galeria_artista_logo">
            <img src="https://arteref.com/wp-content/uploads/2019/01/Logo-Photoarts-cracha-low-for-site.png" alt="Logo photoarts gallery">
        </div>
        <hr>
    </div>
    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_artistas(); ?>
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
            <?php galeria_artistas(); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class='scroll_post_container'>
            <?php galeria_artistas(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?> 