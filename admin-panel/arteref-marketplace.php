<?php
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}

add_action( 'admin_menu', 'arteref_marketplace' );

function arteref_marketplace() {
	add_menu_page( 'Arteref Marketplace Options', 'Galerias&Artistas', 'manage_options', 'galerias_artistas', 'galerias_artistas_options' );
	add_submenu_page( 'galerias_artistas', 'Obras', 'Obras', 'manage_options', 'galerias_obras', 'galerias_obras_options');
	add_submenu_page( 'galerias_artistas', 'Estilos', 'Estilos', 'manage_options', 'galerias_estilos', 'galeria_estilo_options');
	add_submenu_page( 'galerias_artistas', 'Eventos', 'Eventos', 'manage_options', 'galerias_eventos', 'galeria_eventos_options');
	add_submenu_page( 'galerias_artistas', 'Mensagens', 'Mensagens', 'manage_options', 'galerias_mensagens', 'galeria_mensagens_options');
	add_submenu_page( 'galerias_artistas', 'Artistas', 'Artistas', 'manage_options', 'paginas_artistas', 'paginas_artistas_options');
	add_submenu_page( 'galerias_artistas', 'Teste IMG', 'Teste IMG', 'manage_options', 'galerias_imagens', 'galerias_imagens_options');
}

function galerias_imagens_options(){
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    cadastro_imagem();
}
function galerias_artistas_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    cadastro_galerias();
}

function galerias_obras_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    cadastro_obras();
}

function galeria_estilo_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    cadastro_estilo();
}

function galeria_eventos_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    cadastro_eventos();
}

function galeria_mensagens_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
	get_mensagens();
}
function paginas_artistas_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
	cadastro_artistas();
}
?>