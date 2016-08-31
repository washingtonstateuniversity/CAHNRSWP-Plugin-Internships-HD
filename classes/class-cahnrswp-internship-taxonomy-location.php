<?php

class CAHNRSWP_Internship_Taxonomy_Location extends CAHNRSWP_Internship_Taxonomy {

 public $name = 'location';
 
 public $posttype = array('internship');
 
 public $taxonomy_args = array(
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_quick_edit' => false, 
		'meta_box_cb' 		=> false,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'location' ),
	);

 
 public $singluar_name = 'Location';
 
 public $plural_name = 'Locations (Cities)';
 	
	
} // end CAHNRSWP_Internship_Taxonomy_AgencyTypes