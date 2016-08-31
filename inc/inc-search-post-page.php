<?php  
  //  echo 'on inc-search-page.php';
	
	echo '<form role="search" method="post" id="search-form" class="search-form" action="' . home_url() . '" >'; 
		echo '<label>Locations </label><p>';
		
					   $terms = get_terms('location');
 
						if(!empty($terms) && !is_wp_error($terms)):
 
   						 echo '<select name="location">';
						 
						  echo '<option value="">--Select Location--</option>';
 
     					   foreach($terms as $term):
 
        				    echo '<option value="'. $term->slug .'">'.$term->name.'</option>';
    				 
					      endforeach;
 
						    echo '</select></p><label>Agency Type </label><p>';
 	
						endif;
		
		
		
			        $terms = get_terms('agencytype');
 
						if(!empty($terms) && !is_wp_error($terms)):
 
   						 echo '<select name="agencytype">';

           			   echo '<option value="">--Select Agency Type--</option>';
 
     					   foreach($terms as $term):
 
        				     echo '<option value="'. $term->slug .'">'.$term->name.'</option>';
    				 
					      endforeach;
 
						     echo '</select><p />';
 	
						endif;
		 		  
		  echo '<div><label class="screen-reader-text" for="q">' . __( '' ) . '</label>
  		  <input type="text" placeholder="Search Internships..." value="" name="q" id="q" />
		  <input type="hidden" name="post_type" value="internship" />
		  <input type="hidden" name="page_id" value="'. get_the_ID() .'" />
		  <input type="submit" name="submit-search" id="intern-search-submit" value="'. esc_attr__( 'Search' ) .'" />
		  </div>
		  </form>';


//$s=get_search_query();
if(isset($_POST['submit-search'])){
	

 $args = array( 'post_type' => 'internship' , 'posts_per_page' => -1, 'status' => 'published' );
 
 if ( $_POST['q'] ){
	 
	 $args['s'] = sanitize_text_field( $_POST['q'] );
	 
 } // end if
 
 var_dump($args);
 
 if ( ! empty( $_POST['location'] ) || ! empty( $_POST['agencytype'] ) ) {
	 
	 $tax_query = array( 'relation' => 'OR' );
	 
	 if ( ! empty( $_POST['location'] ) ){
		 
		 $tax_query[] = array(
		 	'taxonomy' => 'location',
			'field' => 'slug',
			'terms' => sanitize_text_field( $_POST['location'] ),
		 );
		 
	 } // end if
	 
	 if ( ! empty( $_GET['agencytype'] ) ){
		 
		 $tax_query[] = array(
		 	'taxonomy' => 'agencytype',
			'field' => 'slug',
			'terms' => sanitize_text_field( $_POST['agencytype'] ),
		 );
		 
	 } // end if
	 
	 $args['tax_query'] = $tax_query;
	 
 } // end if
 
 //var_dump( $args );
 
 
 
 

//var_dump($args); 


//Define the loop based on arguments

//var_dump( $args );
 
$loop = new WP_Query( $args );

//var_dump($loop->request);

if ( $loop->have_posts() ) {
        _e("<h3 style='font-weight:bold;color:#717171;'>Search Results for: ".get_query_var('q')."</h3>");

?>
<div class="internTable">
 <div class="internTableRow">
  <div class="internTableHead">	
  Agency Name	
  </div> 
    <div class="internTableHead">		
    City
  </div> 
  <div class="internTableHead">		
  	Phone
  </div> 
  <div class="internTableHead">		
  Agency Type
  </div> 
  <div class="internTableHead">		
  Contact
  </div> 
  <div class="internTableHead">		
  	Last Updated
  </div> 
 </div>

	
<?php

 
//Display the contents
	
	 
while ( $loop->have_posts() ) : $loop->the_post();

  $post_id = $loop->ID;
  
  $agency_type_string = '';
  $intern_role_string = ''; 
  $location_string = '';



?>
<div class="internTableRow">
	<div class="internTableCell">
    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>    
    <div class="internTableCell">

            <?php 
					$location_list =  wp_get_object_terms( get_the_ID(), 'location' );
			
					if (! empty( $location_list)){
					  if (! is_wp_error( $location_list )) {
					  	$numItems = count($location_list);
						$i = 0;			
					    foreach ($location_list as $one_location) {
				    		$location_string .=  $one_location->name; 
							if (++$i != $numItems) {$location_string .= ', ';}
					    } //end foreach
					  } //end not wp_error
					} //end not empty
	
				echo  $location_string; ?>           
        
    </div>    
    <div class="internTableCell">
    	<?php echo get_post_meta(get_the_ID(), '_agency_phone', true); ?>
    </div>    
    <div class="internTableCell">

        <?php 
			$agency_type_list =  wp_get_object_terms( get_the_ID(), 'agencytype' );
			
			if (! empty( $agency_type_list)){
			  if (! is_wp_error( $agency_type_list )) {			
			    foreach ($agency_type_list as $one_agency_type) {
    				$agency_type_string .=  $one_agency_type->name . '<br />'; 
			    } //end foreach
			  } //end not wp_error
			} //end not empty
		
			echo  $agency_type_string; ?><br />
        
        
    </div>    
       <div class="internTableCell">
    	<?php echo get_post_meta(get_the_ID(), '_agency_contact', true); ?>
    </div>    
        <div class="internTableCell">
    	<?php echo  get_the_modified_date("m/d/Y g:i a"); ?>
    </div>    
</div> 

<?php endwhile; ?>
<?php
 } //end if $loop->have_posts()

 else { 
  
  ?>
    <h2 style='font-weight:bold;color:#717171'>Nothing Found</h2>
       <div class="alert alert-info">
         <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
       </div>

<?php 


}//end else $loop->have_posts()

?>

<?php wp_reset_postdata(); 

} // if issset
?>


<p><a href="javascript:history.back()">Back</a></p>