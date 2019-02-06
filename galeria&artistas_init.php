<?php 
/**
 * Author: Willian de Oliveira
 * Plugin Name: Galerias&Artistas
 * Plugin URI: https://arteref.com
 * Description: Implementa páginas das galerias e seus respectivos artistas
 * Author URI: Willian/de/oliveira
 * Version: 1.0 beta
 */
if(! defined('ABSPATH') ){
    exit; //Exit if accessed directly
}

require 'components/galeria_menu/galeria_menu.php';
require 'components/galeria_artistas/galeria_artistas.php';
require 'components/galeria_conteudo/galeria_conteudo.php';
require 'components/galeria_trabalhos/galeria_trabalhos.php';
require 'components/galeria_contato/form_contato.php';
require 'components/galeria_contato/google_maps.php';
require 'components/galeria_logo/galeria_logo.php';
require 'controllers/form.php';
require 'components/galeria_obra/galeria_obra.php';
require 'controllers/banco_de_dados/db.php';
require 'controllers/banco_de_dados/db_galeria_artista.php';
require 'controllers/valida_form.php';

/*
*
*Instala banco de dados com as tabelas do plugin
*
*/
$db_artista = new db_galeria_artista();
$db_artista->install();

$db_artista_obra = new db_galeria_artista_obras();
$db_artista_obra->install();

$db = new create_db_galeria_artista();
$db->install();
/*
*
*
*/


/*
*
* Renderiza página 
*
*/

function galeria_artistas_enqeue_scripts(){
    wp_enqueue_style( 'galeria_artistas_menu_style', plugins_url('components/galeria_menu/style.css', __FILE__));
    wp_enqueue_style( 'galeria_artistas_artistas_style', plugins_url('components/galeria_artistas/style.css', __FILE__));
    wp_enqueue_style( 'galeria_artistas_conteudo_style', plugins_url('components/galeria_conteudo/style.css', __FILE__));
    wp_enqueue_style( 'galeria_trabalhos_conteudo_style', plugins_url('components/galeria_trabalhos/style.css', __FILE__));
    wp_enqueue_style( 'galeria_trabalhos_contato_style', plugins_url('components/galeria_contato/style.css', __FILE__));
    wp_enqueue_script('galeria_artistas_click_and_drag_scroll', plugins_url('components/galeria_artistas/click_and_drag_scroll.js', __FILE__),'jquery', 1.4, true);
}

function galeria_arteref_init(){

    $page = get_page_by_title('galeria');
    if( is_page($page->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/galeria.php");
		die();
    }

}

add_action( 'wp', 'galeria_arteref_init' );

function galeria_arteref_page_trabalhos(){

    $page_2 = get_page_by_title('trabalhos-galeria');
    if( is_page($page_2->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/trabalhos.php");
		die();
    }
}

add_action( 'wp', 'galeria_arteref_page_trabalhos');

function galeria_arteref_page_artistas(){

    $page_3 = get_page_by_title('artistas-galeria');
    if( is_page($page_3->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/artistas.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_page_artistas');

function galeria_arteref_page_contato(){

    $page_4 = get_page_by_title('contato-galeria');
    if( is_page($page_4->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/contato.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_page_contato');

function galeria_arteref_page_obra(){

    $page_5 = get_page_by_title('obra_photoarts');
    if( is_page($page_5->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/obra.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_page_obra');