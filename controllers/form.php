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

            echo 'enviando e-mail!';

            $db = new create_db_galeria_artista();
            $db->install();
            $db->insert($_POST['email'], $_POST['nome'], $_POST['mensagem']);

        }else{
            echo 'dados não são válidos para o envio!';
        }
       

    }
?>