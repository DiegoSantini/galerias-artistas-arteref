<head>
<?php get_header(); 

if (isset($_GET['estilo'])) {
    $id_estilo = array('estilo' => $_GET['estilo']);
}else{
    $data_galeria = null;
}
?>
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

    </div>
    
    <div class="col-lg-12">
        <h1>Procure por obras de arte:</h1>
        <?php galerias_estilo(); ?>
        <div class="col-lg-9">
            <hr>
            <?php galeria_trabalhos($id_estilo); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?> 