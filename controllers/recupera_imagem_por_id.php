<?php
/*
*
* Recebe os ids das imagens e retorna seus respctivas foto
*
*/
  class recupera_imagem_por_id {

      private $id_imagens;
      private $imagem_url = '';
      private $size;

      public function init($ids, $size){
        $this->id_imagens = $ids ;
        $this->size = $size;
        $this->get_imagens();
        return $this->imagem_url;
      }

      private function get_imagens(){
        $this->imagem_url = wp_get_attachment_image_src($this->id_imagens, $size = $this->size);
      }

  } 
?>