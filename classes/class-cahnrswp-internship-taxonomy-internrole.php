<?php

class CAHNRSWP_Internship_Taxonomy_InternRole extends CAHNRSWP_Internship_Taxonomy {

 public $name = 'internrole';
 
 public $posttype = array('internship');
 
 public $taxonomy_args = array(
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_quick_edit' => false, 
		'meta_box_cb' 		=> false,	
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'internrole' ),
	);

 
 public $singluar_name = 'Intern Role';
 
 public $plural_name = 'Intern Roles';
 	
	
} // end CAHNRSWP_Internship_Taxonomy_InternRole