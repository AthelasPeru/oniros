<?php 
/**
 * This is the searchform, you can restyle it anyway you want, 
 * but keep in mind that the search input NEEDS to be called "s" 
 * and the form action and method need to stay that way.
 * 
 * If you want to remove templates, 
 * just delete the templates folder and 
 * replace the function get_template_part with the contents 
 * of the this file.
 */
 ?>


<form role="search" method="get" id="searchForm" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"   >
    <label for="search-field" class=""><?php _e('Search for:','athelas_theme'); ?></label>
    <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" class="" placeholder="busco...">
    <button type="submit" id="searchSubmit" class="search-submit" ><span class=""><?php _e('Search for:','athelas_theme'); ?></span></button>
</form>