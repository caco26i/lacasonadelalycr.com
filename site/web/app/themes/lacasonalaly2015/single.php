<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

//get_header(); ?>
<?php
 
    //$post = get_post($_POST['id']);
	$id = $_GET['id'];
	$categoria = get_the_category( $post ) ;
	$cat_nomb = $categoria[0]-> cat_name;
 	$tipo_post = get_post_type( $post );
	
	//echo $id;
?>

<?php //if($id == 'web'): ?>

<?php 
	if ($post) : ?>
	<?php setup_postdata($post); ?>
    	
    	<?php if(($cat_nomb == "Noticias") ||($cat_nomb == "News") ): ?>
            <div class="detalle_noticia">
                <div class="container white-popup-block">    	
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
                             
                            <div class="col-sm-12 ">
                            <a href="<?php echo $featured_image; ?>" data-lightbox="noticia" data-caption="<?php the_title(); ?>">
                            <i class="fa fa-search-plus"></i> 
                            <img src="<?php echo $thumb_image; ?>" class="img-responsive" />
                            </a>                     
                            </div>                    
                                                                
                        <?php } ?>
                        <div class="col-sm-12 side-image-text">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        </div>
                    </div>   
                </div>
            </div>
        <? endif; ?>
        
        <?php if(($cat_nomb == "Servicios") ||($cat_nomb == "Services") ): ?>
        	<div class="container-fluid">            
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
                         
                        <!--div class="col-xs-12 col-md-6 side-image" style="background: url(<?php //echo $thumb_image; ?>) scroll top no-repeat;"-->
                        <div class="col-xs-12 col-md-6 side-image">
                        <a href="<?php echo $featured_image; ?>" data-lightbox="servicios" data-caption="<?php the_title(); ?>">
                        <i class="fa fa-search-plus"></i> 
                        <img src="<?php echo $thumb_image; ?>" class="img-responsive" />
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
             </div>  
        <? endif; ?>
        
        <?php  
		if ($tipo_post == "portafolio"): ?>
        	<div class="detalle_portafolio">
                <div class="container white-popup-block">    	
                <div class="row">
                    <div class="col-md-8">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:void(0)" class="btn_cerrar">
                        <i class="fa fa-angle-double-left"></i>
                        <font><?php _e("<!--:en-->Go back<!--:--><!--:es-->Regresar<!--:-->");?></font></a>
                    </div>
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
                                    <a href="<?php echo $src; ?>" data-lightbox="portafolio" data-caption="<?php the_title(); ?>">
                                    <i class="fa fa-search-plus"></i>
                                    <img src="<?php echo $src_thumb; ?>" />                                
                                    </a>
                                 </li>                                            
                             <?php  } ?>
                        <?php endif; //has_post_thumbnail ?>
                </ul>   
            </div>
		</div>
        <? endif; ?>
<?php 
	endif;
//endif; ?>



<?php 
// Boletin
if($id == 'web'): ?>
<?php get_header(); ?>
<?php 
	if ($post) : ?>
	<?php setup_postdata($post); ?>
    	
    	<?php if(($cat_nomb == "Noticias") ||($cat_nomb == "News") ): ?>
             <div id="single-post post-<?php the_ID(); ?>">
                <div class="container white-popup-block">    	
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
                             
                            <div class="col-sm-12 ">
                            <a href="<?php echo $featured_image; ?>" data-lightbox="noticia" data-caption="<?php the_title(); ?>">
                            <i class="fa fa-search-plus"></i> 
                            <img src="<?php echo $thumb_image; ?>" class="img-responsive" />
                            </a>                     
                            </div>                    
                                                                
                        <?php } ?>
                        <div class="col-sm-12 side-image-text">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        </div>
                    </div>   
                </div>
            </div>
        <? endif; ?>
     <? endif; ?>
<?php
get_footer(); ?>
<?php endif; ?>

<!-- Usar Galeria tipo lightbox --->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/lightbox.css" />
<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/lightbox.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){			
				
		//---------- Evento boton "Cerrar"
		jQuery('.detalle_noticia .btn_cerrar').bind('click',function(event){		
			
			var contInfo = jQuery("#detalle_noticia");
	
			var tlInfo = new TimelineLite();
			tlInfo.to(contInfo, 0.5, {display:"none", top:"-100%"});		
			
			contInfo.empty();
			tlInfo.play();
			
			jQuery(".lista_noticias li a").each(function () {
				 $(this).removeClass('activo');
			})				
			event.preventDefault();
		});
		
		/*jQuery("#detalle_portafolio").mCustomScrollbar({
			theme:"light",
			scrollButtons:{
			  enable:true
			}
		});	*/
		
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

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"xU3tg1awO700ql", domain:"translogic.co.cr",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=xU3tg1awO700ql" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->
