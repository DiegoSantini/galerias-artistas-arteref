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
require_once 'controllers/banco_de_dados/db_galeria_artista.php';
require_once 'components/galeria_menu/galeria_menu.php';
require_once 'components/galeria_artista/galeria_click_and_drag_slider.php';
require_once 'components/galeria_conteudo/galeria_evento_destaque.php';
require_once 'components/galeria_conteudo/galeria_conteudo.php';
require_once 'components/galeria_trabalhos/galeria_trabalhos.php';
require_once 'components/galeria_contato/form_contato.php';
require_once 'components/galeria_contato/google_maps.php';
require_once 'components/galeria_logo/galeria_logo.php';
require_once 'components/galeria_artista/galeria_artista_lista.php';
require_once 'controllers/form.php';
require_once 'components/galeria_obra/galeria_obra.php';
require_once 'controllers/banco_de_dados/db.php';
require_once 'controllers/valida_form.php';
require_once 'controllers/banco_de_dados/data_base.php';
require_once 'components/galeria_menu_interno/galeria_menu_interno.php';
require_once 'components/galeria_conteudo/galeria_evento_lista.php';

/*
*
*Instala banco de dados com as tabelas do plugin
*
*/

//db_galeria_artista_dao::install();
date_default_timezone_set('America/Sao_Paulo');

/*
*
* Renderiza página 
*
*/

function hook_font() {
    ?>
       <link rel="stylesheet" href="https://use.typekit.net/gid1vrp.css">
    <?php
}

function galeria_artistas_enqeue_scripts(){
    wp_enqueue_style( 'galeria_artistas_menu_style', plugins_url('components/galeria_menu/style.css', __FILE__));
    wp_enqueue_style( 'galeria_artistas_artistas_style', plugins_url('components/galeria_artista/style.css', __FILE__));
    wp_enqueue_style( 'galeria_artistas_conteudo_style', plugins_url('components/galeria_conteudo/style.css', __FILE__));
    wp_enqueue_style( 'galeria_trabalhos_conteudo_style', plugins_url('components/galeria_trabalhos/style.css', __FILE__));
    wp_enqueue_style( 'galeria_trabalhos_contato_style', plugins_url('components/galeria_contato/style.css', __FILE__));
    wp_enqueue_style( 'galeria_obra_style', plugins_url('components/galeria_obra/style.css', __FILE__));
    wp_enqueue_style( 'galeria_menu_interno_style', plugins_url('components/galeria_menu_interno/style.css', __FILE__));
    wp_enqueue_script('galeria_artistas_click_and_drag_scroll', plugins_url('components/galeria_artista/click_and_drag_scroll.js', __FILE__),'jquery', 1.4, true);
    wp_enqueue_script('galeria_artistas_slides_conteudo', plugins_url('components/galeria_conteudo/slides_conteudo.js', __FILE__),'jquery', 1.4, true);
    wp_enqueue_script('galeria_artistas_readmore', plugins_url('node_modules/readmore-js/readmore.js', __FILE__),'jquery', 1.9, true);
    wp_enqueue_script('galeria_artistas_readmore_js', plugins_url('components/galeria_trabalhos/read_more.js', __FILE__),'jquery', 1.9, true);

    add_action('wp_head', 'hook_font');
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

function galeria_arteref_page_obras(){

    $page_2 = get_page_by_title('trabalhos-galeria');
    if( is_page($page_2->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/obras.php");
		die();
    }
}

add_action( 'wp', 'galeria_arteref_page_obras');

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


function galeria_arteref_page_artista(){

    $page_6 = get_page_by_title('artista');
    if( is_page($page_6->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/artista.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_page_artista');

function galeria_arteref_page_eventos(){

    $page_6 = get_page_by_title('eventos');
    if( is_page($page_6->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/eventos.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_page_eventos');

function galeria_arteref_page_evento(){

    $page_6 = get_page_by_title('evento');
    if( is_page($page_6->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/evento.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_page_evento');