<?php

class CAHNRSWP_Internship_Taxonomy_InternsPlaced extends CAHNRSWP_Internship_Taxonomy {

 public $name = 'internplaced';
 
 public $posttype = array('internship');
 
 public $taxonomy_args = array(
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_quick_edit' => false, 
		'meta_box_cb' 		=> false,	
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'internplaced' ),
	);

 
 public $singluar_name = 'Intern Placed';
 
 public $plural_name = 'Interns Placed';
 	
	
} // end CAHNRSWP_Internship_Taxonomy_InternsPlaced