<?php
/*
*
* Recebe os ids das obras e retorna seus respctivos nomes
*
*/
  class recupera_nome_obra_por_id extends db_galeria_artista_dao{

      private $id_obras;
      private $nome_obras = array();
    //   private $obra=array();

      public function init($ids){
        $this->id_obras = explode(';', $ids);
        //$this->id_obras = implode(',', $ids);
        $this->get_obras();
        return $this->nome_obras;
        return $this->obra;
      }

      private function get_obras(){

        foreach ($this->id_obras as $key) {
            $data_obra = $this->get(
                'wp_galeria_artista_obras',
                array(  
                    'select' => 'nome_obra',
                    'campo'  => 'id', 
                    'id'     => $key
                )
            );
            // array_push($this->nome_obras,$this->obra, $data_obra[0]['nome_obra']);
            array_push($this->nome_obras, $data_obra[0]['nome_obra']);
            // array_push($this->nome_obras, $data_obra['nome_obra']);
            // array_push($this->obra, $data_obra['obra']);
        }
        
      }

  } 
?>