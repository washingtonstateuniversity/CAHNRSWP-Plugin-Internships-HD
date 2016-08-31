<?php 

?>

<?php  

?>
<?php
 
//Display the contents
 
foreach( $internships as $internship ){ 

	$agency_type_string = '';
	$intern_role_string = '';
	$location_string = '';

?>
	<div class="full-item">
    	
        <div class="full-content">
        <b>Agency:</b> 
	    	<b><a href="<?php echo $internship->agency_permalink; ?>"><?php echo $internship->agency_title; ?></a><br /></b>
    		<b>Location(s): </b><?php //echo $internship->agency_city;  ?>
            <?php 
					if (! empty( $internship->location_list)){
					  if (! is_wp_error( $internship->location_list )) {
					  	$numItems = count($internship->location_list);
						$i = 0;			
					    foreach ($internship->location_list as $one_location) {
				    		$location_string .=  $one_location->name; 
							if (++$i != $numItems) {$location_string .= ', ';}
					    } //end foreach
					  } //end not wp_error
					} //end not empty
	
				echo  $location_string; ?><p />
			
			<?php echo ' <b>Phone:</b> '?><?php echo $internship->agency_phone; ?><br />
    		<b>Primary Address: </b><?php echo $internship->agency_primary_address; ?> <b>Other Address: </b><?php echo $internship->agency_other_address; ?><br />
            <b>URL: </b><a href="<?php echo $internship->agency_web_address; ?>"><?php echo $internship->agency_web_address;?></a><br />
            <b>Interns Placed: </b><?php echo $internship->interns_placed; ?><br />
            <b>Intern Role(s): </b><?php echo $internship->intern_roles; ?><br />
                <?php 
				if (! empty( $internship->intern_roles_list)){
				  if (! is_wp_error( $internship->intern_roles_list )) {
				  	$numItems = count($internship->intern_roles_list);
					$i = 0;			
				    foreach ($internship->intern_roles_list as $one_intern_role) {
			    		$intern_role_string .=  $one_intern_role->name; 
						if (++$i != $numItems) {$intern_role_string .= ', ';}
				    } //end foreach
				  } //end not wp_error
				} //end not empty
	
				echo  $intern_role_string; ?><p />
            
                   
            <b>Agency Type: </b><?php //echo $agency_list_terms; ?><br />
              <?php 
	
	if (! empty( $internship->agency_type_list)){
	  if (! is_wp_error( $internship->agency_type_list )) {			
	  	$numItems = count($internship->agency_type_list);
		$i = 0;
	    foreach ($internship->agency_type_list as $one_agency_type) {
    		$agency_type_string .=  $one_agency_type->name; 
				if (++$i != $numItems) {$agency_type_string .= ', <br />';}
	    } //end foreach
	  } //end not wp_error
	} //end not empty
	
//	var_dump($agency_type_string);
  	echo  $agency_type_string; ?><br />
          
            
    		<b>Contact:</b> <?php echo $internship->agency_contact; ?><br />
    		<b><?php echo $internship->agency_last_updated; ?></b>
        </div>
	</div>
<?php } ?>

<?php  ?>
