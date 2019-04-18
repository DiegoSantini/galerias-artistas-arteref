<?php
if (! defined ( 'ABSPATH' )) {
    exit ();
}

//Imagens
function upload_user_file( $file = array() ) {
    // echo "Entrou na função!! <br/>";
        require_once( ABSPATH . 'wp-admin/includes/admin.php' );

        $file_return = wp_handle_upload( $file, array('test_form' => false ) );
        
        if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
           // echo "Reetorna false!! <br/>";
            return false;
        } else {
            //echo "Inicia upload!! <br/>";
            $filename = $file_return['file'];

            $attachment = array(
                'post_mime_type' => $file_return['type'],
                'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                'post_content' => '',
                'post_status' => 'inherit',
                'guid' => $file_return['url']
            );

            $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );

            // echo "Faz upload!! <br/>";
            // echo $attachment_id  . "<br/>";

            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
            wp_update_attachment_metadata( $attachment_id, $attachment_data );
            
            // echo $attachment_data  . "<br/>";

            $id = media_handle_sideload( $file, 0 );
            if (is_wp_error( $id )){
                // echo "error!!";
            }

            if( 0 < intval( $attachment_id ) ) {
                return $attachment_id;
            }
        }
   
      return false;
}

//Galerias
    if (isset($_POST['cadastro_galeria_nome']) && isset($_POST['cadastro_galeria_local']) && isset($_POST['cadastro_galeria_descricao'])    ) {

    $nome = sanitize_text_field($_POST['cadastro_galeria_nome']);
    $local = sanitize_text_field($_POST['cadastro_galeria_local']);
    $descricao = sanitize_text_field($_POST['cadastro_galeria_descricao']);
    $file=$_FILES['file'];
    $today = date("Y-m-d H:i:s");
     
    if(isset($_POST['upload']))
    {
       if( ! empty( $_FILES ) ) 
       {
          $file=$_FILES['file'];
          $attachment_id = upload_user_file( $file );
        //var_dump($attachment_id);
       }
    }

    echo("Imagem enviada com sucesso!");

    $db = new db_galeria_artista_dao();

            $data_galeria = $db->insert(
                'wp_galerias',
                array(
                    'data'      => $today,
                    'nome_galeria'=>$nome,
                    'local'=>$local,
                    'descricao_galeria'=>$descricao,
                    'logo_url'=> $attachment_id
                )
            );
            
       echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}


    if (isset($_POST['editar_galeria_nome']) && isset($_POST['editar_galeria_local']) && isset($_POST['editar_galeria_descricao']) ) {
    
    $nome = sanitize_text_field($_POST['editar_galeria_nome']);
    $local = sanitize_text_field($_POST['editar_galeria_local']);
    $descricao = sanitize_text_field($_POST['editar_galeria_descricao']);
    $file=$_FILES['file'];
    $today = date("Y-m-d H:i:s");
    $id = $_GET['id'];


   
    // if(isset($_POST['upload']))
    // {
    //    if( ! empty( $_FILES ) ) 
    //    {
    //       $file=$_FILES['file'];
    //       $attachment_id = upload_user_file( $file );
    //    }
    // }

    // echo("Imagem enviada com sucesso!");


    if(isset($_POST['upload']))
    {
        if( ! empty( $_FILES['file']['name'] ) ) 
        {
           $file = $_FILES['file'];
           $attachment_id = upload_user_file( $file );
            
           $args = array(
            'data'      => $today,
            'nome_galeria'=>$nome,
            'local'=>$local,
            'descricao_galeria'=>$descricao,
            'logo_url'=> $attachment_id
           );

        }else{
            $args = array(
                'data'      => $today,
                'nome_galeria'=>$nome,
                'local'=>$local,
                'descricao_galeria'=>$descricao,
           );
        }
        echo("Imagem enviada com sucesso!");
    }

    $db = new db_galeria_artista_dao();

            $data_galeria = $db->update(
                'wp_galerias',
                // array(
                //     'data'      => $today,
                //     'nome_galeria'=>$nome,
                //     'local'=>$local,
                //     'descricao_galeria'=>$descricao,
                //     'logo_url'=> $attachment_id
                // ),
                $args,
                array(
                    'id'=>$id
                )
            );
     echo "<meta HTTP-EQUIV='refresh' CONTENT='0;url=http://localhost/novo_arteref/wp-admin/admin.php?page=galerias_artistas'>";
            
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

if (isset($_POST['cadastro_obras_nome']) && isset($_POST['cadastro_obras_artista']) && isset($_POST['cadastro_obras_descricao']) && isset($_POST['cadastro_obras_acabamento']) && isset($_POST['cadastro_obras_preco']) && isset($_POST['cadastro_obras_estilo']) && isset($_FILES['file']) ) {
   
    $nome = sanitize_text_field($_POST['cadastro_obras_nome']);
    $artista = sanitize_text_field($_POST['cadastro_obras_artista']);
    $descricao = sanitize_text_field($_POST['cadastro_obras_descricao']);
    $acabamento = $_POST['cadastro_obras_acabamento'];
    $preco = sanitize_text_field($_POST['cadastro_obras_preco']);
    $estilo = sanitize_text_field($_POST['cadastro_obras_estilo']);
    $file = $_FILES['file'];
    $today = date("Y-m-d H:i:s");

    if(isset($_POST['upload']))
    {
       if( ! empty( $_FILES ) ) 
       {
          $file=$_FILES['file'];
          $attachment_id = upload_user_file( $file );
       }else{
       }
    }

     echo("Imagem enviada com sucesso!");
     
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
                    'imagem_url'=> $attachment_id
                )
            );

         echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";

} 

 if (isset($_POST['editar_obras_nome']) && isset($_POST['editar_obras_artista']) && isset($_POST['editar_obras_descricao']) && isset($_POST['editar_obras_acabamento']) && isset($_POST['editar_obras_preco']) && isset($_POST['editar_obras_estilo']) && isset($_FILES['file']) ) {
   
    $nome = sanitize_text_field($_POST['editar_obras_nome']);
    $artista = sanitize_text_field($_POST['editar_obras_artista']);
    $descricao = sanitize_text_field($_POST['editar_obras_descricao']);
    $acabamento = $_POST['editar_obras_acabamento'];
    $preco = sanitize_text_field($_POST['editar_obras_preco']);
    $estilo = sanitize_text_field($_POST['editar_obras_estilo']);
    $file = $_FILES['file'];
    $today = date("Y-m-d H:i:s");
    $id = $_GET['id'];


    // if(isset($_POST['editar_eventos_obra'])){
 
    //     $obra = $_POST['editar_eventos_obra'];
    //     for ($i=0; $i < count($obra); $i++) { 
    //     echo $obra[$i];
    //     }
    //     }else{
    //     echo "deu pau";
    //     }

    if(isset($_POST['upload']))
    {
        if( ! empty( $_FILES['file']['name'] ) ) 
        {
           $file = $_FILES['file'];
           $attachment_id = upload_user_file( $file );
            
           $args = array(
                'data'      => $today,
                'nome_obra'=>$nome,
                'id_artista'=>$artista,
                'descricao_obra'=>$descricao,
                'acabamento_obra' => $acabamento,
                'preco'=>$preco,
                'estilo_obra'=>$estilo,
                'imagem_url'=> $attachment_id
           );

        }else{
            $args = array(
                'data'      => $today,
                'nome_obra'=>$nome,
                'id_artista'=>$artista,
                'descricao_obra'=>$descricao,
                'acabamento_obra' => $acabamento,
                'preco'=>$preco,
                'estilo_obra'=>$estilo
           );
        }
        echo("Imagem enviada com sucesso!");
    }
     
    $db = new db_galeria_artista_dao();

            $data_obras = $db->update(
                'wp_galeria_artista_obras',
            //    array(
            //     'data'      => $today,
            //     'nome_obra'=>$nome,
            //     'id_artista'=>$artista,
            //     'descricao_obra'=>$descricao,
            //     'acabamento_obra' => $acabamento,
            //     'preco'=>$preco,
            //     'estilo_obra'=>$estilo,
            //     'imagem_url'=> $attachment_id
            //    ),
            $args,
                array(
                    'id'=>$id
                )
            );
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;url=http://localhost/novo_arteref/wp-admin/admin.php?page=galerias_obras'>";      
}          

//Estilos
if (isset($_POST['cadastro_estilo_obra_nome']) && isset($_POST['cadastro_estilo_destaque']) ){
    $nome = sanitize_text_field($_POST['cadastro_estilo_obra_nome']);
    $destaque = sanitize_text_field($_POST['cadastro_estilo_destaque']);
    $today = date("Y-m-d H:i:s");
     
    $db = new db_galeria_artista_dao();

            $data_estilos = $db->insert(
                'wp_galeria_artista_obras_estilos',
                array(
                    'data_cadastro'      => $today,
                    'estilo_obra'=>$nome,
                    'obra_destaque'=>$destaque
                )
            );
        
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

if (isset($_POST['editar_estilo_obra_nome']) && isset($_POST['editar_estilo_destaque']) ){
    $nome = sanitize_text_field($_POST['editar_estilo_obra_nome']);
    $destaque = sanitize_text_field($_POST['editar_estilo_destaque']);
    $today = date("Y-m-d H:i:s");
    $id = $_GET['id'];
     
    $db = new db_galeria_artista_dao();

            $data_estilos = $db->update(
                'wp_galeria_artista_obras_estilos',
                array(
                    'data_cadastro'      => $today,
                    'estilo_obra'=>$nome,
                    'obra_destaque'=>$destaque
                ),
                array(
                    'id'=>$id
                )
            );
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;url=http://localhost/novo_arteref/wp-admin/admin.php?page=galerias_estilos'>";
} 

//Eventos
if (isset($_POST['cadastro_eventos_nome']) && isset($_POST['cadastro_eventos_local_galeria']) && isset($_POST['cadastro_eventos_descricao_resumida']) && isset($_POST['cadastro_eventos_descricao_completa']) && isset($_POST['cadastro_eventos_obra']) && isset($_POST['cadastro_eventos_galeria']) ) {
   
    $nome = sanitize_text_field($_POST['cadastro_eventos_nome']);
    $local = sanitize_text_field($_POST['cadastro_eventos_local_galeria']);
    $resumo = sanitize_text_field($_POST['cadastro_eventos_descricao_resumida']);
    $descricao = sanitize_text_field($_POST['cadastro_eventos_descricao_completa']);
    $obras = sanitize_text_field($_POST['cadastro_eventos_obra']);
    $galeria = sanitize_text_field($_POST['cadastro_eventos_galeria']);
    $file = $_FILES['file'];
    $data_inicio= $_POST['cadastro_eventos_data_inicio'];
    $data_fim= $_POST['cadastro_eventos_data_fim'];
    $today = date("Y-m-d H:i:s");

    if(isset($_POST['upload']))
    {
       if( ! empty( $_FILES ) ) 
       {
          $file=$_FILES['file'];
          $attachment_id = upload_user_file( $file );
        // var_dump($attachment_id);
       }
       echo("Imagem enviada com sucesso!");
    }    
    
    $db = new db_galeria_artista_dao();

            $data_eventos = $db->insert(
                'wp_galeria_eventos',
                array(
                    'data'      => $today,
                    'nome_evento'=>$nome,
                    'url_img_destaque'=>$attachment_id,
                    'local'=>$local,
                    'data_inicio'=>$data_inicio,
                    'data_termino'=>$data_fim,
                    'descricao_resumida'=>$resumo,
                    'descricao_completa' => $descricao,
                    'obras'=>$obras,
                    'id_galeria'=>$galeria
                )
            );      
       echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

// if (isset($_POST['editar_eventos_nome']) && isset($_POST['editar_eventos_local_galeria']) && isset($_POST['editar_eventos_descricao_resumida']) && isset($_POST['editar_eventos_descricao_completa']) && isset($_POST['editar_eventos_obra']) && isset($_POST['editar_eventos_galeria']) ) {
    if (isset($_POST['editar_eventos_nome']) && isset($_POST['editar_eventos_local_galeria']) && isset($_POST['editar_eventos_descricao_resumida']) && isset($_POST['editar_eventos_descricao_completa']) && isset($_POST['editar_eventos_obra']) ) {  
    $nome = sanitize_text_field($_POST['editar_eventos_nome']);
    $local = sanitize_text_field($_POST['editar_eventos_local_galeria']);
    $resumo = sanitize_text_field($_POST['editar_eventos_descricao_resumida']);
    $descricao = sanitize_text_field($_POST['editar_eventos_descricao_completa']);
    $obras = sanitize_text_field($_POST['editar_eventos_obra']);
    // $galeria = sanitize_text_field($_POST['editar_eventos_galeria']);
    $file = $_FILES['file'];
    $data_inicio= $_POST['editar_eventos_data_inicio'];
    $data_fim= $_POST['editar_eventos_data_fim'];
    $today = date("Y-m-d H:i:s");
    $id = $_GET['id'];
    
    // if(isset($_POST['editar_eventos_obra'])){
 
    //     $obra = $_POST['editar_eventos_obra'];
    //     for ($i=0; $i < count($obra); $i++) { 
    //     echo $obra[$i];
    //     }
    //     }else{
    //     echo "deu pau";
    //     }

    if(isset($_POST['upload']))
    {
        if( ! empty( $_FILES['file']['name'] ) ) 
        {
           $file = $_FILES['file'];
           $attachment_id = upload_user_file( $file );
            
           $args = array(
            'data'      => $today,
            'nome_evento'=>$nome,
            'url_img_destaque'=>$attachment_id,
            'local'=>$local,
            'data_inicio'=>$data_inicio,
            'data_termino'=>$data_fim,
            'descricao_resumida'=>$resumo,
            'descricao_completa' => $descricao,
            'obras'=>$obras,
            'id_galeria'=>$galeria
           );

        }else{
            $args = array(
                'data'      => $today,
                'nome_evento'=>$nome,
                'local'=>$local,
                'data_inicio'=>$data_inicio,
                'data_termino'=>$data_fim,
                'descricao_resumida'=>$resumo,
                'descricao_completa' => $descricao,
                'obras'=>$obras,
                // 'id_galeria'=>$galeria
           );
        }
        echo("Imagem enviada com sucesso!");
        // var_dump($obras);
    }

    $db = new db_galeria_artista_dao();

            $data_eventos = $db->update(
                'wp_galeria_eventos',
                // array(
                //     'data'      => $today,
                //     'nome_evento'=>$nome,
                //     'url_img_destaque'=>$attachment_id,
                //     'local'=>$local,
                //     'data_inicio'=>$data_inicio,
                //     'data_termino'=>$data_fim,
                //     'descricao_resumida'=>$resumo,
                //     'descricao_completa' => $descricao,
                //     'obras'=>$obras,
                //     'id_galeria'=>$galeria
                // ),
                $args,
                array(
                    'id'=>$id
                )
            );  
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;url=http://localhost/novo_arteref/wp-admin/admin.php?page=galerias_eventos'>";
}
//Pensar em alguma forma de fazer a exclusāo
// if (isset($_POST['editar_galeria_nome']) && isset($_POST['editar_galeria_local']) && isset($_POST['editar_galeria_descricao']) ) {
     
//     $db = new db_galeria_artista_dao();
//     $data_eventos = $db->delete(
//         'wp_galeria_eventos',
//         array(
//         'id'=>$id
//         )
//     );
// }

//Mensagens

if (isset($_POST['cadastro_mensagens_nome']) && isset($_POST['cadastro_mensagens_email']) && isset($_POST['cadastro_mensagens_mensagem']) ){
    $nome = sanitize_text_field($_POST['cadastro_mensagens_nome']);
    $email = sanitize_text_field($_POST['cadastro_mensagens_email']);
    $mensagem = sanitize_text_field($_POST['cadastro_mensagens_mensagem']);
    $today = date("Y-m-d H:i:s");
     
    $db = new db_galeria_artista_dao();

            $data_estilos = $db->insert(
                'wp_galeria_artista_contato',
                array(
                    'data'      => $today,
                    'name'=>$nome,
                    'email'=>$email,
                    'text'=>$mensagem
                )
            );
        
     echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

//Artistas
if (isset($_POST['cadastro_artista_nome']) && isset($_POST['cadastro_artista_biografia']) && isset($_POST['cadastro_artista_ativo']) ) {

    $nome = sanitize_text_field($_POST['cadastro_artista_nome']);
    $biografia = sanitize_text_field($_POST['cadastro_artista_biografia']);
    $status = sanitize_text_field($_POST['cadastro_artista_ativo']);
    $today = date("Y-m-d H:i:s");
     
    $db = new db_galeria_artista_dao();

            $data_artistas = $db->insert(
                'wp_galeria_artista',
                array(
                    'data'      => $today,
                    'nome_artista'=>$nome,
                    'biografia'=>$biografia,
                    'ativo'=>$status
                )
            );
            
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

if (isset($_POST['editar_artista_nome']) && isset($_POST['editar_artista_biografia']) && isset($_POST['editar_artista_ativo']) ) {
     
    $nome = sanitize_text_field($_POST['editar_artista_nome']);
    $biografia= sanitize_text_field($_POST['editar_artista_biografia']);
    $status= sanitize_text_field($_POST['editar_artista_ativo']);
    $today= date("Y-m-d H:i:s");
    $id = $_GET['id'];
     
    $db = new db_galeria_artista_dao();

            $data_artista = $db->update(
                'wp_galeria_artista',
                array(
                    'data'      => $today,
                    'nome_artista'=>$nome,
                    'biografia'=>$biografia,
                    'ativo'=>$status
                ),
                array(
                    'id'=>$id
                )
            );
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;url=http://localhost/novo_arteref/wp-admin/admin.php?page=paginas_artistas'>";
}
?>