<?php

class ExampleWidget extends WP_Widget {
     
    function __construct() {
    	parent::__construct(
	    	// base ID of the widget
	        'widget_id_name',
	         
	        // name of the widget and slug
	        __('Example Widget', 'example_widget' ),
	         
	        // widget options
	        array (
	            'description' => __( "Let's explaign what the widget is for", 'example_widget' )
	        )
        );
    }

    // FUNCTIONALITY
     // We create a form to show inside the widget, in this case just some company data items
    // we set a default phone just to show it can be done, then evaluate if we should ise it.
    function form( $instance ) {
    	$defaults = array(
    		"phone" => "+5112249560",
    		"email" => "",
    		"address" => ""
    	);
    	$phone = empty($instance["phone"]) ? $defaults["phone"]: $instance["phone"];
    	$email = $instance["email"];
    	$address = $instance["address"]; 
    	
    	?>


        <?php // Markup for the form fields ?>

    	<p>
    		<label for="<?php echo $this->get_field_id( 'phone' ); ?>">Teléfono:</label>
        	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $instance["phone"]; ?>" > 
    	</p>
    	<p>
    		<label for="<?php echo $this->get_field_id( 'email' ); ?>">Email:</label>
        	<input class="widefat" type="email" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance["email"]; ?>" > 
    	</p>
    	<p>
    		<label for="<?php echo $this->get_field_id( 'address' ); ?>">Dirección:</label>
        	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $instance["address"]; ?>" > 
    	</p>
    	

    	<?php
    }
     
     // What to do on widget update
    function update( $new_instance, $old_instance ) {     
    	$instance = $old_instance;
	    $instance[ 'phone' ] = strip_tags( $new_instance[ 'phone' ] );
	    $instance[ 'email' ] = strip_tags( $new_instance[ 'email' ] );
	    $instance[ 'address' ] = strip_tags( $new_instance[ 'address' ] );
	    
	    return $instance;  
    }
     // Generate the visible widget funcionality (What it will show on the website)
    function widget( $args, $instance ) {
         // kick things off
             extract( $args );
             echo $before_widget;        
             echo $before_title . $after_title;   

             ?>
             <?php //Example html markup to show on the website ?>
             <ul class="infopage-list">
                 <li>
                     <div>
                         <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ico_phone.svg" alt="">
                     </div>
                     <div>
                         Llámanos<br><a href="tel:<?php echo $instance["phone"]; ?>"><?php echo $instance["phone"]; ?></a>
                     </div>
                 </li>
                 <li>
                     <div>
                         <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ico_mail.svg" alt="">
                     </div>
                     <div>
                         Escríbenos<br><a href="mailto:<?php echo $instance["email"]; ?>"><?php echo $instance["email"]; ?></a>
                     </div>
                 </li>
                 <li>
                     <div>
                         <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ico_direccion.svg" alt="">
                     </div>
                     <div>
                         Encuéntranos<br><a target="_blank" href="<?php echo $instance["gmaps_link"]; ?>"><?php echo $instance["address"]; ?></a>
                     </div>
                 </li>
             </ul>
	      <?php

    }
     
}