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
        <div class="col-lg-6 galeria_contato_formulario">
            <?php form_contato(); ?>
        </div>
        <div class="col-lg-6">
            <!-- <?php //google_maps(); ?> -->
        </div>
    </div>
</div>

<?php get_footer(); ?> 