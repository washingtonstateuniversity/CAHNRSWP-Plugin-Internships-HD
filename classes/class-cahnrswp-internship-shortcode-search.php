<?php

class CAHNRSWP_Internship_Shorcode_Search extends CAHNRSWP_Internship_Shortcode {
	
	protected $shortcode_name = 'internship-search';	
	
 	protected $default_atts = array(	
	 );	
	 

   public function display_content( $atts, $content ) {
	  
	   $html = '';
	   
	   $html .= $this->return_search_form( $atts , $content );
	   
	   $html .= $this->return_search_results( $atts , $content );
	   
	   return $html;
	 
	 }	//end display_content
	 
	 
	 private function return_search_form( $atts , $content ){
		 
		 ob_start();
		 
		 $location_options = $this->return_term_options( 'location' );
		 
		 $agency_options = $this->return_term_options( 'agencytype' );
		 
		 include plugin_dir_path( dirname( __FILE__) ) . 'inc/inc-search-form.php';
		 
		 return ob_get_clean();
		 
	 }
	 
	 
	 private function return_search_results( $atts , $content ){
		 
		 $query_args = $this->return_query_args( $atts );
		 
		 $results = $this->return_results( $query_args ); //rename $results to something more readable.
		 
	//	 var_dump( $results );
		
		 if ( ! empty( $results )){
			 
		 	ob_start();
		 
			include plugin_dir_path( dirname( __FILE__ ) ) . 'inc/inc-search-results-header.php';
			 
			$results = ob_get_clean() . $results;
			 
		  } // if !== ''
		  
		  return $results;
		  
	 }
	 
	 
	 protected function return_results ( $query_args  ) {
		 
		 $results = '';
		 
		  //$internships = $this->get_internships( $query_args );
		  
		  $internships = $this->internship_factory->return_internships_by_query( $query_args );
		  
		  foreach ($internships as $internship ) {	
			
				$location_list_terms = $this->return_multiple_taxonomy_terms( $internship->location_list );
				
				$agency_list_terms = $this->return_multiple_taxonomy_terms( $internship->agency_type_list );
				
				$agency_phone = $internship->agency_phone;
				
				$agency_contact = $internship->agency_contact;
				
				ob_start();
				
				include plugin_dir_path( dirname( __FILE__ ) ) . 'inc/inc-internship-table-row.php';
				
				$results .= ob_get_clean();
				
		  } // end foreach
		  
		  return $results;
		 
		 
		 } // return_results
	 
	 
	 protected function return_term_options( $taxonomy ){
		 
		 $options = '<option value="">Select...</option>';
		 
		 $terms = get_terms( $taxonomy );
		 
		 if ( $terms ){
			 
			 foreach( $terms as $term ){
				 
				 $options .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
				 
			 } // end foreach
			 
		 } // end if
		 
		 return $options;
		 
	 } // end return_term_options
	 
	 
	 protected function return_query_args( $atts ){
		 
		 $args = array();
		 
		 $default_args = array( 'post_type' => 'internship' , 'posts_per_page' => -1, 'status' => 'published' );
		 
		 if ( ! empty( $_GET['q'] ) ){
	 
	 		$args['s'] = sanitize_text_field( $_GET['q'] );
	 
 		} // end if
		
		$locations_args = $this->return_tax_args( 'location' , $atts );
			
		if ( $locations_args ) {
			
			$args['tax_query'][] = $locations_args;
			
		} // end if
		
		$agency_args = $this->return_tax_args( 'agencytype' , $atts );
		
		if ( $agency_args ) {
			
			$args['tax_query'][] = $agency_args;
			
		} // end if
		
		if ( ! empty( $args ) ){
			
			return array_merge( $args , $default_args );
			
		} else {
			
			return $args;
			
		} // end if
		 
	 }
	 
	 
	 protected function return_tax_args( $taxonomy , $atts ){
		 
		 $tax_query = array();
		 
		 if ( ! empty( $_GET[ $taxonomy ] ) ){
		 
		 	$tax_query['relation'] = 'OR';
			
			$tax_query[] = array(
		 		'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => sanitize_text_field( $_GET[ $taxonomy ] ),
		 	);
			
		 }; // end if
		 
		 return $tax_query;
		 
	 } // end return_tax_ags
	 

	 


	
} //end CAHNRSWP_Internship_Shorcode_Search