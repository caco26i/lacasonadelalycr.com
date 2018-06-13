/*--------------
ANIMACIONES DEL SITIO WEB LA CASONA DE LALY

Creado por: José Antonio Arias B.
URI: http://itdesigners-now.com
Fecha Creación: 20-03-2015

-----------------*/

jQuery(document).ready(function($){	
		
	widthWin = jQuery(window).width();
	heightWin = jQuery(window).height();
		
	jQuery.ajaxSetup({cache:false});
	
	/* Evento de Menu Pricipal
	-------------------------------------------------*/
	jQuery('.menu li a').bind('click',function(event){
		var $anchor = $(this),
			idEnlace = $anchor.attr('href');
						
		jQuery(".menu li current").removeClass('current');
		
		//Movimiento del fondo en menu
		$anchor.addClass("current");
		
		jQuery('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500,'Power2.easeOut');				
	});	
	
	jQuery('#restaurantes li a').bind('click',function(event){	
		jQuery('html, body').stop().animate({
			scrollTop: $(".tab-content").offset().top-300
		}, 1500,'Power2.easeOut');				
	});		
	
	jQuery('#inicio a').bind('click',function(event){	
		var $anchor = $(this),
			idEnlace = $anchor.attr('href');
		$(idEnlace).click();		
	});	
		
	/* Evento MENU DE PRODUCTOS
	--------------------------------------------------------------------------*/
	jQuery('.lista-menu a').bind('click',function(event){
		var $anchor = $(this),
			idPost = $anchor.attr('id'),
			contInfo = jQuery(".productos"),
			contCarrusel = jQuery("#owl-productos");
			
			var tlCarrusel = new TimelineLite();
			tlCarrusel.to(contCarrusel, 0.5, {marginLeft:"150%"});		
			tlCarrusel.play();		
		
		//----- Funcion Carga Contenido 
		function mostrarInfo(idInfo) {
			var id_post = idInfo;
			$anchor.append('<div class="loader"></div>');
			contInfo.load('http://localhost/lacasonadelaly/ajax-handler-categoria-producto/?categoria='+id_post,mostrarContenido);
			contInfo.load('http://lacasonadelalycr.com/ajax-handler-categoria-producto/?categoria='+id_post,mostrarContenido);
			return false;
		}
		
		//------- Muestra el Contenido
		function mostrarContenido() {
			tlCarrusel.reverse();
		}							
							
		jQuery(".lista-menu a").each(function () {
			 $(this).removeClass('actual');
		})
				
		jQuery(this).addClass('actual');
		
		contInfo.empty();		
		mostrarInfo(idPost);
		event.preventDefault();
	});
			
});