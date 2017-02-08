
<div class="wrap">
	<h1>Debug Log Tool</h1>

	<p class="description">
		Here you can access your Debug Log
		
	</p>
	
	<hr>
	<form action="delete-log.php">
			
			<input class="button button-primary" type="submit" name="delete-log" value="Delete Log">

	</form>
	<?php settings_errors(); ?>
	
		<?php 
			$log_file = get_home_path() . "wp-content/debug.log";
			if(file_exists($log_file)){
				$log_content = file_get_contents($log_file);
			} else {
				$log_content = "There isn't a log yet.";
			}

			

		 ?>
		<div class="card" style="max-width:100%;">
			
			<div  name="debug-log" id="debug-log">
				<pre>
					<code>
						<?php print_r($log_content); ?>
					</code>
				</pre>
	    		
	    	</div>
			           
		
		</div>

		<form action="delete-log.php">
			
			<input class="button button-primary" type="submit" name="delete-log" value="Delete Log">

		</form>
	

	
	
</div>

