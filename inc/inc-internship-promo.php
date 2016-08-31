	<div class="promo-item">
    	<div class="promo-image">
          	 <?php	echo '<img src="' . plugins_url( 'images/hdkid.png', dirname(__FILE__) ) . '"  > ';	?>
        </div>
        <div class="promo-content">
	    	<b><a href="<?php echo $internship->agency_permalink; ?>"><?php echo $internship->agency_title; ?></a></b><br />
    		<b>Locations: </b><?php echo $location_list_terms;  ?>
			<?php echo ' <b>Phone:</b> '?><?php echo $internship->agency_phone; ?><br />
    		<b>Agency Type: </b><?php echo $agency_list_terms; ?><br />               
    		<b>Contact:</b> <?php echo $internship->agency_contact; ?><br />
    		<b><?php echo $internship->agency_last_updated; ?></b>
        </div>
	</div>
