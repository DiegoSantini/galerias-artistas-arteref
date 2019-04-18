<?php
/*
*
* Recebe os ids das galerias e retorna seus respctivos nomes
*
*/
  class recupera_nome_galeria_por_id extends db_galeria_artista_dao{

      private $id_galerias;
      private $nome_galerias = array();

      public function init($ids){
        $this->id_galerias = explode(" ",$ids);
        $this->get_galerias();
        return $this->nome_galerias;
      }

      private function get_galerias(){

        foreach ($this->id_galerias as $key) {
            $data_galeria = $this->get(
                'wp_galerias',
                array(  
                    'select' => 'nome_galeria',
                    'campo'  => 'id', 
                    'id'     => $key
                )
            );
            array_push($this->nome_galerias, $data_galeria[0]['nome_galeria']);
        }
        
      }

  } 
?>