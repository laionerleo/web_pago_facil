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
$route[$l.'vistafacturacionrecarga']            = 'Welcome/vistafacturacionrecarga';
$route[$l.'vistaconfirmacion']                  = 'Welcome/vistaconfirmacion';
$route[$l.'vistaprepararpago']                  = 'Welcome/vistaprepararpago';
$route[$l.'metodoprepararpagobcp']              = 'Welcome/metodoprepararpagobcp';
$route[$l.'confirmarpagobcp']                   = 'Welcome/confirmarpagobcp';
$route[$l.'ejecuparpagoeLinkser']               = 'Welcome/pagarelinkser';
$route[$l.'nuevavista']                         = 'Welcome/nuevavista';
$route[$l.'endesarrollo']                       = 'Welcome/endesarrollo';
$route[$l.'generarqr']                          = 'Welcome/generarqr';
$route[$l.'generarqrbnb']                       = 'Welcome/generarqrbnb';
$route[$l.'getultimaselegidas']                 = 'Welcome/getultimaselegidas';
$route[$l.'metodotigomoney']                    = 'Welcome/pagarportigomoney';
$route[$l.'verificartransaccion']               = 'Welcome/verificartransacciontigo';
$route[$l.'perfilfrecuente']                    = 'Welcome/listarempresafrecuentes';
$route[$l.'listapagosrealizados']               = 'Welcome/listapagosrealizados';
$route[$l.'generarticketpagoexpress']           = 'Welcome/generarpagoexpress';
$route[$l.'verificarqr']                        = 'Welcome/verificarqr';


//vistas y metodos para para ols pagos multiples 
$route[$l.'facturaspendientesmultiple']         = 'HubPago/facturaspendientesmultiples';//vista
$route[$l.'listadofacturaspendientes']         = 'HubPago/listadofacturaspendientes';//vista




//
$route[$l.'actualizardatos']                    = 'Welcome/actualizardatosusuario';



///Servicios
$route[$l.'Qr/(:any)']                          = 'Servicio/recuperarqr/$1/$2';
$route[$l.'Descargarqr/(:any)']                 = 'Servicio/DescargarQr/$1/$2';
$route[$l.'getempresaspagadasfrecuentes']       = 'Servicio/getempresaspagadasfrecuentes';
$route[$l.'getrubros']                          = 'Servicio/getrubros';
$route[$l.'getallempresas']                     = 'Servicio/getallempresas';
$route[$l.'cargarpagofacilentubarrio']          = 'Servicio/cargaragofacilentubarrio';
$route[$l.'cargarciudades']                     = 'Servicio/cargarciudades';
$route[$l.'cargarestados']                      = 'Servicio/cargarestados';
$route[$l.'vistametodosdepago/(:any)']          = 'Servicio/metodospagovista/$1/$2';
$route[$l.'empresascheckout']                   = 'Servicio/empresasafiliadas';
//pagos realizados
$route[$l.'pagosrealizados/(:num)']             = 'Welcome/pagosrealizados/$1/$2';
$route[$l.'get_facturaspagadas']                = 'Welcome/facturaspagadas';
$route[$l.'vysoravisopdf']                      = 'Welcome/veraviso';
$route[$l.'vysorfacturapagofacilpdf']           = 'Welcome/verfacturapagofacil';
$route[$l.'vysorfacturaempresapdf']             = 'Welcome/verfacturaempresa';
$route[$l.'enviarfacturacorreo']                = 'Welcome/enviarfacturacorreo';
$route[$l.'getavisomes2/(:any)/(:any)/(:any)']  = 'Welcome/getavisofacturames2/$1/$2/$3/$4';
$route[$l.'getavisoactualizado/(:any)/(:any)']  = 'Welcome/getavisoactualizado/$1/$2/$3';


$route[$l.'getfacturapagofacil/(:any)']         = 'Welcome/GetFacturaPagoFacil/$1/$2';
$route[$l.'getfacturaempresa/(:any)']           = 'Welcome/GetFacturaEmpresa/$1/$2';

//metodos de pago 
//metodos de pago 
$route[$l.'metodosdepago']                      = 'Welcome/metodospagomenu';
$route[$l.'comision/(:any)']                    = 'Welcome/vistacomision/$1/$2/';


//puntos de cobranza
$route[$l.'puntosdecobranza']                    = 'Welcome/puntosdecobranza';
$route[$l.'puntosdecobranzapagofacil']           = 'Servicio/puntosdecobranza';
$route[$l.'visitapuntosdecobranza']              = 'Welcome/visitapuntosdecobranza';
$route[$l.'createvisitapuntosdecobranza']        = 'Welcome/createvisitapuntosdecobranza';
$route[$l.'InsertarVisita']                      = 'Welcome/InsertarVisita';

$route[$l.'comopagar']                           = 'Servicio/Comopagar';




// empresas afiliadas
$route[$l.'empresasafiliadas/(:any)']           = 'Welcome/empresasafiliadas/$1/$2/';

//cybersource metodos
$route[$l.'jwt_validation']                      = 'Servicio/jwtvalidation';
$route[$l.'metodoatc']                          = 'Welcome/pagarporatc';



//atencion al clinete metodos de pago 
$route[$l.'atencionmetodopago']                      = 'Welcome/vistareclamometodopago';
$route[$l.'atencionempresa']                      = 'Welcome/metodospagomenu';
$route[$l.'atencionpagofacil']                      = 'Welcome/metodospagomenu';


//billetera 
$route[$l.'vistarecargas']                      = 'Welcome/vistarecargas';
$route[$l.'buscadorbilletera']                  = 'Servicio/buscadorbilletera';
$route[$l.'recargabilletera']                   = 'Welcome/realizarrecarga';
$route[$l.'filtro_billeteras_dependientes']     = 'Welcome/busquedabilleteradependiente';
$route[$l.'filtro_billeteras_general']          = 'Welcome/busquedabilleteras';


// pagofacil en tu barrio 
$route[$l.'pagofacilentubarrio/(:num)']       = 'BilleteraPagoFacil/inicio/$1/$2/';
$route[$l.'reportemovimiento']                = 'BilleteraPagoFacil/reportemovimientobilletera';
$route[$l.'reportehistoricocliente']          = 'BilleteraPagoFacil/reportehistoricocliente';

$route[$l.'reportecomisiones']                = 'BilleteraPagoFacil/reportecomisionbilletera';


$route[$l.'cargarcriterioshub']                = 'HubPago/CargarCriterios';




//metodos para el login y logout
$route[$l.'login_user']                     = 'Auth/loginusuario';
$route[$l.'login_registro']                     = 'Auth/loginregistro';

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

$route[$l.'filtro_clientes']            = 'Welcome/busqueda_clientes';





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