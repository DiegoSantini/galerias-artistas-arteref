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

        <?php galeria_logo($data_galeria); ?>

        <div class='col-lg-12 galeria_menu_interno_container'>
            <?php  galeria_menu_interno(); ?>
        </div>
        
    </div>

    <div class="row">
        <?php galeria_trabalhos($id_artista); ?>
    </div>

</div>

<?php get_footer(); ?> 