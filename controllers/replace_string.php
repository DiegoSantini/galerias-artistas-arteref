<?php
/**
 * Recebe um array com numeros de ids e retorna uma sistaxe SQL para consulta no banco de dados 
 */
if (! defined ( 'ABSPATH' )) {
	exit ();
}
    class replace_string{
      
        private $list;
        function __construct(array $list){
            $this->list = $list;
        }

        private function str_lreplace($search, $replace, $subject){

            $pos = strrpos($subject, $search);
            if($pos !== false){
                $subject = substr_replace($subject, $replace, $pos, strlen($search));
            }
            return $subject;

        }

        public function id_query(){

            $query = '';
            for ($i=0; $i < sizeof($this->list); $i++) { 
                $query .= $this->list[$i];
                $query .= ' OR id = ';
            }
            $result = $this->str_lreplace(' OR id = ', ' ', $query);
            return $result;

        }

    }
?>