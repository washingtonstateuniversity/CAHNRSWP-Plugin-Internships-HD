<?php  if ($post->post_type === "internship") { ?> 

<?php wp_nonce_field('submit_internship','internship_nonce'); ?>

<!--    Agency Title: <input type="text" name="_agency_title" value="<?php echo $this->agency_title ?>"><p /> -->
 	<div class="internform-column1">
     <fieldset>
     <legend>Primary Address</legend>
	 <label>Address:</label>
      <input type="text" name="_agency_primary_address" placeholder="<?php echo esc_attr_x( 'Address …', 'placeholder' ) ?>" value="<?php echo $this->agency_primary_address ?>">
     <label> City: </label><div class="intern-select">
	 <?php
 						$terms = get_terms('location', array('hide_empty' => false));
 
						if(!empty($terms) && !is_wp_error($terms)):
						
   					      $location_dropdown .= '<select name="select_location" >'; 
						  $location_dropdown .= '<option value="">--Select Location--</option>';
						   					  
						   foreach($terms as $term):
	 												
						    $selected = (has_term($term->term_id, 'location', $post->ID)) ? 'selected' : '';						
          				    $location_dropdown .= '<option value="'. $term->term_id .'" '. $selected . '>' .$term->name.'</option>';

					      endforeach;
 
						    $location_dropdown .= '</select>';
 	
						endif;
						echo $location_dropdown;
						
?>                   

</div><input type="text" class="addterm-location" name="_add_location" placeholder="<?php echo esc_attr_x( 'Add Location …', 'placeholder' ) ?>"  value="" />
<!--      <input type="text" name="_agency_city"  placeholder="<?php echo esc_attr_x( 'City …', 'placeholder' ) ?>" value="<?php  echo $this->agency_city ?>">  -->
   	 <label>State :</label><input type="text" name="_agency_primary_address_state" placeholder="<?php echo esc_attr_x( 'State …', 'placeholder' ) ?>" value="<?php echo $this->agency_primary_address_state ?>">
   	 <label>ZIP: </label><input type="text" name="_agency_primary_address_zip" placeholder="<?php echo esc_attr_x( 'ZIP …', 'placeholder' ) ?>" value="<?php echo $this->agency_primary_address_zip ?>">
     </fieldset>          
     </div><div class="internform-column1">
	<fieldset>
      <legend>Other Address</legend>
	 <label>Address:</label><input type="text" name="_agency_other_address" placeholder="<?php echo esc_attr_x( 'Address …', 'placeholder' ) ?>" value="<?php echo $this->agency_other_address ?>">
    <label> City: </label><input type="text" name="_agency_other_address_city" placeholder="<?php echo esc_attr_x( 'City …', 'placeholder' ) ?>" value="<?php echo $this->agency_other_address_city ?>">
     <label>State: </label> <input type="text" name="_agency_other_address_state" placeholder="<?php echo esc_attr_x( 'State …', 'placeholder' ) ?>" value="<?php echo $this->agency_other_address_state ?>">
     <label>ZIP: </label> <input type="text" name="_agency_other_address_zip" placeholder="<?php echo esc_attr_x( 'ZIP …', 'placeholder' ) ?>" value="<?php echo $this->agency_other_address_zip ?>"><br />
      </fieldset>
    </div>
    <div class="internform-column1">
    <fieldset>
    <legend>Contact Information</legend>
   	<label>Contact: </label><input type="text" name="_agency_contact" placeholder="<?php echo esc_attr_x( 'Contact …', 'placeholder' ) ?>" value="<?php echo $this->agency_contact ?>">
   	<label>Phone: </label><input type="text" name="_agency_phone" placeholder="<?php echo esc_attr_x( 'Phone …', 'placeholder' ) ?>" value="<?php echo $this->agency_phone ?>">
	<label>URL: </label> <input type="text" name="_agency_web_address" placeholder="<?php echo esc_attr_x( 'URL …', 'placeholder' ) ?>" value="<?php echo $this->agency_web_address ?>">
<!--	<label>Agency Type: </label> <input type="text" name="_agency_type" placeholder="<?php echo esc_attr_x( 'Agency Type …', 'placeholder' ) ?>" value="<?php echo $this->agency_type ?>"> -->
     </fieldset>
    </div><div class="internform-column1">
    <fieldset>
    <legend>Intern Data</legend>
    <label>Agency Type: </label> 
   <?php
 				$terms = get_terms('agencytype', array('hide_empty' => false));
 
					if(!empty($terms) && !is_wp_error($terms)):
						 
					 $agencytype_cb .=	'<ul class="checkbox">';				
					 $agencytype_cb .= '<p>';

					 foreach($terms as $term):
  
   	        			$checked = (has_term($term->term_id, 'agencytype', $post->ID)) ? 'checked="checked"' : '';
    					$agencytype_cb .= '<li><input type="checkbox" name="select_agencytype[]" value="' . $term->term_id . '"' .  $checked .' />';
						$agencytype_cb .= '<label for="term-' . $term->term_id . '">' . $term->name . '</label></li>';
   				 
					  endforeach;
	
					$agencytype_cb .= '</ul><input type="hidden" name="select_agencytype[]" value="" /></p>';
 	
					endif;
					echo $agencytype_cb;
	?>  
    <input type="text" name="_agency_type" placeholder="<?php echo esc_attr_x( 'Add Agency Type …', 'placeholder' ) ?>" class="addterm" value=""><br />                       
    <label>Interns Placed: </label>
<!--        <input type="text" name="_interns_placed" placeholder="<?php echo esc_attr_x( 'Interns Placed …', 'placeholder' ) ?>" value="<?php echo $this->interns_placed ?>"> -->
 <?php
 				$taxonomy = 'internplaced';
				
 				$terms = get_terms('internplaced', array('hide_empty' => false));
 
					if(!empty($terms) && !is_wp_error($terms)):
						 
					 $internplaced_cb .=	'<ul class="radio-button">';				
					 $internplaced_cb .= '<p>';

					 foreach($terms as $term):
  
   	        			$checked = (has_term($term->term_id, 'internplaced', $post->ID)) ? 'checked="checked"' : '';
    					$internplaced_cb .= '<li><input type="radio" name="select_internplaced[]" value="' . $term->term_id . '"' .  $checked .' />';
						$internplaced_cb .= '<label for="term-' . $term->term_id . '">' . $term->name . '</label></li>';
   				 
					  endforeach;
	
					$internplaced_cb .= '</ul><input type="hidden" name="select_internplaced[]" value="" /></p>';
					
					endif;
					echo $internplaced_cb;
	
				//	echo 'Add Term: ';

	?>
<!--//    
  <div id="<?php echo $taxonomy; ?>-adder" class="wp-hidden-children">
				<a id="<?php echo $taxonomy; ?>-add-toggle" href="#<?php echo $taxonomy; ?>-add" class="hide-if-no-js taxonomy-add-new">
					+ Add New 				</a>
				<p id="<?php echo $taxonomy; ?>-add" class="category-add wp-hidden-child">
					<label class="screen-reader-text" for="new<?php echo $taxonomy; ?>">Add New </label>
					<input type="text" name="new<?php echo $taxonomy; ?>" id="new<?php echo $taxonomy; ?>" class="form-required form-input-tip" value="New  Name" aria-required="true"/>
					<label class="screen-reader-text" for="new<?php echo $taxonomy; ?>_parent">
											</label>
					<input type="button" id="<?php echo $taxonomy; ?>-add-submit" data-wp-lists="add:<?php echo $taxonomy; ?>checklist:<?php echo $taxonomy; ?>-add" class="button category-add-submit" value="Add New " />
					<input type="hidden" id="_ajax_nonce-add-<?php echo $taxonomy; ?>" name="_ajax_nonce-add-<?php echo $taxonomy; ?>" value="d01e9d9ad1" />					<span id="<?php echo $taxonomy; ?>-ajax-response"></span>
				</p>
			</div>
 //-->           
<input type="text" name="_interns_placed" placeholder="<?php echo esc_attr_x( 'Add Placed term…', 'placeholder' ) ?>" class="addterm" value=""> 
  </fieldset>
  </div>
  <div class="internform-other">
 <fieldset>
 <legend> Intern Roles: </legend>
<!--  <label>Intern Roles: </label>  -->
   <?php
 				$terms = get_terms('internrole', array('hide_empty' => false));
 
					if(!empty($terms) && !is_wp_error($terms)):
						 
					 $internrole_cb .=	'<ul class="checkbox-other">';				
					 $internrole_cb .= '<p>';

					 foreach($terms as $term):
  
   	        			$checked = (has_term($term->term_id, 'internrole', $post->ID)) ? 'checked="checked"' : '';
    					$internrole_cb .= '<li><input type="checkbox" name="select_internrole[]" value="' . $term->term_id . '"' .  $checked .' />';
						$internrole_cb .= '<label for="term-' . $term->term_id . '">' . $term->name . '</label></li>';
   				 
					  endforeach;
	
					$internrole_cb .= '</ul><input type="hidden" name="select_internrole[]" value="" /></p>';
 	
					endif;
					echo $internrole_cb;
	?>                        
	<input type="text" name="_intern_roles" placeholder="<?php echo esc_attr_x( 'Add Role …', 'placeholder' ) ?>" class="addterm" value="">        
<!--       <label>Intern Roles: </label><textarea  name="_intern_roles"><?php echo $this->intern_roles ?></textarea> -->
<!--       <label>Interns Roles: </label><textarea name="_intern_roles" rows="5" cols="61"><?php echo $this->intern_roles ?></textarea>  -->
     </fieldset>
<!--  	<label>Intern Roles: </label> -->
    
<!--    <input type="text" name="_intern_roles" placeholder="<?php echo esc_attr_x( 'Intern Roles …', 'placeholder' ) ?>" value="<?php echo $this->intern_roles ?>"> -->

<!--      <label>Intern Roles: </label><input type="textarea"  name="_intern_roles" placeholder="<?php echo esc_attr_x( 'Intern Roles …', 'placeholder' ) ?>" value="<?php echo $this->intern_roles ?>"> -->
<!--       <label>Intern Roles: </label><textarea  name="_intern_roles"><?php echo $this->intern_roles ?></textarea> -->
  
   
    
    <!--	Last Updated: <input type="text" name="_agency_last_updated" value="<?php echo $this->agency_last_updated ?>"><br /> -->
	</div>
<?php } ?>