<?php

class CAHNRSWP_Internship_Shorcode_Promo extends CAHNRSWP_Internship_Shortcode {
	
	protected $shortcode_name = 'internships';	
/*	
 	protected $default_atts = array(
		'display' => 'list',	
	 );	
*/	 

   public function display_content( $atts, $content ) {
	   
	
	   
	   $html = '';
	   
	   extract($atts);
	   
	   $internships = $this->internship_factory->return_internships_by_query( array( 'post_type' => 'internship') );
	   
	   switch( $display ){
		   
		   case 'list':
//		   		$html = $this->get_list_html( $internships , $atts , $content );
				$html = $this->get_display_html( $internships , $atts , $content, 'table-row' );
				break;
				
			case 'promo':
//				$html = $this->get_promo_html( $internships , $atts , $content );
				$html = $this->get_display_html( $internships , $atts , $content, 'promo' );
		   		break;
				
			case 'full':
//				$html = $this->get_full_html( $internships , $atts , $content );
				$html = $this->get_display_html( $internships , $atts , $content, 'full' );
		   		break;	
	   } // end switch
	   
	   return $html;
	
	 
	 }	//end display_content


	
} //end CAHNRSWP_Internship_Shortcode_Promo