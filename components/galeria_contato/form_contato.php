<?php 
    function form_contato(){

        if (isset( $_GET['form'])) {
            if ($_GET['form'] == 'true') {
                print '<div class="alert alert-success">Sua mensagem foi enviada com sucesso!</div>';
            }
            if ($_GET['form'] == 'false') {
                print '<div class="alert alert-danger">Algo deu errado por favor tente novamente!</div>';
            }
            if ($_GET['form'] == 'recaptcha_false') {
                print '<div class="alert alert-danger">Por favor, confirme o captcha!</div>';
            }
            if ($_GET['form'] == 'recaptcha_error') {
                print '<div class="alert alert-danger">Algo deu errado, por favor tente novamente mais tarde!</div>';
            }
        }

        ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <form action="form.php" method="post" id="form.php">

            <div class="form-group">
                <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <input type="text" name="nome" class="form-control" id="formGroupExampleInput2" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <textarea type="text" name="mensagem" placeholder="Informe a obra pela qual você se interessou" cols="40" rows="10" required></textarea>
            </div>
            <div class="g-recaptcha" name="recaptcha_google" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6LdhPo4UAAAAAIcsd4E4jxGntKjybfdNCJrZiIDe"></div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn-arteref-submit">Enviar</button>
            </div>
            
        </form>

        <?php
    }
?>