<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );



/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {


	// Start with an underscore to hide fields from custom fields list
	$prefix = '_data_';

	$meta_boxes[] = array(
		'id'         => 'corgi_profile',
		'title'      => 'NKCP Corgi Form',
		'pages'      => array( 'corgi' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(

			array(
				'name' => __('Corgi Form','wp_corgi'),
				'desc' => __('Add corgi information and special features in the database for future reference.','wp_corgi'),
				'id'   => $prefix . 'corgi_title_2',
				'type' => 'title',
			),
    
			array(
       	'name' => __('Corgi Gender','wp_corgi'),
       	'id' => $prefix . 'corgi_gender',
       	'taxonomy' => 'corgi-gender',
		'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Female'), 'value' => __('Female','wp_corgi'), ),
					array( 'name' => __('Male','wp_corgi'), 'value' => __('Male','wp_corgi'), ),
				),
			),
			array(
       	'name' => __('Age of Corgi','wp_corgi'),
       	'id' => $prefix . 'corgi_age',
       	'taxonomy' => 'corgi-age',
       	'type' => 'taxonomy_select',
			),
			array(
       	'name' => __('Corgi Size','wp_corgi'),
       	'id' => $prefix . 'corgi_size',
       	'taxonomy' => 'corgi-size',
       	'type' => 'taxonomy_select',
			),
      array(
      	'name' => __('Corgi Pattern','wp_corgi'),
      	'id' => $prefix . 'corgi_pattern',
      	'taxonomy' => 'corgi-pattern',
      	'type' => 'taxonomy_select',
      ),
      array(
      	'name' => __('Corgi Colours','wp_corgi'),
      	'id' => $prefix . 'corgi_color',
      	'taxonomy' => 'corgi-color',
      	'type' => 'taxonomy_multicheck',
      ),
			array(
				'name'    => __('Vaccines','wp_corgi'),
				'id'      => $prefix . 'corgi_vaccines',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Vaccinated','wp_corgi'), 'value' => __('Vaccinated','wp_corgi'), ),
					array( 'name' => __('No Vaccinations','wp_corgi'), 'value' => __('No Vaccinations','wp_corgi'), ),
					array( 'name' => __('Do Not Know','wp_corgi'), 'value' => __('Do Not Know','wp_corgi'), ),
				),
			),
			array(
				'name'    => __('Desexed','wp_corgi'),
				'id'      => $prefix . 'corgi_desex',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Yes','wp_corgi'), 'value' => __('Yes','wp_corgi'), ),
					array( 'name' => __('No','wp_corgi'), 'value' => __('No','wp_corgi'), ),
				),
			),

			array(
				'name'    => __('Special needs','wp_corgi'),
				'id'      => $prefix . 'corgi_needs',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Yes','wp_corgi'), 'value' => __('Yes','wp_corgi'), ),
					array( 'name' => __('No','wp_corgi'), 'value' => __('No','wp_corgi'), ),
				),
			),
			array(
				'name' => __('Address','wp_corgi'),
				'desc' => __('Address of corgi','wp_corgi'),
				'id'   => $prefix . 'corgi_address',
				'type' => 'text_medium',
			),
		),
	);



	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}