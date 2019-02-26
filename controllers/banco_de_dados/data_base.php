<?php
    class db_galeria_artista_dao{

        public function __construct(){}

        public static function install(){
            global $wpdb;
            $charset_collate = $wpdb->get_charset_collate();

            //verifica se o banco de dados já foi instalado 
            
            $install_ready = self::intall_ready();
            if ($install_ready) {return;}
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                $sql_wp_galeria_artista = "CREATE TABLE  wp_galeria_artista(
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    data datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    nome_artista tinytext NOT NULL,
                    url_artista varchar(55) NOT NULL,
                    ativo TINYINT NOT NULL,
                    biografia text NOT NULL,
                    id_galeria mediumint(9),
                    PRIMARY KEY  (id)
                  ) $charset_collate;";
                
                dbDelta( $sql_wp_galeria_artista );

                $sql_wp_galerias_artista_obras = "CREATE TABLE wp_galeria_artista_obras (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    data datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    id_artista mediumint(9) NOT NULL,
                    imagem_url varchar(250) NOT NULL,
                    nome_obra varchar(55) NOT NULL,
                    descricao_obra text NOT NULL,
                    acabamento_obra tinytext NOT NULL,
                    preco varchar(55) NOT NULL,
                    estilo_obra varchar(55) NOT NULL,
                    PRIMARY KEY  (id)
                  ) $charset_collate;";
                
                dbDelta( $sql_wp_galerias_artista_obras );

                $sql_wp_galerias = "CREATE TABLE wp_galerias (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    data datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    nome_galeria varchar(55) NOT NULL,
                    local varchar(55) NOT NULL,
                    descricao_galeria text NOT NULL,
                    logo_url varchar(250) NOT NULL,
                    PRIMARY KEY  (id)
                  ) $charset_collate;";

                dbDelta( $sql_wp_galerias );

                $sql_wp_galeria_artista_contato = "CREATE TABLE wp_galeria_artista_contato (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    data datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    email varchar(55) NOT NULL,
                    name tinytext NOT NULL,
                    text text NOT NULL,
                    PRIMARY KEY  (id)
                  ) $charset_collate;";
                  
                  
                dbDelta( $sql_wp_galeria_artista_contato );

                $sql_eventos = "CREATE TABLE wp_galeria_eventos (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    data datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    nome_evento tinytext NOT NULL,
                    url_img_destaque varchar(250) NOT NULL,
                    local tinytext NOT NULL,
                    data_inicio datetime NOT NULL,
                    data_termino datetime NOT NULL, 
                    descricao_resumida text NOT NULL,
                    descricao_completa text NOT NULL,
                    obras varchar(250) NOT NULL,
                    id_galeria mediumint(9) NOT NULL, 
                    PRIMARY KEY  (id)
                  ) $charset_collate;";

                dbDelta( $sql_eventos );

                $sql_obras_estilos = "CREATE TABLE wp_galeria_artista_obras_estilos (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    data_cadastro datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    estilo_obra varchar(250) NOT NULL,
                    PRIMARY KEY  (id)
                  ) $charset_collate;";

                dbDelta( $sql_obras_estilos );
        }

        private static function intall_ready(){
            global $wpdb;
            $teste_1 = $wpdb->get_results("DESCRIBE `wp_galeria_eventos`", ARRAY_A );
            $teste_2 = $wpdb->get_results("DESCRIBE `wp_galeria_artista_contato`", ARRAY_A );
            $teste_3 = $wpdb->get_results("DESCRIBE `wp_galerias`", ARRAY_A );
            $teste_4 = $wpdb->get_results("DESCRIBE `wp_galerias_artista_obras`", ARRAY_A );
            $teste_5 = $wpdb->get_results("DESCRIBE `wp_galeria_artista`", ARRAY_A );

            if ($teste_1 && $teste_2 && $teste_3 && $teste_4 && $teste_5) {
                return true;
            }else{
                return false;
            }
        }

        public function insert($table_name, $params){
            global $wpdb;
            $wpdb->insert($table_name, $params);
        }

        public function get($table_name, $params){
            global $wpdb;
            if (isset($params['id'])) {
                $query = "SELECT $params[select] FROM $table_name WHERE $params[campo] = $params[id]";
            }else{
                $query = "SELECT $params[select] FROM $table_name";
            }
            $data = $wpdb->get_results($query, ARRAY_A );
            return $data;
        }

    }
?>