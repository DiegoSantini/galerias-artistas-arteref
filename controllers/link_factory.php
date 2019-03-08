<?php 
/*
*
* constroi os links da aplicação de acordo com o contexto
* Recebe o nome da página e os parametros a serem passados pela URL
*
*/
if (! defined ( 'ABSPATH' )) {
	exit ();
}
    class link_factory{

        private $page_name;
        private $params_page;

        private $link_url;

        function __construct($page_name, array $params_page = null){
            $this->page_name = $page_name;
            $this->params_page = $params_page;
            $this->set_page_link();
            $this->params_value();
        }

        private function get_page_link(){ 
            return $this->link_url;
        }

        private function set_page_link(){ 
            $page = get_page_by_title($this->page_name, ARRAY_A);
            $link = get_permalink($page['ID']);
            $this->link_url = $link;
        }

        private function params_value(){
            $open_params = stripos($this->get_page_link(), '?');
            if ($open_params){
                return "";
            }else{
                return "?";
            }
        }

        public function create(){
            $final_link = $this->get_page_link();
            if ($this->params_page) {
                $final_link .= $this->params_value();
                foreach ($this->params_page as $key=>$value) {
                    $final_link .= '&' . $key . '=' . $value;
                }
            }
            return $final_link;
        }

    }
?>