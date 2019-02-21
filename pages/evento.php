<head> 
<?php 
    get_header(); 
    if (isset($_GET['id']) && isset($_GET['id_evento'])) {
        $id = $_GET['id'];
        $id_evento = $_GET['id_evento'];

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
                'campo'  => 'id',
                'id' => $id_evento
            )
        );

        $data_eventos_geral = $db->get(
            'wp_galeria_eventos',
            array(
                'select' => '*',
                'campo'  => 'id_galeria',
                'id'     => $id
            )
        );

    }else{
        $data_galeria = null;
        $data_eventos = null;
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
    <div class="galeria_evento_container">
        
        <!--
        <div class="col-lg-6 galeria_evento_descricao_container">
           
            <div 
                style="background-image:
                    url('<?php //echo $data_eventos[0]['url_img_destaque'];?> ?>'); 
                width:900px; 
                height:100%; 
                background-repeat: no-repeat;
                background-position: center;">&nbsp;
            </div>
           
        </div>
         -->

        <div class="col-lg-12 galeria_evento_descricao_container">
            
            <div class="col-lg-6">
                <img src="<?php echo $data_eventos[0]['url_img_destaque'];?> " alt="">
            </div>

            <div class="col-lg-6">

                <h3><?php echo $data_galeria[0]['nome_galeria']; ?></h3>
                <p>Local: <?php echo $data_eventos[0]['local']; ?></p>
                <p><i><?php echo date('d/m/Y', strtotime($data_eventos[0]['data_inicio'])) . ' - ' . date('d/m/y', strtotime($data_eventos[0]['data_termino'])); ?></i><p>

                <h3><?php echo $data_eventos[0]['nome_evento']; ?></h3>
                <p class='galeria_evento_descricao'><?php echo$data_eventos[0]['descricao_completa']; ?></p>
                
            </div>

        </div>

        <div class="col-lg-12 galeria_evento_descricao_container galeria_outros_eventos">
            <h5>Outros eventos da <?php echo  $data_galeria[0]['nome_galeria']; ?></h5>
            <?php  galeria_eventos_lista($data_eventos_geral); ?>
        </div>

    </div>

</div>
<?php get_footer(); ?> 