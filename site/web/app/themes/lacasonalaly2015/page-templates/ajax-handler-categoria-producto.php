<?php
/*
Template Name: Ajax Handler Categoria Producto
*/
?>
<?php
$post_categoria = $_GET['categoria'];

if ($post_categoria) : ?>

	<div class="owl-carousel" id="owl-productos"><?php 
		$query = new WP_Query( 
			array( 'post_type'  => 'productos', 
				'posts_per_page'=> '-1','order' => 'ASC',
				'meta_query'    => array(
					array(
						'key'       => 'laly_tipo_producto',
						'value'     => $post_categoria,
					),
				),
		)); 

			while ($query->have_posts()) : $query->the_post(); ?>
				<a href="javascript:void(0)">
					<div class="img_producto">
						<?php 
						if (has_post_thumbnail()){
							the_post_thumbnail();
						} else { ?>
							<img src='http://localhost/lacasonadelaly/wp-content/themes/lacasonalaly2015/images/logo.png' 
								class='img-responsive'><?php 
						} ?>
					</div>
					<div class="titulo"><?php the_title() ?></div>
				</a> <?php  
			endwhile; ?>
	</div>

<?php 
endif; ?>

<!-- OWL Carousel -->
<script defer src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){			
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
			
			// CSS Styles
			baseClass : "owl-carousel",
			theme : "owl-theme"		  
		  });
			
    });
</script> 