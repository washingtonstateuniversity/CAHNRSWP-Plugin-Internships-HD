<?php

class CAHNRSWP_Internship_HD extends CAHNRSWP_Internship {
	

	public $agency_primary_address_state = 'WA';

	public $agency_other_address_state = 'WA';

/*	
	protected function set_internship_post( $post ){
		
		$this->agency_content = 'Nope';
		$this->agency_title = 'HD Internship: ' . apply_filters('the_title' , $post->post_title );
		$this->agency_permalink = get_post_permalink( $post->ID );	
		
	}
*/	
	/*public function get_internship_meta( $post_id , $key , $as_single ){
		
		$json;
		
		return $json[ $key ];
		
		/*if ( $key == '_agency_web_address' ){
			
			return 'http://google.com';
			
		} else {
			
			return parent::get_internship_meta( $post_id , $key , $as_single );
			
		}*/	
		
	//} // end get_internship_meta
	
	/*protected function set_internship_post( $post ){
		
		$this->agency_content = $json['the_content'];
		$this->agency_title = $json['the_title' ] ;
		$this->agency_permalink = $json['link'];	
	}*/
	
	

} //end CAHNRSWP_Internship