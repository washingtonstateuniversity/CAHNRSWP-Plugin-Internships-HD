<?php
/**
* Plugin Name: CAHNRSWP Internships 
* Plugin URI:  http://cahnrs.wsu.edu/communications/
* Description: CAHNRSWP Internships post type, taxonomy and display
* Version:     0.0.1
* Author:      CAHNRS Communications, Don Pierce
* Author URI:  http://cahnrs.wsu.edu/communications/
* License:     Copyright Washington State University
* License URI: http://copyright.wsu.edu
*/

class CAHNRSWP_Internships_Library {
	
	protected static $instance;
	
	public static function get_Instance() {
		
		if (self::$instance === null) {
			self::$instance = new self();
			}
		
		return self::$instance;
		}
	
	
	public function __construct() {
		
		require_once('classes/class-cahnrswp-internship.php');
		require_once('classes/class-cahnrswp-internship-hd.php');
		$HDInternship = new CAHNRSWP_Internship_HD;	
		$HDInternship->init();
		
		require_once('classes/class-cahnrswp-internship-factory.php');
		$internship_factory = new CAHNRSWP_Internship_Factory;	
/*		
		require_once('classes/class-cahnrswp-internship-shortcode.php');
		require_once('classes/class-cahnrswp-internship-shortcode-list.php');
		$InternshipShortCodeList = new CAHNRSWP_Internship_Shorcode_List( $internship_factory );	
		$InternshipShortCodeList->init(); 
*/		
  		require_once('classes/class-cahnrswp-internship-shortcode.php');
		require_once('classes/class-cahnrswp-internship-shortcode-hd.php');
		$InternshipShortCodeList = new CAHNRSWP_Internship_Shorcode_HD( $internship_factory );	
		$InternshipShortCodeList->init();

		
		require_once('classes/class-cahnrswp-internship-shortcode-search.php');
		$InternshipShortCodeSearch = new CAHNRSWP_Internship_Shorcode_Search ( $internship_factory );	
		$InternshipShortCodeSearch->init();
/*	
		require_once('classes/class-cahnrswp-internship-wpse-modify-query.php');
		$InternshipModifySearchQuery = new CAHNRSWP_Internship_WSPE_Modify_Query;
		$InternshipModifySearchQuery->activate();
*/		
		
	//	add_action('single_template', array($this, 'internship_single_template')); 
	//	add_filter('template_include',array($this, 'internship_search_template')); 
							
		require_once('classes/class-cahnrswp-internship-taxonomy.php');
	 	require_once('classes/class-cahnrswp-internship-taxonomy-location.php');
		$HDTaxonomy_Locations = new CAHNRSWP_Internship_Taxonomy_Location;
    	$HDTaxonomy_Locations->set_posttype( 'internship');
		$HDTaxonomy_Locations->init();
	
		require_once('classes/class-cahnrswp-internship-taxonomy.php');
	 	require_once('classes/class-cahnrswp-internship-taxonomy-agencytypes.php');
		$HDTaxonomy_AgencyTypes = new CAHNRSWP_Internship_Taxonomy_AgencyTypes;
    	$HDTaxonomy_AgencyTypes->set_posttype( 'internship');
		$HDTaxonomy_AgencyTypes->init();	
		
		require_once('classes/class-cahnrswp-internship-taxonomy.php');
	 	require_once('classes/class-cahnrswp-internship-taxonomy-internrole.php');
		$HDTaxonomy_InternRoles = new CAHNRSWP_Internship_Taxonomy_InternRole;
    	$HDTaxonomy_InternRoles->set_posttype( 'internship');
		$HDTaxonomy_InternRoles->init();
		
		require_once('classes/class-cahnrswp-internship-taxonomy.php');
	 	require_once('classes/class-cahnrswp-internship-taxonomy-internplaced.php');
		$HDTaxonomy_InternsPlaced = new CAHNRSWP_Internship_Taxonomy_InternsPlaced;
    	$HDTaxonomy_InternsPlaced->set_posttype( 'internship');
		$HDTaxonomy_InternsPlaced->init();
		
		
			
		} //end __construct

/*

	public function internship_single_template ($single_template) {

	global $post;
	
	

 	if ($post->post_type == 'internship') {
    	  $single_template = plugin_dir_path( __FILE__ ) . '/templates/single-internship.php';
	 }
 	return $single_template;
	
	} //end internship_single_template
	
   public function internship_search_template($template) {
		
	global $post;
	global $wp_query;
	
	if (!$wp_query->is_search)
		return $template;
   
 	if (($post->post_type == 'internship') && ($wp_query->is_search)) {	
			$template = plugin_dir_path( __FILE__ ) . '/templates/search-internship.php';
			
		
		
		}
		return $template;	
	
	}//end internship_search_template
*/
	
} //end CAHNRSWP_Internships_Library

$cahnrswp_internships_labrary = CAHNRSWP_Internships_Library::get_Instance();