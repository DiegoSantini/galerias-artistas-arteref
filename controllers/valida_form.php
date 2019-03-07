<?php
/*
*   
* Valida dados do formulario
*
*/
if (! defined ( 'ABSPATH' )) {
	exit ();
}
    class valida_form{

        public function contato($email, $nome, $texto){

            $e_mail_valid = $this->valida_e_mail($email);
            $texto_valid  = $this->valida_texto($nome, $texto);

            if ($e_mail_valid && $texto_valid) {
               return true;
            }else{
                return false;
            }

        }

        private function valida_e_mail($email){

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }else{
                return false;
            }

        }

        private function valida_texto($nome, $texto){

            $yourString = $nome + ' ' + $texto;
            if (preg_match('/^[A-Za-z0-9_-]*$/', $yourString)) {
                return true;
            }else{
                return false;
            }

        }
    }
?>