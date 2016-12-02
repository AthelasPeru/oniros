<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="theme-color" content="#000000" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?php 
  // Hack to solve title not apearing on index templates
  // http://stackoverflow.com/questions/9055009/wordpress-wp-title-blank-on-index-page
   bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title('');?>
  </title>


  <?php 
  // FavIcons for different devices 
  get_template_part( "includes/templates/icons" ); ?> 
  
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
  <?php wp_head(); ?>
  <?php if(!WP_DEBUG):  
  // Activate Google analytics only if in production
  ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-XXXXXXX-X', 'auto');
      ga('send', 'pageview');

    </script>
  <?php endif; ?>

</head>

<body <?php body_class(); ?> >