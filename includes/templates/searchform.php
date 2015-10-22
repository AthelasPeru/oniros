
<?php 

// this is the searchform, you can restyle it anyway you want, but keep in mind that
// the search input NEEDS to be called "s" and the form action and method need to stay that way.

 ?>


<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class=""  method="get">
    <label for="search-field" class="">Search</label>
    <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" class="" placeholder="busco...">
    <button type="submit" class=""><span class="">Search</span></button>
</form>