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
require_once 'controllers/replace_string.php';
require_once 'components/galeria_obra/galeria_obra.php';
require_once 'controllers/banco_de_dados/db.php';
require_once 'controllers/valida_form.php';
require_once 'controllers/banco_de_dados/data_base.php';
require_once 'components/galeria_menu_interno/galeria_menu_interno.php';
require_once 'components/galeria_conteudo/galeria_evento_lista.php';
require_once 'components/galerias_home/galerias_home.php';
require_once 'components/galerias_home/galerias_home_estilos.php';
require_once 'components/galerias_home/galerias_home_arteref.php';
require_once 'components/galerias_estilo/galerias_estilo.php';
require_once 'controllers/link_factory.php';
require_once 'controllers/recupera_obra_por_estilo.php';
require_once 'controllers/recupera_nome_estilo_por_id.php';
require_once 'controllers/recupera_nome_obra_por_id.php';
require_once 'controllers/recupera_nome_galeria_por_id.php';
require_once 'controllers/recupera_nome_artista_por_id.php';
require_once 'controllers/recupera_imagem_por_id.php';
require_once 'admin-panel/arteref-marketplace.php';
require_once 'admin-panel/cadastro_galerias.php';
require_once 'admin-panel/cadastro_obras.php';
require_once 'admin-panel/cadastro_estilo.php';
require_once 'admin-panel/cadastro_eventos.php';
require_once 'admin-panel/cadastro_artistas.php';
require_once 'admin-panel/cadastro_imagem.php';
// require_once 'admin-panel/handle_form.php';
require_once 'admin-panel/mensagens.php';

function galeria_artistas_load_ajax(){
    echo "teste";
    exit();
}

add_action('wp_ajax_galeria_artistas_load_ajax', ' galeria_artistas_load_ajax'); 
add_action('wp_ajax_nopriv_galeria_artistas_load_ajax', 'galeria_artistas_load_ajax');


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
    wp_enqueue_style( 'galerias_estilo_style', plugins_url('components/galerias_estilo/style.css', __FILE__));
    wp_enqueue_style( 'galeria_home_style', plugins_url('components/galerias_home/style.css', __FILE__));
    wp_enqueue_style( 'galeria_obra_style', plugins_url('components/galeria_obra/style.css', __FILE__));
    wp_enqueue_style( 'galeria_menu_interno_style', plugins_url('components/galeria_menu_interno/style.css', __FILE__));
    wp_enqueue_script('galeria_artistas_click_and_drag_scroll', plugins_url('components/galeria_artista/click_and_drag_scroll.js', __FILE__),'jquery', 1.5, true);
    wp_enqueue_script('galeria_artistas_slides_conteudo', plugins_url('components/galeria_conteudo/slides_conteudo.js', __FILE__),'jquery', 1.4, true);
    wp_enqueue_script('galeria_artistas_readmore', plugins_url('node_modules/readmore-js/readmore.min.js', __FILE__),'jquery', 1.9, true);
    wp_enqueue_script('galeria_artistas_readmore_js', plugins_url('components/galeria_trabalhos/read_more.js', __FILE__),'jquery', 1.9, true);
    wp_enqueue_script('galeria_artistas_buscar_js', plugins_url('components/galerias_home/load_ajax.js', __FILE__),'jquery', 1.9, true);
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    add_action('wp_head', 'hook_font');


    wp_localize_script('galeria_artistas_buscar_js', 'load', array(
        'ajax_url' => admin_url('admin-ajax.php')
        )
    );


}

function galeria_arteref_render_pages(){

    $page = get_page_by_title('galeria');
    if( is_page($page->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/galeria.php");
		die();
    }

    $page_2 = get_page_by_title('trabalhos-galeria');
    if( is_page($page_2->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/obras.php");
		die();
    }

    $page_3 = get_page_by_title('artistas-galeria');
    if( is_page($page_3->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/artistas.php");
		die();
    }

    $page_4 = get_page_by_title('contato-galeria');
    if( is_page($page_4->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/contato.php");
		die();
    }

    $page_5 = get_page_by_title('obra_photoarts');
    if( is_page($page_5->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/obra.php");
		die();
    }

    $page_6 = get_page_by_title('artista');
    if( is_page($page_6->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/artista.php");
		die();
    }

    $page_7 = get_page_by_title('eventos');
    if( is_page($page_7->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/eventos.php");
		die();
    }

    $page_8 = get_page_by_title('evento');
    if( is_page($page_8->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/evento.php");
		die();
    }

    $page_9 = get_page_by_title('galerias', OBJECT);
    if( is_page($page_9->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/galerias.php");
		die();
    }

    $page_10 = get_page_by_title('estilo');
    if( is_page($page_10->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/estilo.php");
		die();
    }

    $page_11 = get_page_by_title('search');
    if( is_page($page_11->ID )){	
        $dir = plugin_dir_path( __FILE__ );
        add_action('wp_enqueue_scripts', 'galeria_artistas_enqeue_scripts');
		include($dir."pages/search.php");
		die();
    }
}
add_action( 'wp', 'galeria_arteref_render_pages');

function galeria_artistas_css_style($hook) {
    
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style( 'galeria_artista_wp_admin_css', plugins_url('admin-panel/css/admin_style.css', __FILE__) );
    wp_enqueue_script('galeria_artistas_click_and_drag_scroll', plugins_url('admin-panel/js/admin.js', __FILE__),'jquery', 1.5, true);

    wp_enqueue_script('popper_js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js','jquery', 1.5, true);
    wp_enqueue_script('bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js','jquery', 1.5, true);

}
add_action( 'admin_enqueue_scripts', 'galeria_artistas_css_style' );

