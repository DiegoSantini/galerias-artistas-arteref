<head>
<?php get_header(); 

if (isset($_GET['id']) && isset($_GET['id_artista'])) {
    $id = $_GET['id'];
    $id_artista = $_GET['id_artista'];

    $db = new db_galeria_artista_dao();
    $data_galeria = $db->get(
        'wp_galerias',
        array(
            'select' => '*',
            'campo'  => 'id',
            'id'     => $id
        )
    );

    $data_artista = $db->get(
        'wp_galeria_artista',
        array(
            'select' => '*',
            'campo'  => 'id',
            'id'     => $id_artista
        )
    );
}else{
    $data_galeria = null;
    $data_artista = null;
}
$page_index = 'artista';
?>
</head>

<div class="container">

    <div class="row">
        <div class="col-lg-12 galeria_menu_container">
            <?php galeria_menu(); ?> 
        </div>
    </div>

    <?php galeria_logo($data_galeria); ?>

    <div class='col-lg-12 galeria_menu_interno_container'>
        <?php  galeria_menu_interno($page_index); ?>
    </div>
    
    <div class="row">
        <div class="col-lg-12 galeria_artista_conteudo">
            
            <div class="col-lg-6">
                <h3><?php echo $data_artista[0]['nome_artista']; ?></h3>
            </div>

            <div class="col-lg-6">
                <div class="galeria_artista_biografia">
                    <?php echo $data_artista[0]['biografia']; ?>
                </div>
            </div>
        </div>
        <?php galeria_trabalhos($data_artista[0]["id"]); ?>
    </div>

</div>
<?php get_footer(); ?> 