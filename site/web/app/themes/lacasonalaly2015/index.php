<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 

?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div id="detalle_noticia" style="overflow-y: auto; overflow-x: hidden;"></div>
            <div id="lista_noticias" style="overflow-y: auto; overflow-x: hidden;"></div>  
            <div id="detalle_portafolio" style="overflow-y: auto; overflow-x: hidden;"></div>               
            <!-- =============================
            // INICIO
            ================================== -->
            <section class="inicio slide" id="inicio">
            	<div class="slider-restaurantes">
            	<?php query_posts('category_name=banners&posts_per_page=-1&order=ASC');?> 
					<?php
                    $num = 1;	                        
					while (have_posts()) : the_post();
						//Banner
						$featured_id = get_post_thumbnail_id($post->ID);
						$featured_size = 'large'; //'thumbnail', 'medium', 'large', 'full'
						$featured_image = wp_get_attachment_image_src( $featured_id, $featured_size); 
						$featured_image =  $featured_image[0] ;                          

						if($featured_image){ ?>	
							<a href="#tab_rest_<?php echo $num ?>">
								<div class="imagen_<?php echo $num ?>">
									 <h2 class="vertical-5g"><?php the_title(); ?></h2>											   
									 <img src="<?php echo $featured_image; ?>" class="vertical-5g"/>
								</div>
							</a>
						<?php } 
					$num++;
					endwhile;
					wp_reset_query();?>
            	</div> 
                <h3 class="titulo">Lo mejor de la comida típica costarricense al alcance de todos </h3>    
            </section>
			
            <!-- =============================
            // NOSOTROS
            ================================== -->
            <section class="nosotros" id="nosotros">            	
                <div class="container">
                	<div class="row section-header">
                    	<h1><i class="decor-left"></i> <span>Nosotros</span> <i class="decor-right"></i></h1>
                        <h3>Más de 12 años brindando un servicio de calidad</h3>
                    </div>                	
                    <div class="owl-carousel" id="owl-nosotros">               
					<?php
						query_posts('category_name=nosotros&posts_per_page=4&order=ASC');					
						while (have_posts()) : the_post(); ?>
                         
                        <div class="col-lg-12 col-sm-12">                                			  			
                            
                           		<h2><?php the_title(); ?></h2>                            
                            	 <?php the_content(); ?>
                         
                        </div>
                        <!-- end 'servicios' -->
                    <?php						
                        endwhile;                  
                    // Reset Query
                    wp_reset_query();?> 
                    </div>
                </div>
            </section>
            
                      
            <!-- =============================
            // MENU
            ================================== -->
            <section class="menu-restaurante" id="menu-restaurante">
            <!--div class="bg-menu"></div-->
                <div class="container">
                	<div class="row section-header">
                    	<h1><i class="decor-left"></i> <span>Menú</span> <i class="decor-right"></i></h1>
                    </div>
					
                	<div class="row">
						<ul class="nav_post lista-menu">
							<a href="javascript:void(0)" id="platos-fuertes" class="actual col-xs-6 col-sm-3 col-md-3">
								<li class="platos active"><i class="icon-platos"><span>Platos</span></i>
								</li>
							</a>

							<a href="javascript:void(0)" id="bocas" class="col-xs-6 col-sm-3 col-md-3">
								<li class="platos active"><i class="icon-bocas"><span>Bocas</span></i>
								</li>
							</a>

							<a href="javascript:void(0)" id="acompanamientos" class="col-xs-6 col-sm-3 col-md-3">
								<li class="acompanamientos"><i class="icon-acompanamiento"><span>EXTRAS</span></i>
								</li>
							</a>

							<a href="javascript:void(0)" id="bebidas" class="col-xs-6 col-sm-3 col-md-3">
								<li class="bebidas"><i class="icon-bebidas"><span>Bebidas</span></i>
								</li>
							</a>
						</ul>  
                    </div>
					
                    <div class="row productos">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="loader"></div>
							<div class="owl-carousel" id="owl-productos">   
								<?php 
								$query = new WP_Query( 
									array( 'post_type'  => 'productos', 
										'posts_per_page'=> '-1','order' => 'ASC',
										'meta_query'    => array(
											array(
												'key'       => 'laly_tipo_producto',
												'value'     => 'platos-fuertes',
											),
										),
								)); 

								while ($query->have_posts()) : $query->the_post(); 
									$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "large");
									$src = $src[0];
								?>
									<a href="<?php echo $src; ?>" data-lightbox="fotos-producto" data-caption="<?php the_title(); ?>">
										<div class="img_producto"><?php 
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
						</div>
					</div>
                </div>
               
            </section>
            
            <!-- =============================
            // RESTAURANTES
            ================================== -->
            <section class="restaurantes" id="restaurantes">            	
                <div class="container">
                	<div class="row section-header">
                    	<h1><i class="decor-left"></i> <span>Restaurantes</span> <i class="decor-right"></i></h1>
                    </div>
                	<div class="r1 row">
                        <div class="c1 col-md-12">
                          <!-- Nav Tabs -->
                          <ul class="nav nav-justified nav-tabs">
                            <li  class="active">
                              <a id="tab_rest_1" class="btn-lg" data-toggle="tab" href="#overview-tab-1">
							  Escazú</a>
                            </li>
                            <li>
                              <a id="tab_rest_2" class="btn-lg" data-toggle="tab" href="#overview-tab-2">
                              Santa Ana</a>
                            </li>
                            <li>
                              <a id="tab_rest_3" class="btn-lg" data-toggle="tab" href="#overview-tab-3">
                              La Bandera</a>
                            </li>
                            <li>
                              <a class="btn-lg" data-toggle="tab" href="#overview-tab-4">
                              Catering Service</a>
                            </li>
                            <li>
                              <a class="btn-lg" data-toggle="tab" href="#overview-tab-5">
                              Actividades Especiales</a>
                            </li>
                            
                          </ul><!-- End Nav Tabs -->
                          <!-- Tab Panes -->
                          <div class="tab-content">
                          <?php $query = new WP_Query( 
								array( 'post_type' => 'restaurantes', 
									'posts_per_page'=> '-1','order' => 'ASC'
								));
								$num = 1;	
								while ($query->have_posts()) : $query->the_post(); 
									$horarios = get_post_meta(get_the_ID(), 'laly_horario_restaurante', true); 
                                    $ubicacion = get_post_meta(get_the_ID(), 'laly_ubicacion_restaurante', true);								
									$telefono = get_post_meta(get_the_ID(), 'laly_tel_restaurante', true); 
									$mapa = get_post_meta(get_the_ID(), 'laly_mapa_restaurante', true);
									$slug = sanitize_title( get_the_title(), $fallback_title ); 

									if(($slug == 'actividades-especiales') || ($slug == 'catering-service')){ ?>
                                        <div class="tab-pane" id="overview-tab-<?php echo $num;?>">
											<div class="container">
                                            	<div class="row">                                                	
                                                    <div class="col-xs-12 col-sm-12 col-md-12 fotos fotos-otros">                                                    
                                                        <div class="owl-carousel" id="owl-fotos<?php echo $num;?>">               
                                                            <?php  if (has_post_thumbnail()) : 
																$fotos = get_post_meta(get_the_ID(), 'laly_foto_restaurante', false);
                                                                foreach ($fotos as $att) {
                                                                    // get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
                                                                    $src = wp_get_attachment_image_src($att, 'full');
                                                                    $src = $src[0];	
                                                                    $src_thumb = wp_get_attachment_image_src($att, 'thumbnail');
                                                                    $src_thumb = $src_thumb[0]; ?>                                                 
                                                                    <a href="<?php echo $src; ?>" data-lightbox="fotos" data-caption="<?php the_title(); ?>">
                                                                        <i class="fa fa-search-plus"></i> 
                                                                        <img src="<?php echo $src_thumb; ?>" class="img-responsive" />
                                                                    </a> <?php  
																} 
															endif; //has_post_thumbnail ?>
                                                        </div>
                                                    </div>
                                                </div>
												
                                                <div class="row">
                                                	<div class="col-md-12 descripcion">
                                                    	<?php the_content(); ?>                                                   	 	
                                                        <h2><i class="fa fa-phone"></i>Teléfono: <?php echo $telefono; ?></h2>	
                                                    </div>                                                    
                                                </div>                                                 
                                            </div>
										</div><!-- End Tab 1 --> 
                                    <?php } else { ?>
                                            <div class="tab-pane" id="overview-tab-<?php echo $num;?>">
                                                <div class="container">
                                                    <div class="row">
                                                        <?php if($horarios): ?>
                                                        
                                                        <div class="col-md-6">
                                                            <h2><i class="fa fa-clock-o"></i>Horarios</h2>
                                                            <p><?php echo $horarios; ?></p>
                                                        </div>
														
                                                        <div class="col-md-6 fotos">                                                    	
                                                            <div class="owl-carousel" id="owl-fotos<?php echo $num;?>"> <?php  
																if (has_post_thumbnail()) : 
																	$fotos = get_post_meta(get_the_ID(), 'laly_foto_restaurante', false);
                                                                    
                                                                    foreach ($fotos as $att) {
                                                                        // get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
                                                                        $src = wp_get_attachment_image_src($att, 'full');
                                                                        $src = $src[0];	
                                                                        $src_thumb = wp_get_attachment_image_src($att, 'thumbnail');
                                                                        $src_thumb = $src_thumb[0];	?>                                                 
																		<a href="<?php echo $src; ?>" data-lightbox="fotos" data-caption="<?php the_title(); ?>">
																			<i class="fa fa-search-plus"></i> 
																			<img src="<?php echo $src_thumb; ?>" class="img-responsive" />
																		</a> <?php 
																	} 
																endif; //has_post_thumbnail ?>
                                                            </div>
                                                        </div>
                                                        <?php endif;?>                                                  
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h2><i class="fa fa-map-marker"></i>Ubicación</h2>
                                                            <p><?php echo $ubicacion; ?></p>
                                                            <h2><i class="fa fa-phone"></i>Teléfono: <?php echo $telefono; ?></h2>	
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mapa"><?php echo $mapa; ?></div>
                                                        </div>
                                                    </div>                                                 
                                                </div>
                                                
                                                <?php ?>
                                                <?php the_content(); ?>
                                            </div><!-- End Tab 1 --> 
                                        <?php } 
									$num++;
									endwhile;
									wp_reset_query();?>
                                                     
                        	</div><!-- End Tab Panes -->
                        </div>
        			</div>                    
                </div>
            </section>
            
            <!-- =============================
            // Galerias
            ================================== -->
            <section class="galeria" id="galeria">
                <div class="container">
                	<div class="row section-header">
                    	<h1><i class="decor-left"></i> <span>Galería</span> <i class="decor-right"></i></h1>
                    </div>
                    <div class="row">
                		<ul class="lista_galeria col-md-12"> <?php
							$query = new WP_Query( array( 'post_type' => 'galeria', 'posts_per_page' => '-1', 'order'=>'ASC' ) );				

							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
									$id_post = get_the_ID();

									$images = get_post_meta(get_the_ID(), 'laly_img_galeria', false);
									foreach ($images as $att) {
										// get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
										$src = wp_get_attachment_image_src($att, 'full');
										$src = $src[0];	
										$src_thumb = wp_get_attachment_image_src($att, 'medium');
										$src_thumb = $src_thumb[0]; ?>                                                                                                         
										<li class="col-md-3 galeria-item">
											<a href="<?php echo $src; ?>" data-lightbox="portafolio" data-caption="<?php the_title(); ?>">
											<i class="fa fa-search-plus"></i>
											<img src="<?php echo $src_thumb; ?>" />  
											<div class="project-info">
												<div class="project-details">
													<h5 class="white-text red-border-bottom">
														<?php the_title(); ?> </h5>
												</div>
											 </div>                              
											</a>
										</li> <?php  
									} 
                                endwhile;
                            endif;
                            // Reset Query
                            wp_reset_postdata();
                            ?>
                        
                    	</ul>
                    </div>
                </div>
            </section> 
            
            <!-- =============================
            // CONTACTO
            ================================== -->
            <section class="contacto" id="contacto">
                <div class="container">
                	<div class="row section-header">
                    	<div class="col-xs-12 col-sm-12 col-md-12">
                            <h1><i class="decor-left"></i> <span>Contacto</span> <i class="decor-right"></i></h1>
                        </div>
                    </div>
                    <div class="row">
                		<div class="col-xs-12 col-sm-12 col-md-12">
                    	 <?php echo do_shortcode('[contact-form 1 "Formulario de contacto 1"]');?>                        
                    	</div>                        
                    </div>
                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12">
                        	<h4><?php _e("<!--:en-->*Required<!--:--><!--:es-->*Requerido<!--:-->");?></h4>
                        </div>
                    </div>
                </div>
            </section>

		</div><!-- #content -->
	</div><!-- #primary -->	
</div><!-- #main-content -->

<?php
get_footer();
