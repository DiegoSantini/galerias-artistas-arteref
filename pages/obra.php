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

    <?php galeria_logo($data_galeria = null); ?>
    
    <div class='col-lg-12 galeria_menu_interno_container'>
        <?php  galeria_menu_interno(); ?>
    </div>
    </div>
    
    <div class="row">
        <?php  galeria_obra_conteudo(); ?>
    </div>
</div>

<?php get_footer(); ?> 