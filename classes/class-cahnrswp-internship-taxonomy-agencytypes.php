<?php

class CAHNRSWP_Internship_Taxonomy_AgencyTypes extends CAHNRSWP_Internship_Taxonomy {

 public $name = 'agencytype';
 
 public $posttype = array('internship');
 
 public $taxonomy_args = array(
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_quick_edit' => false, 
		'meta_box_cb' 		=> false,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'agencytype' ),
	);

 
 public $singluar_name = 'Agency Type';
 
 public $plural_name = 'Agency Types';
 	
	
} // end CAHNRSWP_Internship_Taxonomy_AgencyTypes