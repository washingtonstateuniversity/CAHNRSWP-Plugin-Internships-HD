<?php

class CAHNRSWP_Internship_Taxonomy {

 public $name;
 
 public $posttype = array();
 
 public $taxonomy_args;
 
 public $singluar_name;
 
 public $plural_name;
 
 
 public function init() {
	 
	 add_action('init', array($this, 'register_tax'));
	 
	 
	 }
	
 public function set_posttype( $types ) {
	 
	 $this->posttype = $types;
	 
	 } //end set_posttypes
   	 
 public function register_tax() {
	 
	 $args = $this->taxonomy_args;
	 
	 $args['labels'] = $this->get_tax_labels();
	   

	 
	 register_taxonomy( $this->name, $this->posttype, $args ); 
	
	 } //end register

 public function get_tax_labels() {
	
   if ( ! empty($args['hiearchical'])) {	
	 $labels = array(
		'name'              => _x( $this->plural_name, 'taxonomy general name' ),
		'singular_name'     => _x( $this->singular_name, 'taxonomy singular name' ),
		'search_items'      => __( 'Search '. $this->plural_name ),
		'all_items'         => __( 'All '. $this->plural_name ),
		'parent_item'       => __( 'Parent '. $this->singular_name ),
		'parent_item_colon' => __( 'Parent '. $this->singular_name .':' ),
		'edit_item'         => __( 'Edit '. $this->singular_name ),
		'update_item'       => __( 'Update '. $this->singular_name ),
		'add_new_item'      => __( 'Add New '. $this->singular_name ),
		'new_item_name'     => __( 'New '. $this->singular_name .' Name' ),
		'menu_name'         => __( $this->singular_name ),
		);
   	 } // end if
    	 else {	 
	 $labels = array(
		'name'                       => _x( $this->plural_name, 'taxonomy general name' ),
		'singular_name'              => _x( $this->singular_name, 'taxonomy singular name' ),	
		'search_items'               => __( 'Search ' . $this->plural_name ),
		'popular_items'              => __( 'Popular ' . $this->plural_name ),
		'all_items'                  => __( 'All ' . $this->plural_name ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit ' . $this->singular_name ),
		'update_item'                => __( 'Update ' . $this->singular_name ),
		'add_new_item'               => __( 'Add New ' . $this->singular_name ),
		'new_item_name'              => __( 'New ' . $this->singular_name . ' Name' ),
		'separate_items_with_commas' => __( 'Separate ' . $this->plural_name . ' with commas' ),
		'add_or_remove_items'        => __( 'Add or remove ' . $this->plural_name ),
		'choose_from_most_used'      => __( 'Choose from the most used ' . $this->plural_name ),
		'not_found'                  => __( 'No ' . $this->plural_name . ' found.' ),
		'menu_name'                  => __( $this->plural_name ),
		);

    	} //end else 
		
		return $labels;
	 
   } //end get_tax_labels
	
} // end CAHNRSWP_Internship_Taxonomy