<head>
<?php get_header(); 
if (isset($POST['pesquisa'])) {
    $data_pesquisa = $GET['pesquisa'];
}else{
    $data_pesquisa = 'Passe um parametro para pesquisar';
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