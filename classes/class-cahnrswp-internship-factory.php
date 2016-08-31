<?php 

class CAHNRSWP_Internship_Factory {
	
	public function return_internships_by_query( $args_args , $atts = array() , $content = '' ){
		
		$internships = array();

		$query = new WP_Query( $args_args );
		 
		 if ( $query->have_posts() ){
			 
			 while( $query->have_posts() ){
				 
				 $query->the_post();
				 
				 $internship = new CAHNRSWP_Internship_HD();
				 
				 $internship->set_internship_fields( $query->post ); 
				 
				 $internships[] = $internship;
				 
			 } // end while
			 
		 } // end if
		 
		 wp_reset_postdata();
		 
		 return $internships;
		
	} // end 
	
} // CAHNRSWP_Internship_Factory