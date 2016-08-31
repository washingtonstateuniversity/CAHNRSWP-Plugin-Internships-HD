
 <?php if ( !post_password_required()) { ?>
 
<div id="cahnrswp-single-internship">

<h3>Agency Details</h3>
	<h5 class="entry-title"><?php //echo $this->agency_title; ?></h5>
    <p></p>
    <div class="internform-column1-display">
		<b>Primary Address:</b><br />
		<?php echo $this->agency_primary_address; ?><br />
        <?php //echo $this->agency_city; ?><br />
        
           <?php 
	if (! empty( $this->location_list)){
	  if (! is_wp_error( $this->location_list )) {
	  	$numItems = count($this->location_list);
		$i = 0;			
	    foreach ($this->location_list as $one_location) {
    		$location_string .=  $one_location->name; 
			if (++$i != $numItems) {$location_string .= ', ';}
	    } //end foreach
	  } //end not wp_error
	} //end not empty
	
	echo  $location_string; ?>, <?php echo $this->agency_primary_address_state; ?><br />
        <?php echo $this->agency_primary_address_zip; ?><p />
    </div><div class="internform-column1-display">
		<b>Other Address: </b><br />
         <?php echo $this->agency_other_address; ?><br />
        <?php echo $this->agency_other_address_city; ?><br />
        <?php echo $this->agency_other_address_state; ?><br />
        <?php echo $this->agency_other_address_zip; ?><br />
    </div><div class="internform-column1-display">
    <b>Contact(s):</b> <?php echo $this->agency_contact; ?><br />
    <p><b>Phone: </b><?php echo $this->agency_phone; ?></p>
   
	<b>URL: </b><a href="<?php echo $this->agency_web_address; ?>"><?php echo $this->agency_web_address; ?></a><br />

     <p><b>Agency Description: </b></p>
    <?php echo $this->agency_content; ?>
    	<p><b>Possible Intern Roles: </b><?php // echo $this->intern_roles; ?></p>
    <?php 
	if (! empty( $this->intern_roles_list)){
	  if (! is_wp_error( $this->intern_roles_list )) {
	  	$numItems = count($this->intern_roles_list);
		$i = 0;			
	    foreach ($this->intern_roles_list as $one_intern_role) {
    		$intern_role_string .=  $one_intern_role->description; 
			if (++$i != $numItems) {$intern_role_string .= '<p /> ';}
	    } //end foreach
	  } //end not wp_error
	} //end not empty
	
	echo  $intern_role_string; ?><p />
    </div><div class="internform-column1-display">
	<p><b>Agency Type: </b><?php //echo $this->agency_type_list; ?>  </p>  
<?php 
	if (! empty( $this->agency_type_list)){
	  if (! is_wp_error( $this->agency_type_list )) {			
	    foreach ($this->agency_type_list as $one_agency_type) {
    		$agency_type_string .=  $one_agency_type->name . '<br />'; 
	    } //end foreach
	  } //end not wp_error
	} //end not empty
	
//	var_dump($agency_type_string);
  	echo  $agency_type_string; ?><br />
    
    <b>Interns Placed: </b><?php //echo $this->interns_placed; ?><br />
    <?php 
	if (! empty( $this->intern_placed_list)){
	  if (! is_wp_error( $this->intern_placed_list )) {
	  	$numItems = count($this->intern_placed_list);
		$i = 0;			
	    foreach ($this->intern_placed_list as $one_intern_placed) {
    		$intern_placed_string .=  $one_intern_placed->name; 
			if (++$i != $numItems) {$intern_placed_string .= '<p /> ';}
	    } //end foreach
	  } //end not wp_error
	} //end not empty
	
	echo  $intern_placed_string; ?><p />
    

    </div><div class="internform-other-display">	
 
   	<p><b>Last Updated: </b><?php echo $this->agency_last_updated; ?><p/>
    </div> 
    <a href="javascript:history.back()">Back</a>

<?php 

} else { echo get_the_password_form(); } 
?>  


</div>