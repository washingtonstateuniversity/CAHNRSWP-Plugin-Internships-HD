<?php

class CAHNRSWP_Internship_Shorcode_HD extends CAHNRSWP_Internship_Shortcode {
	
	protected $shortcode_name = 'internships';	
	
 	protected $default_atts = array(
		'display' => 'list',	
	 );	
	 

   public function display_content( $atts, $content ) {
	   
	
	   
	   $html = '';
	   
	   extract($atts);
	   
	   $internships = $this->internship_factory->return_internships_by_query( array( 'post_type' => 'internship') );
	   
	   
	   switch( $display ){
		   
		   case 'list':
		   		$html = $this->get_list_html( $internships , $atts , $content );
//				$html = $this->get_display_html( $internships , $atts , $content, 'table-row' );
				break;
				
			case 'promo':
				$html = $this->get_promo_html( $internships , $atts , $content );
//				$html = $this->get_display_html( $internships , $atts , $content, 'promo' );
				break;
				
			case 'full':
				$html = $this->get_full_html( $internships , $atts , $content );
//				$html = $this->get_display_html( $internships , $atts , $content, 'full' );
				break;	
	   } // end switch
	   
	   return $html;
	
 	 
	 }	//end display_content
	 
	 protected function get_list_html( $internships , $atts , $content ){
		 
		  $results = '';
		   
		 	ob_start();
		 
			include plugin_dir_path( dirname( __FILE__ ) ) . 'inc/inc-search-results-header.php';
			 
			$results = ob_get_clean() . $results;
			 
		 
		  
		  foreach ($internships as $internship ) {	
			
				$location_list_terms = $this->return_multiple_taxonomy_terms( $internship->location_list );
				
				//$agency_phone = '000-000-nope';
				
				$agency_contact = $internship->agency_contact;
				$agency_phone = $internship->agency_phone;
				
				$agency_list_terms = $this->return_multiple_taxonomy_terms( $internship->agency_type_list );
				
				//$agency_list_terms = 'farms and stuff';
				
				ob_start();
				
				include plugin_dir_path( dirname( __FILE__ ) ) . 'inc/inc-internship-table-row.php';
				
				$results .= ob_get_clean();
				
		  } // end foreach
		  
		  return $results;
		 
				 
	 } // end get_list_html
	 
	 
	 
	protected function get_promo_html( $internships, $atts, $content ) {
		
		  $results = '';
		  
		  foreach ($internships as $internship ) {	
			
				$location_list_terms = $this->return_multiple_taxonomy_terms( $internship->location_list );
											
				$agency_list_terms = $this->return_multiple_taxonomy_terms( $internship->agency_type_list );

				 ob_start();
				
				 include plugin_dir_path( dirname( __FILE__) ).'inc/inc-internship-promo.php';
				
				$results .= ob_get_clean();
				
		  } //foreach
		  
		    return $results;
		
		} //end get_promo_html v2
	

		
	 protected function get_full_html( $internships , $atts , $content ){
		 
		 		  $results = '';
		  
		  foreach ($internships as $internship ) {	
			
				$location_list_terms = $this->return_multiple_taxonomy_terms( $internship->location_list );
				
				$intern_role_terms = $this->return_multiple_taxonomy_terms( $internship->intern_roles_list );
											
				$agency_list_terms = $this->return_multiple_taxonomy_terms( $internship->agency_type_list );

				 ob_start();
				
				 include plugin_dir_path( dirname( __FILE__) ).'inc/inc-internship-full.php';
				
				$results .= ob_get_clean();
				
		  } //foreach
		  
		    return $results;
		 
		 
	 } //  get_full_html v2



	
} //end CAHNRSWP_Internship_Shortcode