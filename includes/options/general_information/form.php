<div class="wrap">
	<h1>General Information</h1>

	<p class="description">
		Here you can keep general information updated.  
	</p>
	
	<?php settings_errors(); ?>
	
	<div class="widget-liquid-left">
		<div class="card">
			
			<form method="post" action="options.php">
			    <?php
			        settings_fields("social-links");
			        
			        // Define a group name for the subsections
			        do_settings_sections("general-info-social");      
			        submit_button(); 
			    ?>          
			</form>
		</div>
	</div>

	<div class="widget-liquid-right">
		<div class="card">
			<form method="post" action="options.php">
			    <?php
			        
			        settings_fields("location-links");
			        // Define a group name for the subsections
			        do_settings_sections("general-info-location");      
			        submit_button(); 
			    ?>          
			</form>
		</div>
	</div>
	
</div>

