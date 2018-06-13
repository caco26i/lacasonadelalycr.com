<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<div class="container-fluid">
                	<!-- COMPANY ADDRESS-->
                    <div class="col-md-9">
                    	<h1><?php $year = date('Y'); echo $year; ?> &copy; La Casona de Laly</h1>
                    </div>
                    <!-- SOCIAL ICON AND COPYRIGHT -->
                    <div class="col-md-3 col-xs-12 designer">
                    	<a href="http://itdesigners-now.com" target="_blank">
                        <h2>Diseñado por</h2>
                        <h3><i class="iconv-logoitdesignersblanco"></i></h3>
                        </a>
                    </div>
                </div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
    
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.2.min.js"></script>

    <script type="text/jscript" src="<?php bloginfo('template_directory'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.nav.js"></script>
   	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo-1.4.3.1.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollorama.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrolldeck.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/plugins/ScrollToPlugin.min.js"></script>
    <script type="text/jscript" src="<?php bloginfo('template_directory'); ?>/js/greensock/jquery.gsap.min.js"></script>
    <script type="text/jscript" src="<?php bloginfo('template_directory'); ?>/js/greensock/TweenMax.min.js"></script>
    <script type="text/jscript" src="<?php bloginfo('template_directory'); ?>/js/greensock/TweenLite.min.js"></script>
    <script type="text/jscript" src="<?php bloginfo('template_directory'); ?>/js/animaciones_web.js"></script>
    <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/camera.js'></script>
    <script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/lightbox.min.js"></script>
	<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/jquery.nicescroll.min.js"></script>
    <!-- OWL Carousel -->
    <script defer src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>

    <!-- UNIFORM IMAGES RESIZE --> 
   	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script>   
   	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.maximage.js"></script>
    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>	  
    
    <!-- SVG CON RAPHAEL -->
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/paths.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/raphael.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.backstretch.js"></script>
    
    <script type="text/javascript" charset="utf-8">
		
		jQuery(document).ready(function($){
			jQuery('body').scrollspy({ target: '.menu' });
			
			jQuery('#menu_principal').onePageNav();	

			jQuery('#overview-tab-1').addClass('active');
			
			jQuery('#camera_wrap_4').camera({
                height: 'auto',
                loader: '',
				playPause: false,
                pagination: true,
                thumbnails: false,
                hover: false,
                opacityOnGrid: false,
                imagePath: '../images/',
				time: 7000,
				navigation: false,	//true or false, to display or not the navigation buttons		
				navigationHover	: false,	//if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always
                fx: 'simpleFade'
    		});
			
			widthWin = jQuery(window).width();
			heightWin = jQuery(window).height();
			
			jQuery('#inicio').css({
               height: heightWin
          	});	
			
			jQuery('.slider-restaurantes').css({
            	height: heightWin - 165,
				marginTop: 65,
          	});	
						
			jQuery('.cameraContent').css({
               height: heightWin
          	});
			
			// niceScroll
			jQuery("html").niceScroll({
				scrollspeed: 50,
				mousescrollstep: 38,
				cursorwidth: 7,
				cursorborder: 0,
				cursorcolor: '#EB0028',
				autohidemode: false,
				zindex: 99999,
				horizrailenabled: false,
				cursorborderradius: 0
			});
			
			jQuery("#owl-nosotros").owlCarousel({
				//Basic Speeds
				
				slideSpeed : 2000,
				paginationSpeed : 4500,
				rewindSpeed : 4000,
				singleItem:true,
			 
				//Autoplay
				autoPlay : false,
				stopOnHover : true,
			 
				// Navigation
				navigation : false,
				//navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				rewindNav : true,
				scrollPerPage : false,
				
				//Pagination
				pagination : true,
				paginationNumbers: false,
				
				// CSS Styles
				baseClass : "owl-carousel",
				theme : "owl-theme"		  
			 });
			 
			 jQuery("#owl-productos").owlCarousel({
				//Basic Speeds
				items :4, 
				itemsDesktop : [1024,4],
				itemsDesktopSmall : [800,4],
				itemsTablet: [600,3],
				itemsMobile : [400,2], 
				slideSpeed : 1000,
				paginationSpeed : 2500,
				rewindSpeed : 2000,
				singleItem:false,
			 
				//Autoplay
				autoPlay : false,
				stopOnHover : true,
			 
				// Navigation
				navigation : true,
				navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				rewindNav : true,
				scrollPerPage : false,
				
				//Pagination
				pagination : false,
				paginationNumbers: false,
				
				lazyLoad : true,
			    autoHeight : true,

				
				// CSS Styles
				baseClass : "owl-carousel",
				theme : "owl-theme"		  
			 });			 
					 
			 jQuery("#owl-fotos1, #owl-fotos2, #owl-fotos3").owlCarousel({
				//Basic Speeds
				items :4, 
				itemsDesktop : [1024,4],
				itemsDesktopSmall : [800,4],
				itemsTablet: [600,3],
				itemsMobile : [400,2], 
				slideSpeed : 1000,
				paginationSpeed : 2500,
				rewindSpeed : 2000,
				singleItem:false,
			 
				//Autoplay
				autoPlay : false,
				stopOnHover : true,
			 
				// Navigation
				navigation : true,
				navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				rewindNav : true,
				scrollPerPage : false,
				
				//Pagination
				pagination : false,
				paginationNumbers: false,
				
				lazyLoad : true,
			    autoHeight : true,

				
				// CSS Styles
				baseClass : "owl-carousel",
				theme : "owl-theme"		  
			 });
			 
			 jQuery("#owl-fotos4, #owl-fotos5").owlCarousel({
				//Basic Speeds
				items :4, 
				itemsDesktop : [1024,4],
				itemsDesktopSmall : [800,4],
				itemsTablet: [600,3],
				itemsMobile : [400,2], 
				slideSpeed : 1000,
				paginationSpeed : 2500,
				rewindSpeed : 2000,
				singleItem:false,
			 
				//Autoplay
				autoPlay : false,
				stopOnHover : true,
			 
				// Navigation
				navigation : true,
				navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				rewindNav : true,
				scrollPerPage : false,
				
				//Pagination
				pagination : false,
				paginationNumbers: false,
				
				lazyLoad : true,
			    autoHeight : true,

				
				// CSS Styles
				baseClass : "owl-carousel",
				theme : "owl-theme"		  
			 });
			
			$("menu_principal a").click(function(){
				$("#sticky-wrapper button.navbar-toggle").click()
			})
			
		});
	</script>

	</body>
</html>