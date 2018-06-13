<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit: 
 * @link http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'laly_';

global $meta_boxes;

$meta_boxes = array();

//Datos del Banner -------------------------------------------
$meta_boxes[] = array(
	'id'		=> 'info_banners',
	'title'		=> 'Datos del Banner',
	'pages'		=> array( 'banners', 'publicidad'),

	'fields'	=> array(
		//Enlace Articulo
		array(
			'name'		=> 'Enlace al artículo',
			'id'		=> "{$prefix}url_articulo",
			'type'		=> 'text',
			'desc'		=> 'Colocar la dirección url del artículo enlazado.'
		),
	)
);

//Datos Restaurantes -------------------------------------------
$meta_boxes[] = array(
	'id'		=> 'resturantes',
	'title'		=> 'Datos Resturantes',
	'pages'		=> array( 'restaurantes'),

	'fields'	=> array(
		//Dato Estadistico 1
		array(
			'name'		=> 'Horario',
			'id'		=> "{$prefix}horario_restaurante",
			'type'		=> 'text',
			'desc'		=> 'Colocar Horario del restaurante'
		),
		array(
			'name'		=> 'Ubicación',
			'id'		=> "{$prefix}ubicacion_restaurante",
			'type'		=> 'text',
			'desc'		=> 'Colocar ubicación del restaurante'
		),		
		array(
			'name'		=> 'Teléfono',
			'id'		=> "{$prefix}tel_restaurante",
			'type'		=> 'text',
			'desc'		=> 'Colocar teléfono del restaurante'
		),
		array(
			'name'		=> 'Mapa',
			'id'		=> "{$prefix}mapa_restaurante",
			'type'		=> 'textarea',
			'desc'		=> 'Colocar código mapa Google del restaurante'
		),
		// NEW(!) PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'	=> 'Fotos (subir)',
			'desc'	=> 'Fotos del resturante',
			'id'	=> "{$prefix}foto_restaurante",
			'type'	=> 'plupload_image'
		),
	)
);

//Imagenes Portafolio -------------------------------------------
$meta_boxes[] = array(
	'id'		=> 'galeria',
	'title'		=> 'Imagenes',
	'pages'		=> array( 'galeria'),

	'fields'	=> array(		
		// NEW(!) PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'	=> 'Fotos Galeria (subir)',
			'desc'	=> 'Galeria de fotos del servicio, localizacion o noticias',
			'id'	=> "{$prefix}img_galeria",
			'type'	=> 'plupload_image'
		),
	)
);



//Datos del Video -------------------------------------------
$meta_boxes[] = array(
	'id'		=> 'info_videos',
	'title'		=> 'Datos del Video',
	'pages'		=> array( 'servicios', 'post'),

	'fields'	=> array(
		//Enlace Articulo
		array(
			'name'		=> 'Enlace del video 1',
			'id'		=> "{$prefix}url_video1",
			'type'		=> 'text',
			'desc'		=> 'Colocar la dirección url del video en Youtube, codigo que aparece a darle compartir, por ejemplo: http://youtu.be/va7QeSYoelY.'
		),
		array(
			'name'		=> 'Enlace del video 2',
			'id'		=> "{$prefix}url_video2",
			'type'		=> 'text',
			'desc'		=> 'Colocar la dirección url del video en Youtube, codigo que aparece a darle compartir, por ejemplo: http://youtu.be/va7QeSYoelY.'
		),
	)
);

//Datos de la localizacion -------------------------------------------
$meta_boxes[] = array(
	'id'		=> 'info_localizacion',
	'title'		=> 'Datos de la Localización',
	'pages'		=> array( 'localizacion', 'post'),

	'fields'	=> array(
		array(
			'name'		=> 'Google Map',
			'id'		=> "{$prefix}mapa_oficina",
			'type'		=> 'textarea',			
			'cols'		=> "40",
			'rows'		=> "8",
			'desc'		=> 'Colocar el código de Google Map.'
		),
	)
);

$query = new WP_Query(
	array( 'post_type' => 'tipos_productos',
	'posts_per_page'=> '-1'
));

$opciones_productos[""] = "Seleccione un Producto";
while ($query->have_posts()){
	$query->the_post();
	$post = get_post($ID);
	$slug = $post->post_name;
	$opciones_productos[$slug] = get_the_title();
};

//Datos de la localizacion -------------------------------------------
$meta_boxes[] = array(
	'id'		=> 'productos',
	'title'		=> 'Datos del Producto',
	'pages'		=> array('productos'),
	'fields'	=> array(
		array(
			'name'		=> 'Tipo de producto',
			'id'		=> "{$prefix}tipo_producto",
			'type'		=> 'select',	
			'options'	=> $opciones_productos,
    		'default' => '',
		),
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function crv_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'crv_register_meta_boxes' );
