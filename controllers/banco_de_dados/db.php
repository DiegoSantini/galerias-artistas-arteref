<?php
if (! defined ( 'ABSPATH' )) {
	exit ();
}
    class create_db_galeria_artista{
        
        public function install(){
            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista_contato";
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                email varchar(55) NOT NULL,
                name tinytext NOT NULL,
                text text NOT NULL,
                PRIMARY KEY  (id)
              ) $charset_collate;";
              
              require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
              dbDelta( $sql );
        }

        public function insert($email, $nome, $mensagem){ 
            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista_contato";

            $wpdb->insert(
                $table_name, 
                array( 
                    'time' => current_time( 'mysql' ), 
                    'email' => $email, 
                    'name' => $nome,
                    'text' => $mensagem
                ) 
              );
        }
       
    }
?>