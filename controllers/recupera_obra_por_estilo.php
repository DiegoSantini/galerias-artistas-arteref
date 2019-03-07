<?php
/*
*
* Recebe o nome do estilo e retorna todas as obras que o possuem 
*
*/
    class recupera_obra_por_estilo extends db_galeria_artista_dao{

        private $estilo_obra;

        public function init($estilo_obra){
            $this->estilo_obra = $estilo_obra;

            $id_estilo = $this->id_estilo()[0]['id'];
            return $this->obras($id_estilo);
        }

        private function id_estilo(){

            $data_estilo = $this->get(
                'wp_galeria_artista_obras_estilos',
                array(  
                    'select' => 'id',
                    'campo'  => 'estilo_obra', 
                    'id'     => "'" . $this->estilo_obra . "'"
                )
            );
            return $data_estilo;
        }

        private function obras($id_estilo){
            $data_obras = $this->get(
                'wp_galeria_artista_obras',
                array(  
                    'select' => '*',
                    'campo'  => 'estilo_obra', 
                    'not_equal' => 'true',
                    'id'     => "like " . "'%" . $id_estilo . "%'"
                )
            );

            $id_obras = $data_obras[0]['estilo_obra'];
            $data = array();

            foreach ($data_obras as $key) {

                $id_obras = $key['estilo_obra'];
                $id_obras_lista = explode(';', $id_obras);
                
                for ($i=0; $i < sizeof($id_obras_lista); $i++) { 
                    if ($id_obras_lista[$i] == $id_estilo) {
                        array_push($data, $key);
                    }
                }

            }
            
            return $data;
        }

    }
?>