<head>
<?php get_header(); 
$id_artista = '*';
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
}else{
    $data_galeria = null;
}
$page_index = 'obras';
?>
</head>

<div class="container">
      
    <div class="row">
        <div class="col-lg-12 galeria_menu_container">
            <?php galeria_menu(); ?> 
        </div>
    </div>

    <div class="row">
        <?php galeria_logo($data_galeria); ?>
        <div class='col-lg-12 galeria_menu_interno_container'>
            <?php  galeria_menu_interno($page_index); ?>
        </div>
    </div>

    <div class="row">
        <?php galeria_trabalhos($id_artista); ?>
    </div>

</div>

<?php get_footer(); ?> 