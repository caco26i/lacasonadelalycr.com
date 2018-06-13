<?php
/*
Template Name: Ajax Handler Portafolio
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
    	<div class="container white-popup-block">    	
    		<div class="row">
            	<a href="javascript:void(0)" class="btn_cerrar">
                <i class="fa fa-angle-double-left"></i>
                <font><?php _e("<!--:en-->Go back<!--:--><!--:es-->Regresar<!--:-->");?></font></a>
            </div>
            <ul class="lista_fotos row">                
                <?php  if (has_post_thumbnail()) : ?>                                    
					 <?php $images = get_post_meta(get_the_ID(), 'transl_img_portafolio', false);
                        foreach ($images as $att) {
                            $thumb_imgop++;
                            // get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
                            $src = wp_get_attachment_image_src($att, 'full');
                            $src = $src[0];	
                            $src_thumb = wp_get_attachment_image_src($att, 'medium');
                            $src_thumb = $src_thumb[0];																					 
                            ?>                                                                                                         
                             <li class="col-md-4">
                                <a href="<?php echo $src; ?>" data-lightbox="example" data-caption="<?php the_title(); ?>">
                                <i class="fa fa-search-plus"></i>
                                <img src="<?php echo $src_thumb; ?>" />                                
                                </a>
                             </li>                                            
                         <?php  } ?>
                    <?php endif; //has_post_thumbnail ?>
          	</ul>   
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
		jQuery('.detalle_portafolio .btn_cerrar').bind('click',function(event){		
			
			var contInfo = jQuery("#detalle_portafolio");
	
			var tlInfo = new TimelineLite();
			tlInfo.to(contInfo, 0.5, {display:"none", top:"-100%"});		
			
			contInfo.empty();
			tlInfo.play();
			
			jQuery(".lista_portafolio li a").each(function () {
				 $(this).removeClass('activo');
			})				
			event.preventDefault();
		});
			
    });
</script> 