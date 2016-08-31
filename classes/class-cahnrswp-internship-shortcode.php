<?php

class CAHNRSWP_Internship_Shortcode {
	
	protected $shortcode_name;	
	
	protected $default_atts = array();
	
	protected $internship_factory;	
	

public function __construct( $internship_factory ){
	
	$this->internship_factory = $internship_factory;
	
} // end __construct
	 
 
 public function init() {
	 
	 add_action('init', array($this, 'register_shortcode'));
	 
	 
	 }
	 
 public function register_shortcode() {
	 
	 add_shortcode( $this->shortcode_name , array($this, 'run_shortcode')); 
	 
	 } 
	
 public function run_shortcode ( $atts , $content = null)  {
	 
	 $atts = shortcode_atts(
				$this->default_atts, 
				$atts, 
				$shortcode_name
				);


	 return $this->display_content( $atts, $content);
	 
	 } //end run_shortcode 	
	 
	 
	 protected function return_multiple_taxonomy_terms ( $taxonomy ) {

				$term_list = $taxonomy;
			
					if (! empty( $term_list)){
					  if (! is_wp_error( $term_list )) {
					  	$numItems = count($term_list);
						$i = 0;			
					    foreach ($term_list as $one_term) {
				    		$terms_string .=  $one_term->name; 
							if (++$i != $numItems) {$terms_string .= ', ';}
					    } //end foreach
					  } //end not wp_error
					} //end not empty
	
				return  $terms_string; 
	
	
		} //return_multiple_taxonomy_terms


/*		
    	protected function get_display_html( $internships, $atts, $content, $display_type_name ) {
					
		  $results = '';
		  
		  foreach ($internships as $internship ) {	
			
				$location_list_terms = $this->return_multiple_taxonomy_terms( $internship->location_list );
											
				$agency_list_terms = $this->return_multiple_taxonomy_terms( $internship->agency_type_list );
												
				if ($display_type_name == 'full') {

					$intern_role_terms = $this->return_multiple_taxonomy_terms( $internship->intern_roles_list );

					}// if
					
				$agency_contact = $internship->agency_contact;			
				$agency_phone = $internship->agency_phone;
				
				 ob_start();
							
				include plugin_dir_path( dirname( __FILE__) ). 'inc/inc-internship-'. $display_type_name .'.php';	


				$results .= ob_get_clean();
				
		  } //foreach
		  
		    return $results;
		
		
		} //end get_display_html - generic function for all display types	
*/


} //end CAHNRSWP_Internship_Shortcode