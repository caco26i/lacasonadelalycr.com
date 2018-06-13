<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>	
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="">
	<meta name="Subject" content="La Casona de Laly" />
    <meta name="robots" content="index,follow" />
    <meta name="rating" content="GENERAL" />
    <meta name="distribution" content="GLOBAL" />
    <meta name="copyright" content="La Casona de Laly" />
    <meta name="originatorjurisdiction" content="Costa Rica" />
    <meta name="country" content="Costa Rica" />
    <meta name="expires" content="never" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="<?php bloginfo('template_directory'); ?>/images/ico-lacasona.ico" rel="shortcut icon" title="La Casona de Laly" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- CAMERA -->
    <link href="<?php bloginfo('template_directory'); ?>/css/camera.css" rel="stylesheet">
    <!-- Fonts Iconos -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css" type="text/css">
    <!-- LIGHTBOX -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/lightbox.css">
	<!-- OWL CAROUSEL -->
    <link type="text/css" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet">
    <link type="text/css" href="<?php bloginfo('template_directory'); ?>/css/owl.theme.css" rel="stylesheet">
    <!-- RESPONSIVE -->
    <link href="<?php bloginfo('template_directory'); ?>/css/normalize.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header" role="banner">
    	<img src="<?php bloginfo('template_directory'); ?>/images/bg_header.png" class="bg-header img-responsive"/>
    	<div class="logo">
        	<div class="cuadro"></div>
        	<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" class="img-responsive"/>
        </div>  
		<div class="container-fluid">                      
			<!-- MENU PRINCIPAL -->
			<div class="navbar navbar-default" role="navigation" id="sticky-wrapper">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>                        
					</div>
					<div class="navbar-collapse collapse">                            
						<ul id="menu_principal" class="menu nav nav-tabs navbar-nav" role="tablist">
							<li class="link_inicio">
								<a href="#inicio">Inicio</a>
							</li>                                
							<li class="link_nosotros">
								<a href="#nosotros">Nosotros</a>
							</li> 
							<li class="link_menu">
								<a href="#menu-restaurante">Menú</a>
							</li>
							<li class="link_restaurantes">
								<a href="#restaurantes">Restaurantes</a>
							</li>
							<li class="link_galeria">
								<a href="#galeria">Galería</a>
							</li>                       							                         
							<li class="link_contacto">
								<a href="#contacto">Contacto</a>
							</li>                                      
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</div><!-- navbar -->
        </div><!-- container -->
	</header><!-- #masthead -->

	<div id="main" class="site-main">
