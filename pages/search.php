<head>
<?php get_header(); 
if (isset($GET['s'])) {
    $data_pesquisa = $GET['s'];
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
  <?php echo $search = "Artes"; echo $data_pesquisa; ?>
    <h1>Resultado da busca!</h1>

</div>

<?php get_footer(); ?> 