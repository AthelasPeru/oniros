<!doctype html>
<html class="no-js" lang="es_PE"> <!-- Set website language -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title><?php 
    bloginfo('name');
    wp_title(' | ', true, 'left');
   ?></title>

   <!-- styles -->
   <!-- We use modernizer fom a CDN in case it fails from local, has happened sometimes before -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    

    <!-- CDN styles in case we need them -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <?php wp_head(); ?>

</head>

<body class="<?php if(isset($page)){ echo $page; }; ?>">