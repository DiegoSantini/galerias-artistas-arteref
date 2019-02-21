<head>
<?php get_header(); 

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

    $data_artista = $db->get(
        'wp_galeria_artista',
        array(
            'select' => '*'
        )
    );
}else{
    $data_galeria = null;
    $data_artista = null;
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
    <?php foreach ($data_artista as $key) {?>
        <div class="col-lg-12">
            <hr>
            
            <div class="col-lg-6">
                <h3><?php echo $key['nome_artista']; ?></h3>
                <p>Brasil</p>
            </div>

            <div class="col-lg-6">
                <div class='galeria_artista_biografia'>
                    <?php echo $key['biografia']; ?>
                </div>
            </div>

            <div class="col-lg-12">
                <?php galeria_trabalhos($key['id']); ?>
            </div>
            
        </div>
    <?php } ?>
    
        <hr>

    </div>

</div>

<?php get_footer(); ?> 