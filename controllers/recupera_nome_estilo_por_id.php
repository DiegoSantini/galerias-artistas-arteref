<?php
/*
*
* Recebe os ids dos estilos e retorna seus respctivos nomes
*
*/
  class recupera_nome_estilo_por_id extends db_galeria_artista_dao{

      private $id_estilos;
      private $nome_estilos = array();

      public function init($ids){
        $this->id_estilos = explode(';', $ids);
        $this->get_estilos();
        return $this->nome_estilos;
      }

      private function get_estilos(){

        foreach ($this->id_estilos as $key) {
            $data_estilo = $this->get(
                'wp_galeria_artista_obras_estilos',
                array(  
                    'select' => 'estilo_obra',
                    'campo'  => 'id', 
                    'id'     => $key
                )
            );
            array_push($this->nome_estilos, $data_estilo[0]['estilo_obra']);
        }
        
      }

  } 
?>