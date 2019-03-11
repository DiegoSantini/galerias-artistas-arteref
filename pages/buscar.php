<head>
<?php get_header(); 
if (isset($GET['pesquisa'])) {
    $data_pesquisa = $GET['pesquisa'];
}
?>
</head>

<div class="container">

    <div class="row">
        <div class="col-lg-12 galeria_menu_container">
            <?php galeria_menu(); ?> 
        </div>
    </div>
  <?php echo $buscar = "Artes"; echo $data_pesquisa; ?>
    <h1>Resultado da busca!</h1>

</div>
<?php get_footer(); ?> 