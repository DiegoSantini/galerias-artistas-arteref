<head>
<?php get_header(); ?>
</head>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php galeria_menu(); ?> 
        </div>
        <div class="cole-lg-6 galeria_artista_titulo">
            <span>Galeria Photoarts</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php galeria_artistas(); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <?php galeria_conteudo(); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <?php galeria_artistas(); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <?php galeria_artistas(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?> 