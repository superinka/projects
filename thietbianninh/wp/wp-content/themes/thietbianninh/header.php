<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="">
<meta name="author" content="">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/images/ico/apple-touch-icon-57-precomposed.png">
<?php wp_head(); ?>


</head>
<body <?php body_class(); ?> id="home" class="homepage">
<div class="container-fluid">
<div id="wrapper" class="hfeed">
	<header id="header" class="header">
		<?php get_template_part( 'templates/header/header-top' );?>
        <?php get_template_part( 'templates/header/header-bot' );?>
        <?php get_template_part( 'templates/header/men-slider' );?>
	</header>
    <!--/header-->
	
	<!-- main -->
    <div id="main" class="clearfix">
    