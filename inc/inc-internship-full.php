	<div class="full-item">
    	
        <div class="full-content">
        <b>Agency:</b> 
	    	<b><a href="<?php echo $internship->agency_permalink; ?>"><?php echo $internship->agency_title; ?></a><br /></b>
    		<b>Location(s): </b><?php echo $location_list_terms;  ?><p />		
			<?php echo ' <b>Phone:</b> '?><?php echo $internship->agency_phone; ?><br />
    		<b>Primary Address: </b><?php echo $internship->agency_primary_address; ?> <b>Other Address: </b><?php echo $internship->agency_other_address; ?><br />
            <b>URL: </b><a href="<?php echo $internship->agency_web_address; ?>"><?php echo $internship->agency_web_address;?></a><br />
            <b>Interns Placed: </b><?php echo $internship->interns_placed; ?><br />
            <b>Intern Role(s): </b><?php echo $intern_role_terms ?><br /><p />                
            <b>Agency Type: </b><?php echo $agency_list_terms;  ?><br />         
    		<b>Contact:</b> <?php echo $internship->agency_contact; ?><br />
    		<b><?php echo $internship->agency_last_updated; ?></b>
        </div>
	</div>