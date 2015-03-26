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
		'id'         => 'pet_profile',
		'title'      => 'NKCP Pet Form',
		'pages'      => array( 'pet' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(

			array(
				'name' => __('Corgi Form','wp_pet'),
				'desc' => __('Add corgi information and special features in the database for future reference.','wp_pet'),
				'id'   => $prefix . 'pet_title_2',
				'type' => 'title',
			),
    
			array(
       	'name' => __('Corgi Gender','wp_pet'),
       	'id' => $prefix . 'pet_gender',
       	'taxonomy' => 'pet-gender',
		'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Female'), 'value' => __('Female','wp_pet'), ),
					array( 'name' => __('Male','wp_pet'), 'value' => __('Male','wp_pet'), ),
				),
			),
			array(
       	'name' => __('Age of Corgi','wp_pet'),
       	'id' => $prefix . 'pet_age',
       	'taxonomy' => 'pet-age',
       	'type' => 'taxonomy_select',
			),
			array(
       	'name' => __('Corgi Size','wp_pet'),
       	'id' => $prefix . 'pet_size',
       	'taxonomy' => 'pet-size',
       	'type' => 'taxonomy_select',
			),
      array(
      	'name' => __('Corgi Pattern','wp_pet'),
      	'id' => $prefix . 'pet_pattern',
      	'taxonomy' => 'pet-pattern',
      	'type' => 'taxonomy_select',
      ),
      array(
      	'name' => __('Corgi Colours','wp_pet'),
      	'id' => $prefix . 'pet_color',
      	'taxonomy' => 'pet-color',
      	'type' => 'taxonomy_multicheck',
      ),
			array(
				'name'    => __('Vaccines','wp_pet'),
				'id'      => $prefix . 'pet_vaccines',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Vaccinated','wp_pet'), 'value' => __('Vaccinated','wp_pet'), ),
					array( 'name' => __('No Vaccinations','wp_pet'), 'value' => __('No Vaccinations','wp_pet'), ),
					array( 'name' => __('Do Not Know','wp_pet'), 'value' => __('Do Not Know','wp_pet'), ),
				),
			),
			array(
				'name'    => __('Desexed','wp_pet'),
				'id'      => $prefix . 'pet_desex',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Yes','wp_pet'), 'value' => __('Yes','wp_pet'), ),
					array( 'name' => __('No','wp_pet'), 'value' => __('No','wp_pet'), ),
				),
			),

			array(
				'name'    => __('Special needs','wp_pet'),
				'id'      => $prefix . 'pet_needs',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __('Yes','wp_pet'), 'value' => __('Yes','wp_pet'), ),
					array( 'name' => __('No','wp_pet'), 'value' => __('No','wp_pet'), ),
				),
			),
			array(
				'name' => __('Address','wp_pet'),
				'desc' => __('Address of corgi','wp_pet'),
				'id'   => $prefix . 'pet_address',
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