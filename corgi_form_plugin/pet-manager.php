<?php
/*
Plugin Name: Corgi Pet Form
Plugin URI: http://nkcp.com/
Description: Corgi Pet Form is a pluging that allows the inputting of corgi pet information into the back end database of wordpress.
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
    require_once PLUGIN_PATH .'/'.TC_DIR_NAME . '/inc/cpt-pets.php';
    require_once PLUGIN_PATH .'/'.TC_DIR_NAME . '/inc/metabox/boxes.php';

    define( 'CMB_META_BOX_URL', PLUGIN_URL.'/'.TC_DIR_NAME . '/inc/metabox/' );


class PET_MANAGER {
	function __construct() {
		$this->PET_MANAGER();
	}

	function PET_MANAGER() {
		global $wp_version;
	  }
  }


  //Starts everything
  add_action( 'init', 'petmanager_setup',1 );

  function petmanager_setup(){

    //Enables Pet 
    $PETPostType = new PETPostType();

		//Register the post type
		add_action('init', array($PETPostType,'register'),3 );

    add_action( 'init', 'pet_add_pages');

    //Register pet type taxonomies
    add_action( 'init', 'create_pet_color_taxonomy');
    add_action( 'init', 'create_pet_genre_taxonomy');
    add_action( 'init', 'create_pet_age_taxonomy');
    add_action( 'init', 'create_pet_size_taxonomy');
    add_action( 'init', 'create_pet_pattern_taxonomy');

    add_action( 'init', 'pet_remove_pets_support');
    add_action( 'admin_menu' , 'remove_taxonomies_boxes' );
    add_shortcode( 'pet_shortcode', 'pet_shortcode_form' );
    add_action( 'admin_print_styles','action_admin_print_styles' );

    
  }

  	function pet_remove_pets_support() {
  		remove_post_type_support( 'pet', 'excerpt' );
  		remove_post_type_support( 'pet', 'comments' );
  	}


    // This code implements the shortcode.
    function pet_shortcode_form($atts) {
	   //ob_start and ob_get_clean turns on the output buffering. The code is used to buffer content to allow output. 
       ob_start();
       include(PLUGIN_PATH .'/'.TC_DIR_NAME .'/inc/form.php');
       $output = ob_get_clean();
       return $output;
    }


  function pet_form() {
    include('inc/form-action.php');
  }
  add_filter('get_header','pet_form');


    // Add needed scripts  array( 'jquery' )
    function pet_manager_scripts() {

	          wp_enqueue_script('jquery_check', plugins_url('/js/jquery_check.js', __FILE__), array('jquery')
	       );


    }
    add_action( 'wp_enqueue_scripts', 'pet_manager_scripts' );

    function pet_manager_stylesheet() {
        // Respects SSL, Style.css is relative to the current file
        wp_register_style( 'pet-style', plugins_url('/inc/pet_styles.css', __FILE__) );
        wp_enqueue_style( 'pet-style' );
    }
    add_action( 'wp_enqueue_scripts', 'pet_manager_stylesheet' );

    /* Create some pages such Pets and Add a pet */
    function pet_add_pages(){
        $pets = '';
        $addpet= '';

        if( get_page_by_title(__('Pets','wp_pet')) == false )
        $pets = array(
        'post_title' => __('Pets','wp_pet'),
        'post_name' => __('pet-list','wp_pet'),
        'post_type' => 'page',
        'post_status' =>'publish',
        'comment_status' => 'closed',
        );
        wp_insert_post( $pets );

        if( get_page_by_title(__('Add a pet','wp_pet')) == false )
        $addpet = array(
        'post_title' => __('Add a pet','wp_pet'),
        'post_type' => 'page',
        'post_content' => '[pet_shortcode]',
        'post_status' =>'publish',
        'comment_status' => 'closed',
        );
        wp_insert_post( $addpet );
    }

add_action('admin_menu', 'ada_add_pages');

// action function for above hook
function ada_add_pages() {

add_submenu_page('edit.php?post_type=pet', __('Options & About','wp_pet'), __('Options & About','wp_pet'), 'manage_options', 'pet_options_page', 'pet_options_page' );


}

function pet_options_page() {
    include('pet_options_page.php');
}

	function action_admin_print_styles() {
		global $current_screen;

	?>

	<?php
	}
	
$PET_MANAGER = new PET_MANAGER();


?>