<?php

class CORGIPostType {

	var $labels;
	var $post_type_options;
  var $post_type_taxonomies;

	function __construct() {
		$this->CORGIPostType();
	}

//This sets up the Corgi list page where all of the corgi database goes. It customizes the name and function.
	function CORGIPostType() {
		$this->labels = array(
		'name' => __('Corgi List','wp_corgi'),
		'singular_name' => _x('Corgi', 'post type singular name', 'wp_corgi'),
		'add_new' => __('Add A Corgi','wp_corgi'),
		'add_new_item' => __('Add A Corgi','wp_corgi'),
		'edit_item' => __('Edit Corgi','wp_corgi'),
		'new_item' => __('New Corgi','wp_corgi'),
		'view_item' => __('View Corgis','wp_corgi'),
		'search_items' => __('Search Corgis','wp_corgi'),
		'not_found' =>  __('Not Found!','wp_corgi'),
		'not_found_in_trash' => __('Nothing found in Trash','wp_corgi'),
		'parent_item_colon' => ''
		);

		$this->post_type_options = array(
			'labels'=>$this->labels,
			'public'=>true,
			'supports' => array('title','editor','author','thumbnail'),
			'hierarchical' => true,
      'menu_position' => 120,
      'has_archive' => true,
			'rewrite' => array('slug' => 'corgi', 'with_front' => FALSE)
		);

	}

	function register() {
	register_post_type('corgi', $this->post_type_options);
  flush_rewrite_rules();
  }

}

//Adds corgi gender taxonomy. This registers the taxonomy and gives it certain functions and states where it will appear. 
//For example, 'show_admin_column' displays the taxonomy in the Corgi list page to see what corgi has what attributes.
//The code repeats for every taxonomy.

function create_corgi_genre_taxonomy()
{

    $labels = array('name' => _x( 'Gender','wp_corgi'),'menu_name' => __( 'Genders','wp_corgi'), 'add_new_item' => __( 'Add corgi gender','wp_corgi'));
		register_taxonomy( 'corgi-gender', 'corgi', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'corgi-gender', 'public' =>FALSE, 'show_admin_column'=>TRUE,'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('genre','wp_corgi'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Adds corgi size
function create_corgi_size_taxonomy()
{

    $labels = array('name' => _x( 'Size','wp_corgi'),'menu_name' => __( 'Sizes','wp_corgi'), 'add_new_item' => __( 'Add corgi size','wp_corgi'));
		register_taxonomy( 'corgi-size', 'corgi', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'corgi-size', 'public' =>FALSE, 'show_admin_column'=>TRUE, 'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('size','wp_corgi'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Adds corgi age
function create_corgi_age_taxonomy()
{

    $labels = array('name' => _x( 'Age','wp_corgi'),'menu_name' => __( 'Ages','wp_corgi'), 'add_new_item' => __( 'Add corgi age','wp_corgi'));
		register_taxonomy( 'corgi-age', 'corgi', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'corgi-age', 'public' =>FALSE, 'show_admin_column'=>TRUE, 'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('age','wp_corgi'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Adds corgi pattern
function create_corgi_pattern_taxonomy()
{

    $labels = array('name' => _x( 'Pattern','wp_corgi'),'menu_name' => __( 'Patterns','wp_corgi'), __( 'Add corgi pattern','wp_corgi'));
		register_taxonomy( 'corgi-pattern', 'corgi', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'corgi-pattern', 'public' =>FALSE, 'show_admin_column'=>TRUE, 'show_in_nav_menus'=>TRUE,'rewrite' => array( 'slug' => __('pattern','wp_corgi'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Adds corgi color
function create_corgi_color_taxonomy()
{

    $labels = array('name' => _x( 'Color','wp_corgi'),'menu_name' => __( 'Colors','wp_corgi'), __( 'Add corgi color','wp_corgi'));
		register_taxonomy( 'corgi-color', 'corgi', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'corgi-color', 'public' =>FALSE, 'show_admin_column'=>TRUE, 'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('color','wp_corgi'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}


function corgitype_permalink($permalink, $post_id, $leavename) {
	if (strpos($permalink, '%corgi-category%') === FALSE) return $permalink;

        // Gets the post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Gets the taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'corgi-category','orderby=term_order');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = __('no-corgi-category','wp_corgi');

	return str_replace('%corgi-category%', $taxonomy_slug, $permalink);
}


function remove_taxonomies_boxes() {
      remove_meta_box( 'tagsdiv-corgi-color', 'corgi', 'side' );
      remove_meta_box( 'tagsdiv-corgi-pattern', 'corgi', 'side' );
      remove_meta_box( 'tagsdiv-corgi-gender', 'corgi', 'side' );
      remove_meta_box( 'tagsdiv-corgi-size', 'corgi', 'side' );
      remove_meta_box( 'tagsdiv-corgi-age', 'corgi', 'side' );
    }


?>