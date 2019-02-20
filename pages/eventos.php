<head> 
<?php 
    get_header(); 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $db = new db_galeria_artista_dao();
        $data_galeria = $db->get(
            'wp_galerias',
            array(
                'select' => '*',
                'campo'  => 'id',
                'id'     => $id
            )
        );

        $data_eventos = $db->get(
            'wp_galeria_eventos',
            array(
                'select' => '*',
                'campo'  => 'id_galeria',
                'id' => $id
            )
        );

    }else{
        $data_galeria = null;
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
                    <?php galeria_menu();?> 
                </div>
            </div>
        </div>

    </div>

    <?php galeria_logo($data_galeria); ?>

    <div class='col-lg-12 galeria_menu_interno_container'>
        <?php  galeria_menu_interno(); ?>
    </div>
    
    <div class="row">
        <?php galeria_evento_destaque($data_eventos); ?>
    </div>

    <div class="row">
        <h3>Eventos que já aconteceram</h3>
        <?php galeria_eventos_lista($data_eventos); ?>
    </div>

</div>

<?php get_footer(); ?> 