<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

# constants
define("app_child_url", __DIR__);

# includes
include(app_child_url . "/Clases/Database.php");
# helpers
include(app_child_url . "/helpers/funciones.php");
include(app_child_url . "/helpers/funciones_wordpress.php");

# var
$db = "";
//$avantio_credential = "local_wordpress";
$avantio_credential = "servidor_automocion";
$services = "";
$actual_language = "";


# css files
if ( !function_exists( 'wpestate_chld_thm_cfg_parent_css' ) ):
   function wpestate_chld_thm_cfg_parent_css() {

    $parent_style = 'wpestate_style'; 
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap-theme',get_template_directory_uri().'/css/bootstrap-theme.css', array(), '1.0', 'all');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css',array('bootstrap','bootstrap-theme'),'all' );
    wp_enqueue_style( 'wpestate-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    //wp_enqueue_style( 'select2-child-style', get_stylesheet_directory_uri() . '/css/select2.min.css', array(), wp_get_theme()->get('Version') );
    wp_enqueue_style( 'bootstrap-select-child-style', get_stylesheet_directory_uri() . '/css/bootstrap-select.min.css', array(), wp_get_theme()->get('Version') );
   }    
    
endif;
add_action( 'wp_enqueue_scripts', 'wpestate_chld_thm_cfg_parent_css' );

# javascript files
add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_brava' );
function wp_enqueue_scripts_brava() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ));
    //wp_enqueue_script('select-script', get_stylesheet_directory_uri() . '/js/select2.min.js', array( 'jquery' ));
    wp_enqueue_script('bootstrap-select', get_stylesheet_directory_uri() . '/js/bootstrap-select.min.js', array( 'jquery' ));
}

# load languages
load_child_theme_textdomain('wprentals', get_stylesheet_directory().'/languages');
// END ENQUEUE PARENT ACTION


# connect to database function
function connect_two_db(){
    global $db , $avantio_credential;

    $connector = new Database();
    $connector->setCredential($avantio_credential);
    $db = $connector::getInstance();

}

# call connect to database function
connect_two_db();

# get actual_language
$actual_language = pll_current_language();


