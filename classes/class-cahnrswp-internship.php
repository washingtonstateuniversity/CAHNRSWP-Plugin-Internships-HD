<?php

abstract class CAHNRSWP_Internship {
	
//	public $agency_name;

	public $agency_title;
	
 	public $agency_permalink;
	
 	public $agency_content;
	
	public $agency_primary_address;

	public $agency_city;
	
	public $agency_primary_address_state;
			
	public $agency_primary_address_zip;
	
	public $agency_other_address;

	public $agency_other_address_state;
	
	public $agency_other_address_city;
	
	public $agency_other_address_zip;
	
	public $agency_web_address;
			
	public $agency_phone;
	
 	public $interns_placed;
	
	public $intern_roles;
	
	public $agency_type;
	
	public $agency_contact;
	
	public $agency_last_updated;
 
	
	public $posttype_args;

	public $posttype_singlar_name = 'Internship' ;

	public $posttype_plural_name = 'Internships'; 
	
	public $posttype = 'internship';


	public function init() {
		
	    add_action('admin_enqueue_scripts',array($this, 'register_styles_admin'));
		add_action('wp_enqueue_scripts', array($this, 'register_styles'));		

		
		add_action( 'init', array($this, 'register_posttype') );
		
		add_filter( 'wp_insert_post_data' , array($this, 'set_internship_default_password') , 99 , 2);
		
		add_action( 'edit_form_after_title', array($this, 'add_edit_form'));
		add_action( 'save_post_internship' , array($this, 'save'));
			

//	    add_shortcode('single-display-page', array($this, 'single_page_display'));

		add_filter('the_content', array($this, 'single_page_display'), 1 );
						
		
		} //end init


	  public function internship_search () {
		  		  
		  ob_start();
			
//		  include dirname( dirname( __FILE__ ) ) . '/inc/inc-search-page.php';
		  include plugin_dir_path( dirname( __FILE__) ) . 'inc/inc-search-page.php';
			
		  return ob_get_clean();
		  
	 } // end intership_search
	 
	   

	
	public function register_styles_admin() {
		 
		// echo 'in register_styles';
 	
			 wp_register_style( 'internship-style',  plugins_url( 'internships/css/internship-style.css') );
	         wp_enqueue_style('internship-style');
		
		} //end register_styles
		
	public function register_styles() {
		 
		// echo 'in register_styles';
 	
			 wp_register_style( 'internship-style',  plugins_url( 'internships/css/internship-style.css') );
	         wp_enqueue_style('internship-style');
		
		} //end register_styles	

	
	
	public function register_posttype() {
			
		$args = array(
			'public' => true,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $this->posttype_plural_name ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
    	);
		
		$args['labels'] = $this->get_Labels();
		
			
    	register_post_type( $this->posttype, $args );
		
	} //end register_posttype from oopplugin
	
	
	public function get_Labels() {
		
		$labels = array(
		'name'               => _x( $this->posttype_plural_name, 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( $this->posttype_singlar_name, 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( $this->posttype_plural_name, 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( $this->posttype_singlar_name, 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', $this->posttype_singlar_name, 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New '. $this->posttype_singlar_name, 'your-plugin-textdomain' ),
		'new_item'           => __( 'New '. $this->posttype_singlar_name, 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit '. $this->posttype_singlar_name, 'your-plugin-textdomain' ),
		'view_item'          => __( 'View '. $this->posttype_singlar_name, 'your-plugin-textdomain' ),
		'all_items'          => __( 'All '. $this->posttype_plural_name, 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search '. $this->posttype_plural_name, 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent '.$this->posttype_plural_name .':', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No '. $this->posttype_plural_name .' found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No '. $this->posttype_plural_name .' found in Trash.', 'your-plugin-textdomain' )
	);

	return $labels;
		
	} //end get_Labels
	
	public function set_internship_fields( $post ) {
			
			
			$this->set_internship_post( $post );

			$this->set_internship_meta( $post->ID );
			
		} //end set_internship_fields
		
	
	public function set_internship_default_password( $data, $postarr ) {
		 
		 if ( empty( $data['post_name'] ) && 'internship' == $postarr['post_type']) {
			 
			 $data[ 'post_password' ] = 'intern'; 
			 
			 }
		 
		return $data;
			
		} // end set_internship_default_password
	
	public function set_internship_fields_by_id( $post_id ){
		
		$this->set_internship_post( get_post( $post_id ) );
		
		$this->set_internship_meta( $post_id );
		
	} // end set_internship_by_id
	
		
	protected function set_internship_post( $post ){
		
		$this->agency_content =  $post->post_content;
		$this->agency_title = $post->post_title;
		$this->agency_permalink = get_post_permalink( $post->ID );	
		$this->agency_last_updated = get_the_modified_date("m/d/Y g:i a");		
		
		
	} //end set_internship_post 
	
	protected function set_internship_meta( $post_id ){
		
		$this->agency_primary_address = $this->get_internship_meta($post_id, '_agency_primary_address', true);
		$this->agency_city = $this->get_internship_meta($post_id, '_agency_city', true);	
		$this->agency_primary_address_state = $this->get_internship_meta($post_id, '_agency_primary_address_state', true);	
		$this->agency_primary_address_zip = $this->get_internship_meta($post_id, '_agency_primary_address_zip', true);	
		$this->agency_other_address = $this->get_internship_meta($post_id, '_agency_other_address', true);	
		$this->agency_other_address_city = $this->get_internship_meta($post_id, '_agency_other_address_city', true);	
		$this->agency_other_address_state = $this->get_internship_meta($post_id, '_agency_other_address_state', true);	
		$this->agency_other_address_zip = $this->get_internship_meta($post_id, '_agency_other_address_zip', true);	
		$this->agency_web_address = $this->get_internship_meta($post_id, '_agency_web_address', true);	
		$this->agency_phone = $this->get_internship_meta($post_id, '_agency_phone', true);	
		$this->interns_placed = $this->get_internship_meta($post_id, '_interns_placed', true);	
		$this->intern_roles = $this->get_internship_meta($post_id, '_intern_roles', true);	
		$this->agency_type = $this->get_internship_meta($post_id, '_agency_type', true);	
		$this->agency_contact = $this->get_internship_meta($post_id, '_agency_contact', true);	
	//	$this->agency_last_updated = $this->get_internship_meta($post_id, '_agency_last_updated', true);	
		$this->agency_type_list =  wp_get_object_terms( $post_id, 'agencytype' );
		$this->location_list =  wp_get_object_terms( $post_id, 'location' );
		$this->intern_roles_list =  wp_get_object_terms( $post_id, 'internrole' );
		$this->intern_placed_list =  wp_get_object_terms( $post_id, 'internplaced' );


	//	var_dump($this->agency_type_list);
		
	} //end set_internship_meta
	
	public function get_internship_meta( $post_id , $key , $as_single ){
		
		return get_post_meta($post_id, $key, $as_single);	
		
	} // end get_internship_meta
	
	
	
	public function add_edit_form( $post ) {
		
		$this->set_internship_fields( $post );
		
		include plugin_dir_path( dirname( __FILE__) ).'inc/more-edit-fields.php';
		
	} //end add_edit_form
	
	
	private function return_save_new_taxonomy_field( $field , $taxonomy ){
		
		$new_id = false;
		
		if ( ! empty( $_POST[ $field ] ) ) {
			
			$term_name = sanitize_text_field( $_POST[ $field ] );
			
			$exist_term = term_exists( $term_name , $taxonomy );
			
			if ( $exist_term ){
				
				$new_id = $exist_term['term_id'];
				
			} else {
				
				$term = wp_insert_term( $term_name , $taxonomy );
				
				$new_id = $term['term_id'];
				
			}// end if
			
		} // end if
		
		return $new_id;
		
	} //end return_save_new_taxonomy_field
	
	private function make_ints( &$term_ids ){
		
		foreach( $term_ids as $index => $term_id ){
		
			if( is_numeric( $term_id ) && ! empty( $term_id ) ){
				
				$value = sanitize_text_field( $term_id );
			
				$term_ids[ $index ] = (int) $value;
			
			} else {
			
				unset( $term_ids[ $index ] );
			
			}// end if
		
		} // end foreach
		
		
	} // end make_int


	public function save( $post_id ) {
		
		if ( ! isset( $_POST['internship_nonce'] ) ) return;
								
		if ( ! wp_verify_nonce( $_POST['internship_nonce'], 'submit_internship' ) ) return;
				
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
		
		
		//** New Loop
		
		$tax_fields = array( 
			'agencytype'   => array( 'selected' => 'select_agencytype' , 'add' => '_agency_type' ), 
			'internplaced' => array( 'selected' => 'select_internplaced', 'add' => '_interns_placed' ) ,
			'internrole'   => array( 'selected' => 'select_internrole', 'add' => '_intern_roles' ),
			'location'   => array( 'selected' => 'select_location', 'add' => '_add_location' )  
			);
		
		foreach( $tax_fields as $taxonomy => $fields ){
			
			$selected = ( ! empty( $_POST[ $fields['selected'] ] ) ) ? $_POST[ $fields['selected'] ] : array();
			
			if ( ! is_array( $selected ) ) $selected = array( $selected );
			
			if ( ! empty( $_POST[ $fields['add'] ] ) ) {
				
				$added_id = $this->return_save_new_taxonomy_field( $fields['add'] , $taxonomy );
				
				if ( ! empty( $added_id ) ){
					
					$selected[] = $added_id;
					
				} // end if
					
			} // end if
			
			$this->make_ints( $selected );
			
			wp_set_object_terms( $post_id , $selected , $taxonomy );
			
		} // end foreach
		
		
		// End new loop
			

//		$fields = array('_agency_name' , '_agency_primary_address', '_agency_primary_address_state', '_agency_primary_address_zip' , '_agency_other_address', '_agency_other_address_city' , '_agency_other_address_state' ,'_agency_other_address_zip', '_agency_web_address', '_agency_city', '_agency_phone', '_interns_placed', '_intern_roles', '_agency_type', '_agency_contact', '_agency_last_updated');
		
		$fields = array( /*'_agency_title', '_agency_permalink' , '_agency_content',*/ '_agency_primary_address', '_agency_primary_address_state',  '_agency_city', '_agency_primary_address_zip' , '_agency_other_address', '_agency_other_address_city' , '_agency_other_address_state' ,'_agency_other_address_zip', '_agency_web_address', '_agency_phone', /*'_interns_placed', '_intern_roles', '_agency_type',*/ '_agency_contact', /*'_agency_last_updated'*/);

				foreach ($fields as $field) {
							
				
					if( isset ( $_POST[ $field ] ) ) {
						
						$instance = sanitize_text_field( $_POST[ $field ] );
						
						update_post_meta($post_id, $field, $instance);
												
			
					} // end if ( isset ...
							
			} //end foreach
			

		} //end save


	public function single_page_display( $content ){
		
		if ( is_single( ) && ( get_post_type() == 'internship') && ( strpos( $content , 'cahnrswp-single-internship' ) === false )  ){ 
		
			global $post;
		
			$this->set_internship_fields( $post );
			
			$content = $this->agency_content;
			
			ob_start();
			
//			include dirname( dirname( __FILE__ ) ) . '/inc/inc-single-display.php';
			include plugin_dir_path( dirname( __FILE__) ) . 'inc/inc-single-display.php';
			
			$content = ob_get_clean();
		
		}; // end if
		
		return $content;
	
	 
	} //end single_page_display
	

	
} //end CAHNRSWP_Internship