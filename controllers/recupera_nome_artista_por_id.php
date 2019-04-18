<?php
/*
*
* Recebe os ids dos artistas e retorna seus respctivos nomes
*
*/
  class recupera_nome_artista_por_id extends db_galeria_artista_dao{

      private $id_artistas;
      private $nome_artistas = array();

      public function init($ids){
        $this->id_artistas = explode(' ', $ids);
        $this->get_artistas();
        return $this->nome_artistas;
      }

      private function get_artistas(){

        foreach ($this->id_artistas as $key) {
            $data_artista = $this->get(
                'wp_galeria_artista',
                array(  
                    'select' => 'nome_artista',
                    'campo'  => 'id', 
                    'id'     => $key
                )
            );
            array_push($this->nome_artistas, $data_artista[0]['nome_artista']);
        }
        
      }

  } 
?>