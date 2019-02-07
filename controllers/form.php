<?php 

    if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['mensagem'])) {

        if (isset($_POST['g-recaptcha-response'])) {

            $captcha_data = $_POST['g-recaptcha-response'];
            $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LczN4YUAAAAAIIkOnNyxcAZfexPoMXx3BR4M7kw&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
            
            if (!$resposta.success) {
                header("Location: https://arteref.com/galeria/contato-galeria/?form=recaptcha_error");
                exit();
            }
        }

        $form = new valida_form();

        $email    = sanitize_email($_POST['email']);
        $nome     = sanitize_text_field($_POST['nome']);
        $mensagem = sanitize_text_field($_POST['mensagem']);
        $form_valid = $form->contato($email, $nome, $mensagem);

        if ($form_valid) {

            if (isset($_POST['recaptcha_google'])) {
                echo $_POST['recaptcha_google'];
            }

            $to      = 'willian@photoarts.com.br';
            $subject = 'Interesse em obra de arte!';
            $message = $_POST['email'] + " " + $_POST['nome'] + " " + $_POST['mensagem'];
            $headers = 'From: '+$_POST['email'] . "\r\n" .
                    'Reply-To: ' + $to . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            $db = new create_db_galeria_artista();
            $db->insert($_POST['email'], $_POST['nome'], $_POST['mensagem']);

            $page = get_page_by_title('contato-galeria');

            header("Location: https://arteref.com/galeria/contato-galeria/galeria/contato-galeria/?form=true");
            exit();

        }else{
            header("Location: https://arteref.com/galeria/contato-galeria/contato-galeria/?form=false");
            exit();
        }

    }
?>