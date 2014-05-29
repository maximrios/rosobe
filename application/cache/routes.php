<?php
	$route['nosotros'] = "inicio/nosotros";
	$route['galeria'] = "inicio/galeria";
	
	$route['productos/(:num)'] = 'productos';
	$route['productos/(:num)/([a-z-0-9-]+)'] = 'productos/categoria/$1';
	$route['productos/(:num)/([a-z-0-9-]+)/(:num)'] = 'productos/categoria/$1';
	$route['productos/busqueda'] = 'productos/busqueda';
	$route['productos/busqueda/([a-z-]+)'] = 'productos/busqueda/$1';
	$route['productos/busqueda/(:num)/([a-z-]+)'] = "productos/busqueda/$1/$2";
	$route['producto/(:num)/(:any)'] = 'productos/producto/$1/$2';
	$route['clientes/login'] = "inicio/login";
	$route['clientes/carrito'] = "clientes/carrito";
	$route['envios'] = "inicio/envios";
	$route['novedades'] = "inicio/novedades";
	$route['novedades/(:num)'] = "inicio/novedades/$1";
	$route['novedad/(:num)/([a-z-0-9-]+)'] = "inicio/novedad/$1";
	//$route['contacto'] = "inicio/contacto";
	$route['contacto'] = "contacto";
	
?>