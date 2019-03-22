<?php
if (! defined ( 'ABSPATH' )) {
    exit ();
}
//Galeria
if (isset($_POST['cadastro_galeria_nome']) && isset($_POST['cadastro_galeria_local']) && isset($_POST['cadastro_galeria_descricao']) ) {

    $nome = sanitize_text_field($_POST['cadastro_galeria_nome']);
    $local = sanitize_text_field($_POST['cadastro_galeria_local']);
    $descricao = sanitize_text_field($_POST['cadastro_galeria_descricao']);
    $today = date("Y-m-d H:i:s");
     
    $db = new db_galeria_artista_dao();

            $data_galeria = $db->insert(
                'wp_galerias',
                array(
                    'data'      => $today,
                    'nome_galeria'=>$nome,
                    'local'=>$local,
                    'descricao_galeria'=>$descricao,
                    'logo_url'=> 'logo'
                )
            );
            
       echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

if (isset($_POST['editar_galeria_nome']) && isset($_POST['editar_galeria_local']) && isset($_POST['editar_galeria_descricao']) ) {

    $nome = sanitize_text_field($_POST['editar_galeria_nome']);
    $local = sanitize_text_field($_POST['editar_galeria_local']);
    $descricao = sanitize_text_field($_POST['editar_galeria_descricao']);
    $today = date("Y-m-d H:i:s");
     
    $db = new db_galeria_artista_dao();

            $data_galeria = $db->update(
                'wp_galerias',
                array(
                    'data'      => $today,
                    'nome_galeria'=>$nome,
                    'local'=>$local,
                    'descricao_galeria'=>$descricao,
                    'logo_url'=> 'logo'
                ),
                array(
                    'id'=>$id
                )
            );
            
}
//Pensar em alguma forma de fazer a exclusāo
// if (isset($_POST['editar_galeria_nome']) && isset($_POST['editar_galeria_local']) && isset($_POST['editar_galeria_descricao']) ) {
     
//     $db = new db_galeria_artista_dao();
//     $data_galeria = $db->delete(
//         'wp_galerias',
//         array(
//         'id'=>$id
//         )
//     );
// }

//Obras
 if (isset($_POST['cadastro_obras_nome']) && isset($_POST['cadastro_obras_artista']) && isset($_POST['cadastro_obras_descricao']) && isset($_POST['cadastro_obras_acabamento']) && isset($_POST['cadastro_obras_preco']) && isset($_POST['cadastro_obras_estilo'])  ) {
   
    $nome = sanitize_text_field($_POST['cadastro_obras_nome']);
    $artista = sanitize_text_field($_POST['cadastro_obras_artista']);
    $descricao = sanitize_text_field($_POST['cadastro_obras_descricao']);
    $acabamento = $_POST['cadastro_obras_acabamento'];
    $preco = sanitize_text_field($_POST['cadastro_obras_preco']);
    $estilo = sanitize_text_field($_POST['cadastro_obras_estilo']);
    $today = date("Y-m-d H:i:s");
     
    $db = new db_galeria_artista_dao();

            $data_obras = $db->insert(
                'wp_galeria_artista_obras',
                array(
                    'data'      => $today,
                    'nome_obra'=>$nome,
                    'id_artista'=>$artista,
                    'descricao_obra'=>$descricao,
                    'acabamento_obra' => $acabamento,
                    'preco'=>$preco,
                    'estilo_obra'=>$estilo,
                    'imagem_url'=> 'obra'
                )
            );
            // $data_estilos = $db->insert(
            //     'wp_galeria_artista_obras_estilos',
            //     array(
            //         'select' => "*"
            //     )
            // );        
       echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

?>