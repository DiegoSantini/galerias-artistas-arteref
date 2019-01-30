<?php 
    require 'valida_form.php';
    require 'banco_de_dados/db.php';

    if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['mensagem'])) {
        
        $form = new valida_form();

        $form_valid = $form->contato($_POST['email'], $_POST['nome'], $_POST['mensagem']);

        if ($form_valid) {

            $to      = 'willian@photoarts.com.br';
            $subject = 'Interesse em obra de arte!';
            $message = $_POST['email'] + " " + $_POST['nome'] + " " + $_POST['mensagem'];
            $headers = 'From: '+$_POST['email'] . "\r\n" .
                    'Reply-To: ' + $to . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            $db = new create_db_galeria_artista();
            $db->install();
            $db->insert($_POST['email'], $_POST['nome'], $_POST['mensagem']);

            $page = get_page_by_title('contato-galeria');

            //echo $page->ID;
            echo $page->guid;
            //echo esc_url( get_page_link( $page->ID ) );

            header("Location: http://localhost/novo_arteref/index.php/galeria/contato-galeria/?form=true");
            exit();

        }else{
            echo 'dados não são válidos para o envio!';
            header("Location: http://localhost/novo_arteref/index.php/galeria/contato-galeria/?form=false");
            exit();
        }
       
    }
?>