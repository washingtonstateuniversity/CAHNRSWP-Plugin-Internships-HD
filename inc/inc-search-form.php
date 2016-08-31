<form role="search" method="get" id="search-form" class="search-form" action="" >
	<label>Locations </label>
    <p>
    	<select name="location">
        <?php echo $location_options;?>
        </select>
    </p>
    <label>Agency Type </label>
    <p>
    	<select name="agencytype">
        <?php echo $agency_options;?>
        </select>
    </p>
    <p>
    	<input type="text" placeholder="Search Internships..." value="" name="q" id="q" />
        <input type="submit" value="Search" />
    </p>
</form>