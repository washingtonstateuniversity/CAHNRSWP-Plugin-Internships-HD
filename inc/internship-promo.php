<?php


foreach ($internships as $internship) {


	$agency_type_string = '';
	$intern_role_string = '';
	$location_string = '';

?>
	<div class="promo-item">
    	<div class="promo-image">
          	 <?php	echo '<img src="' . plugins_url( 'images/hdkid.png', dirname(__FILE__) ) . '"  > ';	?>
        </div>
        <div class="promo-content">
	    	<b><a href="<?php echo $internship->agency_permalink; ?>"><?php echo $internship->agency_title; ?></a></b><br />
    		<b>Locations: </b><?php //echo $internship->agency_city;  ?>
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
	
				echo  $location_string; ?>   
 
			
			<?php echo ' <b>Phone:</b> '?><?php echo $internship->agency_phone; ?><br />
    		<b>Agency Type: </b><?php // echo $internship->agency_type; ?><br />
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
            	echo  $agency_type_string; ?><br />
    		<b>Contact:</b> <?php echo $internship->agency_contact; ?><br />
    		<b><?php echo $internship->agency_last_updated; ?></b>
        </div>
	</div>
    
<?php }?>

<?php ?>
