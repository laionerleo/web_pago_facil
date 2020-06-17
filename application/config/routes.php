<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**/

$l                                        = '^(en|es|de|it|po)/';
$i                                        = '^(en|es|de|it|po)';

/**/

//$route[$l.'personas']                 		= 'Persona';

$route['default_controller']                = 'Auth';
$route[$l.'inicio']                    = 'Welcome';

/* vistas pago rapido */
$route[$l.'pagorapido']                         = 'Welcome/pago_rapido';
$route[$l.'facturaspendientes']                 = 'Welcome/vistafacturaspendientes';
$route[$l.'vistafacturacion']                   = 'Welcome/vistafacturacion';
$route[$l.'vistaconfirmacion']                  = 'Welcome/vistaconfirmacion';
$route[$l.'vistaprepararpago']                  = 'Welcome/vistaprepararpago';
$route[$l.'metodoprepararpagobcp']                 = 'Welcome/metodoprepararpagobcp';
$route[$l.'confirmarpagobcp']                      = 'Welcome/confirmarpagobcp';
$route[$l.'ejecuparpagoeLinkser']                      = 'Welcome/pagarelinkser';

$route[$l.'nuevavista']                      = 'Welcome/nuevavista';




$route[$l.'getavisomes2/(:any)/(:any)/(:any)']                    = 'Welcome/getavisofacturames2/$1/$2/$3/$4';
$route[$l.'getavisoactualizado/(:any)/(:any)']                    = 'Welcome/getavisoactualizado/$1/$2/$3';



//metodos para el login y logout
$route[$l.'login_user']                     = 'Auth/loginusuario';
$route[$l.'logout']                         = 'Auth/logout';

//metodos para el login de  faceboook

//facebook
$route[$l.'login_face']                          = 'Facebook_Authentication';
$route[$l.'logout_face']                          = 'Facebook_Authentication/logout';
$route[$l.'prueba_face']                          = 'Facebook_Authentication/prueba';


//google
$route[$l.'login_google']                          = 'Google_Authentication';
$route[$l.'logout_google']                          = 'Google_Authentication/logout';







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