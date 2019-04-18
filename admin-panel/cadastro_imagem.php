<?php 
function cadastro_imagem(){
    ?>
    <?php 

$array = array();
// $teste = array();

$array=array('Nome', 'email', 'telefone');
// $teste=array(458);

$string_final = implode(" , ", $array);
// $string_final_teste = implode(" , ", $array);

echo $string_final;
// echo $string_final_teste;
?>
<?php
}
?>