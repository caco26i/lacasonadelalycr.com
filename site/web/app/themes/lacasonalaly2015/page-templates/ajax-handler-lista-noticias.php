<?php
/*
Template Name: Ajax Handler Lista Noticias
*/
?>

<?php
	//$post = get_post($_GET['id_post']);
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
            <div class="row section-header">
                <h1><?php _e("<!--:en-->News<!--:--><!--:es-->Noticias<!--:-->");?></h1>
            </div>
            <ul class="noticias_transl row">
				<?php
                query_posts('category_name=noticias&posts_per_page=-1&order=DESC');					
                while (have_posts()) : the_post();
                
                $id_post = get_the_ID();
                  ?> 
                <li class="noticia col-md-4">                                			  			
                    <a href="javascript:void(0)" id="<?php echo $id_post;?>">                            
                        <?php 
                        //Banner
                        $featured_id = get_post_thumbnail_id($post->ID);
                        $featured_size = 'full'; //'thumbnail', 'medium', 'large', 'full'
                        $featured_image = wp_get_attachment_image_src( $featured_id, $featured_size);                            
                                                                    
                        if($featured_image){ ?>	
                            <div class="img_noticia">
                                <img class="img-responsive" src="<?php echo $featured_image[0]; ?>" alt="">
                            </div>
                        <?php } ?> 
                         <div class="texto"> 
                            <h2><?php the_title(); ?></h2> 
                            <time><?php the_time('F j, Y'); ?></time>
                            <div class="extracto">
                                <?php print_excerpt(300); ?>
                            </div>
                            <h3><?php _e("<!--:en-->read more<!--:--><!--:es-->ver más<!--:-->");?>
                            <i class="fa fa-angle-double-right"></i></h3>                            
                         </div>
                    </a>
                </li>
                <!-- end 'noticia' -->
            <?php						
                endwhile;                  
            // Reset Query
            wp_reset_query();?>                    
            
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
		jQuery('.resumen_noticias .btn_cerrar').bind('click',function(event){		
			
			var contInfo = jQuery("#lista_noticias");
	
			var tlInfo = new TimelineLite();
			tlInfo.to(contInfo, 0.5, {display:"none", top:"-100%"});		
			
			contInfo.empty();
			tlInfo.play();
							
			event.preventDefault();
		});
		
		/* Evento NOTICIAS
		--------------------------------------------------------------------------*/
		jQuery('.noticias_transl li a').bind('click',function(event){
			var $anchor = $(this),
				idEnlace = $anchor.attr('href'),
				idPost = $anchor.attr('id'),
				contInfo = jQuery("#detalle_noticia");
			
			//----- Funcion Carga Contenido 
			function mostrarInfo(idInfo) {
				var id_post = idInfo;
				
				//alert(id_post);
				
				jQuery('<div class="detalle_noticia"></div>')
					.hide().appendTo('#detalle_noticia')
					.load('http://localhost/translogic/ajax-handler-noticias/?id_post='+id_post,mostrarContenido)
					//.load('http://dynamicwaiter.com/ajax-handler-caracteristicas/?id_post='+id_post,mostrarContenido)
					.css("display", "block");			
				
				return false;
			}
			
			//------- Muestra el Contenido
			function mostrarContenido() {
				var contInfo = jQuery("#detalle_noticia"),
					markerPos = jQuery("#noticias");
									
				var tlInfo = new TimelineLite();
				tlInfo.to(contInfo, 0.5, {display:"block", top:"0%"});		
				tlInfo.play();	
				
				jQuery('html, body').stop().animate({
					scrollTop: markerPos.offset().top -80
				}, 1500,'Power2.easeOut');		
			}							
								
			jQuery(".lista_noticias li a").each(function () {
				 $(this).removeClass('activo');
			})
			
			jQuery(this).addClass('activo');
			
			contInfo.empty();			
			mostrarInfo(idPost);
			event.preventDefault();
		});			
    });
</script> 