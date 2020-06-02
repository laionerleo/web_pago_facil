<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**/

$l                                        = '^(en|es|de|it|po)/';
$i                                        = '^(en|es|de|it|po)';

/**/

//$route[$l.'personas']                 		= 'Persona';
$route['default_controller']                = 'Welcome';
/* vistas*/
$route[$l.'pago_rapido']                    = 'Welcome/pago_rapido';
$route[$l.'facturaspendientes']                    = 'Welcome/vistafacturaspendientes';
$route[$l.'getavisomes2/(:any)/(:any)/(:any)']                    = 'Welcome/getavisofacturames2/$1/$2/$3/$4';
$route[$l.'getavisoactualizado/(:any)/(:any)']                    = 'Welcome/getavisoactualizado/$1/$2/$3';

//$route[$l.'compra/(:num)']                 	= 'Welcome/compra/$1/$2';
//(:any)/(:any)']  = 'Welcome/get_metodo_pago/$1/$2/$3';




/* metodos para los servicios  */
$route[$l.'get_filtro_regiones']            = 'Welcome/filtro_empresas_by_tipo_region';

$route[$l.'filtro_codigo_fijo']            = 'Welcome/busqueda_clientes';





$route[$l.'(.+)$']                        = "$2";
$route[$i.'$']                            = $route['default_controller'];

/**/

$route['translate_uri_dashes']            = TRUE;
$route['404_override']                    = 'Welcome/error404';
$route['403_override']                    = 'Welcome/error403';
$route['503_override']                    = 'Welcome/error503';
$route['504_override']                    = 'Welcome/error504';
/**/

?>