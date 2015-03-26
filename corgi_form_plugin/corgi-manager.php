<?php
/*
Plugin Name: Corgi Form Plugin
Plugin URI: http://nkcp.com/
Description: Corgi Corgi Form is a pluging that allows the inputting of corgi corgi information into the back end database of wordpress.
Version: 1.0
Author: Christina Phan
Author URI: http://nkcp.com/
*/


  /*Definitions*/
		if ( !defined('WP_CONTENT_URL') )
		    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
		if ( !defined('WP_CONTENT_DIR') )
		    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

		if (!defined('PLUGIN_URL'))
		    define('PLUGIN_URL', WP_CONTENT_URL . '/plugins');
		if (!defined('PLUGIN_PATH'))
		    define('PLUGIN_PATH', WP_CONTENT_DIR . '/plugins');

		define('TC_FILE_PATH', dirname(__FILE__));
		define('TC_DIR_NAME', basename(TC_FILE_PATH));

    //include the main class file
    require_once PLUGIN_PATH .'/'.TC_DIR_NAME . '/inc/cpt-corgis.php';
    require_once PLUGIN_PATH .'/'.TC_DIR_NAME . '/inc/metabox/boxes.php';

    define( 'CMB_META_BOX_URL', PLUGIN_URL.'/'.TC_DIR_NAME . '/inc/metabox/' );


class CORGI_FORM {
	function __construct() {
		$this->CORGI_FORM();
	}

	function CORGI_FORM() {
		global $wp_version;
	  }
  }


  //Starts everything
  add_action( 'init', 'corgiform_setup',1 );

  function corgiform_setup(){

    //Enables Corgi 
    $CORGIPostType = new CORGIPostType();

		//Register the post type
		add_action('init', array($CORGIPostType,'register'),3 );

    add_action( 'init', 'corgi_add_pages');

    //Register corgi type taxonomies
    add_action( 'init', 'create_corgi_color_taxonomy');
    add_action( 'init', 'create_corgi_genre_taxonomy');
    add_action( 'init', 'create_corgi_age_taxonomy');
    add_action( 'init', 'create_corgi_size_taxonomy');
    add_action( 'init', 'create_corgi_pattern_taxonomy');

    add_action( 'init', 'corgi_remove_corgis_support');
    add_action( 'admin_menu' , 'remove_taxonomies_boxes' );
    add_shortcode( 'corgi_shortcode', 'corgi_shortcode_form' );
    add_action( 'admin_print_styles','action_admin_print_styles' );

    
  }

  	function corgi_remove_corgis_support() {
  		remove_post_type_support( 'corgi', 'excerpt' );
  		remove_post_type_support( 'corgi', 'comments' );
  	}


    // This code implements the shortcode.
    function corgi_shortcode_form($atts) {
	   //ob_start and ob_get_clean turns on the output buffering. The code is used to buffer content to allow output. 
       ob_start();
       include(PLUGIN_PATH .'/'.TC_DIR_NAME .'/inc/form.php');
       $output = ob_get_clean();
       return $output;
    }


  function corgi_form() {
    include('inc/form-action.php');
  }
  add_filter('get_header','corgi_form');


    // Add needed scripts  array( 'jquery' )
    function CORGI_FORM_scripts() {

	          wp_enqueue_script('jquery_check', plugins_url('/js/jquery_check.js', __FILE__), array('jquery')
	       );


    }
    add_action( 'wp_enqueue_scripts', 'CORGI_FORM_scripts' );

    function CORGI_FORM_stylesheet() {
        // Respects SSL, Style.css is relative to the current file
        wp_register_style( 'corgi-style', plugins_url('/inc/corgi_styles.css', __FILE__) );
        wp_enqueue_style( 'corgi-style' );
    }
    add_action( 'wp_enqueue_scripts', 'CORGI_FORM_stylesheet' );

    /* Create some pages such Corgis and Add a corgi */
    function corgi_add_pages(){
        $corgis = '';
        $addcorgi= '';

        if( get_page_by_title(__('Corgis','wp_corgi')) == false )
        $corgis = array(
        'post_title' => __('Corgis','wp_corgi'),
        'post_name' => __('corgi-list','wp_corgi'),
        'post_type' => 'page',
        'post_status' =>'publish',
        'comment_status' => 'closed',
        );
        wp_insert_post( $corgis );

        if( get_page_by_title(__('Add a corgi','wp_corgi')) == false )
        $addcorgi = array(
        'post_title' => __('Add a corgi','wp_corgi'),
        'post_type' => 'page',
        'post_content' => '[corgi_shortcode]',
        'post_status' =>'publish',
        'comment_status' => 'closed',
        );
        wp_insert_post( $addcorgi );
    }

add_action('admin_menu', 'ada_add_pages');

// action function for above hook
function ada_add_pages() {

add_submenu_page('edit.php?post_type=corgi', __('Options & About','wp_corgi'), __('Options & About','wp_corgi'), 'manage_options', 'corgi_options_page', 'corgi_options_page' );


}

function corgi_options_page() {
    include('corgi_options_page.php');
}

	function action_admin_print_styles() {
		global $current_screen;

	?>

	<?php
	}
	
$CORGI_FORM = new CORGI_FORM();


?>