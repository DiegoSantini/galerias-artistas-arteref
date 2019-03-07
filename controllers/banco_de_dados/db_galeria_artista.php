<?php
if (! defined ( 'ABSPATH' )) {
	exit ();
}
    class db_galeria_artista{

        function install(){

            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista";
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                data datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                nome_artista tinytext NOT NULL,
                url_artista varchar(55) NOT NULL,
                ativo TINYINT NOT NULL,
                biografia text NOT NULL,
                PRIMARY KEY  (id)
              ) $charset_collate;";
              
              require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
              dbDelta( $sql );

        }

        function insert($nome_artista, $url_artista, $ativo, $biografia){

            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista";

            $wpdb->insert(
                $table_name, 
                array( 
                    'data' => current_time( 'mysql' ),
                    'nome_artista' => $nome_artista,
                    'url_artista'  => $url_artista,
                    'ativo'        => $ativo,
                    'biografia'    => $biografia
                ) 
            );
        }

        function get($id_artista){

            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista";
            $artista = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $id_artista ", ARRAY_A );
            return $artista;

        }

        function get_all(){
            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista";
            $obras = $wpdb->get_results( "SELECT * FROM $table_name", ARRAY_A );
            return $obras;
        }

    }

    class db_galeria_artista_obras{

        function install(){
            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista_obras";
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
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
              
              require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
              dbDelta( $sql );
        }

        function insert($id_artista, $nome_obra, $imagem_url, $descricao_obra, $acabamento_obra, $preco, $estilo_obra){

            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista_obras";

            $wpdb->insert(
                $table_name, 
                array( 
                    'data' => current_time( 'mysql' ),
                    'id_artista'      => $id_artista,
                    'nome_obra'       => $nome_obra,
                    'imagem_url'      => $imagem_url, 
                    'descricao_obra'  => $descricao_obra,
                    'acabamento_obra' => $acabamento_obra,
                    'preco'           => $preco,
                    'estilo_obra'     => $estilo_obra
                ) 
            );
        }

        function get($id){
            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista_obras";
            $obra = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $id ", ARRAY_A );
            return $obra;
        }
        function get_all(){
            global $wpdb;
            $table_name = $wpdb->prefix . "galeria_artista_obras";
            $obras = $wpdb->get_results( "SELECT * FROM $table_name", ARRAY_A );
            return $obras;
        }

    }
?>