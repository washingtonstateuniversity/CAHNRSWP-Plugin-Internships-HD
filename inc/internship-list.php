<?php 

?>


<style>
/*
.internTable {
	display: table;
	width: 100%;
	}
.internTableRow {
	display: table-row;
	}	
.internTableHeading {
	display: table-header-group;
	background-color: #ddd;
	
	}	
.internTableBody {
	display: table-row-group;
	}
	
.internTableCell, .internTableHead {
	display: table-cell;
	padding: 3px 10px;
	border: 1px solid #999999;
	}	
.internTableHead {
	background-color: #4f868e;
	font-weight:700;
	color: #fff;
	}	
.internTableFoot {
	display: table-footer-group;
	}	
*/
</style>

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

foreach( $internships as $internship ):

	$agency_type_string = '';
	$intern_role_string = '';
	$location_string = '';
	//var_dump($internship);
?>
<div class="internTableRow">
	<div class="internTableCell">
    	<a href="<?php echo $internship->agency_permalink; ?>"><?php echo $internship->agency_title; ?></a>
    </div>    
    <div class="internTableCell">
    	<?php //echo $internship->agency_city;?>
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
 
    </div>    
    <div class="internTableCell">
    	<?php echo $internship->agency_phone; ?>
    </div>    
    <div class="internTableCell">
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
    
   	<?php // echo $internship->agency_type; ?>
    </div>    
       <div class="internTableCell">
    	<?php echo $internship->agency_contact; ?>
    </div>    
        <div class="internTableCell">
    	<?php echo $internship->agency_last_updated; ?>
    </div>    
</div> 

<?php endforeach;?>

<?php  ?>
</div>	