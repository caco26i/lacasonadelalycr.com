<?php
/*
Template Name: Ajax Handler Servicios
*/
?>

<?php
	$post = get_post($_GET['id_post']);
	//echo $post;
	//$titulo_post = get_post($_GET['titulo_post']);
?>

<?php //$tipo_post = get_post_type( $post ); ?>


<?php 
//if ($tipo_post == "post"):

	if ($post) : ?>
	<?php setup_postdata($post); ?>    	
    		<div class="row">
            	<a href="javascript:void(0)" class="btn_cerrar">
                <i class="fa fa-angle-double-left"></i>
                <font><?php _e("<!--:en-->Go back<!--:--><!--:es-->Regresar<!--:-->");?></font></a>
            </div>
            <div class="row">
                
                <?php 
                //Banner
                $featured_id = get_post_thumbnail_id($post->ID);
                $featured_size = 'full'; //'thumbnail', 'medium', 'large', 'full'
                $featured_image = wp_get_attachment_image_src( $featured_id, $featured_size);
                $featured_image = $featured_image[0];
                $thumb_size = 'full'; //'thumbnail', 'medium', 'large', 'full'
                $thumb_image = wp_get_attachment_image_src( $featured_id, $thumb_size);
                $thumb_image = $thumb_image[0]; 
				             
                if($featured_image){ ?>                    
                     
                    <div class="col-xs-12 col-md-6 side-image" style="background: url(<?php echo $thumb_image; ?>) scroll top no-repeat;">
                    <a href="<?php echo $featured_image; ?>" data-lightbox="example" data-caption="<?php the_title(); ?>">
                    <i class="fa fa-search-plus"></i> 
                    <!--img src="<?php //echo $thumb_image; ?>" class="img-responsive" /-->
                    </a>                     
                    </div>                    
                                                        
                <?php } ?>
                <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
				<h1><?php the_title(); ?></h1>
				 <?php if (qtrans_getLanguage() == 'es') { // Español ?>
				  <?php the_content(); ?>     
                 <?php } ?> 
                 
                 <?php if (qtrans_getLanguage() == 'en') { // Ingles ?>
				  <?php the_content(); ?>     
                 <?php } ?>                                                   
				
                </div>
          	</div>   
        
<?php 
	//endif;
endif; ?>

<!-- Usar Galeria tipo lightbox --->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/lightbox.css" />
<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/lightbox.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){			
				
		//---------- Evento boton "Cerrar"
		jQuery('.detalle_servicio .btn_cerrar').bind('click',function(event){		
			
			var contInfo = jQuery(".detalle_servicio");
	
			var tlInfo = new TimelineLite();
			tlInfo.to(contInfo, 0.5, {display:"none", marginLeft:"100%"});		
			
			contInfo.empty();
			tlInfo.play();
			
			jQuery(".lista_servicios li a").each(function () {
				 $(this).removeClass('activo');
			})				
			event.preventDefault();
		});
			
    });
</script> 