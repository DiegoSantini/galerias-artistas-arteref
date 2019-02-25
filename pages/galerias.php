<head>
<?php 
get_header(); 

    $db = new db_galeria_artista_dao();
    $data_galeria_eventos = $db->get(
        'wp_galeria_eventos',
        array(
            'select' => '*',
            'campo'  => 'id',
            'id'     => '14 OR id = 15'
        )
    );

    $data_galeria_principais_eventos = $db->get(
        'wp_galeria_eventos',
        array(
            'select' => '*',
        )
    );

    $data_galeria_obras = $db->get(
        'wp_galeria_artista_obras',
        array(
            'select' => '*',
            'campo'  => 'id',
            'id'     => '11 OR id = 20'
        )
    );
    $data = array_merge($data_galeria_eventos, $data_galeria_obras);
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
</div>

<div class='container container_home_slide'>
    <?php galerias_home_slide($data); ?>
</div>
    
<div class='container'>
    <?php galerias_home_estilos(); ?>

    <div class="col-lg-12">
        <h4>Obras em destaque: </h4>
        <?php galeria_trabalhos( array('4', '5', '9', '10', '11', '12', '27', '28')); 
        ?>
    </div>

    <div class="col-lg-12 galerias_home_eventos">
        <h4>Principais eventos</h4>
        <?php galeria_eventos_lista($data_galeria_principais_eventos); ?>
    </div>

    <div class="col-lg-12">
        <h4>Arteref</h4>
        <?php galerias_home_arteref(); ?>
    </div>
    
</div>

<div>
    <?php get_footer(); ?> 
</div>