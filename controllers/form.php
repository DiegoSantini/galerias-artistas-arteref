<?php 
    if (! defined ( 'ABSPATH' )) {
        exit ();
    }

    require_once 'valida_form.php';
    require_once 'banco_de_dados/data_base.php';


    if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['mensagem'])) {

        $form = new valida_form();

        $email    = sanitize_email($_POST['email']);
        $nome     = sanitize_text_field($_POST['nome']);
        $mensagem = sanitize_text_field($_POST['mensagem']);
        $form_valid = $form->contato($email, $nome, $mensagem);

        if ($form_valid) {
            
            $db = new db_galeria_artista_dao();

            $data_galeria = $db->insert(
                'wp_galeria_artista_contato',
                array(
                    'data'      => '2019-03-12 13:30:00',
                    'email'     => $email,
                    'name'      => $nome,
                    'text'      => $mensagem 
                )
            );

        }
        
    }
?>