<?php

class PETPostType {

	var $labels;
	var $post_type_options;
  var $post_type_taxonomies;

	function __construct() {
		$this->PETPostType();
	}

	function PETPostType() {
		$this->labels = array(
		'name' => __('Pets','wp_pet'),
		'singular_name' => _x('Pet', 'post type singular name', 'wp_pet'),
		'add_new' => __('Add Pet','wp_pet'),
		'add_new_item' => __('Add Pet','wp_pet'),
		'edit_item' => __('Edit Pet','wp_pet'),
		'new_item' => __('New Pet','wp_pet'),
		'view_item' => __('View Pets','wp_pet'),
		'search_items' => __('Search Pets','wp_pet'),
		'not_found' =>  __('Not Found!','wp_pet'),
		'not_found_in_trash' => __('Nothing found in Trash','wp_pet'),
		'parent_item_colon' => ''
		);

		$this->post_type_options = array(
			'labels'=>$this->labels,
			'public'=>true,
			'supports' => array('title','editor','author','thumbnail'),
			'hierarchical' => true,
      'menu_position' => 120,
      'has_archive' => true,
			'rewrite' => array('slug' => 'pet', 'with_front' => FALSE)
		);

	}

	function register() {
	register_post_type('pet', $this->post_type_options);
  flush_rewrite_rules();
  }

}

//Add pet genre
function create_pet_genre_taxonomy()
{

    $labels = array('name' => _x( 'Gender','wp_pet'),'menu_name' => __( 'Genders','wp_pet'), 'add_new_item' => __( 'Add pet gender','wp_pet'));
		register_taxonomy( 'pet-gender', 'pet', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'pet-gender', 'public' =>FALSE, 'show_admin_column'=>TRUE,'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('genre','wp_pet'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Add pet size
function create_pet_size_taxonomy()
{

    $labels = array('name' => _x( 'Size','wp_pet'),'menu_name' => __( 'Sizes','wp_pet'), 'add_new_item' => __( 'Add pet size','wp_pet'));
		register_taxonomy( 'pet-size', 'pet', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'pet-size', 'public' =>FALSE, 'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('size','wp_pet'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Add pet age
function create_pet_age_taxonomy()
{

    $labels = array('name' => _x( 'Age','wp_pet'),'menu_name' => __( 'Ages','wp_pet'), 'add_new_item' => __( 'Add pet age','wp_pet'));
		register_taxonomy( 'pet-age', 'pet', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'pet-age', 'public' =>FALSE, 'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('age','wp_pet'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Add pet pattern
function create_pet_pattern_taxonomy()
{

    $labels = array('name' => _x( 'Pattern','wp_pet'),'menu_name' => __( 'Patterns','wp_pet'), __( 'Add pet pattern','wp_pet'));
		register_taxonomy( 'pet-pattern', 'pet', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'pet-pattern', 'public' =>FALSE, 'show_in_nav_menus'=>TRUE,'rewrite' => array( 'slug' => __('pattern','wp_pet'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}

//Add pet color
function create_pet_color_taxonomy()
{

    $labels = array('name' => _x( 'Color','wp_pet'),'menu_name' => __( 'Colors','wp_pet'), __( 'Add pet color','wp_pet'));
		register_taxonomy( 'pet-color', 'pet', array( 'hierarchical' => false, 'labels' => $labels, 'query_var' => 'pet-color', 'public' =>FALSE, 'show_in_nav_menus'=>TRUE, 'rewrite' => array( 'slug' => __('color','wp_pet'), 'hierarchical' => false,'with_front' => FALSE ) ) );
    flush_rewrite_rules();
}


//add_filter('post_link', 'pettype_permalink', 10, 3);
//add_filter('post_type_link', 'pettype_permalink', 10, 3);

function pettype_permalink($permalink, $post_id, $leavename) {
	if (strpos($permalink, '%pet-category%') === FALSE) return $permalink;

        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'pet-category','orderby=term_order');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = __('no-pet-category','wp_pet');

	return str_replace('%pet-category%', $taxonomy_slug, $permalink);
}


function remove_taxonomies_boxes() {
      remove_meta_box( 'tagsdiv-pet-color', 'pet', 'side' );
      remove_meta_box( 'tagsdiv-pet-pattern', 'pet', 'side' );
      remove_meta_box( 'tagsdiv-pet-gender', 'pet', 'side' );
      remove_meta_box( 'tagsdiv-pet-size', 'pet', 'side' );
      remove_meta_box( 'tagsdiv-pet-age', 'pet', 'side' );
    }


?>