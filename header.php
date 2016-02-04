<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<meta charset="utf-8">

<?php // mobile meta (hooray!) ?>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title><?php 
   wp_title(' | ', true, 'left');
   ?></title>

   <!-- styles -->
    <?php 
      // We generate favicons with RFG https://realfavicongenerator.net/
     ?>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon.png" />
    <!--[if IE]>
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    

    <!-- CDN styles in case we need them -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    
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