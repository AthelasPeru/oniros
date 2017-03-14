
<div class="wrap">
	<h1>Debug Log Tool</h1>

	<p class="description">
		Here you can access your Debug Log.
		the file is located in your <code>
			wp-content/debug.log
		</code> file.
	</p>
	<p class="description">
		You can log stuff in here by using the <strong>write_log</strong> function
	</p>
	<p>
			<code>
				$query = new WP_Query(array(
					"post_type" => "products"
				));
				write_log($query);
			</code>
		
		
	</p>	
		
	
	
	<hr>
	<form method="POST" action="<?php echo admin_url( 'admin-post.php' ); ?>">
		<input type="hidden" name="action" value="clear_log" />
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
			
			<div  name="debug-log" id="debug-log" style="overflow: auto; max-height: 500px; max-width: 100%;">
				<pre>
					<code>
						<?php print_r($log_content); ?>
					</code>
				</pre>
	    		
	    	</div>
			           
		
		</div>

		<form method="POST" action="<?php echo admin_url( 'admin-post.php' ); ?>">
			<input type="hidden" name="action" value="clear_log" />
			<input class="button button-primary" type="submit" name="delete-log" value="Delete Log">

		</form>
	

	
	
</div>

