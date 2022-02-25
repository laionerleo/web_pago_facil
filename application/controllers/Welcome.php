<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		//header('Access-Control-Allow-Origin: *');
		//header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		date_default_timezone_set("America/La_Paz"); 
        
        parent::__construct();
 
        //cargamos la base de datos por defecto
      //  $this->load->database('default');
        
        //cargamos los agentes para los dispositivos
		$this->load->library('user_agent');
		$this->load->library('servicios');
		$this->load->library('facebook');

		//cargamos el helper url y el helper form
    //    $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');

        //cargamos los modelos
		$this->load->model(array('Msecurity'));
		
		$this->cargarlogsession("SESSIONNAME".$_COOKIE[session_name ()]);
		//$_COOKIE[session_name ()];

		  if(!@$this->session->userdata('cliente')){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect($d['url']."?m=Usted tiene que iniciar session !!!");
		}
		
		
		
    }


	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index', $d);
	
	}

	public function pago_rapido()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		//echo "hola mundo ";
		$id_cliente=$this->session->userdata('cliente');
		$d['rubros']= $this->servicios->get_list_rubros($id_cliente);
		$d['region']=  $this->servicios->get_list_regiones($id_cliente);
		$d['perfilfrecuente']=$_SESSION['PerfilFrecuente'];
 
		/*	$ip = '181.114.102.117'; // Esto contendrá la ip de la solicitud.
		// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
		// Vamos a recuperar los datos rápidamente con file_get_contents
		$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
		
		var_dump($dataArray);
		
		echo "Hola visitante desde: ".$dataArray["geoplugin_countryName"];*/	
	$this->load->view('pago_rapido/index', $d);
	
	}
	public function nuevavista()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//echo "hola mundo ";
		$id_cliente=$this->session->userdata('cliente');
		$d['rubros']=$this->servicios->get_list_rubros($id_cliente);
		$d['region']=$this->servicios->get_list_regiones($id_cliente);
		$this->load->view('pago_rapido/prueba', $d);

	}
	public function filtro_empresas_by_tipo_region()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$region_id=$datos['region_id'];
		$rubro_id=$datos['rubro_id'];
		$id_cliente=$this->session->userdata('cliente');
	
	//	$d['empresas']=  $this->servicios->get_list_empresas_by_tipo_region($rubro_id,$region_id,$id_cliente);
		
		///$_SESSION['todaslasempresas']=$d['empresas'];

		$laEmpresasMasPagadas=$this->servicios->listarmaspagadas($id_cliente);
		$d['empresasmaspagadas'] = $laEmpresasMasPagadas->values;
		if(!is_null($d['empresasmaspagadas'])  && count($d['empresasmaspagadas'])>0  )
		{
		
			$laAregloAuxEmpresa = new stdClass();
			$laAregloAuxEmpresa->Empresa=$d['empresasmaspagadas'][0]->empresa;
			$laAregloAuxEmpresa->Descripcion=$d['empresasmaspagadas'][0]->descripcion;
			$laAregloAuxEmpresa->Url_Icon=$d['empresasmaspagadas'][0]->url_icon;
			$d['empresasaccesodirecto'][]=$laAregloAuxEmpresa ;
			
		}
		$laEmpresasAccesoDirecto=$this->servicios->getEmpresaAccesodirecto($id_cliente) ;
		$d['empresasaccesodirecto']= array_merge($d['empresasaccesodirecto'],$laEmpresasAccesoDirecto->values); ;
		$laMibilletera=$this->servicios->getbilleterausuario($id_cliente);
		$lbEsBilletera= false;
		if( !is_null($laMibilletera) && count($laMibilletera->values) >0   )
		{
			$lbEsBilletera= true;
		}
		foreach ($d['empresasaccesodirecto'] as $key => $value) {
			
			$lnEmpresaAux=$value->Empresa ;
			if($lnEmpresaAux  == 20  && $lbEsBilletera == false )
			{
				unset( $d['empresasaccesodirecto'][$key]);
			}
		}
		
		
		$this->load->view('pago_rapido/lista_empresas', $d);
		


	}

	public function gettodaslasempresas()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		/*$datos=$this->input->post("datos");
		$region_id=$datos['region_id'];
		$rubro_id=$datos['rubro_id'];
		$id_cliente=$this->session->userdata('cliente');
	*/
		$d['empresas']=  $this->servicios->get_list_empresas_by_tipo_region(0,0,1);
		
		$_SESSION['todaslasempresas']=$d['empresas'];

		echo json_encode($d['empresas']->values);


	}

	public function  busqueda_clientes()
	{
	
		//get_busqueda_codigo_fijo($id_empresa,$codigo_fijo,$codigo_cliente)
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		
		$tnEmpresa=$datos['empresa_id'];
		$tcCodigo=$datos['codigo'];
		$tnCriterio=$datos['criterio'];
		$tcTitulo=$datos['titulo'];
		$tnIdentificarPestaña=$datos[0];
		$tnCliente=$this->session->userdata('cliente');
		$tnHubTitulo=0;
		$loServicioBusquedaClientes=$this->servicios->getBusquedaClienteGeneral($tnEmpresa,$tcCodigo,$tnCriterio);	
		
		if($loServicioBusquedaClientes->error == 0  && !is_null($loServicioBusquedaClientes->values)  )
		{
			$d['clientes']=$loServicioBusquedaClientes->values;
			$d['mensaje']= $loServicioBusquedaClientes->message ;
			if( isset( $loServicioBusquedaClientes->values[0]->loObjeto1 ))
			{
				$tnHubTitulo=1;
				$d['lanombretitulohub']=$loServicioBusquedaClientes->values[0]->loObjeto1 ;
			}
		}else{
			$d['clientes']=array();
			$d['mensaje']= "no se ha encontrado datos".$loServicioBusquedaClientes->message ;
		}
		$d['titulo']=$tcTitulo;
		$_SESSION[$tnIdentificarPestaña.'idempresa']=$tnEmpresa;
		$_SESSION[$tnIdentificarPestaña.'clientesbusqueda']=$d['clientes'];
		
		if($tnHubTitulo==1)
		{
			echo '<pre>'; 
			print_r($loServicioBusquedaClientes->values);
			echo '</pre>' ;
			$this->load->view('pago_rapido/listaclienteshub', $d);
		}else{
			$this->load->view('pago_rapido/lista_clientes', $d);
		}
		
		
		

	}
	//
	public function listadodefacturas()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//echo "hola mundo ";
		//$d['listado']=$this->servicios->get_Listar_pendientes_full();
		echo "<pre>";
		print_r($d);
		echo "</pre>";
		//$this->load->view('pago_rapido/index', $d);
	
	}
	public function vistafacturaspendientes()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		
		$lnEmpresa=$datos["empresa_id"];
		$lnCodigoFijo=$datos["codigo"];
		$lnPosicion=$datos["codigo"];
		$lcUrlIconoImagen=$datos["urlimagen"];
		$lnCliente=$this->session->userdata('cliente');
		$tnIdentificarPestaña=$datos[0];
		
		try {		
				$lnNroClienteElegido=0;
				$_SESSION[$tnIdentificarPestaña.'codigofijo']= $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->codigoClienteEmpresa;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
				$_SESSION[$tnIdentificarPestaña.'codigoubicacion']=$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->codidgoUbicacion; // $d['clientes']->values[0]->codidgoUbicacion;
				$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->nombre;  // $d['clientes']->values[0]->nombre;
				$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->Nit;// $d['clientes']->values[0]->Nit;		
				$lnCodigoFijo=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
			
				if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
				{
					$_SESSION[$tnIdentificarPestaña.'IdOperativo'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->IdOperativo;
					$_SESSION[$tnIdentificarPestaña.'FechaOperativa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->FechaOperativa;
					$_SESSION[$tnIdentificarPestaña.'NroOperacion'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->NroOperacion;		
					$_SESSION[$tnIdentificarPestaña.'Servicio'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->Servicio;
					$IdOperativo= $_SESSION[$tnIdentificarPestaña.'IdOperativo'] ;
					$FechaOperativa = $_SESSION[$tnIdentificarPestaña.'FechaOperativa'] ;
					$NroOperacion=	$_SESSION[$tnIdentificarPestaña.'NroOperacion'] ;
					$Servicio=$_SESSION[$tnIdentificarPestaña.'Servicio'] ;
					$laServicioListarFacturas=$this->servicios->get_listar_facturashub($lnEmpresa,$lnCodigoFijo,$lnCliente ,$IdOperativo , $FechaOperativa , $NroOperacion , $Servicio);

				}else{
					$laServicioListarFacturas=$this->servicios->get_listar_facturas($lnEmpresa,$lnCodigoFijo,$lnCliente);
				
				}
			if(!is_null(@$laServicioListarFacturas->values)  ){
				$d['facturas']=$laServicioListarFacturas->values;
				$d['cantidadfacturas']=count($laServicioListarFacturas->values);
				

				if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
				{
					
					$d['periodomes']=$laServicioListarFacturas->values[0]->periodo;
					$lnFactura=$_SESSION[$tnIdentificarPestaña.'IdOperativo'] ;
					$_SESSION[$tnIdentificarPestaña.'nrofactura']=$lnFactura;
					$_SESSION[$tnIdentificarPestaña.'periodomes']=$laServicioListarFacturas->values[0]->periodo;
					for ($i=0; $i < count($laServicioListarFacturas->values); $i++) { 

					}

				}else{
					//$this->cargarlog("factura a pagar :".$lnFactura . "--" .$lcPeriodo);
					$d['periodomes']=$this->get_periodo($laServicioListarFacturas->values[0]->periodo);
					$_SESSION[$tnIdentificarPestaña.'nrofactura']=$laServicioListarFacturas->values[0]->factura; //$lnFactura;
					$_SESSION[$tnIdentificarPestaña.'periodomes']=$laServicioListarFacturas->values[0]->periodo;
			
					for ($i=0; $i < count($laServicioListarFacturas->values); $i++) { 
						$laServicioListarFacturas->values[$i]->periodoaux=$laServicioListarFacturas->values[$i]->periodo;
						$laServicioListarFacturas->values[$i]->periodo =$this->get_periodo($laServicioListarFacturas->values[$i]->periodo);
					}
				}
			}else{
				$d['facturas']= array();
				$d['cantidadfacturas']=0;
				
			}
			$d['idCliente']=  $lnCodigoFijo; 
			$d['nombre']=  $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'];
			$d['codigoUbicacion']=  $_SESSION[$tnIdentificarPestaña.'codigoubicacion'];
			$d['urlimagenempresa']=$lcUrlIconoImagen;
			$d['nombreempresa']=$datos["nombreempresa"];
			$d['idempresa']=$lnEmpresa;
			$_SESSION[$tnIdentificarPestaña.'idempresa']=$lnEmpresa;
			$_SESSION[$tnIdentificarPestaña.'nombreempresa']=$datos["nombreempresa"];
			$_SESSION[$tnIdentificarPestaña.'urlimagenempresa']=$d['urlimagenempresa'];
			
			$laServicioMetodoPagoEmpresa=$this->servicios->get_metodos_pago_empresa($lnCliente ,$lnEmpresa);
	
			$d['tiposdecomision']=$laServicioMetodoPagoEmpresa->values->aTipoComisionDetalle;
			$d['metodospago']=$laServicioMetodoPagoEmpresa->values->aMetodosDePago;
			$_SESSION['todosmetodosdepago']=$laServicioMetodoPagoEmpresa->values->aMetodosDePago;
			$laServicioMetodosbyGrupo=$this->servicios->getmetodosbygrupos($lnEmpresa ,0  );
			$d['metodospagogrupos']=$laServicioMetodosbyGrupo->values;
			$_SESSION[$tnIdentificarPestaña.'metodospagogrupos']=$laServicioMetodosbyGrupo->values;		
			$etiquetas=$this->servicios->get_etiquetas($lnCliente);
			for ($i=0; $i < count($etiquetas->values); $i++) { 
				if($etiquetas->values[$i]->Empresa == $lnEmpresa) 
				{
					$d['etiquetas']=$etiquetas->values[$i];
				}
			}
			$d["empresa_id"]= $datos["empresa_id"];
			$d["codigofijo"]= $datos["codigo"];	
			$d["codigofijo"] =$lnCodigoFijo; 
			if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
			{
			//	$this->load->view('pago_rapido/facturaspendienteshub', $d);
				$this->load->view('multiple/paso1', $d);

			}else{
				$this->load->view('pago_rapido/facturaspendientes', $d);
			}
			
			} catch (\Throwable $th) {
			echo '<pre>';
			print_r($th ) ;
			echo '</pre>' ;
		}
		
	}
	public function getavisofacturames()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$id_empresa= $datos["empresa_id"];
		$idcliente=$this->session->userdata('cliente');
		$empresadetalle=$this->servicios->getempresasimple($id_empresa,$idcliente);
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		$codigo_fijo= $datos["codigo_fijo"];//codigofijodelcliente
		$factura=$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura ,$idcliente);
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
		//START DOWNLOAD
		//header('Content-Description: File Transfer');
		//header('Content-Type', 'application/octet-stream');
		header("Content-type: application/pdf");
		header('Content-Disposition: attachment; filename=factura-'.$factura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		echo $fileToDownload;
	
		
	}

	public function getavisofacturames2($lan,$factura,$id_empresa,$codigo_fijo)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$datos=$this->input->post("datos");
		$idcliente=$this->session->userdata('cliente');
		$empresadetalle=$this->servicios->getempresasimple($id_empresa ,$idcliente);
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		//$factura="2020-02";//$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura,$idcliente);
		//$lista=$this->servicios->getempresasimple();
		/*echo "<pre>";
		print_r($lista);
		echo "</pre>";*/
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
	
		

		//START DOWNLOAD
		//header('Content-Description: File Transfer');
		//header('Content-Type', 'application/octet-stream');
		header("Content-type: application/pdf");
		header('Content-Disposition: attachment; filename=factura-'.$factura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		echo $fileToDownload;
		//echo "esto es el dato del pdf ";
		//exit;
			
	}
	public function getavisoactualizado($lan,$codigo_fijo,$id_empresa)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$datos=$this->input->post("datos");
		$idcliente=$this->session->userdata('cliente');
		//$id_empresa=;//  $datos["empresa_id"];
		$empresadetalle=$this->servicios->getempresasimple($id_empresa,$idcliente);
	
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		
		$lista=$this->servicios->getavisocobranzaactualizado($ip_empresa,$codigo_fijo,$idcliente);
		//$lista=$this->servicios->getempresasimple();
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
	
		

		//START DOWNLOAD
		//header('Content-Description: File Transfer');
		//header('Content-Type', 'application/octet-stream');
		header('Content-Disposition: attachment; filename=facturaactual.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		echo $fileToDownload;
		
		
		
	}

	public function vistafacturacion()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$metodopago=$datos["metododepago"];
		$lncodigofijo=$datos["codigofijo"];
		$ladetallepago=$datos["detallepago"];
		$lnMontoComision=$datos["montocomision"];
		$tnIdentificarPestaña=$datos[0];
		$_SESSION[$tnIdentificarPestaña.'gaDetallePago']=$ladetallepago;
		$_SESSION[$tnIdentificarPestaña.'montocomision']=$lnMontoComision;
		try {
			
		$d['nombrecliente'] = $this->session->userdata($tnIdentificarPestaña.'nombreclienteempresa');
		$d['cionit']= $this->session->userdata($tnIdentificarPestaña.'cionitclienteempresa'); 
		$d['numerocelular']=  $this->session->userdata('telefono');
		$d["correo"]= $this->session->userdata('correo');
		$_SESSION[$tnIdentificarPestaña.'montototal']=$datos["montototal"];
		//$_SESSION[$tnIdentificarPestaña.'idfactura']=$datos["idfactura"];
		$_SESSION[$tnIdentificarPestaña.'metododepago']=$datos["metododepago"];
		$metodopago=$_SESSION[$tnIdentificarPestaña.'metododepago'];
		$lnEmpresa=$_SESSION[$tnIdentificarPestaña.'idempresa'] ;
		$d['comision']=$_SESSION[$tnIdentificarPestaña.'montocomision'];		
		if($metodopago==2)
		{
			$tnCliente= $this->session->userdata('cliente');
			
			$billetera=$this->servicios->getbilletera($tnCliente,$lnEmpresa);
			$this->cargarlog("getbilletera-facturacion".json_encode($billetera));
			if( isset($billetera->values[0]->Saldo)  )
			{
				$d['saldo']=@$billetera->values[0]->Saldo;
			}else{
				$d['saldo']="0.00";
				$d['mensaje']="Su billetera movil no se encuentra activada . <br> Contacte con el proveedor para activarla  use otro metodo de pago";
				
			}
		}

		$loServicioGetFacturaFacturar=$this->servicios->getfacturaempresafacturar(1 , $lnEmpresa);
		if( !is_null($loServicioGetFacturaFacturar)  && $loServicioGetFacturaFacturar->error==0   )
		{
			$d['tnFacturar']=1;
		}else{
			$d['tnFacturar']=0;
		}


		$index=0;
		for ($i=0; $i < count($_SESSION['todosmetodosdepago']) ; $i++) { 
			//echo $_SESSION[$tnIdentificarPestaña.'todosmetodosdepago'][$i]->metodoPago."--".$_SESSION[$tnIdentificarPestaña.'metododepago']; 
			if($_SESSION['todosmetodosdepago'][$i]->metodoPago==$_SESSION[$tnIdentificarPestaña.'metododepago'])
			{
				$d['etiquetametodopago']=$_SESSION['todosmetodosdepago'][$i]->etiquetaBilletera;
				$_SESSION[$tnIdentificarPestaña.'etiquetametodopago']=$_SESSION['todosmetodosdepago'][$i]->etiquetaBilletera;
				$index=$i;
				$_SESSION[$tnIdentificarPestaña.'urlimagenmetodo']=$_SESSION['todosmetodosdepago'][$i]->url_icon;
				$_SESSION[$tnIdentificarPestaña.'urlimagenbanner']=$_SESSION['todosmetodosdepago'][$i]->url_banner;
			}
		}	
		$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']=$_SESSION['todosmetodosdepago'][$index];


		$this->load->view('pago_rapido/facturacion', $d);
		} catch (\Throwable $th) {
			echo '<pre>';
			print_r($th ) ;
			echo '</pre>' ;
			//throw $th;
		}

	}
	public function vistaconfirmacion()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$nombrecliente=$datos["nombrecliente"];
		$cionit=$datos["inpcionit"];
		$numero=$datos["inpnumero"];
		$correo=$datos["inpcorreo"];
		$tnIdentificarPestaña=$datos[0];
		$_SESSION[$tnIdentificarPestaña.'gnTelefonooEnvio'] =	$numero ;
		$_SESSION[$tnIdentificarPestaña.'gnCorreoEnvio'] =$correo;

		//var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo };
		if($nombrecliente != $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'])
		{
			$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa']=$nombrecliente ;
		}
		if($cionit != $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] )
		{
			$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] =$cionit ;
		}
		if($correo != $_SESSION['correo'] )
		{
			$_SESSION['correo']=$correo;
		}

			//aqui devoverificar si no es invitado , si es invitado 
		//veriico si existe el usuario 
		$idcliente=$this->session->userdata('cliente');
		if($idcliente == 9 ) 
		{
			$loServicioNumero=$this->servicios->verificar_cuentaByCampo("telefonoDePago" , $numero);
		
			if(!is_null($loServicioNumero))
			{
				$data = get_object_vars($loServicioNumero->values);
				$_SESSION['user'] = $loServicioNumero;
				$this->session->set_userdata($data);
			}else{
				$loServicioCorreo=$this->servicios->verificar_cuentaByCampo("correo" , $correo);
				if(!is_null($loServicioCorreo))
				{
					$data = get_object_vars($loServicioCorreo->values);
					$_SESSION['user'] = $loServicioCorreo;
					$this->session->set_userdata($data);
				}
			}
		}
	

		$metodopago=$datos["metododepago"];
		$id_empresa= $_SESSION[$tnIdentificarPestaña.'idempresa'];
		$idcliente=$this->session->userdata('cliente');
		$metodos=$this->servicios->get_metodos_pago_empresa($idcliente ,$id_empresa);
		$tipodecomision=0;
		$montocomision=0;
		$d['metodosdepago']=$metodos->values->aMetodosDePago;
	
		$d['nombre']=$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'];
		$d['cinit']=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];

		$d['periodo']=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$d['monto']=$_SESSION[$tnIdentificarPestaña.'montototal'];
		//$_SESSION[$tnIdentificarPestaña.'montocomision']=$montocomision->values;
		$d['comision']=$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$d['nombremetodopago']=$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'];
		$d['medios']= $_SESSION[$tnIdentificarPestaña.'gnTelefonooEnvio'];
		$d['email']=$_SESSION[$tnIdentificarPestaña.'gnCorreoEnvio'];		
		
		$d['nombreempresa']=$_SESSION[$tnIdentificarPestaña.'nombreempresa'];
		$d['urlimagenempresa']=$_SESSION[$tnIdentificarPestaña.'urlimagenempresa'];
		$_SESSION[$tnIdentificarPestaña.'montototalpagar']= $d['monto'] + $d['comision'];
		$d['montototalpagar']=$_SESSION[$tnIdentificarPestaña.'montototalpagar'];
		$d['etiquetametodopago']=$_SESSION[$tnIdentificarPestaña.'etiquetametodopago'];	
			
		$d['itnselegidos']=$_SESSION[$tnIdentificarPestaña.'gaDetallePago'];	
			
		$d['listadofacturas']=$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];	
		$this->cargarlog("listadofactura1111-".json_encode($d['listadofacturas']));
		$this->cargarlog("itemselegidos-".json_encode($d['itnselegidos']));
		if(!is_null($d['listadofacturas']))
		{	
			foreach ($d['listadofacturas'] as $key => $value) {
				$lnitem=$value->factura ;
				if(!in_array($lnitem,$d['itnselegidos']))
				{
					$lnitem=$value->factura ;
					unset( $d['listadofacturas'][$key]);
				}
			}
			$this->cargarlog("listadofactura22222-".json_encode($d['listadofacturas']));

			$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientesoficial']= $d['listadofacturas']; 
			
		//	$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes']=$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];
					
			$this->load->view('multiple/confirmacion', $d);
		}else{

			$this->load->view('pago_rapido/confirmacion', $d);
		}
	


	}
	public function vistaprepararpago()
	{
		
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnIdentificarPestaña=$datos[0];

		$d['montototal']=$_SESSION[$tnIdentificarPestaña.'montototalpagar'];
		$laubicacion=$this->vermiubicacion();
		$_SESSION['gcUbicacion']= $laubicacion->geoplugin_countryName;	
		$d['tnPosicion']= $_SESSION[$tnIdentificarPestaña.'gnPosicion'];
		if(  ($_SESSION['telefono'] != "0" ) &&  ($_SESSION['telefonoDePago'] != "0")  && ($_SESSION['telefono'] > "0" ) && ($_SESSION['telefonoDePago'] > "0")  )
		{
			$var=$_SESSION[$tnIdentificarPestaña.'metododepago'];
			switch ($var) {
				case 1:
					
						
					$d['numeropago']=$_SESSION['telefonoDePago'];
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['Monto']=$_SESSION[$tnIdentificarPestaña.'montototal'];
					$d['Periodo']=$_SESSION[$tnIdentificarPestaña.'periodomes'];
					$d['urlimagenempresa']=$_SESSION[$tnIdentificarPestaña.'urlimagenempresa'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$d['urlimagenbanner']=$_SESSION[$tnIdentificarPestaña.'urlimagenbanner'];
					$d['Simbolo']="Bs";
					$d['tiempo']=$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->TiempoLatencia;
					$d['intentos']=$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->IntentosProcesar;
					$d['EtiquetaBilletera']='Billetera Tigo Money ';
					/*echo '<pre>'; 
					print_r($_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'] );
					echo '</pre>' ;*/
					$this->load->view('pago_rapido/formasdepago/pagotigomoney', $d);

				break;
				case 2:
					$d['numeropago']=$_SESSION['telefonoDePago'];
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['Monto']=$_SESSION[$tnIdentificarPestaña.'montototal'];
					$d['Periodo']=$_SESSION[$tnIdentificarPestaña.'periodomes'];
					$d['urlimagenbanner']=$_SESSION[$tnIdentificarPestaña.'urlimagenbanner'];
					$d['urlimagenempresa']=$_SESSION[$tnIdentificarPestaña.'urlimagenempresa'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$d['tiempo']=$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->TiempoLatencia;
					$d['intentos']=$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->IntentosProcesar;
					$d['EtiquetaBilletera']='Billetera PagoFacil ';
					$d['Simbolo']="Bs";
					
					$this->load->view('pago_rapido/formasdepago/pagobillieterapagofacil', $d);

					//$this->load->view('pago_rapido/formasdepago/pagotigomoney', $d);
				break;
				

				case 4:
						
					$entidades=$this->servicios->genentidadesfinancieras($_SESSION['cliente']);
					$entidadeselegidas=$this->servicios->getultimasutilizadas($_SESSION['cliente']);
					$d['entidadeselegidas']=$entidadeselegidas->values;
					$d['entidades']=$entidades->values;
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$_SESSION[$tnIdentificarPestaña.'entidades']=$entidades->values;
					$d['Simbolo']="Bs";
					$d['Periodo']=$_SESSION[$tnIdentificarPestaña.'periodomes'];
					$d['urlimagenbanner']=$_SESSION[$tnIdentificarPestaña.'urlimagenbanner'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$this->load->view('pago_rapido/formasdepago/pagoqr', $d);
					
				break;
				case 8:
						
					$entidades=$this->servicios->genentidadesfinancieras($_SESSION['cliente']);
					$entidadeselegidas=$this->servicios->getultimasutilizadas($_SESSION['cliente']);
					$d['entidadeselegidas']=$entidadeselegidas->values;
					$d['entidades']=$entidades->values;
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$_SESSION[$tnIdentificarPestaña.'entidades']=$entidades->values;
					$d['Simbolo']="Bs";
					$d['Periodo']=$_SESSION[$tnIdentificarPestaña.'periodomes'];
					$d['urlimagenbanner']=$_SESSION[$tnIdentificarPestaña.'urlimagenbanner'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$this->load->view('pago_rapido/formasdepago/pagoqrbnb', $d);
					
				break;
				
				case 5:
					$d['tiempo']=$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->TiempoLatencia;
					$d['intentos']=$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->IntentosProcesar;
					$transaccion=$this->servicios->get_trancaccionesbcp($_SESSION['cliente']);
					for ($k=0; $k <count($transaccion->values) ; $k++) { 
						
						if($transaccion->values[$k]->ServiceCode=="001"){
							$d['ultimatransacciondebito']=$transaccion->values[$k];
						}
						if($transaccion->values[$k]->ServiceCode=="002"){
							$d['ultimatransaccioncredito']=$transaccion->values[$k];
						}
						
						if($transaccion->values[$k]->ServiceCode=="003"){
							$d['ultimatransaccionsolipago']=$transaccion->values[$k];
						}
						
					}	
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$d['Simbolo']="Bs";
					
					$this->load->view('pago_rapido/formasdepago/pagoconbcp', $d);
				break;
				case 6:
					$transaccion=$this->servicios->get_trancaccioneslinkser($this->session->userdata('cliente'));
					$d['tntransaccionpago']=@$transaccion->values[0]->TransaccionDePago;
					$d['Tarjeta']=@$transaccion->values[0]->Tarjeta;
					$d['Año']=substr(@$transaccion->values[0]->PeriodoExpiracion, 0, 4);
					$d['Mes']=substr(@$transaccion->values[0]->PeriodoExpiracion, 4, 6);
					$d['CVV']=@$transaccion->values[0]->CVV;
					$d['TarjetaHabiente']=@$transaccion->values[0]->TarjetaHabiente;
					
					$d['recarga']=$_SESSION[$tnIdentificarPestaña.'idempresa'];		
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$this->load->view('pago_rapido/formasdepago/pagoconelinkser', $d);
				break;
				
				case 7:
					
					$d['tiempo']=  $_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->TiempoLatencia;
					$d['intentos']= $_SESSION[$tnIdentificarPestaña.'metodopagoelegido']->IntentosProcesar;
					
					$transaccion=$this->servicios->get_trancaccionesbcp($_SESSION['cliente']);
					for ($k=0; $k <count($transaccion->values) ; $k++) { 
						
						if($transaccion->values[$k]->ServiceCode=="001"){
							$d['ultimatransacciondebito']=$transaccion->values[$k];
						}
						if($transaccion->values[$k]->ServiceCode=="002"){
							$d['ultimatransaccioncredito']=$transaccion->values[$k];
						}
						
						if($transaccion->values[$k]->ServiceCode=="003"){
							$d['ultimatransaccionsolipago']=$transaccion->values[$k];
						}
						
					}
					$d['clienteempresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					
					$d['Simbolo']=  "Bs"  ;//$_SESSION[$tnIdentificarPestaña.'Simbolo'];
					$d['urlimagenbanner']= base_url()."application/assets/assets/media/image/metodosdepago/bcp/banner_soli.png"; //$_SESSION[$tnIdentificarPestaña.'urlimagenbanner'];
					$d['numeropago']=$_SESSION[$tnIdentificarPestaña.'telefonoDePago'];								
					//$this->cargarlogbasico("llego prepararpago--".json_encode($d));
					$this->load->view('pago_rapido/formasdepago/pagosolipago', $d);
				break;
				

				
				case 9:
			
					$d['Simbolo']="Bs" ;//  $_SESSION[$tnIdentificarPestaña.'Simbolo'];
					$lapaises=$this->servicios->getpaises(1);
					$d['paises']=@$lapaises->values;
					$totalmonto=$_SESSION[$tnIdentificarPestaña.'montototal'] + $_SESSION[$tnIdentificarPestaña.'montocomision'];
					$laServicioCybersource=$this->servicios->cybersourseinit(true, $totalmonto ,9  );
	
					$this->cargarlog("laServicioCybersource-".json_encode($laServicioCybersource));
					$d['result']=@$laServicioCybersource;
					$d['tnCliente']=$_SESSION['cliente'];
					$d['tnEmpresa']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$d['tcCodigoClienteEmpresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['tnMetodoPago']=$_SESSION[$tnIdentificarPestaña.'metododepago'];
					$d['tnFactura']=$_SESSION[$tnIdentificarPestaña.'nrofactura'];
					
					$d['Simbolo']=  "Bs";//$_SESSION[$tnIdentificarPestaña.'Simbolo'];
					
					$d['Moneda']= 2 ;//;$_SESSION[$tnIdentificarPestaña.'Moneda'];
					$d['tcPeriodo'] = $_SESSION[$tnIdentificarPestaña.'periodomes'];
					
					$d['tnpedidocheckout']= 0 ;//$_SESSION[$tnIdentificarPestaña.'tnpedidocheckout'];
					$d['tcMonto']=$_SESSION[$tnIdentificarPestaña.'montototal'];
					$d['Sigla']="Bs";//$_SESSION[$tnIdentificarPestaña.'Sigla'];; //$_SESSION[$tnIdentificarPestaña.'Simbolo'];
					$d['tcComision']=$_SESSION[$tnIdentificarPestaña.'montocomision'];
					$d['tnCiNit']=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
					/// datos pallenar el formulario 
					$d['tnTelefono']= $this->session->userdata('telefonoDePago');
					$d['tcCorreo']=$this->session->userdata('correo');	

					$d['tnPais']= $_SESSION[$tnIdentificarPestaña.'pais'];
					
					
					for ($i=0; $i < count($d['paises']) ; $i++) { 
						//echo $d['paises'][$i]->Pais ."---".$d['tnPais'] ."]";; 
						if($d['paises'][$i]->Pais == $d['tnPais'] )
						{
							$d['tcPais']=$d['paises'][$i]->Code2."-".$d['tnPais'];
						}
						# code...
					}

					$d['tnCiudad']= $_SESSION[$tnIdentificarPestaña.'ciudad'];
					
					$d['tcDireccion']= $this->session->userdata('direccion');
					$d['tnCodigopostal']= "0000"; //
					$d['tnCinNit']=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
					
				
					$this->load->view('pago_rapido/formasdepago/pagoatc', $d);
				break;
				

				case 10:
			
					$d['Simbolo']="Bs" ;//  $_SESSION[$tnIdentificarPestaña.'Simbolo'];
					$lapaises=$this->servicios->getpaises(1);
					$d['paises']=@$lapaises->values;
					$totalmonto=$_SESSION[$tnIdentificarPestaña.'montototal'] + $_SESSION[$tnIdentificarPestaña.'montocomision'];
					$laServicioCybersource=$this->servicios->cybersourseinit(true, $totalmonto ,10  );
	
					$this->cargarlog("laServicioCybersource-".json_encode($laServicioCybersource));
					$d['result']=@$laServicioCybersource;
					$d['tnCliente']=$_SESSION['cliente'];
					$d['tnEmpresa']=$_SESSION[$tnIdentificarPestaña.'idempresa'];
					$d['tcCodigoClienteEmpresa']=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
					$d['tnMetodoPago']=$_SESSION[$tnIdentificarPestaña.'metododepago'];
					$d['tnFactura']=$_SESSION[$tnIdentificarPestaña.'nrofactura'];
					
					$d['Simbolo']=  "Bs";//$_SESSION[$tnIdentificarPestaña.'Simbolo'];
					
					$d['Moneda']= 2 ;//;$_SESSION[$tnIdentificarPestaña.'Moneda'];
					$d['tcPeriodo'] = $_SESSION[$tnIdentificarPestaña.'periodomes'];
					
					$d['tnpedidfcocheckout']= 0 ;//$_SESSION[$tnIdentificarPestaña.'tnpedidocheckout'];
					$d['tcMonto']=$_SESSION[$tnIdentificarPestaña.'montototal'];
					$d['Sigla']="Bs";//$_SESSION[$tnIdentificarPestaña.'Sigla'];; //$_SESSION[$tnIdentificarPestaña.'Simbolo'];
					$d['tcComision']=$_SESSION[$tnIdentificarPestaña.'montocomision'];
					$d['tnCiNit']=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
					/// datos pallenar el formulario 
					$d['tnTelefono']= $this->session->userdata('telefonoDePago');
					$d['tcCorreo']=$this->session->userdata('correo');	

					$d['tnPais']= null ; // $_SESSION[$tnIdentificarPestaña.'pais'];
					
					
					for ($i=0; $i < count($d['paises']) ; $i++) { 
						//echo $d['paises'][$i]->Pais ."---".$d['tnPais'] ."]";; 
						if($d['paises'][$i]->Pais == $d['tnPais'] )
						{
							$d['tcPais']=$d['paises'][$i]->Code2."-".$d['tnPais'];
						}
						# code...
					}

					$d['tnCiudad']= $_SESSION[$tnIdentificarPestaña.'ciudad'];
					
					$d['tcDireccion']= $this->session->userdata('direccion');
					$d['tnCodigopostal']= "0000"; //
					$d['tnCinNit']=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
					$this->load->view('pago_rapido/formasdepago/pagoatc', $d);
				break;

				default:
				$this->load->view('endesarrollo', $d);
			}
		}else{
		
			
			$d['nombre']=$_SESSION['nombre'];
			$d['apellido']=$_SESSION['apellido'];
			$d['direccion']=$_SESSION['direccion'];
			$d['telefono']=   ( $_SESSION['telefono'] >0   ) ? @$_SESSION['telefono'] : 0;
			$d['telefonoDePago']=  ( $_SESSION['telefonoDePago'] >0   ) ? @$_SESSION['telefonoDePago'] : 0;  
			
			$d['cinit']=$_SESSION['cinit'];
			$d['facturaa']=$_SESSION['facturaa'];
			$d['mensajetelefono']="falta introducir el Nro de celular de cuenta de usuario y el Nro de celular de pago ";
			
			
			

			$this->load->view('auth/formularioedicion', $d);

		}

			
	

	}
	public function generarqr()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$laEntidadesElegidas=$this->input->post("datos");
		$tnIdentificarPestaña=$this->input->post("tnIdentificarPestaña");
		$_SESSION[$tnIdentificarPestaña.'laEntidadesElegidas']=$laEntidadesElegidas;
		$tnCliente=$_SESSION['cliente'];
		$tnEmpresa=$_SESSION[$tnIdentificarPestaña.'idempresa'];;
		$tcCodigoClienteEmpresa = $_SESSION[$tnIdentificarPestaña.'codigofijo'];
		$tnMetodoPago =$_SESSION[$tnIdentificarPestaña.'metododepago'];
		$tnTelefono = null;
		$tcFacturaA = ( $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa']!="" ) ? $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] : "usuario leo ";    ;
		$tnCiNit = ( $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa']!="" ) ? $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] : "1234";  
		$tcNroPago = $_SESSION[$tnIdentificarPestaña.'nrofactura'];
		$tnMontoClienteEmpresa=$_SESSION[$tnIdentificarPestaña.'montototal'];
		$tnMontoClienteSyscoop =$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$tcPeriodo=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$tcImei =  $_SESSION[$tnIdentificarPestaña.'imei'];
		$taFacturas= 	$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientesoficial'] ;
		$laDatosSintesis=array();
		if(isset($_SESSION[$tnIdentificarPestaña.'IdOperativo']) && !is_null($_SESSION[$tnIdentificarPestaña.'IdOperativo'])  )
		{
			
			$laDatosSintesis["CuentaCliente"]=$tcCodigoClienteEmpresa  ; 
			$laDatosSintesis["idOperativo"]= $_SESSION[$tnIdentificarPestaña.'IdOperativo'] ; 
			$laDatosSintesis["nroOperacion"]= $_SESSION[$tnIdentificarPestaña.'NroOperacion']   ; 
			$laDatosSintesis["FechaOperativa"]= $_SESSION[$tnIdentificarPestaña.'FechaOperativa'] ; 
			$laDatosSintesis["Servicio"]= $_SESSION[$tnIdentificarPestaña.'Servicio']  ; 
			$laDatosSintesis["DirEnvio"]=""  ; 
			$laDatosSintesis["Monto"]=$tnMontoClienteEmpresa + $tnMontoClienteSyscoop  ; 
			$laDatosSintesis["NroItem"]=$_SESSION[$tnIdentificarPestaña.'gaDetallePago'][0] ; 
			$laDatosSintesis["NitFact"]=$tnCiNit  ; 

			
		}
		
		/*if($tcNroPago!=0)
		{
		$laConsultaFactura=$this->servicios->consultarfacturaempresa( $tnEmpresa, $tcNroPago);
			if( (trim($laConsultaFactura->periodo) != trim($tcPeriodo))  ||   (  floatval($laConsultaFactura->montoTotal) != floatval($tnMontoClienteEmpresa) )  )
			{
				$this->cargarlog("consultar-factura-pendiente".json_encode($laConsultaFactura));
				$tcPeriodo=$laConsultaFactura->periodo;
				$montocomision=$this->servicios->calcularcomision($tnCliente, $_SESSION[$tnIdentificarPestaña.'idempresa'],$tnMetodoPago,$laConsultaFactura->montoTotal);
				$tnMontoClienteEmpresa=$laConsultaFactura->montoTotal;
				$tnMontoClienteSyscoop= $montocomision->values;
			}
		}
		*/
		
		//echo "$tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei ";
		$metodos=$this->servicios->generarqr($tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei ,		$_SESSION[$tnIdentificarPestaña.'laEntidadesElegidas']  , $taFacturas);
		$this->cargarlog("generar qr 1".json_encode($metodos));
		
		
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;

		if($mensajeerror== 0 ){
			if(isset($valor))
			{
				$valores = explode(";", $valor );
				$linkdescarga= base_url()."es/Descargarqr/".$valores[0];
				$this->servicios->GuardarEntidadesBancarias($tnCliente ,$laEntidadesElegidas, $valores[0] );
				$this->guardariptransaccion( $tnCliente , $tnEmpresa , $valores[0]);
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'imagenqr' =>$valores[1],'linkdescarga'=>$linkdescarga ,'tnTransaccion'=>$valores[0]);
			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
			}
		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
		}
		echo json_encode($arreglo);
		
	
	}

	public function generarqrbnb()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$laEntidadesElegidas=$this->input->post("datos");
		$tnIdentificarPestaña=$this->input->post("tnIdentificarPestaña");
		$_SESSION[$tnIdentificarPestaña.'laEntidadesElegidas']=$laEntidadesElegidas;
		$tnCliente=$_SESSION['cliente'];
		$tnEmpresa=$_SESSION[$tnIdentificarPestaña.'idempresa'];;
		$tcCodigoClienteEmpresa = $_SESSION[$tnIdentificarPestaña.'codigofijo'];
		$tnMetodoPago =$_SESSION[$tnIdentificarPestaña.'metododepago'];
		$tnTelefono = null;
		$tcFacturaA = $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] ;
		$tnCiNit = $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
		$tcNroPago = $_SESSION[$tnIdentificarPestaña.'nrofactura'];
		$tnMontoClienteEmpresa=$_SESSION[$tnIdentificarPestaña.'montototal'];
		$tnMontoClienteSyscoop =$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$tcPeriodo=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$tcImei =  $_SESSION[$tnIdentificarPestaña.'imei'];
		$taFacturas= $_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];
		/*
		if($tcNroPago!=0)
		{
			$laConsultaFactura=$this->servicios->consultarfacturaempresa( $tnEmpresa, $tcNroPago);
			if( (trim($laConsultaFactura->periodo) != trim($tcPeriodo))  ||   (  floatval($laConsultaFactura->montoTotal) != floatval($tnMontoClienteEmpresa) )  )
			{
			$this->cargarlog("consultar-factura-pendiente".json_encode($laConsultaFactura));
			$tcPeriodo=$laConsultaFactura->periodo;
			$montocomision=$this->servicios->calcularcomision($tncliente, $_SESSION[$tnIdentificarPestaña.'idempresa'],$tnmetodopago,$laConsultaFactura->montoTotal);
			$tnMontoClienteEmpresa=$laConsultaFactura->montoTotal;
			$tnMontoClienteSyscoop= $montocomision->values;
			}
		}

		*/
		$metodos=$this->servicios->generarqrbnb($tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei , $_SESSION[$tnIdentificarPestaña.'laEntidadesElegidas'] , $taFacturas );
		$this->cargarlog("generar qr bnb ".json_encode($metodos));
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;

		if($mensajeerror== 0 ){
			if(isset($valor))
			{
				$valores = explode(";", $valor );
				$linkdescarga= base_url()."es/Descargarqr/".$valores[0];
				$this->servicios->GuardarEntidadesBancarias($tnCliente ,$laEntidadesElegidas, $valores[0] );
				$this->guardariptransaccion( $tnCliente , $tnEmpresa , $valores[0]);
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'imagenqr' =>$valores[1],'linkdescarga'=>$linkdescarga ,'tnTransaccion'=>$valores[0]);
			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
			}
		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
		}
		echo json_encode($arreglo);
	
	}
	
	public function getultimaselegidas()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['entidadeselegidas']=$_SESSION['laEntidadesElegidas'];
		for ($i=0; $i < count($d['entidadeselegidas']) ; $i++) { 
			//echo `<img style="width:100px; height:40px" src=" " alt="">"`;
			for ($j=0; $j < count($_SESSION['entidades']) ; $j++) { 
				if($_SESSION['entidades'][$j]->EntidadBancaria  ==$d['entidadeselegidas'][$i])
				{
					echo "<img id='img-".$j."' style='width:60px; height:20px' src='".$_SESSION['entidades'][$j]->UrlImagen."' >";
				}
			}

		}
		
		
	}


	public function prepararpago()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);

	}

	
	public function metodoprepararpagobcp()
	{
		$datos=$this->input->post("datos");
		$tnIdentificarPestaña=$datos[0];

		$ci=$datos["ci"];
		$complemento=$datos["complemento"];
		$extension=$datos["extension"];
		$fechaexpiracion=$datos["fechaexpiracion"];
		$codigoservicio=$datos["codigoservicio"];
		
		 $tncliente=$_SESSION['cliente'];
		 $tnempresa = $_SESSION[$tnIdentificarPestaña.'idempresa'];
		 $codigoclienteempresa=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
		 $tnmetodopago= $_SESSION[$tnIdentificarPestaña.'metododepago'];

		$tnTelefono =  (($datos['numbersoli']==''))? null : $datos['numbersoli'] ;
		 
		$tcFacturaA= $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] ;//'el nombre del cliente ';//$_SESSION[$tnIdentificarPestaña.'CLIENTE'];
		$tnCiNit = ( $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa']!="" ) ? $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] : "1234";  
	
		$tnCiBcp=$ci;
		$tcNroPago=$_SESSION[$tnIdentificarPestaña.'nrofactura'];
		$tnMontoClienteEmpresa=$_SESSION[$tnIdentificarPestaña.'montototal'];
		$tnMontoClienteSyscoop =$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$tcPeriodo=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$tcImei= $_SESSION[$tnIdentificarPestaña.'imei']  ;//$_SESSION[$tnIdentificarPestaña.'imei'];
		$tcExtension=$extension ;
		$tcComplement= (($complemento==''))? null : $complemento; //$complemento;  //(!isset($tcComplement))? null : $tcComplement; // $complemento;
		$tcServiceCode=$codigoservicio;
		$tcExpireDate =$fechaexpiracion;
		$taFacturas= $_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];
		/*	 
			if($tcNroPago!=0)
			{
				$laConsultaFactura=$this->servicios->consultarfacturaempresa( $tnempresa, $tcNroPago);

				if( (trim($laConsultaFactura->periodo) != trim($tcPeriodo))  ||   (  floatval($laConsultaFactura->montoTotal) == floatval($tnMontoClienteEmpresa) )  )
				{
					$this->cargarlog("consultar-factura-pendiente".json_encode($laConsultaFactura));
					$tcPeriodo=$laConsultaFactura->periodo;
					$montocomision=$this->servicios->calcularcomision($tncliente, $_SESSION[$tnIdentificarPestaña.'idempresa'],$tnmetodopago,$laConsultaFactura->montoTotal);
					$tnMontoClienteEmpresa=$laConsultaFactura->montoTotal;
					$tnMontoClienteSyscoop= $montocomision->values;
				}
			}
		*/
		$metodos=$this->servicios->prepararpago($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcExtension , $tcComplement  , $tcServiceCode , $tcExpireDate , $taFacturas , $tnCiBcp );
		$this->cargarlog("prepararpagobcp".json_encode($metodos));
					$mensajeerror=$metodos->error ;
					$valor= $metodos->values;
					if($mensajeerror== 0 ){
						if(isset($valor))
						{
							//donde 555 es el numero de transaccion que se creo y 666 el codigo de autorizacion de BCP
							$valores = explode(";", $valor );
							//print_r($valores);
							$_SESSION[$tnIdentificarPestaña.'numerodetransaccion']=$valores[0];
							$_SESSION[$tnIdentificarPestaña.'numeroautorizacion']=$valores[1];
							$this->guardariptransaccion( $tncliente , $tnempresa , $valores[0]);
							$arreglo=array('mensaje' => $metodos->message, 'mensajemodal'=>$metodos->messageSistema, 'tipo' => 10 );
							

						}else{
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
						}

					}else{
						$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
					}
		echo json_encode($arreglo);
	}
	public function confirmarpagobcp()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$datos=$this->input->post("datos");
		$tnIdentificarPestaña=$datos[0];
		$tnCliente=$_SESSION['cliente'];
		$tnEmpresa=$_SESSION[$tnIdentificarPestaña.'idempresa'];
		$tnAuthorizationNumber=$_SESSION[$tnIdentificarPestaña.'numeroautorizacion'];
		$tnCorrelationId=  $_SESSION[$tnIdentificarPestaña.'numerodetransaccion'];
		$tcOTP=$datos["codigo"];
		$metodos=$this->servicios->bcpconfirmarpago($tnCliente,$tnEmpresa , $tnAuthorizationNumber,$tnCorrelationId , $tcOTP );
		$this->cargarlog("estollegodeconfirmar".json_encode($metodos));
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		

		if($mensajeerror== 0 ){
			if(!isset($valor))
			{
				
				$this->servicios->finalizarpago($tnCliente ,$tnAuthorizationNumber);
					$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'tnTransaccion'=>$tnAuthorizationNumber );

			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values  );
			}

		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
		}
		echo json_encode($arreglo);
	}

	public function pagarelinkser()
	{
		$datos=$this->input->post("datos");
		// aqui van los datos de  el formulario elinkser 
		//nrotarjeta:nrotarjeta, nombretarjeta:nombretarjeta, fechaexpiracion:fechaexpiracion , codigoseguridad :codigoseguridad  };
		$resultado=str_replace('-', '', $datos["nrotarjeta"]);
		 $tcTarjeta = $resultado;
		//echo $resultado."---".$tcTarjeta;
		$tcTarjetaHabiente= $datos['nombretarjeta'];
		$tcCodigoSeguridad = $datos['codigoseguridad'];
		$tcFechaExpiracion = $datos['fechaexpiracion'];
		// aqui son los datos que tengo recolectados
		
		 $tncliente=$_SESSION['cliente'];
		 $tnempresa = $_SESSION['idempresa'];
		 $codigoclienteempresa=$_SESSION['codigofijo'];
		 $tnmetodopago= $_SESSION['metododepago'];

		$tnTelefono =  null  ;  //(($datos['numbersoli']==''))? null : $datos['numbersoli'] ;
		 
		$tcFacturaA= $_SESSION['nombreclienteempresa'] ;//'el nombre del cliente ';//$_SESSION['CLIENTE'];
		 $tnCiNit=$_SESSION['cionitclienteempresa'];
		 $tcNroPago=$_SESSION['nrofactura'];
		 $tnMontoClienteEmpresa=$_SESSION['montototal'];
		 $tnMontoClienteSyscoop =$_SESSION['montocomision'];
		 $tcPeriodo=$_SESSION['periodomes'];
		 $tcImei= $_SESSION['imei'] ;//$_SESSION['imei'];
		 $laConsultaFactura=$this->servicios->consultarfacturaempresa( $tnempresa, $tcNroPago);
		
		 if($tcNroPago!=0)
		 {
				if( (trim($laConsultaFactura->periodo) != trim($tcPeriodo))  ||   (  floatval($laConsultaFactura->montoTotal) != floatval($tnMontoClienteEmpresa) )  )
				{
				$this->cargarlog("consultar-factura-pendiente".json_encode($laConsultaFactura));
				$tcPeriodo=$laConsultaFactura->periodo;
				$montocomision=$this->servicios->calcularcomision($tncliente, $_SESSION['idempresa'],$tnmetodopago,$laConsultaFactura->montoTotal);
				$tnMontoClienteEmpresa=$laConsultaFactura->montoTotal;
				$tnMontoClienteSyscoop= $montocomision->values;
				}
		 }

		$metodos=$this->servicios->ejecuparpagoelinkser($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcTarjeta , $tcTarjetaHabiente  , $tcCodigoSeguridad , $tcFechaExpiracion );
		$this->cargarlog("ejecutarlinkser".json_encode($metodos));

					$mensajeerror=$metodos->error ;
					$valor= $metodos->values;
					if($mensajeerror== 0 ){
						if(isset($valor))
						{
							$valores = explode(";", $valor );
							//print_r($valores);
							$tntransaccion=$valores[0];
							$this->servicios->finalizarpago($tncliente ,$tntransaccion);
							$this->guardariptransaccion( $tncliente , $tnempresa , $valores[0]);
						
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );
						}else{
							
							$this->guardariptransaccion( $tncliente , $tnempresa , @$metodos->values);
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
						}

					}else{
						$valores = explode(";", $valor );
						$this->guardariptransaccion( $tncliente , $tnempresa ,$valores[0]);
						$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $valores[0]);
					}
					echo json_encode($arreglo);
	
	}

	public function actualizardatosusuario()
	{
		parse_str($this->input->post("datos"), $nuevodato);

		$tnCliente =$_SESSION['cliente'];
		$tcNombre=$nuevodato['inpnombre'];
		$tcApellido= $nuevodato['inpapellido'];
		$tcDireccion= $nuevodato['inpdireccion'];
		$tcCinit  =$nuevodato['inpcinit'];
		$tcFacturaA= $nuevodato['inprazon'];
		$tnTelefono =$nuevodato['inpnumero'];
		$tnTelefonoDePago=$nuevodato['inpnumeropago'];
		$metodos=$this->servicios->actualizardatospagofacil($tnCliente , $tcNombre  , $tcApellido , $tcDireccion , $tcCinit , $tcFacturaA , $tnTelefono , $tnTelefonoDePago);
		
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		if($mensajeerror== 0 ){
			if(isset($valor))
			{
				$_SESSION['nombre']=$nuevodato['inpnombre'];
				$_SESSION['apellido']=$nuevodato['inpapellido'];
				$_SESSION['direccion']=$nuevodato['inpdireccion'];
				$_SESSION['telefono']=$nuevodato['inpnumero'];
				$_SESSION['telefonoDePago']=$nuevodato['inpnumeropago'];
				$_SESSION['cinit']=$nuevodato['inpcinit'];
				$_SESSION['facturaa']=$nuevodato['inprazon'];
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );
			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 );
			}

		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 );
		}
		echo json_encode($arreglo);

	
	}


	public function endesarrollo()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('endesarrollogral', $d);
	}
	public function get_periodo($cadena)
	{
		$cadenanueva=substr($cadena, 0, 7);
		$porciones = explode("-", $cadenanueva);
		$arraymeses=["01"=> "ENE" ,"02"=> "FEB" ,"03"=> "MAR"  ,"04"=> "ABR" ,"05"=> "MAY"  ,"06"=> "JUN"  ,"07"=>"JUL"  ,"08"=>"AGO"  ,"09"=> "SEP" ,"10"=> "OCT" ,"11"=>"NOV"  ,"12"=> "DIC"  ];
		return $porciones[0]."-".$arraymeses[$porciones[1]];
	}
	public function finalizartransaccion($tncliente,$tntransaccion)
	{
		$metodos=$this->servicios->finalizarpago($tncliente ,$tntransaccion);
						
				echo	"<pre>";
					print_r($metodos);
					print_r($metodos->error);
					print_r($metodos->message);
					print_r($metodos->values);
					
					echo "</pre>";
	}

	public function pagarportigomoney()
	{
		
		// aqui son los datos que tengo recolectados
		$datos=$this->input->post("datos");
		$tnIdentificarPestaña=$datos[0];
		$tnTelefono = $datos['tnNumeroTigoMoney'];
		 $tncliente=$_SESSION['cliente'];
		 $tnempresa = $_SESSION[$tnIdentificarPestaña.'idempresa'];

		 $codigoclienteempresa= $_SESSION[$tnIdentificarPestaña.'codigofijo'];
		 $tnmetodopago= $_SESSION[$tnIdentificarPestaña.'metododepago'];

		//$tnTelefono = $_SESSION[$tnIdentificarPestaña.'telefonoDePago'];  ; 
		$tcFacturaA= $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] ;
		 $tnCiNit=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
		 $tcNroPago=$_SESSION[$tnIdentificarPestaña.'nrofactura'];
		 $tnMontoClienteEmpresa=$_SESSION[$tnIdentificarPestaña.'montototal'];
		 $tnMontoClienteSyscoop =$_SESSION[$tnIdentificarPestaña.'montocomision'];
		 $tcPeriodo=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		 $tcImei= $_SESSION[$tnIdentificarPestaña.'imei'] ;
		 $taFacturas= $_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];
	//	 $laConsultaFactura=$this->servicios->consultarfacturaempresa( $tnempresa, $tcNroPago);
		 //$this->cargarlog("Antesdepagar ".json_encode($_SESSION));
		 /*if($tcNroPago!=0)
		{
			if( (trim($laConsultaFactura->periodo) != trim($tcPeriodo))  ||   (  floatval($laConsultaFactura->montoTotal) != floatval($tnMontoClienteEmpresa) )  )
			{
				$this->cargarlog("consultar-factura-pendiente-si entro aqui significa que hay algun error mal ".json_encode($laConsultaFactura));
				$tcPeriodo=$laConsultaFactura->periodo;
				$montocomision=$this->servicios->calcularcomision($tncliente, $_SESSION[$tnIdentificarPestaña.'idempresa'],$tnmetodopago,$laConsultaFactura->montoTotal);
				$tnMontoClienteEmpresa=$laConsultaFactura->montoTotal;
				$tnMontoClienteSyscoop= $montocomision->values;
			}
		}*/
		try {
				$metodos=$this->servicios->realizarpagotigo($tncliente  , $tnempresa ,$codigoclienteempresa , $tnmetodopago , $tnTelefono, $tcFacturaA,  $tnCiNit, $tcNroPago , $tnMontoClienteEmpresa ,  $tnMontoClienteSyscoop , $tcImei ,$tcPeriodo , $taFacturas ) ;
				@$this->cargarlog("estollegodetigo".json_encode($metodos));
				$mensajeerror=$metodos->error ;
				$valor= $metodos->values;
				if($mensajeerror== 0 ){
					if(isset($valor))
					{
						//$valores=$valor['transaccionDePago'];
						if($tnmetodopago==1){
							// entro por tigo money
							@$this->guardariptransaccion( $tncliente , $tnempresa , $valor);
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'valor'=> $metodos->values , 'tnTransaccion' => $valor );
							@$laGuardarTransaccionPago=$this->servicios->GuardarTransaccionPago($tncliente , $valor ,$_SESSION[$tnIdentificarPestaña.'gnTelefonooEnvio'] , $_SESSION[$tnIdentificarPestaña.'gnCorreoEnvio']   );
							@$this->cargarlog("laGuardarTransaccionPago  tigo money ".json_encode($laGuardarTransaccionPago));
							
						}else{
							//entro por billetera 	
							$valortransaccion=@$valor->transaccionDePago;
							@$this->guardariptransaccion( $tncliente , $tnempresa , $valortransaccion);
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'valor'=> $metodos->values , 'tnTransaccion' => $valortransaccion );
							@$laGuardarTransaccionPago=$this->servicios->GuardarTransaccionPago($tncliente , $valortransaccion ,$_SESSION[$tnIdentificarPestaña.'gnTelefonooEnvio'] , $_SESSION[$tnIdentificarPestaña.'gnCorreoEnvio']   );
							@$this->cargarlog("laGuardarTransaccionPago billetera".json_encode($laGuardarTransaccionPago));
						}	
					}else{
						if($tnmetodopago==1){
							@$this->guardariptransaccion( $tncliente , $tnempresa , @$valor);
						}else{
							$valortransaccion=@$valor->transaccionDePago;
							@$this->guardariptransaccion( $tncliente , $tnempresa , @$valortransaccion);
						}
						$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values );
					}
				}else{
					$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> @$metodos->values);
				}
		} catch (\Throwable $th) {
			//throw $th;
			$this->cargarlog("Error al pagar por tigo money o billetera ".json_encode($th->getMessage()  )   );
			$arreglo=array('mensaje' => "Ocurrio un error al procesar la solicitud", 'tipo' => 1 , 'valor'=> @$metodos->values);
		}
		 
		echo json_encode($arreglo);
	}

	public function pagarporatc()
	{
		
		// aqui son los datos que tengo recolectados
		
		$datos=$this->input->post();
		$tncliente=$_SESSION['cliente'];
		$tnIdentificarPestaña=$datos[0];
		$taFacturas= $_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];
		$datos["taDetallePago"]=$taFacturas ;
		$metodos=$this->servicios->realizarpagoatc($datos ) ;
	 	$this->cargarlog("realizarpagoatc ".json_encode($metodos));
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		if($mensajeerror== 0 ){
			if(isset($valor))
			{
				//$valores = explode(";", $valor );
				//print_r($valores);
				$tntransaccion=$valor;
				$this->servicios->finalizarpago($tncliente ,$tntransaccion);
				$this->guardariptransaccion( $tncliente , $_SESSION[$tnIdentificarPestaña.'idempresa'] , $valor);
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'valor'=> $metodos->values ,  'tnTransaccion'=>$valor);
			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
			}
			

		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
		}
		echo json_encode($arreglo);
		
					
					
	}

	
	public function verificartransacciontigo()
	{
		// aqui son los datos que tengo recolectados
		$datos=$this->input->post("datos");
		$tnIdentificarPestaña=$datos[0];

		$tncliente=$_SESSION['cliente'];
		$tnempresa = $_SESSION[$tnIdentificarPestaña.'idempresa'];
		$tnTransaccionDePago= $datos['transaccion'];
		$metodos=$this->servicios->consultarestadodetransaccion( $tncliente,$tnempresa,$tnTransaccionDePago);
		$this->cargarlog("verificartransacciontigomoney".json_encode($metodos));

		$mensajeerror=$metodos->error ;
		 $valor= $metodos->values;
					   if(isset($valor))
					   {
							$estadotigo =$valor->estadoPago;
							/*0= correcto
							1=incorrecto
							3=en progreso*/
							if($estadotigo==0)
							{
								// se hizo el pago correctamente
								$finalizarpago= $this->servicios->finalizarpago($tncliente ,$tnTransaccionDePago);
								$this->cargarlog("finalizarpago".json_encode($finalizarpago));
								$arreglo=array('mensaje' => $metodos->message, 'tipo' => 0 );

							}
							if($estadotigo==1)
							{
								//se hizo el pago incorrectamente
							//	$this->servicios->finalizarpago($tncliente ,$tnTransaccionDePago);
								$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 );

							}
							if($estadotigo==3)
							{
								//sigue 
								$arreglo=array('mensaje' => $metodos->message, 'tipo' => 3 );

							}
							



						   //$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );



					   }else{
						   $arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
					   }

				  
				   echo json_encode($arreglo);





	}

	public function vysorpdf()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$idcliente=3859;    //$this->session->userdata('cliente');
		$codigo_fijo=4000;  //$datos['codigofijo'];
		$id_empresa=3;  //$datos['idempresa'];
		$factura= '2008-11';  // $datos['idfactura'];	
		$idcliente=$this->session->userdata('cliente');
		$empresadetalle=$this->servicios->getempresasimple($id_empresa ,$idcliente);
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		//$factura="2020-02";//$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura,$idcliente);




		/*		echo "<pre>";
				print_r($empresadetalle);
				print_r($lista);
				echo "</pre>"; 
		*/
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		$fileToDownload = $cadena;
		$fichero = $_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/factura-'.$factura.'.pdf';
		//$fichero ='/web_pago_facil/application/assets/documentospdf/factura-2008-03.pdf';
		
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		//file_put_contents($fichero, $fileToDownload);
		file_put_contents($fichero, $fileToDownload);
		$d['documentopdf']=$fichero;
		$this->load->view('pagosrealizados/vysorpdf', $d);

	

	



	}
	public function pagosrealizados($lan,$tnEmpresa)	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente=$this->session->userdata('cliente');
	
		
		$codigoservicio=$this->servicios->getcodigosservicio($tnCliente, $tnEmpresa);

		$metodopagoaux=$this->servicios->getmetodospago($tnCliente);
		$d["metodosdepago"]=$metodopagoaux->values;
		$d['codigoservicio']=$codigoservicio->values;
		$_SESSION['codigoservicio']=$codigoservicio->values;
		$d['empresa']=$tnEmpresa;
		$empresaspagadas=$this->servicios->getempresaspagadasfrecuentes($_SESSION['cliente']);
		$_SESSION['empresaspagadas']=$empresaspagadas->values;
		for ($L=0; $L <count($_SESSION['empresaspagadas']) ; $L++) { 
			if($_SESSION['empresaspagadas'][$L]->nEmpresa==$tnEmpresa)
			{
				$_SESSION['Nombreempresapagada']= $_SESSION['empresaspagadas'][$L]->cDescripcion;
				$_SESSION['iconoempresapagada']= $_SESSION['empresaspagadas'][$L]->cUrl_icon;
			}
		}


		$this->load->view('pagosrealizados/index', $d);

	}


	public function listapagosrealizados()	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente=$this->session->userdata('cliente');
		$tnEmpresa=$this->input->post('Empresa');
		$codigoservicio=$this->servicios->getcodigosservicio($tnCliente, $tnEmpresa);

		$metodopagoaux=$this->servicios->getmetodospago($tnCliente);
		$d["metodosdepago"]=$metodopagoaux->values;
		$d['codigoservicio']=$codigoservicio->values;
		$_SESSION['codigoservicio']=$codigoservicio->values;
		$d['empresa']=$tnEmpresa;
		$empresaspagadas=$this->servicios->getempresaspagadasfrecuentes($_SESSION['cliente']);
		$_SESSION['empresaspagadas']=$empresaspagadas->values;
		for ($L=0; $L <count($_SESSION['empresaspagadas']) ; $L++) { 
			if($_SESSION['empresaspagadas'][$L]->nEmpresa==$tnEmpresa)
			{
				$_SESSION['Nombreempresapagada']= $_SESSION['empresaspagadas'][$L]->cDescripcion;
				$_SESSION['iconoempresapagada']= $_SESSION['empresaspagadas'][$L]->cUrl_icon;
			}
		}
		$this->load->view('pagosrealizados/listapagosrealizados', $d);

	}
	
	public function facturaspagadas()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post('datos');
		$tnCliente=$this->session->userdata('cliente');
		$tnEmpresa=$datos['codigoempresa'];
		$tcCodigoClienteEmpresa = $datos['codigocliente'];
		$_SESSION['codigoempresa']=$datos['codigoempresa'];
		$_SESSION['codigoclientefacturas']= $datos['codigocliente'];
		
		for ($L=0; $L <count($_SESSION['codigoservicio']) ; $L++) { 
			if($_SESSION['codigoservicio'][$L]->codigoClienteEmpresa==$tcCodigoClienteEmpresa)
			{
				$_SESSION['nombreclientepagada']= $_SESSION['codigoservicio'][$L]->alias;
				$_SESSION['codigoclientepagada']= $_SESSION['codigoservicio'][$L]->codigoClienteEmpresa;
			}
		}
		$d['nombreempresa']=$_SESSION['Nombreempresapagada'];

		$facturaspagadas=$this->servicios->getfacturaspagadas( $tnCliente, $tnEmpresa ,$tcCodigoClienteEmpresa );
		$d['codigocliente']=$_SESSION['codigoclientepagada'];
		$d['nombrecliente']=$_SESSION['nombreclientepagada'];
		$d['numerofacturas']= count($facturaspagadas->values);
		$d['urliconoempresapagada']=$_SESSION['iconoempresapagada'];
		
		$d['facturaspagadas'] =$facturaspagadas->values;

		
		$etiquetas=$this->servicios->get_etiquetas($tnCliente);
	
		for ($i=0; $i < count($etiquetas->values); $i++) { 
			if($etiquetas->values[$i]->Empresa == $tnEmpresa) 
			{
				$d['etiquetas']=$etiquetas->values[$i];

			}
		}
		
	//	echo "<pre>";
		//print_r($_SESSION);
	//	print_r($etiquetas);
	//	print_r($d['etiquetas']);
		//echo "</pre>";  
		$this->load->view('pagosrealizados/facturaspagadas', $d);
	}

	public function veraviso()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$idcliente=$this->session->userdata('cliente');
		$codigo_fijo=$_SESSION['codigoclientefacturas'];
		$id_empresa=$_SESSION['codigoempresa'];
		$factura= $this->get_periodo_inversa($datos['idfactura']);	
		$empresadetalle=$this->servicios->getempresasimple($id_empresa ,$idcliente);
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		//$factura="2020-02";//$datos["periodo"];//periodo
		$tnTipo=$datos['tipo'];	
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura,$idcliente);
		$this->cargarlog("getavisofacturames".json_encode($lista));
		/*
		echo "<pre>";
		echo $datos['idfactura'];
		print_r($empresadetalle);
		print_r($lista);
		echo "</pre>"; 
		*/
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena;
			$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena;
		//	$fichero = $_SERVER["DOCUMENT_ROOT"].'/web_pago_facil/application/assets/documentospdf/factura-'.$factura.'.pdf';
		$fichero =$_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/factura-'.$idcliente.$factura.date('y-m-d--H:i:s').'.pdf';
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/online/application/assets/documentospdf/factura-'.$idcliente.$factura.date('y-m-d--H:i:s').'.pdf';
		$d['documentopdf']=$fichero2;
		//$this->load->view('pagosrealizados/vysorpdf', $d);
		if($tnTipo==1){
			//si es uno demo mostrar normal 
			$this->load->view('pagosrealizados/vysorpdf', $d);
		}else{
			//si es distinto de uno se debe mostrar la url de googledrive
			$d['urlweb']='https://docs.google.com/gview?embedded=true&url=https://pagofacil.com.bo/'.$d['documentopdf'] ;
			//echo $taData['urlweb'];
			$this->load->view('pagosrealizados/vistaiframepdf', $d);
		}
	}

	public function verfacturapagofacil()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$datos['transaccion'];
		$tnEmpresa=$datos['codigoempresa'];
		$tnFactura= $datos['nrofactura'];	
		$tnTipo=$datos['tipo'];	
		$facturapagofacil=$this->servicios->getfacturapagofacil($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);


		//este codigo sirve para poder visuailzar 

		$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena;
		//echo  $fileToDownload ;
		//$fichero = $_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/factura-'.$tnFactura.'.pdf';
		$fichero =$_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/factura-pagofacil'.$tnCliente.$tnFactura.date('y-m-d--H:i:s').'.pdf';
		
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/online/application/assets/documentospdf/factura-pagofacil'.$tnCliente.$tnFactura.date('y-m-d--H:i:s').'.pdf';
		$d['documentopdf']=$fichero2;
		//$this->load->view('pagosrealizados/vysorpdf', $d);
		if($tnTipo==1){
			//si es uno demo mostrar normal 
			$this->load->view('pagosrealizados/vysorpdf', $d);
		}else{
			//si es distinto de uno se debe mostrar la url de googledrive
			$d['urlweb']='https://docs.google.com/gview?embedded=true&url=https://pagofacil.com.bo/'.$d['documentopdf'] ;
			//echo $taData['urlweb'];
			$this->load->view('pagosrealizados/vistaiframepdf', $d);
		}
		
	}

	public function verfacturaempresa()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$datos['transaccion'];
		$tnEmpresa=$datos['codigoempresa'];
		$tnFactura= $datos['nrofactura'];	
		$tnTipo=$datos['tipo'];	

				
		$this->cargarlog("facturaempresa111-----$tnCliente $tnTransaccionDePago $tnEmpresa $tnFactura $tnTipo");


		$facturapagofacil=$this->servicios->getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		//$facturapagofacil=$this->servicios->getfacturaempresa(238201, 13,4294654,3859);
	
		
		$this->cargarlog("facturaempresa111-----".json_encode($facturapagofacil));
		$laDatosEmpresa=$this->servicios->getempresasimple($tnEmpresa ,$_SESSION['cliente']);
		$lcNombreEmpresa=@$laDatosEmpresa->values[0]->cDescripcion;

		//este codigo sirve para poder visuailzar 

			$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena ;// base64_decode($facturapagofacil->values) ; //"JVBERi0xLjcgCiXi48/TIAoxIDAgb2JqIAo8PCAKL1R5cGUgL0NhdGFsb2cgCi9QYWdlcyAyIDAgUiAKL1BhZ2VNb2RlIC9Vc2VOb25lIAovVmlld2VyUHJlZmVyZW5jZXMgPDwgCi9GaXRXaW5kb3cgdHJ1ZSAKL1BhZ2VMYXlvdXQgL1NpbmdsZVBhZ2UgCi9Ob25GdWxsU2NyZWVuUGFnZU1vZGUgL1VzZU5vbmUgCj4+IAo+PiAKZW5kb2JqIAo1IDAgb2JqIAo8PCAKL0xlbmd0aCAxMTE1IAovRmlsdGVyIFsgL0ZsYXRlRGVjb2RlIF0gCj4+IApzdHJlYW0KeJyVVtmS4jYUffdXyGAJ29hCEpaXXiANeHBsFtMN6WSGPExlmUqqOqnM/z9Emw0GOpWprq4y1+fuR0emgIg/Kv6TjIFf3tRPAr5+sfTD89KidIwjELIUjzkYpxwzEPJxjFMOvv5mvVp/WbO9RU0cmlEJjhLMOdi/WaMMJJiKx98tF9i9vgPRwAP7P0X4kDKw/9Vyj6599Hz7yj6EQYjRqEcoEYCr1wyPoRPdduIQxThpQlKSgnGsXo9SGPgka96ElMjihHOKCZeI0WeQ4kTV+8kFHk9cVbTt/Qz2pcDHY9l3yDLVlMInOFXtoUH/6B69o+sPgzDEwTBsa6M41uhMRKc6+NDjsXvH7h8ePfdOPiPgmDScSTxRFZtCtanp8u5BWT+59x7N3Mnj9Ls7Np2AU4QklsvqRNCmkKZ6ejYniX0106fpCNyPLs1gej9jUzMzFsVgrCM/iWHOHWxqQaohsUpdQkRw1pSwaMZNYxxxwMdyCGYcmSbHxCEJOXo4b5Cp5BEl9AyqJud+gD7Oc6hXGzGcmSTT3tJ2fG0X6OgGiXQZPJLLPtEPUjTEqpNAgkwBTIEMb251GpwavexTmdqhiph03rPR0S2aOYxTwATn0oYV7Rl5tLkYxBx+jx6cPhbz6KRM5iSHDkYfoE7NojYLKqtiVVQXm6vWs2oz21bbEqFyPajXg6qFMD2hbTEzOUovSdzSoNFusK0lWhNfbNyEfA5s9DIxLk9exERt7t5j1IV99AKdjASQai/VZnRVXhyL5MTYD3Unu3Zsk6FDsdleFIzKjZ4io6Q519vNpq46gaqqKspDsdYB0zZgsatLHTGMpZCZIWyKdb1r7G3RxVZXJ5ybiX7jglgKTIrTKgwHuDqPJtULXPoESqnpQMypP2NKcwoe+iTQfG20LGKCU+wGp/RZNzAxMNJtLkyluidcKbYUl2Sum6JZi13Xq2Y60ioVjRh0Hogp+NgheY65fem4LVbr6qbjIwwWQqgvjpTQZkMeRkibfVXvzMoJOY8RO4KLOJ9zrUwnj3J1qG55KMUk3MUUeybnkE0m8VXK6p0ALlug4QLd6rpbcOMtqSMuDd5JbwsFazQHPZuGOW2lrNERZTLM6/hCsfb2LmsCxFJWuwGUqdH8l1YBTwLxjClESyzKCBzIibiGU0IDkeGZLk7Y8ztDXq5S0nzHzt+5s3PSIz6UQNgR3svL+x33i9tbMNYcIbQ50ZAxEP2X8p1bw+ysCQLl14bvCNVHRTUrjSCKFKG51tY/vN7Vr7v6tRi9VjqdcG4Cl4dZpUTSFMJPGvwN0nim3P9PgDlTVEjNdfQjAj+h+lAM0MeR4EKAqVqMuEGDeW8pF6DaRGIZNrJT6PiCpshGgVhGJl4Rbq8QzNHSsTMIue0I7z5EDpRccATQ6B6RX3sZZpr8dE594s+JI12paojYi48Km++tf6yEqe/AWAozVx+CWYQT8V1pjf54+0IAWPxt7ax/AXFkIZ1lbmRzdHJlYW0gCmVuZG9iaiAKMTUgMCBvYmogCjw8IAovTGVuZ3RoIDU5MSAKL0ZpbHRlciBbIC9GbGF0ZURlY29kZSBdIAo+PiAKc3RyZWFtCnicVdRNjptAEIbhvU/Ry4mywKaqwJYsSxNn40V+FCsHwNBYSGOMMF7M7cPbRUaJJSPxQXdXP0Blx9PXU99NIfs53utznELb9c0YH/fnWMdwideuD5s8NF09LWfpWN+qIWTz4PP7Y4q3U9/ew36/yn7NFx/T+B5eXvl9+fw6dtXbp5D9GJs4dv01vPw+nufz83MY3uIt9lNYh8MhNLFdZcdv1fC9usWQ/Ts6Xdss696b+BiqOo5Vf41hn68PYW/VIcS++f/aynY+5NL6ud+bDuu1xsMcbAg2KShagpwg96AhEALxICdQAk1BmQIjML/DCAqCIgXzYnNQEpQpkIpgS7D1OtIqO4Kdz5EKqwgqX0UJLgQXH1IQ1AS1DxGChqDxYEsQCaIHG4KWoPU5qFSgEPcodgRQiHuUTCpQiHtoCqCQxYO9CBTiHspuBQpZPChdoBD3sHQHFOIeRUkAhbhHweYECnGPMgVQiHsoexEoxD0srQKFuIelzUEh7mE8KIFC3EN52AKFLB5sX6FQ9zA2p1Coe2hNAIW6R84cCoW6R8myCoW6R86jVCh08UhzQKHuoZSuUKh7lAApFOoegrpCoYtHKgwKdQ/BQ6FQ95A0BxTqHnlaFgp1D8FUoVD3kLR9KNQ9BDFL35Z7CJUaFOYewjtmUNjyfqQhUJh7GKUbFOYexsM2KMw9BDGDwtxD0h1QmHvkfB4GhblHSaUGhbnHBQ8agB/mIXMdczP4+9XTF+hVH62lfo7j3HVSQ0sNh/bS9fGj5w33gW7Cf/UHW0s1o2VuZHN0cmVhbSAKZW5kb2JqIAoxOCAwIG9iaiAKPDwgCi9MZW5ndGggMjQ5MTQgCi9MZW5ndGgxIDM5NDUyIAovRmlsdGVyIFsgL0ZsYXRlRGVjb2RlIF0gCj4+IApzdHJlYW0KeJykvQl8lMX5OD4z7/3u9e5ms3eyu9lkc2wgkIMQiGQ5wik3rAkSCaeAIKeId6giGFHRfutdwaOKWsvmAALYQtXaeiC0Hm2tB614fhulllIFkv0/M+++yUbt79ff57+bmXnemXnfd96Z557n3SCMELKgFsShGdNnl5XPlVbsQYj8HGqnLV69cC0yn94B8HuQShdv2hh67siHdyLExRESr1y29vLVw3/miiGkJBEyJS9fdc2yfWPHmRHKg2tcvXH50oVLPkq99xZcbyOcP2w5VDgqFAGOL8Bx/vLVGzdzHncdQliG49Or1ixe+MRH256B42/g+NrVCzevFcuVvXC/EByHrly4eunGmRduRigM90PfrF2zYWOqBN2LUHYzbV+7funaR9s/+wKOWxAyl0EdhueiHzPiEb0GD1944tPzUinIQ6mU7a/0GJ4GCuG36GF+AxonPoO2QXkreQZthXIKqYER16CDUH8/HG8DOJ//CO3hEZpBjyFNFhLoMfxbtB3q6uA6y/BvU4/JQbQG2sZD2yNQjoHzsqDdJyRSPXD+EOj3KE1iDVoMbUegrhj63UvvB+XNUB6Ca94MfR5J3ycB5xdB+SGkudD+DJRTKQypFpIP0my4372Q5kt3IG+6bSE8y2g4N0z+jgaRP6LL6HrgaeRafpnwiBiXfgTf55Xt6m7TjaYLlnnWZm2c9gf7F84x2dbsr90Oz8Veq2+Jf3jglpwvcrcHLw69FH4iryESiNwY+VX+C/lfFHRF7yn8RdEXxb0lD8feKHUNmjb4V0P4oUPKP6jUqi5UPzP8ZM24mrUj+ZGJkYfYqsCEf7Ks56Hddy+w1f5L9stskR77qLCElr//6Uc95/b2XK4heSYcKvoK0Q+3He9EApKFB4UKuIxfL7nfo2XEIQvEJPKEfnj0nc+cqWNDKH46dHqe8GbvTFwhjcLt+jikUb3T0FgNndt77loN9d8p/allNbVkH0CvIgkRpKE4uhUhwS38HUZChEPIC8knPAVzHUUehFKfQvqMlr0rUp/RdloSwErUlU4I7UHP4RXoOXQEvYBPw1l70UHUiX6H3Ggcehhdj/4HbQOUnAc1t6FZ8BWg/n+wN9WJytCjgNOPomPQ9xJ0IzqEXNiT+hzdhLZyb8JZW4Ga89BoNAOtQXfgi1NXofmALTejanQxuhKtxS2phtSdqXtST6CfoYPc71I9yIR8aDF8j6W+FP6Ueg8NgjN+gh5AH+J7lH3wtJcAdzjI/RStRw9yTTxOXZ46ByMIo6thDDyaio7hoyQGV1+KPsUefD03Fq7yeCqZegl6BVATWo4eBDyuwhNIWJifmpo6hlxwj81w1QdQO9oP3y70S/QuNgunU0+kTiMvKkWT4Hk60Rv4KNfbs6UXOATMgAcVoxpoWYN+hX6LTuAI/jVZI5iFciEuXJt6CznRUDQXRvsUnPkJ/je5Eb43cS/z41NjkBXm5W462+g36K/Yh8vwdJwgxWQNeYRbj2S441D4LkErYL7vh6t/gGN4PzGT49zj/LP8eTGn92TKCisSRQ+hn6JfYws8aQhvwD/C7+CPyFiygDxE/sb9D/80/wdpITz1ZWg1ugM9i/6NHXg4nokvxcvx9Xgbvhs/gI/hE/gzMprMIVeQr7jl3Drul/wY+M7mN/A3C7cKt4uf9Tb0vtT7+95/p8pTt6KZgA9bYPQ/QY/Akx1Ex9Gf4fsh+hsWsAlb4RvCYTwXXwffG/Ed+DG8Bz+NO+EuJ/Df8Of4a/wvfJ4A6hKR+EmY5ME3QtaTq8n/kIfJcfieIH8n33JuLo+LcVVcLdfIrYFRbeN2wncf91fexx/nUzDP5cK9wi5hj/Cs8IJwWjRLP5KR/PqFx3tKej7oRb3be+/tbe/tTP0VZcMa+mAWgkA1M9FC+K6E9b4XMG4vehObYe58uASPwhfDzCzAK/E6vBlm8hb8IP4ZG/sv8PMwS3/EX8GYLSTAxjyYVJExZDp8LyNLyTqyk9xDOsk75BwncSbOxmVzJdwErolbym3kruHu5ZLc69z73N+4s9wF+KZ4lQ/yeXyUj/ET+AX8Vfwj/Kf8p8J84TXhY1EVV4u3il3iP6Rh0ihphjRTapLukvZLb8nNgJ0von3oQCZTwCe5LVw9tw/dSSp4L3mDvAH4vAAt4aYSwFSyB28nN+BOki9sFkeSkXgaOs1HYa5fJrvIWTKSm4qn4NloJRmqX0108s9QHsO/iLr55+HZ3oArbxbN+EbylWhG7ZjKHoR/ww3hY9xr6F3uQyzxj6K/8Cp2427yFDcDsOCX/CihAYW5h9EvuHX4BrSP1COknpd3AB5PwyDP0Bxcjr/hUogj0wCLqrmP0M3oCvIn1A10vB3dh5fwl6M7UQW+Hn2KngSqKBauFEvEbPwKWcG3kizciQj/NJWDOB9zghPdgpu4B8WvyJ/RVeg4r6IPuJ/D6I+TX3BT+dPCLLwcKOAG4JTrUlvQNUID/wd8OeJwAhXwJ4G7Xc+V82EobwKuMh942n6g7kPAB0ZzU6HGA5hzMeDFXOAQD8L3fuATPGDQCqDxS4CLvYE6xTmkC10uWDFwHZCWr/XOQvNST6IHUpejK1P3oEHAD7alrocr7kEfo7vQHry19zq0FuUC5XyALxbGk+PC+NQg0kr+TGaTeweuL8x2AfagL+D7CzgYJRxGrfwf0WxUl9qRehuwuwg47ANoEZqMTsFTfgl3mMgdRRW900hbajy3Fp73QzQz9VQqiFW0PLUKTUfPo59JAlooxWCNk/gP8LzXoaVkVmojt7R3BczDXTALVK5cBfznNn4dfzP/LdoBNH8v8JvdQDfPAOVQ2kfxS7du3LB+3do1V65edcXKFcsvX7Z0UVPDJYm5c6ZPGx2vG3VR7cgRNcOrqyoryocOKRs8qDRWUlxUGC3Ij+SFQ8HcnIDf5/W4XdnOLIdds1ktZpOqyJIo8BzBqLQ+Mr45lIw2J/loZOLEQfQ4shAqFmZUNCdDUDV+YJ9kqJl1Cw3sGYeey77TM673jPf1xFqoFtUOKg3VR0LJY+MioS48b2YDwHeMizSGkt0MnsrgnQy2ABwOwwmhes/ycaEkbg7VJ8dvWt5a3zwOLtdmUsdGxi5VB5WiNtUEoAmgpDuytg27R2EGEHf9iDaCZAsMKumLjKtPeiPj6AiSXEH9wiXJGTMb6sf5w+HGQaVJPHZxZFESRcYkbTHWBY1lt0mKY5MSu01oBX0adHuorfRo644uDS1qjpmXRJYsnN+Q5BY20nvYY3DfcUn3tac8/YdwccfYhm2ZrX6utd6zIkQPW1u3hZK7ZzZktoZp3tgI14BzScH45tbxcOsdMIlTZofgbmRrY0MSb4VbhuiT0KfSn29ppJ7WNK8MJZXImMjy1pXNsDS+1iSadU243eeLH0ydRL76UOuchkg4WeePNC4cF2hzotZZ13R44yHvwJZBpW2aXZ/YNqstDZgtmcDSvjYGse4UmjKrb2YxHVFkEiBEMrQ4BCNpiMAzDafZ0uGodfFw6AafRgxnJZfAiqxIKmObW7URtJ6enxQKtEio9V8IMCDS/feBNQvTNWKB9i9EQYonfagG7QacjMWSJSUURaSxsKYwxlHsuGpQ6aYuEoms1UJQwPShGTC3CxtHlMH0h8N0gW/viqNFcJBsmdmgH4fQIn87ipfFGpOkmbYcNVqy59KWFqOl7/TmCGByJ1Mzs5NytO/Pprmy6pePSGLX/6F5qd4+ZXZkysx5DaH61ub03E6ZM+BIbx/e15aGklljGzg/SUPEz7FWQMr5fZ3pQYM5yRfAn8iQekmXJANWshocGp/UmifqeaMaDv+XJ3WlTtOzWNF/WnqYyRGxgccjBxwPGJ65lYMBg3idMmdea6s6oA1QTb/hpHQBGI/mNIRDY5NoLlBmAfx1pY4Op6nRn4zDlI2lHQD/9Kr04YCO/jTcCB+KnYNKxwOja20dHwmNb21uXdiValkUCWmR1oPkBfJC69r6ZgNxulKHbvcnx+9ohLlajkcMKo3QltbWJW2IK4DbxP1tmAHVY29vTE6PNUaSi2KRcKRhKTxL2whkDs9pHgsQQWPaInj7zLY43j57XsNBsFpC2+c0tBNMxjaPaWzLh7aGg2DsxlktobW0kh6E6AGagmFq2onM+vsPgi3fwlp5VsGOF3dhxOpkow6jxV1Er9P0G0XZjeKgWC7u4vWWuNGbhzpZr2vRexele8vQotGWQwgkDmKN+qcNDuY0xNXq+Ij4yPgoUkdgRmhVO9Qcgr4jMeoYheuwvw2uOYtVd+GWtpFx/0F2pVnpni3Qk9a19NXByGm3jAvB/fQHn9v/BHPnNXSMQnB9lkOPMfRDOS0MIpOGGGOieH5JrMFMWqfMBgykjepwv5rRHKInJnEkuSCyOUyfLpmIXBOGykgyBNwaOrWhCYHG1tYQfCMwK4sTDXpOm3BpAK7UmGxZZPT1BwAn+g/NcCrDq44A5SF9d7vOuNt6uBsFWo3bJRf/4N1g9El8Kc3ZHxt+2zAU0e8PUlq/aev81nmAj+FkDr1xehxwaA00sivASO5nI8FMOC0GnWAZpaUQZXLAJiOT28i0GCsxK1snR+qXQA+aQOhWwWKFQ0saaa8IJRqK+P+xE87oRAUJu3irNtI4wukjnXxbk5cPPFzedzieJtBRCgbrbAKehZFsOLnSn1zVGOvrspA+cyvQ9ghK4CPYyRNoagaxMyHZsnghDBHkzaTFEaiYDBWhhkX6DFJB3Uo1p8UL4TQ6y+k7Ja+MDbgk8AQMLAouRB8n2TIj1NwYagYegmfCZPtDSQHK0DJQnyILKd+YoT/PDGD+UCxsnQ3nIrps/qQE/GzZwqURylyTFN/12adj5GF0aHZDEvlbWyOAQzDEgvHQGS4fTYrRSbSAv7WxyMKlVLNbRhW7pbrKAcNls0Ov5q+PhBuhCylgcwkTB4S2iGaLW6ne2NQcg5mwtzpaQzWtQPBNwKv46OJEM/C1kBYaH2JLvdAPRzAJk+hRI1xI76gU0I5wPvuLJlfH2pqkgv4a9rcmpneW2VWZEpGcYXSR2B8A62JJ4h4OjfTh8ax5TC7AQtHJEwomwfTGAav89GygojlpsaGfP4me6jcWTD8NahoNAQD43laAt8/I5ITzk44psy71w8QOSvsfUaqQ+im//2mbs3W0iSulX5KHclAQTPASMJuDXEm7mBPs4oo6op7giee5YnQSEuGK22M5wYNcIZfTPjIY7+IiHY7sctvoQVwIWHQZy0OQr4G0F9IRSDxawOVCvQb5TZBaIO2FdATSCUgiQpDT1hCkNZB2QTpJW7gcLtAeCmqjCzkvnOuFR7RxbvQVpBQkDsbphru60XRICyDdBWkXJJH1ozVrIN0E6Qik06wlzrnb76mAsbvbb2dFx8pV5exwoX44v4kddlzSqJdTZ+rluEl6txF6t6GVevXgMXpZWKqXjoLyFlqqlvKjo12cCx7SBQNfCzkmLyEbxmBf7uayURIS4cR0TZxzdORHy3cd4XiEOcJhtAQFU0c53G6xl49WSYp8hRwoSL4k3XoL6e6w2st3jZ5M/ob2QjoCiSN/g+9fyV/RTeQknXPI6yDtgnQE0nFIX0ESyUn4fgjfD8gHyEbeR2WQ6iAtgLQL0hFIX0GSyPuQa+Q9qgSynMJ1kAh5D3KN/AUe6y+Q28i7AL1L3oWhvdleXVN+kAGxsjQQLEgDbn8acLjKu8gf2r8tBoyKwkoDRh3m8tAoVMHltRcMBfTztNeuCHaRjzpCseDu0UPIWygJicBI3oI7v4VCkGZAaoa0FpII0DsAvYNaIO2EtBtSEhJgGeQapBB5FdLrkN5BQyDFIc2AJJMT7XCbLnK8PTomONpF3iC/RW6Y8WPkd6x8nbzMytfIb1j5CpS5UL5KXm7PDaLRJmhHcI4GpQZlGbQL5Ncd+Y5garSdHIG5C0JeBqkO0nRICyDdBUkkR0he+5KgAy5yGL0qI+jZjj5n5ZPoMRnFVwbj0bGAgCGaRUdcBBBku0K7oiQevfcBOKRZ9M57AKJZ9JYdANEseu0WgGgWXbUJIJpFl6wEiGbReQsAoll0+hyAIOsijxzILwxWT78Ch0bbyNUwS1fDLF0Ns3Q14snV9Iu+5enYHmovKYEZezAeKy4JtoDu8zxumYVbHsMtS3HLjbhlC26pxS2X4ZYYbgngllzcEscth/FwmIoWHO8ccFgT9+CWV3HLc7hlA26J4pYC3JKPW0K4Ot5Fwu2TKlhRz4qO0ZTooLxoFHAfGwnDjIYB58PAE45AfhxSih3FoVMoT+/szaVlXkdJnX48eET5GiCfF+HEF2EZXkQfQuJhgV4ENHoRLvIiXMAGeR2kBZCOQvoKUgqSCL3zYOB3sdwGeRmkOkgLIN0E6StIIhvOV5AIWpMe4l42MDrosvTAp0PiyYvwpd7RMAnHc7SAFtMmcncFsC0XT89N5ZJq5HIBy3bYZXsXtuz/t+Wbf1uQMlohd5K7KOsmO9PlXe3fAuvG97dHDwdHZ+P7UC4PmIdrUBQXQDkcbWDHVSgg07ISBcizUJa3BxJwmq09Who8hK30rP3BbwOngp8HugiAnwUOB/8Y6uJxe/BtqHl2f/CtwG3BV8q6ZKh5PtqFoTgUYl0PBoYHn3uVdd0CDQ+2B2+kxf7gDYEJwSsCrGGp3nDZBjiK24KzovOCE+F64wKLgvENcM39wbrAZcFavVcVPWd/cAgMIaaDJTDY4gC7aSQXajqDVXPnVnfh5fFS6V6pQZouDZPKpVIpLAWlHMkvOWWHrMlW2SyrsiyLMi8TGcnOrtTJeIxuvDhFtv8i8jTnGawRmhN9p4ZgmaDJKJnFTSFTZo/BU5JHF6Mpi0LJs7MjXVgFw1CIjMEgedGUOWOSw2NTuqTUrGR1bEpSmnFpQxvGdzZCbZJsB9NmTkMXTtGqrX7qgjmIMLZvvcNPy6KtdzQ2Io9rU52nzjHKXjN+3A9kzek81v/xDIBzxiTvnTK7ob3qmWdyxjQmyxmcSgE8Jflj6qo5iL/Gp+vHHcT/oEVjw0FuFP66fhat50aNa2yc0oUTrB8K4X9AP0Cdf7B+Mkhp2g+F5Fy934N6vwI4H/rl0wL6KQoqYP0KFIX14zHt17Yhv35cW34+6+MOoQ2szwZ3KLPPqwXQp6CA9XG1oFdZn1ddLbRPchTrEghAl9wA64J9KMC6BLCPdUn0dylLd7mtr8tt7E4c7u8T0PtYThp9LCehT+y//SwdE4vhjpGNi+dTN1dzpH4ppObk7ZuWe6jGHmpb3Jj2f0WbFy1eTkvQWRsjS8clF0fGhdpGzv+B5vm0eWRkXBuaXz+noW1+fOm49pHxkfWRheMaOybMqKwecK/b+u5VOeMHLjaDXqyS3mtC9Q80V9PmCfRe1fRe1fReE+IT2L0QQ/UZDW0yGtM4dr5edhCTCmjbDHr+GJe2dhTD4ZFhz43+Q6C67EGmWGPSHBmTtECiTYNGDxpNm4C0aJOV+jLTTZ4bR4b9h/CedJMG1fbIGBTbeNWGq5CnfsU4/W8DfKBq41V0wvU8tuE/faCtPhlfOG7DRoSmJEtmT0nWgXHcJklQ20wfKTnCqDOZ6rtSR/XKwVA5glZyXF9HWldL6xQl3fH7639VuhxLqaCFHO7A8Vy8EW1o5JK5U+YQ4Ahz0k6jQ6BYUVmxoREecAOO4Q3GNdLDjsWQfozoMxtp41VpKD0XG9OlfiacssGYkr4PnaxY34xtZJdl0xmb3zDayg3jytBo0J2HQDkIykFQlkNZzpXFHdEgR6qDilwdNKnjgpI4LmhctTFGTQYZLUvvU3PIjIw9ax5gcxoWAfJQy4One+celJ+GCbKCaaHDHNRPTsM8wIvSsAjwtaPpZ0xs9PoVC1f9JxgewPgCvkC+Hq1AC9EqNAstRZejqwBaCHX/qdf/az11FiEBvjBOCY3pJPiUKHWRB+JZSOBPcUiV+FMYeWVROEW458lQpOAH8GDkiWlna3tqp2lnaqf21KI6gLULkA0dEraH7QWQgbBBF0Lc0QtxAZ1HIf4ondGH4V5B4RBSCElujTV0cB6z+Vc4jhJITn1GZxrH2xMOE6BkXM3KrpQ9ZheZy3WlPutMA2fiEbt9zFzZzHLCcSFJdkqSTCSOkxWeEEWSeW60ljqvXw2uzKW+RiZkSsPp+n0JLiSKQlfq7502G5kLwNdxk8UCkMNsZsf/jvtMJnGu0BQy4ZBphqnZtNbUYhJMsmI1mbpAx0soqtmsAyGM6JAtMGRmKGoamQs1Z9m1GUAvDcC5uIleHvH00nD8706zmQHfxFWLBaAmdWQjnds0ZjbFantisVqtad0Zelir9dAcpruu1lFTg+01Ndv4wbFtN7zUJlJn2kF4wJMHzPZKOQQZopgdGzoE2Dgl4k45Pr4GpvDo/vE1crxcB8trpDxvDelKfbDfC2C5DtLaCAPjpkiNZHVCyqLHZ/ZnAZijgzkAZlPwm7bsmvSAcayf3IEbxPxxMycjLIFKwhNMkKcOPnYY+5ChjRX2CmyvsEew/eHfcuTQby/0CofOb+FvOjeebznfAmhJ0LjUZ3whPwpZkBenKMbsz/bQecqiKEEBGwDxpRTysgaHpHrNE8SJckJslC8XV8hypTbCMcJV5anXpjimuOo984X5yiytydHkmuVZLaxWlmirHatdSzxX42xFFCyXcnOEOeql5lXcUmGpusqsugO8ZA+YTE5Aqn5EcqbO9CGYM/UNDNCC43Et4cz3x+la++MmE5krdaW+iNspEkgeWitp6drTnRQBGEBHzQCbLQ1QlJAoPlnzCyqHSBhJmhSSOOkw3JPdZ39CGvqhH/tpH1NupHIIwFbZYmHIaDWnsdKq42l8dMKaj8xWiokOhoZmhoIBOhRkZYhoZbhn1jTIXQwj43DrIKqDJTCnr4uM6yIzu+7+BBrqq6xOI2tTH4vuhqStizWdjTX1V7JaVNdd1z10CF7XhNYBPsaV2cJsZZGwSOFxUyPDGH+byd7FlXWuMpl4NwDtq3gJUCZWFwN0ydKqh1WUo2ynKEbyUJbTVVE+rKoyGskTxz1x22/+gl3X/e/tH/Z2H2zfdmt7x9Zt7SQLF965qfevPcf+90c4F1tef+313//mtVcZZ98GzDwKeBXh1lCsGn0PyspY3MyFdmTA9gw4J3VBXwyAAxmwPwP2ZcC0v4EwgQzYnwH7MmBzqrcPtmTA1gzYlgHT8RuwlgE7MmB7BpxlIC3r3w87MmB7BmxJnWGoKnelAaUr9af4VJOlsoA/xZ9S/ur+OCS8LZwNEbcciigef0jhuEhuQMwGRBMlLEZ8Xk09UYB3FuwuIAVut89asNOO7TzllXYPpRE7cOO4yWoFyElR1E5p203R1E4omtoZgtpFSijQdo4RCgDfsPGA7djU4ZHTSOoxmLSHZ/gbtyQ8BTuBTtid/H138rM7wfGXcTu9k59xZr9K7wS1vVQoAGSm94TjC+yefrjVfkQqIsZNIgbxRXQiiTsTkQJ8AuGdaDcilI6mg3ill8uhN0Uao0ON0aGZ0aErLRAudDIipILOSe+JVEaOOoF68wu68OaO8IQZYBVNO9NHXE3r1oMUBuCUllFJSa7/MNbUM61+6bhP1q0H6VFbW1dXO1Xr1rrtbpAijhpHzdAhY6+JW83OrKjTbPdjhyXbjxFl51twE2rq5+zf//jjqqb6VKRi0ZTdxQ3Zv8okKZyYC2D7KpHRb3k50DB8dKafPQzo2OWmWbY9Yq+MUhrWIQAA2vZo+ZMrN90XvPHVR57piMwftfZ/OhuWXLxlBB/9ybQFixoO7d3fU0h+umrBiJ880XMfad+8ecaDd/f8mcqLW0FeUP1CQznEQSk7fh0WzLZ8oUqoF4S6YDJIgsG8QEVgTGBtcGdQHJFV66r1Xey62NckN1kabE2uy3wr5VWW5bYrXVf6jgb/bH7X/a73b1l/d//d+1HOyWAq6A0JZbYy5xChzhYXLrbNEJYJ7+b8iz+nmbVsKy8S5A8AtqvZAavJMzqTsDwZEsNjMJJ4XsKTf8KENVMcFIwWEx9k0sNkplhqYjLDRNUHiikmQ2yYKAlS5ADgJENIWqNjqmkjtpM0Mtp1YtifsFcgRxpTUZocsgDSNRGGWRWcwd05HZXj3gRXQMhRjHfi3TiJT2M+iOvwdMxhQONOSrQAXNDxGZvpQDHDZ+yg+IzNdKCY0ibFZ9bVRYeMPXS82Envir25E0B+TNMysZSiMtVyWN0pECU9/U2GEIE/e42d4ixqwnAGWufvxKpmBewr27fKauJFP5MiokQQ1ThiNYCCFPnCEdA3AO9ySbaGInmFnNPdL0XwoKc617ct2rsu3vv1L5+/glTOvXvTz3921aafC4d6/nXX9Lte3dD7Ve87P8X3Hpl7+7HXTrx8DOTIVkC6l0GO2LHEsG1kWRbWeBzhK/mx/Gx+Gb+RFxW7rMiKJcuuWBAnYxPFDxGpStFOGct5oSycRfLsBiexG5zEbiyIvUBXLrWKYZWnqSESQifQSVCu9ckluvZoZ3xFX1KRcZQBvITNPRIZL5HZik9zTHgpQ9GE2WWqJrCQpjPrTyEg1m7QLu01jD3UIO2VbdYbXqITvh43+Q9QYgcaN3VxwzJoPJO+3RKdUwmoeetjo1bUXXrZqDFjRl7mzOWjj66bOOKpwgl1zet7aAg7mgI0mwtzmA0062Kz6A6iQDao+01CkzLXtJS7QlijLDXJ2V2pU2lWnzoVn0WhnADNCx1/Fs45z/r4oY4R3qGB0Y6pvtGBmY753lmBhY7VvoWBzeLm7LPkrEdDLmyzuN0zXM2utS7OFbDt1HZrRNN4f0CV0CHyDMKpowZ2gwJGJ1DDGP8kK8Cb3EDPp/to2J2hDLgNOu9IuOOWrtR7TN8H4Es2XgC+YHRqoRdVCksqkxZs8QXhqKMgWknLA1SNC+Kg67ChM+xPuCo0Q5xpBn5oskG/Wr4Uzy+pDEp10nRQDg10kXR9LR5LSCGmbHooTkgBpn4ybU8KMAXTxRRPb27lQBJsiumSBOrWxWJn19G6qWnC6wE5cKqu21FT1lTbs66WYQalQkNCrFvvj+cgNAOtRS1oJxKGpIGjgLEiWMGaC8gyblmlIW2IRrI4TeWzGKHyJtXP1D01re45ahZc1lQWs1eUNa0DpMJupvPZNQQKoN0phV2UbHE4WkiRjLvsUOmXBz/v/Qo733sbW/GFz9T2rYt39LxLZpqHJ267/mmccD/eiYPAu8y4qPeD3m+10N5Dy/FPbh27/EmQxYCDB0EpvJWPMht4GsPBEC8gUVKIWMtztVjkVVJbRvVhat89Kj96P9DOGeBIQCggRdMzAVPh3yfwMopj5CnzHas7RtXWqopsDtLBY8eOcY3Hjl146tgxmwWucj/ooDYqq7gZzBaWS0w66RMADlK8aiO6USenzup2o2y12MlcwvDKzqzUL+NFFDLrVqvNzCkIE1kxWZGsENUkUlQ2aWk5cm4/kyMasIRP+liHYaNe0G3UMljIYyyDRzt6VDtx4qjd4a6hdiTVAJBftzTjQYpe4lyR5RzLeZYLLJepQR2hEGGigGO8h1hprphprprTds43hl75TTxIoaiAzSHVUWljmWDmELaakCxjotIHp1djALvIYQIqK9JIIm5B7EZpJmdcFmH6LGfKzlAEBqu5Vn+YJv1p+m1V0GJuQsQmO4lf5jeZbzX/DqbSPMk8ycYV8wWWUmsDdym/ybLZus0im4gg11iGWaeTKdw4KS5PtYyxqveTB7h7pXvlPdxTkuggNqt1iECcgkBkIMghggygbJ5lm4XjmBBZVlQTyGurVaPr1OxocRDHIbIH6H5ouxCSu/DQfWZFVdNEr+qOhriSUENx800mbDoEj23FJuhLuqCwYTRaTZ3t40cIYManDiRQyLZWw1oXSRwICc1Ci8AJXWRPh526GbyAwmeaaj3MxdAN+nk3HPkyDk81UfFZW6tlfH1ad/c2gTkdtg320AKkwpSkafaUZO7MeQ2/BMvlPGDsO4ik3hk+fHgjnpI0Q1vRzHlJMjYZnzEPENqS+qbNqtJG5ly0pN7aH66xloZrgEG+tb+6xlpezcB9g6B2UNq30LieGo4g8Bt1x4LFJCNZoBsfxMY8CxXsqwuhMAYFsxqHQavEEWy/H+fjS4e4vFV4ARYO9yb29jYIh85/fffEGQ9xF86N5187X8WfPB+yR3TbkPsE5JELf8I4QZbAiVlkj9alfcR9mnWaO5sl8qCKxfPA9rlGw/drJzwnPSkPH5KdVqfLERBAvLssqsVqtg5QAK0ZAsNqKIPxAFjnnjglRg9zGZiKGMk6qTw3UTPFzoiXSXZTHuvBlD2mCDqpfILjb9PKn5rWCs/GHUwtjIPOkDJh+DNN81DZ46scVpn0nPaQtZ7dnqTnqIf3cKQi22VoHS5DzrgMeeJi6sfZTrtdd2AZfONc3J2hcqhM5TC8WueozwMgwkhR1zDp3R3fVWGmubWzTev6tT+mgdSeof6u2ICGtAcB0I9SMVVNcNpkcYl2RZVVSeVELWoXrX5sUx1p06UEbJd1CFQbf1yxqC7QWTjBwcwSQVdZMkwSMEZc7gH2yLbHrnq/+dEZmtpZcsXEDU/x0fv21q+dWn5DzwZy65WrR9/zes/zKvUM56e+JiXCA8iNr2S+hNAA292UAcsZsJQBixmwCjpBJFqp0PnKB6DFixHo1yrmkEtTYjZVdAU4k03LQ3nY4jDWzWGsmyPNKvISjgIzTklyvVLfLK2VWqSdEo+kkLRbSkpHpROSKFEeShdT0s0JBnzdSRc1zZTTANMf9JXXHVRxE3NViWn+rTvipENkJfLgYW3LMrVKmPszp7RufV21U2dqqfpe21NrB2lpr6jQXqHKg2FHtnGgH5R3ruJMgHJceVxZhVWLxW5VlS5uEOgGIl2zivLysrRDqMANSkE0WmWPVFXYq2ERI3YnVQyI5ru4dtGq0ltu6di3LytWlPvoLm3U0sfI4h1YWtV7x46eH08t9SGOvpq4B7SSrdQfjd5ktJ4nCrmyfJeEJQlxfC71WMrSwyESMhHiM/EKMTy+GT5gpm5ZqRP4v/P9mtNU0mv4fk/3+37nZ+piTbpRXzsNiGQqVclh4pjupVE/u79NkLu4igOrBAEjGfMAt69ifDBWB71iOhvMDrO0h3v/wsck2TNDOPRc74jneuhOx4zUZ1w38DkfWUif/XnQYtPaLUgcQ/FUDMDWp4oaADUvM9SUeKX1Jhu2Uf5GFUAO8Y6ASfKA3oyt2ZLM8IrZiRLzP6ZdoVQ6x4699TLzDWovNZXTBA8Xn6CYcTAwNmuse3bWbHdzVrP7IfIQ96DlCe0Jn1m2eNWVZAW3UrjKvNbSYnnSvE/Zr+4zm10guT8inDVvgW2N7SYbZ8Nd5Jl4dAiig2qGYVGHzEl0GhbcZjOh/jEGYOggQs9k+NYME92WsOVbmdFkzfMjJmn7u6HUl33dUL4pFsRArhjHrTE2RzieJlAcT88aHqZ7ZUNQxWzkODOQJzKz2MfM4kmBbIOusw02nJ125oYT2fnHJUy1fpJW55mvSmIMXzKctWlzgDqK/ZX9dp5uQmcYfevT4bcHqd0zvBFa15+hnHY9Ww9AI3tNmdYENuEpavqtA3baiPu8PsDIHVabzcF70kq8ycGUeFNaiYdzK2jKUOArHcz1I+kslrlwudq2nK9+8W7vv9d/fttz7wX3em+at/2ZJ25ZeSfe6j5wHOdg9eeYbNn7qP+KVS+++c4LP/JpaRlN3wF14lco7h5ELmCb2e5KjoY9MGdZAV/F1XOHLDyrynZ7K92y3Wx3ckAtNpDRTpNqHiCezRni2dwnngsT5gKFiVEFH1Wwi8loF5PXCpPUCpPUSp+kVphAVHy0n0IlMZPUCpPUCtVxmaRWmKSm7fuZRjzNRfm9m0pn12kXWeva7Uq6Ui7eRZwGKjgNVHAavMf5nz0D/0FMy98R064MMU10t0A2dS5+3y3ARHKGn4a16GZhre6O6ZPIVtEqFVhFsx9bZJvhRAQpDKV/v0lFKifYQAh3ghDGhnsmLYbtTAwPcAV23nh00y+mdF51xYw7aoVDPV/f0/TEwz0LyKPbrpt95w09h8F2m5z6jA8AHytC1Vwe4+KlikUp8Vp8JcWWkhLQ1LOr/SNKJpU0WZpKVlpWlDQPabXcWvyg6yHf05bsIirA6IQUUm+zl0JPep8p2u89XPSS93jRH7LfL5LHuXAuVbrsdKIcjNIEZr1UUdyaTqGgO+iJlZZU1vA1pZP4iaUJuTG2TF4R22TeZn7F/K3l25i9utKKea0sv9JdHnZ6FhSvKSbFgTJrnfUu6y5ryirssu61fmXlrIdT53REPJCwMj+glboP6HpamVuYYpLVzPgRc4Vbo8bOj4dhyL6E1Rrg3MD4OjylOtewJjylqjpmrucnzkBAQn3PguoL1XJQJ4oXagsRUEOmBfFNBo9LuyTiJtBVmDQrCOfTrVM6qHzmS6e1+QzJ8qmXhuJZPtUr6HwC8F7cRIedzwacb/jR87vIpXFrYRxFtWgoOiS6NyrUAEIzHSTalXpHB/q2vToS0aE1bJ+VOktqjtaQ3TW4xg23OUAv7pYNK8ld4MkrM+imzKCbsjQLtSfK8o+Ix0USFOtEIjrT1CQ60yeI6esMTohWOv0ik1oi86OIzFsvMhEuMj4javRJxKHDM5SeNJ89AxnTZGlNdx/xMHqKffwxZbGnYnXdcHjKTiV2/8nr4NjONnjBWqWcN8bcK1Cgdf4DiIvFzGZrMWhFB1bBWheqXDmDOZPH7Q44GRMO6BpuWQVwYmDCMVC34IpUa6KcOFpVOWxYNftWVTInilQ4iqR1YODL7kiUEyUr0Vk0dOJqlxxcuff5CRsmVl3x7uW4on77TdfkJD1Xnrht+zMzNMWd93zAveilNfPLV69Y/lg05+a545/dOm3LNKfV4ssvUK8cdFHjOs+626fEF04evPn0+a0XDcfvFwW0oqllE5svnX7R1XRP7jEQx5Snm1A3o+Jspov1KWKqkmsCZYyuv1NzVEpzuMkhNWQhqs/y/1MvYxouAxSlr2agZmYeeel/1MzOnIqx+Ie0ejZAO9vHtDPQXys6V31XSaPycaCWFs5+jM+/8AgXu/A2dwvV1Op+3mt5jvpIt8MEAfuj/imiMm8RMZwDnAGIBiABMNrLSBcD6faTdD8sZMC8AXcmiMnYBTAA0QAkAPou2pPBG/phIQPmDRguyqcJizMA0QAkADJGaohilAELGTDfx4iqE8owSonTlZ3KbiWpHFU+VE4rElKCylqlRdmVrjqppBQ1qIBKJvGEU0TucOpo+golCe5GjERB5FVRKhAQv4vfzSf5o/xJXjzKn+YJ4kP8CTjiecPRzveJU55xOp5ZvbyT+b50Hs2AXmYQ8XTPg+3e8dPk7wrV9bU0aIaKzhjzHdqZ8xA3rR9o82Z+/Ad4VRCpaxGwx3eMiUzmWwTC3t7Z2cn/7/Hj57P56Pl3AdvrQLdvA5k4hM9l2OLu2w41AC8Ao6vZtBZl6LOFGXA0Ay7IgPMz4EgGnJcBhzPgUJ82dX2Cz3PmjVAmK+PyE3lL865X7lRuyX8y69nSFziL4vZ53EOmlL7jFvxkLiFaOVY98+X5ynx1vmm+eb5lpbxSWamuNK00r7R0RjsLbYXR/ML84mH589RG05LokqKNkY35Lfk/Vh8231N0X+lPhjyhPm1+vPCJoo7ob6KuImPjOs8AIgaQbwCsD12yPAOIGEC+AeTQqBhHbs08ubDArPK+UDSbNw3O8VFDI89bSlEi6K3zTvcu8O71HveKNm/Qu8b7oZcPeu/yEu8vgcNkA0mznYa4k3bXqE9QwyeAL2ANE7rz0OF0VbIdCM1qr8R48PycVTkkJ5At8bpQZcj4iYFwn8SzqFzlA4NNQR/25XvjWZ7Kcnp6OWV2Xo+eU37ndVHM9Ybomd4QPcvLBJiXbQfQ1tEKWzQvuRRJhkrckZDyS+B6+wI1J0pwCb01vUwJ1Z3otRlAL1NCyYBeqeSwsegdiRIfG0u4sKSyufxoOakrbykn5XRbJR959J1wxmVD+jKQuQygI6TAATrIUFp2uxKhfBuzHG3sQWwh2t9GCdNJB2JjDmYb045soi7H7Qlb3ocI0z14grxD0/sdTeumGtycyuqYBuX6aYa4jsXW0V2PDIW3m5pEUNZ1r2OyGmg4dkrrYYUurdPCGjTgeOGg3IjgLI3aNYeWpXFiniXkR0qR5MfCIMhynXAYtkb8KC9iMcvFqh8XFSqqGOP9KKjlUJ05Rl2tesYMrpLYli1bUIaCQXlFU38F1k0ysD1zTNFozmCQNGUHVg02eX2+7BymEGT3KwR2qgzohllWtUvfAS2MFg4moBVUD9NdYYaJ5gaNwJ1L9KibaF277bbrrt9cVfDjlx+YPnp4yd2zb/jlPHvSvGHF9StdrjL/LUfuS6x4+Ybjf8YXBa5Yv3TcRRFPQfmkLdMmXFMUjE287nLPrPmzqiOBnCw1v2L09fPn7brk5yweZ1nqU2GT8CbKwWWUX+1bTFbmUELQVXNEVfMFFAqhcstiMOM35rSgW3J2ogeFZ7mfWQ5ynZbfWk6gUzn/zLFbHTn2nByuRCyylwRCwQmWhPOS7IR3uXBFznWO2x0Pcg9YHwzswU+QPfa3rVnIiXyaU/PxNNitvaiGEV2oqEazIcz7s3LNnD+XV7SobTKKhgBjfUG3oWv08VR3WtdQE+5oSMagPqYjTmSmJ8re3MWGX6eJbaUxtaH7TDczsu0UaWD5mprWUT0Pr9cta96maWbezxxivGLOAqB9lZkztscyLWs+kpcPS+fIryjn0+sG6+Wg68p3vnBR74sfd/f+8aG9eOwL7+HSkUcqXvjx0x/NX/3JrY//jZChX53/Nb7yDx/juW0nXxu0+57Her+6+3Dv563PIz6ISOqx3pl4BNM7HPhWXe8wnpozALMBWAygLwSN9EUVGIDZACx9fQxFnTMAswFY0pudBQleKBBG8hXCrYLglgVB4nnCC1kIW0yEc5p5u2CSMmR7hMl2kygF7LadTux0u32wJgWqutOEg6Y603QTR3fD4tXMya7vjrHgBRNT7025zLnOoo1MMnOkM4Zi8mY5n/tu8E3TOhqvAJogC65BdVNpeEKMhdT0SXZ7RcU2Ta7VrWNZs0VlDUhesUp+ZITYDBT1bXYJLOS4sspuM2WK/Fha5uNqRrRAxU4JyPLWzt7lecOC1cM6K0bfN4n//Pe///a6B6yT7uHnn9/90tQl9A2d3pnS28LbaAK6BFcx7foSPqyFXOFwQZWlwlpvneQZFx6fP37ShMQc67XFVldBMY4qJTnR4irfsJqxBQlPY86l4URxYlJjYqlnacGy4k2+a3PW52/13OLbkXN7eFvUa9VmWBE3u4scjqu2wiGmGSZiklyHyUQ0Fk0hhzvHjuDUILQeGIFDsbUxEjuEp6JCcnh/2cR8m4SlLnJz3KbNGIXyHbtt+UO0tRrRDuGnkZ880lk3vCQf+isoQh6JK6EqXOVtuGSHzsendvcAKZ0BA6uH8uNuVNbd3URNq26tu67pVLduRqVjRfxxf0lJ2QhbYZnNaps922RyjZjCycjlGisHR2B9D8lOE6UwR015XUUZBfvMJrCbdA9WdQWn+6+qhzmqKkl+JI+nNMdXhPKrK0RGkvmF0LvagcJAla5sjS5UtDCK6UmjCAs5sRL+ttGPzmzcs+Lxr9df8khNXsfO3OKcqsT6rc/2Pnfsi94b3n4b//hfWMSLGvZVfNP7zD8+6L2t95uxc5Zci3+N49/g29cvfH3/n+rnOi29rh/NGX79uonbFsbXrYw/PuXS5X/asgvX7b606aGehTts/sKLZmDLXU/hvF/8pffyL/7V+8jTyRtXvHvT+o9/8su/nHkf23DotVeee633g7++WlLoxRffdv/YW15btv3e0TvfQKNpfPt40Cc/BD5gRzkki+HP9Sro9QWWSss4i1DlrApcQuaos5yzA5eTJcJSZbGzOXA0+Jbwdtb73o+zPnZ+5f5f78csfsoVDMZ8NOhqio9GYEmDSb5lsGsEqbJMIfWW8c5JgUvUhOVyy8fip65z+IxVw9nAaYAd+wMmyY7U7ABYuaPVAYFV3ximhqcCo8OG0tIJWqvdNsDHZ/tBB29+wlagaSfsWLPH7c32FjsfZG4+PRbL7mARisxnwqIURRahyBQXOwsbZ7GJLFTEbuxL90clHjZGtz9h39i/X2Nwv/TGzf6EI1/SDFNL09neyMQR6bj0oZSSeCPKIzcjpCNXd6YzHzDjT5KP+YC9uZUzMoxVuo3GpE5PBocBrqUxV3BPrPaUHlRF3Xi1/WFVdK/V38bRkKq4SrdkrFakmvS4KpNk0x13dUAjjCmFqwZQBzAmnBGfyw1f+tJNb1+18q2bm+8t6+gJ/fyqTT/bc93mR299ZMf5x3dhrnXmaGI9N544Xn/11y+/+/pLqKQLcO4REII9gHMW5MGDGc7lLrVf4SRTtCnOS7VLnbzJnGuDUbk9+j6NA5a6fx/NMSCGty88xxGVD6fOpuWENSGrdBJlLR2ycEbfN5V9IR+GP5/HYgj7Ptlm6XMsWP5fN3y+71bw0g2f/mD/2rRTYV0Tq0qH3Rh+BepWoJE2/jarmW38WK1048fzwxs/5UxpI+GwHWC6DoXRSPgRUnzP1FX3NH7Z+0rvdnzd8480XTz0lt7bhENWx9L9qw/39vT8nMM7bpp/c7aFyX80pncm9wXYkbmohBSzNWg2mUCzNRU4LzbVO0Ulx5tTaoo6SyM1pmHOyabxzoTUYFpuOqf+K9s6OFJaOCoyqvDiwp2lu0ulYeFhxXWl403jw/XFc8JzildIi8OLi5tLW0rfLfws/GXkq0K72yVmd5G2zqJAlsR2brQQGsL2bVpYEJGEusgNcU0IBGxqfV7ArLqyKwoq1AGR+WpGkHMfmwAaVws8nhNurLnj7mZ3i5svhdUhc0sZjbsZjbv7aNzNaNztYm00hp/ROO0l0mOdxt16zAwAwI7OZcSFnUvf05xwb7ThApQXNJAnaNB/MB0n7E4E84/Yjts+tKVsfNBWZ5tu42wGb7Cl+cDghI2Fctl8zOTJYyYPjao2DB1G9zZvrHRjuPK72slU3ROpZVI/I38W5XWWbsieopFdp2jJMAzU0HXUlEDYxSGUFRBYVCXMuDmPGRUw62J2VhEzKrKMfXQaYgnIt+CyJkA/NzUamN+wENgC0bmCuwq0FSZEM0P3l+01lY/deMN2jxVvSv7l9JW/v+P5a59c+pfdv/rigSdvuH7Pc9du3tPgm1lQvmRedfJ2XPv+/RjvuL/lwspvjm9+liv5/dEjr7/48oson9oQWWBVt4AN4caX6dzCqWCbt8w7xBv3rvU+ZH7Y8rRF9lmKLEnvUS/vpYp+0BeszJEtnNkWUHE2iTmzeE5E6i7QGVNZ+qIdSGTF+X5V31hAd3oBTQl3AY84cg9mezEdQ4dXsj2ZWCBYuRNhb5yZ3nEL3YNxMk5RxNhEHtuVKU1ziq/TnMKZ5hRfGJGbn7A4X8o7DjDe8bjH+zw+hMLoLFYRrPTZzEWluzRnwGJkjL071t1EeUct9Ux219h1y9Sp2UVFEmWRiJri8CO7aPNjUEFLtmzBMWD56/37kOrK4kgXN6hzFSeqNmZ3qFi3OyrK9Y2aSFUFqDb9YZ7Z2XTzvX3XrizfzZsunu8fXj5r3PHj3IM71l1ROf4Sx0/V8c2LdlxYhmg8FvLRvTs+ilSyWN93lvslNrUuRhtOwC/65LZswNADiLKvx5mM0Iq+vWuiDdyXdgsyUmURiyoSFFnARMhnr3yVxd4/pr1/DJRzGu1KxZ7/QJWAUZ69RqU+Hou9RnE5ApUyzcA8/KIDSpwuVfr2g5IbrkRFkKnUQFXyCiqRCzI4ejd+Y9HgShSCzGYuRkVKVK1BVepENEFN4ARplBuUZXgZWSGvUDajq/HV5Bp5s3K1ug1vI7dyt0nb5Vblp+h+5W715+gx9ZfogNSmvoJ+o76L3lb/jj5Sz6Mzaik8jupBLrUIRdVqdTqKq4oQd7gqhbjJUpmO0lNobIBIw40pb7NRbqEixjToXDCBx4LvYFZYLREEs4lqvO/HYG4gHYsdi6Ey9soW3ZWvViVZLlBUp6KogPWkACMnYL6gqkhVZJkQLEqqwiEslJmxOU+Ox+NKi0KULuzfFxdaBCIABBo8ieM80xd/oMKv2+ftaepp8nm6TzWlwyhRHYs0o+rIwEizRlBN0hsh/R/U1NgXy+ffL+hrzV40o/ZxGFdk0VCwrAqMf9G76lenCoKe2N8P9l7JR3tuuXzNnE1k+/l38Q6wdXsQEhpB35CQlbSySJ4chDO2wdSMt3OUjHohA+b7dVHZiJMQeUOvk42XHQVjiw+6iSbTr9LnnukjA7NRifsr+/37LiOY35wGTGL6FqrxSqLQ926i1RiGUSPpNQcS2GrTWDTp151pQNdZ6ct98cb+SE19r7NMG6JdLi9XmrXt3E7tFeFl8ah2WjPJQiMg9AxtuSmp/dP8T8s/rQpv5i28lTMBPvK82WKVRUkyAyyLZrrjSzfBbYzdhSSzE5oIx9G6bFrHhXizE85ScgVBzhU5sYusjStINn8eByWPHMImhLEJ1LQQWipxs2bwx/kPeW4nj/kujOOmGeaj0odmbicgHz3WbKBAk5ukFolIP7a980c9aNcLCf483XqQYzfgSq0PDEZQieGPYlzsBo2hHC11K76mZpv20kvWl17aJuglSMq+oEcjsLGTt3GydAhYEUp9M5wFP64fiKvf/fjbZLGLGxo3r5JlhHkZHjQdylhnT+tyEVyBI1yYywpz0UJR4kjF70nD+8/2PPTon/E/HhifF6gQDp0bj5/vHUfm4XsPXn3H7cBjh4DufIjiMnYzr41o6LGSAYiSgU1SH8vFqW8zdou+7UM8wZzergGgryt9kdbgw2kYlGKB5PIcDZoSBV7pIhs6QvrSHBBDmJRxmAN4H2aKM+WZJiYS5bTm/LWxE/c3Q4W+YKjM+p4KoleU9z/QrzQ3gcijAVGnmj7RWHRgna4nZ0xxJ3BAKtBAS+aIrq5QvmAPV9E9N5LVm8O39voFy3PPnfsn1SMeTX0q5LHYkpFMj1Cjtga+QX5F5lmQhisru7KSHymP5yfLm2xPCp/ZJDMi9i5yuF1UnANsEOeAF0bP6pPUkXBGifHeMel775gwBxShAQXsvWPSFHLhkGuGi9BXFVpcnOs/2iL7E5ZoSMWq8da0ykwS1TBJVMMkUftMEpVPR1Hr7x+rfe8fq03ZNDA4830Aqk1M1Zqa1mXaJN26qhij1ohoh7ndv0pUEDHpL/hStMWg7RHdM0ndVMzLbOebX1jSe/6tN3rPrX1hwnM3vLNfOHSh7f3eC4/fiS2fc9MvtB/Zt+gF7ESw9gQ9Cvz4OVgHD8ojN7GVCDtMVuwYFpgXXCavDvIK2zaQWS5p6Y2cowyHLPpuDZlrNgCTATgAvTocvkooT3fkFVba6XFOYaWWLm3pEtr/1JET1duhv5YuaXt8EgAF1smByaHZpvmB1YH1ymbrNbat6nbbfZanbV22z6yf2jTgsyG7zWm32+w2M2hbJOxzqaLDrlnMgkdRXG6fN9f9q9TRjNdIjsazmaXhRuE8ZtV6PDabVc4dgFa5GWiVa6DVvkRu1PqwaOzIiMaiixSjvCx2QWTxCk2h/LX5Lflcfp7HQKj+lyX7jFvPf2vciv/xTfbIyD0/tGeu6cat95QnHT6ki3pm48ZiPXBQU+agbyW6a7ZZB8cEYMEZQaJpkU+vR18hVuW4rcamjbA7RkBVI17H4smtoL35vDX2PG+NA5I1HqjR8pyQgpD6XlVv9LcrXjcNNDWt8noRtgH3xXlM301b0zoPrkkb1C5XtlOU6HZIVoQbTMCejjDbmlky4UdJ60uvX/vqm1OL5l6cOvPC3CsvGRSe8lf86NZ7p933eO8Q4dD0313z8Ds5BfnTrupdh4fesmO4Seq5iquovmbC8lst9GfkFwPfeV94C1mRH89h+D7FZ8NOzen0u/1+ntd4p8lt8vNPu/dbX7ZybrfHT0I5cfv0rOnuuK9BaFAu0ebaF2TNcy/wJHyX+G93P0A0by7HOXJNSvYADMrOwKBsA4P2J7KjIQlLvzJUDhal/JkRI/ylERF82ogI/sJ4if2M8RL7uTjbf5N8LTk4x2agl81AL1vfRoktSrFL7tNjzMZLiWLGOxzewOL+eFhj56Spz1syNfOdcmq1Ao/yt9EYxPLOVSaF87Kl5LiMF8ipL9aRneZL1frbRJUELBi0GG/Hw17D45/t7N1/5HjvoT2/wzl//Av2X/P53W/0/pG8ilfjn77Q+7P3Puzdve93eN6vev/dexxXYn8HNv2492MLjSU+AsJjC90rwfr7PMR4fs4AiCFzuf+rzCWGzOX+LzJ3f4L6vkCvBuNz+EWVrKyo1MtBQ/SyqFgvIwV6mZOrlx4fK+MlFq0yJOwU9gocFwIN7S60GyURX8aiZj9Ep5HgCEHlTsSx7kxeIU+aNfzdYA1fGqzhbFx/s5m9CIQe49/J+EULSrXtLaDDNTXSIIg+sqaSe6DY7gBqZOIkHRp45AWq58A8F4Nuk4R5NuPZ37Mf++J/VB1oTzisdMg2i71yIp4gT1Q4VTYpJG0eWc3IasGmXLMsC7kiQXVgK/foGp8/HnuWxxzBmFdUXlbVaE64skjF34KgDWEerB5eLTKBQUgzmcoKKHlqFWbRWjhFyJVEYlJzzUhWD+N99Ne38L64H0lD5LhM5MnmOhM2+axgPYkzkddCtRrA9anUgqcbhLVTz6yr1U5pF/qCi8AcYhNENdSmddQesoKaCuklvL6R/a5CjP2sAskL12BPuEYBK3aft4YAC2T8jvJNfzsGW5AGJiFZFgWmFYlprShWTqe6Cg+rpqoRlsLZxeSrGRMvvMH7LrzSyO3p5J5dMvm55y5Ilz9H9aR7YR1KYB0E9ATjVqC58lyugGSm8pGn9kmkD/P7Ngu5PgnD/ddxWWe/J1rETL9p2m2qfdKkzxQNvkKcEXLFUCiWxqFw9r0vkD8AHv0TnkCiIbOpT0mN8Cbi0BI9jphLfdDu1H/5JOSsuY/DhNvF7eUItwmBXoIwof/5SOU+Q+Qz3IWf3gdz0HGth27UnwFzgr1ixpanT2oBHisYp/E4G3R5/PTO3gav8PdzTrj/zanPuJP0/9vgA/r9ffQF0Wx3JQlluaiqcTrudTgrY1k4X85ymXGWywS2vD3AmVCFa8DWhiuDpbsy3i5yFXjcNH7Zx2KW3Sxm2e1g7s2+wE03C2dy971X5HamHZ3paGU3+/kDN6VsC12KlBsfdWP3NB/Th2nQsu+0j6z17fYlfSkf7+vbwO3bGk5v+3bQaOq+kGUFIyWknFBOKrxixFgpfS8zpwOpVRY+TW/NgpUVFqyssGBlZZp3QFxVOiL5+y8P6S82szfHa43dwLHXxH28ZrXYLESUZFEWZE7UeLMfWWS7vi1bUrIFNWHdglAxZ2c/bcCZXKKqexfSdoS+81EYZWqum+m5bGeWq7v+7csen66ZOk32K2fOvHNk58OdE1dPr9pA7unpuGPohJmz79pOas6/ax0MeHAIUGsbOga4Vc1oyUNqkUpqF6A16Ca0F/G7oc9unr11erapiQYOAJZ3YPqz33RnmNFtRfahY8eOIcADwCu4XjWTRVu+Hy3YJ05+IDbwOzGAfV1/IOLvO5F9GVf9XhzfgYTAwvWY1Kkerkufyiq9HDJUL/N06RQvAPS3CUFhl/ChwE+H7LTABYW1QouQEnggWZVweuA7vRJztmZXVFXuQvgoSCryg+/Hn0v/7kbmy2q6r1VOO1oN+zKVMphNOngPTeMHBu+xyJ+YHr/HFI/1P2DWdyBVj21PM56bO5nwYr9p9AjYNfNgbWwoB+vvGjtCQTxWDuRQjd+u5dqQ7B6grg181TytrsWDNNxEwfoupcL4KH2tAHK2N6lQcmaeG8UXzOl/gVxNr5mW9mBbE9p/zYm/r+Tn/hAnPttvOfYJL0Zxwzi/Tmu8zItej89DRJNqVi0qJ2a7nK4sFyf6OXcYO6yQeeRAGLtUexix8KYS+GzBYG8izeDtOQPCaY19L9DQqY5nJZGCMN2D6Nv8wt8+O+/Gxo0bpl1797GtvW245u6fDa2fet+qac/1vi4cys65eFHv8Zee6u19emH5c8OG1n/+5Cf/LslF+1fBmm3rXcGH+VHIgXLx22zNNpq1QdpF2hSNrwslQyQYKjZHcsqzy3PG5KwN7QzJI9wj/JPdk/2N8qXm+e75/pXyFeYV2mr3Ff6joTed73ve972Ze8p5KvdkKBVyRfiYFsuu4kdo4/nJ2jztY9P/5vRqJruVcwXYz0W4AlYTsnoHbHR5M9zf3r6NrkDCm39CxZoaV5vVFpUPsa3sUDztAPiEvrwHkMdwCLClzXyxWv9pEebRtjHnwEacVUEqfuBVwzQCeROOAoR++JdCjB8I0TJ+IEQb8AMhZ7/7AyEMZbFD/4GQ4IRqDx7wCyF9PxASO3Pq+78Nwn4cxF4z8KdBkNVudbGtK6sJi5wYYK8TihlbV9Q4MH6XBqw8wkI17FzGPtW2J0bcs3z7iZVXfXjdvLsG25/ctPnZpzZuaOtdIfyydebMHan7H+89f/vFI3rOc08ce+m1t1979Y94HdBUIvUJ7xKOgjg5S7EmvSNh8nrYengCiMWbxcx0doojqsVmtuWqanF2boDPLQ4IxZaIxezxYuQIsbkLSVEWaQndo2X0Nf1jZfSLHDV1dfTXfMBc7X5Ze9lRo70UK6eJ+uyHCBaXpd5yq4Wvt19i3+TnZrlWaSudS1xXWa5x3mppdd7m/5lFNZktVl7CcD/cRZ7ooP+Y4jCm/xrOgqsAR7J5zyHyBPKS5aCe5AYEGJ6Fbrif+T9vuMftCceGBaE1IRJiP88WapEGnCRlnCRlnCRtiMbDkcohUUzfDSFRGgfKfhtg5yBPFx7e7n0TH8LDQcCANQL9Qoj+SPzO0i58T9vtTEbGukEfO2uoBGcMZgTGYg972aJb62k61R+0qXtwG9qFEH1dDFPPbRMNgmj0xxUwVviI2WJT2T6ozRYo1oMriy1ejyeQrb9tIWQEV5bFKsprvhtfCUgkVffjk1RoIJso0RwBxiU6gz+54qa9j91QcbHTYdrQdevKFTucneEvfrH51SuWLfnRzt7P3vl1Ct/seWBb8kfXP+p8hGy+YfGPbrkltO+3l7cvWfDw4Nxf3nm091+fUN28CCHuLdArrfhLJv/x939nERi/o4u8IhMHLne4qQnzRlwBAI/KDdOjF+KTASgmRUqZVoNr1El4PBkvT1Kma/PxHDJHnqfM0FbhxWSxvFK5Dm+Ur1Nux1vl25Rv8Rni98pRXCzHlBr5Z/IfsaTRXzjRsitJqYNaJW/FIzDzZISiEjCsCjABa4pgulHw/1V2LeBRVPf+nDOP3dmd975mH0w2j90kLDFAICEay0BRi0iDBYJRYqS8hGBBA3gJQUAB5WGBWhWt+uGjVbymaB4QgRa1qa82X2+Ln7fqVbm3aBUbS1svtYVs7jlnZjYb4H7fvR/sztndyczs2f/5P3//36AFXMbD874FWBCI/RKIlpAysg/1QqXb6/Vw/FF0EzajHkJqQ9MPRdJ+HEPJlnyLvEk+I3O0SaqEfCSvBr67IDwIYD32o4YINSe1+VFFXV3Y3mcXyil+j5TH8eBUhtZP1UEC9a1TP8F26xOKiHGqUKrc59BgONBbHG71lMO0l0BV7dnzkrnEr147TGaRTCXdEUsSbKK5KS8OMBQamtmbzw7HawVvOH4lHp/pjNRSB9gXrkVB/IiF3WSVTabYhb0KEfuhOHrz0egNix5vt0UTAh47fOOL7fCtuqowVIaeab0hW88sGnx15brl8IsfMF7+B3cO3rxe+BFP4p+PsUNyDusnH5SpnPiGSf7cipKr7kEutHYtAXDgmYUNjIXj6xZ2I9qNHvGyL7BQADyHGIGDIoJv+6iT5iPrGTiZ/5OuZ+bQI4IE9TBkx+HAUQ+te1NouoMOj4mcJSm2iyiTY3EwyVkc4qL+I7AObgUkfD5F/P78gMBmJ51M8okuUU2ugRVfm8BbHCdAUSDrl6BnYv12l1RhscbznonV1TVV6Fz3lBNzHv6vytXs+m+0F/z0mrebMypWN3OH/shqeO5U7Mdl87S7L2ayXNCUpIjgZmMF2ltIvTIN0J4+ELahQSM4V/qdbJbLsTLiSLZdFggmwKHf+9JuV8SHtGfImS0q4/k0LvYxrW+z/L3oPv99ylsyJ3j8BroqcF3o2ug343MC80Pzo9+Jt3ha/AsDK0It0Vvi69Cd/Fp/m3Ivv8/zkPqW8T56l3/X/4ESy13SCD1+STIkrMcjrQLV4yTUUwUk0N5pd0cBqyInPBD2FAwTXl3AhdXVoLVSCRJzmj4npbkMor3roQawx3xjZ46T0u12zvWqDicLHY3fzSejaoIsPZT0/3zoJI6dT2LzdRIo+EFKeJMgqeM1NsZfkoIU/CZJbMympuTyMosU94b9TpX4DqXpgErrHSrR+vzclhP713aunrr8xJPvrNv78oH29gMH7mq/tgmdgCy88oXmruzQ+9ls9hcd+w7Dx7MP//kMvBUu/3LZNrxSns9+BO/BcaHPzk/0+Bjg+Ve+F86y0pCpQwj6IAkUGfwC8JM8l9cDO2TcDziw3++wFFEGBlIbI89E1w3YIXC8x8PnQshKN4gMUttUc6h/1rzxtdVMf//tO9MzowtuojxJM7HMh7DMjwKj4ed5Ml+gwALYjF2+eJlpSVCSgpwZ54rMoOQzIUipRCdT+VfNiEoRVtSfiVD5jzjC2v9Ov/pLt/G8ibABELGtaInCaR4rNC06LXmjPifZwizyLPIu1xclV3vXJLZ6tyXe9b4T1jxJygRGVIvT23PSipNRIf2AXNYsCeELi8MTzUQHEU/GvUhIfArQkxoh06k8mU7lyXSqVaUyrUKgYi2Gv9sZCs5R94zx4eN0ma50mq4gm1g6j9rlGlhrSZMjzZGVkY0RNqK6sCLVzYpFKP1qhHbjRHpRSVcmJ862D5Pv1dgNBLYjgycs58a8jM3jye7SZHGy0PZmsARTK4TVX2O8B0LOJ5VRb0aS4sEiKtZBKW7bkzg33J043sY+Qw8l2sKG2UO8Ft2hYNUoIWsYBsN5UM9zXcaY6S0NU+Z+F005trR78M5/2/Kf2VOPb/+s48PBmvrvf/uOZ55a3/Y8O1tePnbm2G98+R8Lb8n+/Xc7Bu6CM2A7PPDqc6+d/7Dp+cbeJ/YdPOjo2CiWN4I/vJHKG9WMh/0FBhYrzbCjVX6u4RYhDGI8ysgcGhpFtGhUK2qGNibjLzMVuUCulxlZDoJZEFLnW1I1HGmwZkLCksDRGe3LNI2nMzqepoKxeBIJVYl8fvhLop7RBRdxmmp5MrBGU8deoxwX/8tZR57rglNV5p/Iuuby2HVhq/im8LziJcyK8G2xpcVtsQ3mrthO89Hwgdix2Onwp8mzycCV4SfCHWHm8vJFPCoz6+VmGclygpwEnphlS3s3OW3BlPwGv4I8CS/IyyWSW2r48/bz5zWG+/P288NJlmbQxYBnwlANZOwZQ9ZSD15L7ipIuasg5arzVKvmGvGkZmlI2+MIeZMj1pQUiAp7xuGdc1jnhkX8KCjFCrp46GRXYZJP2iJOCSoaqYCzftkWcDznCZYKeEKikt65InixgNteOkHll/I2YhFgwdY1qs3TcMIwW8WqjnD7gtkbZlXD6qO3HToPPa/vHljf9penXngf/erHq/+l80D7hifhbLXte9dt/P0q0Whogd7ffwzVR7N/yP41+8ds10+PMxN+dKjvsV1YvPHvUgcA6yHyjUqHpdsSNFUyAgHeLmNrGh18aQkkUpbwb2pSYlyyg2mST82EjD8xqbybpAFDRL5IJFmgagglC4hyeIe4NZX9oJL2utFGtr7xOUmmJxR13a6bW4KiIfc8Jy2/HkBzzSB5jxy7Ex/a7styMsjUZ7vU2YjvQc5HztZnc7pcwV3BH+WO80c9b3jfSnimi43iHLlFXCS36W2B7fox/ZPYJ/EzMfG4/3AAmT7Vy/NvJ2LBRCLmTcQYiLyxBCOZKglQ6zWo9UKjh1wnIBfWBZHoG6HAfSNQwa4Clxp8rZETePKJ3MKjaDNIAhULsqj1TEbNaCXaiFh0BJXgVbDbCSZpKEky/LmElq10I3b4SMrUsoMUygmoJcTVhDpKNVX+50NniEKmGEUBP1yvgkgsbLqjkQSZqirFPR4JmTS3hcSgdIGsalVOH0qoMF1T7aS1hgNJopKJfmY952tQJPX0o39+7pH1dz8GXw58/dsTZ7/17GtPzTc7OqbULXzlrr5PlrQ88NiOwG/eO91xw/PHnrlvwbh0Mda1McLQyB3BvoaEEnZlTXRxzd0Nkgsx49yFzbsDIRcruAPOXfN8rh//gsKcjYbrHQGU87jenNeb28cJNbzugPPmWBqcgeAOnLjEqmnQbxBvFR8VD4hvidx1zHXSD1lGx8IDRJ7xcD4/4yEFZ+lthg0yDMtgv0aUWA9zFB3FvhCC+y0fYFm8C3jbx/aiJYc5zmeNKiCwTjts8dk+uJM2o7CZXlhjSR6rqHiCZ1PhRM8eBdmF0uAEgFSURAyyHROK8Dl1iKLseuReuItK2J+Ir0psvEPy/6lKgxYcjJ6tcxlY770sw2IZUxQFO7AOa95HnTqlybP8VbVMUUUtw44aVUeDRWzoSSkwKFr+WnHTrFrRSteKRQm8ddj0Gi9F5wwy8UMiK/CMhHqZ8YeJqwtE1g2NMlXY9Nc60ClYRfm2GA2ihwa3oMcfeP317uxE2Pxj5tD5a3+cfRKvoQcHW87X4KB7tmPDI6AYjEWvD3uN3SKIm5dR4psA1jGXXaYXmjxXZuqSKVD7SaKeQzRqyig2Qz7t9bWVDxnQDxWDIR+SX4Zx92JyDidTEqJNfSF6xBB1OEPD0dHI0It8ywFK4+n4GaaNgHQuhLcv5BR1ORT3h3TOT95jSBqziLxJTkv+MkSVcoh+0+Hv554Mn4vwU/bnP4iinDkxDMvD08PT05+Kn4/lhLFwA9gA29nV3tv9d4hrpLbITrAD7mK3eTf7t4jbpPsjv9ZeD+giMA0g4jPtvwzmTeYIpTgSPPS1yzVrth4XoDBFR0tBJm/vTN7emTwfONOqWEls9hUIFFVBSi/c2z3eEC/CE7lhmdH6IsH+oaVdJe5OJe5OJa5fUNIayvkFISuEQnvGjfALqP9LAJx5L52ZbKJTabMo5JzgoqGTnYlkDK+8zmSykmwqkmm8eancdhhshGbTHbeD27EO7sIzdxn1GeJxXi+jPoMu8YV2kiXPZ6D3roCk2clRvG4CD+B38nsbmHzHGC5fteLT46+cbrnt3vuzZ997L3t273e3tdy6dfuSpfddPn3P7M3Pddy98VkmXr5v+f73P96/5OHyMX33HRsCEL6y+1U459Yt9zQvvHfL+aGZe+p/sunu558D+LsztAb/ud2XhyOyj+waMotlv5ySUrBXFzcULyluFbYI/LLYGm6V0Oq/h7vHz5eGBcYoHW2GRwlYOj7LwzV/dnF4bhkNghDQzdGjy8uBXaUqwI4H8BojqlRGnqwYuSqVr8FI8yJZnDypPqQoOI3eh4LnKSrNS7l06GLhKS04Pyc14rgj4zD3uGpDKi0myHFF2sMl0nIXOZYYG4Ov8aIYLAc8MP8fhDAXNmxlLlHu+jZ9PTOfbn9E5cvhhKEEPzSbCGnKmeai4p2CPprCMXQdAvPShS3tYhAafpZRMSwcb/sB6WKsk8fX0LZSPH4IpZ/7VeuSpVt3z9v06q7sA/DKzZOunXH13U9kP4C33Zz+5o2Xz3lwV7aDO9L48uKbf1JVemzT0pduGcd8RwsvmTl9Zfm5/R5xUsvV31k3bmAynqj5WH9/wZ0AY5kpFBWvYdd7OAZI541zUTJe+W4zY9QdxPBgSgG07yUxLGVi3tifN07kjePuuLuBMZzfE7kDaA+ssoaFzEK2lVnNsqnSiUxt4pvMdM91o64qmFZydelsptEzf9S8su0BuZjgjB3iKnuQcgdpd1DqDoqpWNg724OUO0i7g1ICTriajMqkdAkqYUpT1cqE4mmpqypvTDYUz02t8C+XWuQlwcXGOn+b1KZsUNeUtKa2MTv826Udyv3q1pJ7Uj+QHlIeCplOAFBRmNbj6ZiQLodpAMpjOjt+XBosxk6aVLEuvj2O4qmwVGGWpmCKC3O5Qi9nVgimGWaoUiQ96E02MwXZNFFXtXLA/he3KlIlsuTnCvF6jns9PMsgHqZKivB7PGfGK2IWWQO7YzA2EAYVNFCmFNMqTMJZ8Ba4Cu6BPA71XrTECjMZCEydS07MkYBBIq/IpeBvcK0wwvgIeUtZGDY+QhqUw3ISRpNiYTnFoZCTlcfGF7rmotBdyIWuTcFzBNM6AaCRv9LdBazn+gv0OWSdR8ctvMnpFD9F8ycOA4OLIKRZFBKkqINNlNEj8xWZKS1iM3DhYSPlPhx2k+AIcAnJ78cPwzisiIcrOLqCK/xhk67gMOOuYKwE7EDTRFXjnZJ0SSk1IhfybbARushx5FmSnn9Yan5zw8rnZ8+af0V2xfXLlt711x8+/Y9t3BGl48CLT9ZOgu/dsKlt27nH38j+7RH47+r37p83tXXaVUuLIwsyNU8vXvnqomW/3izv/P7mm+qrqlrKruhZu+Y3ras/B5s3k4kBwLOW4KvR321vP3c7Gby6UA77Ief1Nip52A9mxB7ur6oM96uw/IUMVTnuCPYiXgjCFOFoB9nle6OHO33J5m1x6B18GpchyhlbVQ3lIK2V62mjFlTjOa82poNrtOn6NcYNYJ52gz7PUPd59ylIMwxj6lyVPjsrrkqFsWgmNIGbIE7jpokzQnO4OeJNoUXcIrEltJpbLa4PKVyIcJHrXuBVkJeAsyfbN7OK0MVFIIMmw3IcwRN5cZghioIkK4oYDOh6KBwxDOzd1HVhRyJJtqKuka11Y8grJAGHQ2e7lcrgvF4zZARDIUMXBcEM6Xioa6KiJFUtqKqaLoheI8QpmioChC+JYwxVUQS7+woZuq5hyxyLRGLqFAFej4NbET+H8MMCHLz+UJKwmESjvXDnSzY8uykWnTkYMwYHY9FBg94iJofJdim/SaDrUlk4zTAz89uyRm7weqCgRPxU1+eO8p/gjBeV2TNe1IYbZzp1H0nl2WzhKfzZ6Hy2cECoSR2KcXn4gy7R4iySm4eUnP6OJnCJm9TELUnUvRz5ySAKeZ3eGkLzkNcbhje63SJWDEmPDYRPZNe/8XFJbJIPRk7/rr44UfHpL7LfO5r9VaknEsy+xR05P/nhB78oYT4ajGX/9Led3cxP/3k127Qrufiac0+XpvHaInnLQu4nwET0viBdgVy/vzsIiDkYhTMIiDlyAGkk/z9hipIogiIh+8xQKKGTJI9fYUlKT4bAMyIFSbWgQcOJ/ko30hjsU0ntMm5N0O2eYfo8I7Zu1I5RDwWeDfxCfFf8IO4VAoY8OsYEfCE9EHhbVoJyICgrUi96xgqQU1vyfpJZVKwQdC7jsMLCEwQt0AsNSyMXpDWrK9WN6m6VVf/P1f6RSUS32m/sSerH4ESgwAfxnpM65Z5LVf0LRlb9R9T9m+ry04fYkWpSB9RT93rtvgKQn7DpFsZyY/1Hhk6Se+jZ6RnaaNiYKxcCkJACsoyj4pCNBQiFlFxyUdGpxlfYYZ+N8t9WafkpxlzSJlAYKmTs25lRYpC5Pws9suLu7o5d83aVHfg+em/wcP2Wva9A7+r7v3pzEG5Sd+zse+rRzvrJYfSXF7Jr52fP/vaNvZ0n8VeAYAGOAcLcs3g2d1JkktwnQRb/R15WYCRARGUsgqwgSq0Mg8hE19M8F4NiirdV+ALUw2bYjJjJeLMSboQsjMrOlFKerLqZXw1ge0lqqQThSlxawvZK5w7PULxbEBlC2E08VtauRVOamsIQDxjeU1yt6zULmJ5d2YEZ1crLzN1/287+s2PXg1k9e673gw54Gr7xWCBAeJVhL1qObsNRzZX0e0RXoVUMmglnYr1WDFCMW0WMFrvqfrvQq34KKmcOYNN8O2yKd7q33HDOPAWVw96eHrkX/0lh9nrmSzYNYuiXdC0qRo5RN8ey7NLfuwOFlaSfO1CWr1yfVnY/ldyBmNs/d9O9i/iNCPTVPVQOp06Asfk9yqN8QYXxM4moovN+PmDpStJviUmFMrcp0cpM7MOY0R+LqmRDb85DY4h4l5KACgErtyZqy4INykEfY0kWDsiTZWMnqOTJIwp6WDL0Un+pWCpVi9XSRPkRzV+mlwW+FW7UGwONoWX6ssCy0Dp+rbROawu2hbZKO7Rd+q7A9uA+33P+Y+pR7UjwtO+Pwf+WBtV/BIcSpo61hJwzneGAPxFnlWnKFoVRorkvYd9CSM/ZxhpsCrH10n2AiQYDgZTuC+IXiqhoYsrvC/r9vgCh1vXz5AAgoSZQZeJ4AiV60eQeBc+IFexFcyz/ZN3SUbN+XEd6L5x6SIFF4Kq4j3xE58xKimPFepGZJQ6JCP8AU7sqFTxDaHJ3PNm+xMjgKRwkzZ8xg/Z+GupXp6IENTAQM9QBOsISPGCbPoL68JJOUA4bNtnRF8Sq1Xn7sCXC1sgYtkZH7Uhm6DMCHmrMuEm64NBHh2pqfUU1tXLv0Gc9oVrNaUBqJE4kwAoGNl1w712Qib8UJfh1y7ciqig+H51N2s9sF5tLbW6FGmq4nN5mkvwtLtoYvGJM3bciWprzZ2977cNMUUHmD93ZFVNKxrY3TMguPaCWlcRblFFs2eAjaza3r0Ut5948OLVxNpjkw4q0Ap1CP8Nxnh9EwDy6UiqjUP8Zagc84GEBEFG7FQN8EMBQObPsz1G4KropiqJKubDM+NGttJVbbWo6S1SEOoDdbBLixrt1ntwjAVtdm62MJkxs/tmIW1PBOhGu2Xu4d/fe3sN7r1+4uH7WosXciTdfPPhm38HuN7fesfmuNWvuaVtNsLM3M13oTtpz4AcP2NkOMPS1Ax3+2ipKl0/w8z4PB1gIOI73f4ndIqz0gMdb51PsTnSCF5aUCcJHkGHrECTIFRgVb3/W7jQieBECBqL4XioFg+T2J/kkndQWQNbjAxyPvMC+xZjaFyEheoDc6Yepos97xvdXfDiufyzTBSNnzmQ/t59BZeZ/AAABmjFlbmRzdHJlYW0gCmVuZG9iaiAKMjAgMCBvYmogCjw8IAovTGVuZ3RoIDMwNyAKL0ZpbHRlciBbIC9GbGF0ZURlY29kZSBdIAo+PiAKc3RyZWFtCnicZdLJasMwFAXQvb/iLVNa8JwBgiFNNll0oKYfIEvPQRDLQnYW+fvqSm6g1GCBjkbf5/R4Pp2Nnin9dKNseaZeG+V4Gm9OMnV80YbygpSW89ILrRyEpdQvbu/TzMPZ9CPt90n65Qen2d1pdcBzej44La4vr+NVPVH64RQ7bS60+j62vt/erL3ywGamjJqGFPdJenwT9l0MTOm/LcKEfLnBqHiyQrIT5sK0L7LGN9wQG/V3LMnruKTrY3+ZiybLqnXjIQfkEXJAASgilIASUAaoK0AFqCLUgBpQRygAa8A67sGADWATYQfYArYB/HU87AC7AKUACICIEC7WAboI4RQJkBHCHgqgImwAvCQD8N/iA/pNAlmhko/M5c05X45Q7lAJRK4NP/4IO1okjDf5AQ1inrxlbmRzdHJlYW0gCmVuZG9iaiAKMjMgMCBvYmogCjw8IAovTGVuZ3RoIDg3NzcgCi9MZW5ndGgxIDEyNzY0IAovRmlsdGVyIFsgL0ZsYXRlRGVjb2RlIF0gCj4+IApzdHJlYW0KeJytegl8VEW296mqe/veTqeXLHR2722aJJAmJIRAQDLkJiS45AEREBM0mrAoMCphibhCdEAwuODooKOORH2CAyo3HcSEReI6LuOA44bOzDPfuDvykzejjI8h3d+/bgfUeb73fu/3fbdz6tRy/lWnTp06Vbc7xIjISx0kqGHm7JKyueOWPkbEHkDtjAVXtLZR8rEW5P8IGr3gqlVm/PknziLipURay6Vtl12xtzBlG5F7M5FrymWXX3Opvvr664nCmUS+FxYval14WdGNh9HfQuAnLEZF6hr9bZS/RHnE4itWXT3xOddalHWUJ16+bEGr+UCulLdQHn5F69Vtutt1IcYLoGxe2XrFor88MvEMotBnkClpW7ZyVbyI3iXyH5btbSsWtYmZE55E+RhRyjeoY5iXfJJJIRNcwQczPjYmHkdqxuP+/yPL0B5M+ZDuUX9DBGpFfjT4XaAtoHv5JLoVRHwHvaKspIdpHM2lC2i6nBetYzVsgI/mD4gZygzl5/j0q1x9x9Xo2qPNd7TAAJ9c2nF96YeX+Cu/0bN0R6mHP6zMk/yNX304eOLEycEA6Ssg605oJB/xFt9PKunqfeo4dJOT4OINupSn6ir3aAqXj0L/9MyZPtUk85h5bIz6Zuw8Nk6bwqIJPbQpsRk0NUAnTpy4NkDfjTT0JDs1Af57qqS7YRROASrBTEmr589BE67upVyHtlOuUkC5RPGPTlFsSfwj2SY5/wKd5yVo6InS4/QuG8lM6mEnKIO+ZVlsLJ2DFfk7VmkXDdIvKJ3m0BaWSiMoSOfTOUyBTIRuZffHr4p/Tj+hn9PD8afZTfEdaL+DXqJvocG/KYwqaAbkz6dF9Ln4mJri95FOG8hDk2kWC1IrvYOP9Ie7MKtn2PXxbzFqOt2E/iqpmqrjz8ZPUhHdqmxWj7ifojtpH3PFF8SX0Bk0nDp5JP5O/AMqoCZ6hB6HThHWr5xNIfoprad7WZZ4Cblf0L9SjCXzZjFVPYiRzoHVrqTV1Ek76FWWyhrUI+qx+HXxT2HVNBoJnZbQ52w8m84fVZLjU+Lv04XURy9jvvLTr1yobFcvjFXFfxV/jobR0yyJ7WfPqmXq7YM3xh+KP4mVKqCxsMgMjDOffkbP0iv07/RXvja+ls6m2Rj5RZbHTFYAi7/Ds/gavka8SWMw22Zo205bycaK7KV9dAC2+QMN0McsneWwc9l8dif7K0/mC/khcb/YLd5SmPJr2DtM+bDRKnqU9tBv6XU6xFT0X8oa2FK2jN3DfoU9YPMv+d8VXfmZ8g9lUC2IDcT+EZ8R/4YyKZv+ha6ltbDtI9RDu+l39Db9lf5Gx1mATWSL2UPMZgPsS+7mw/lM3sa38Ef5E2KGuFM8q4xXapSfKq8r76s3q5u0Vi12clvsrtgTsTfiT8ffgO/40H8BTYNFb4RXPEoH6U30/h79if4s/Qf9T2bz2MUYZSXbyO5mT7AX2RvsC8ySnM9wPpnXYtRlfAXsdBO/i9+N0Q/hc5i/z//E/8K/EaoYLiaI5eIhYYtecVh8ogSUAmWMMlaZqcxT4liZMvUsdbb6mLpTfU495qp0LXS1uT7TbtLW6b8dLBr8txjFFsfsWA98V4cnXQtLPIg4sgu22EevwqK/g8YD9DVWIZuFWCH0nsSmsXo2nV3ALmKL2E1sA/s5u5fdzx5mT2IGmAPXoHuEV/PZvJUv4uv4Bn4b343PXv4Kf4cf4UeheYYIi4gYK84R88SF4krMYZVYI9bBsneKHeKQeFN8Kj4TR7FqGcoZSrtyrfJLZbuyW3lD/Rf1CnweVg+q/eob6kn1pIu7sl25rhLXUtdjrj9rLm2C1qDdor2l/U1vY7msCJqb3w8nPAt78Ay+g6cra9lRVOQxhfyYeQTrMBu74m9UJWJYF59sh27DeJaS5sRjS7GBX8X20Xj2Iq11cYHIpAxQlP2RDyjP85/Q26yFZSnbxZXqqzxEOxGNNvP9fB+rod28ks9FNCb2MXuMPoa/X013s5+ylbSTHWVnshtYBVtLb/GgmM3WUWX8Ya4wNzuHHSNoQDcqC+nif46oP3zYJJyIn8ceVLzK9YhPvbQFK/o4fcB+TSeYGv8S0U0gGrUiytwKf19PMuo1Y5+txX7MQgS53HWIdjMX4mqFa4pyLR2j/6DP1b3wqBpE0k9jS5QHlQ/jFfFi7DDsMnoM+24xnYUd8zG85ADKsnQRdnoSYkkZdnUDzaOFdAOi3p1xO/5A/Gfxa+LL6DVgT7DR7ATrwo7oBaKSXsbnDnqPbcI+POu/n+d/9cQWUj99wTJZPivDfjiqXqVuVneou9Vn1NddY2HtdXQ/PPrP8OYkzGABvUFf0N+ZjrXJotFUDn0nQvdGupw3iQM0lWVTG/bsSMTxmqGZrEQvN8F6D2A/H8DeOIY4cRE9Q0cYZxmY0QKMr6Ofetj5Ekhvwwr+jPWgZiGidhH9BfP2sYl8Fcaz0NMWRK1+6PRH+gTWjjt6jUZcqGVz0dffcZYvxAgTqIF1YwX20CRE1lrxW9h7BAtQDRvO/hW4FuxQH+XRJPVDxml0bEZ8Il8iDuCMiaO+C6dXDv2ELYcWfsxjkIaxmTQ+Ngs6vMmEYrPfO1r8ki+KbxCrY5fTa/RrrImlXKXVKiuU9co/rJrz51hVU35SOfnMSRMrxpePKxtbWjKmeHSkaNTIwoL8EeHhIdM4Iy83JzsrMyM4LD0tNSXg93mTPUluXXOpiuCMRteFp7WYdkGLrRSEzz67WJbDraho/V5Fi22iatoPZWyzxREzfyhpQfLSf5K0EpLWaUkWMCupsni0WRc27ddrw2Yvm3deI/K31YabTPuok5/u5Dc7eS/yoRAAZl3m4lrTZi1mnT3tqsWddS216K7bkzQ1PHVRUvFo6k7yIOtBzs4It3WzjCnMyfCMujO7OeleKGVnh2vr7KxwrdTAFvl1rQvthvMa62pzQqGm4tE2m7ogPN+mcI3tjzgiNNUZxnZNtTVnGHOJnA1tMrtH93fe2hug+S2R5IXhha0XNdqitUmOkRLBuLV2xrUfZX5XROepUxs3fL81R3TWZS4xZbGzc4Np95/X+P3WkEybmtAHsDx/WkvnNAx9K4xYP9vEaHx9U6PN1mNIU85Ezioxv0XhOlnTstS03eGa8OLOpS1YmuxOm2ZdE4pmZ1t98QHKrjM75zSGQ3ZVTriptTa3O506Z13Tk2WZWT9sKR7dHUhJGLbb5x/KJHu/n1l0us3JOeIyVz/rtGWZ1Ch8DhzCNheY0KQxjDlNlMmiidS5YCLE8DQxoOyFWJEltntqS2fgTFkv8baaHwibnd8QPCB89Msf1rQO1bjyA9+QzEo/Oe1qaD+VtyMRu6hIuog2FWsKHac45fHFo6/q5RPCbQETDOajBti2tenMEpg/FJILvKnXovko2B3nNSbKJs3PiZJVEmmyeYts6T/VMux82dJxquU0vCUMT97t3J6H2XrB6T9/IJhWt/hMmwX/m+ZFifb62eH68+Y1mnWdLUO2rZ/zg1KifeLptqGcnTa1UeTwoRzPEU4rnPKi08Ky0JhsK/n4czlOvdAWcEqngpnT7EDL2Ym0KSkU+i8xvZr+PVBv/JhEOew72JCW9pmRH5Yn/6D8A+2SOwX0VQp4/Zx5nZ1JP2ibhgDU2TktbE7rbOls7Y13zA+bgXBnH9/Ot3e21bWcWtDe+N5NOfa0W5swicXsTDgrp5ruMNt4XrfFNs6e19iH1x1z45zGKGd8aktNU/cItDX24b5iObVc1spKWTBlgeoZ/DzKdUc+p88i6nBaFafCKS/oZeTU6afqGC3o5Ym6QGKgAmcgCzfNBb1KosU6Ja2gTk/UdSSkRw5J62gJyJa9hJhOTmPikUFj6pzG77uDs8eaiuFeifddihfK9+L//FQn0xyxS374eJxjhnhSPIE7gSGe6HHlGR3VXvE47QLhxQ+pCeoCCbLE4z2at8zqBU9Nd3g0GCnri/cjc+Y4p7747rKO/WInjuNxqN4ZPV9W7+yxasscPm5ygpeMdXhUTzRr6WVGdTZgJSBO/qHcTNAdoK2ggyAXFNpJH4DiICEeEw9Hpxno4VF05K9OF4/C8hbSQ6A4SED7RzGXR+mroRoFWj3S406Wwz/ioHLEI0D5kQZAHaBdoEMglZYh3QqKgwRyuKqDuHhYPBQNGIHqJPEgrQVxcR/5GSMDvd/bE3Bs88sef1qZVR0Qv6AGECdbTKd+EEe3dwJ2J3GI10eLxzomrO9J8pUFIL8JSm+CIpswZBdS5pQtkJTf1JMWlN3/LOpPcXDXRUvLE5meQGZZA6xwNTGxSFyJlzUDl/wrcRUyxAJwudTzxULyOnpaPf5AWQfGq4J4Fe68o9BcLYK4SRqiVmTjFiPF2qO+xDjt0ZFFZZjxVJHpiPiFF5c4Q+hCi5YZ5j5hOcbf2OP2SP02RgPDyg6I9ULDS7YhOiCVYfgPiCSsbJIzkzk9bm/Z5upkMQfTnAOzGNCRwcpXOh1dGUVH1SmiTuTixdMQPxV5eAk2xDRxhsO3i4fwumeIX/UU5Br9+8RdDurnslMMPyXhWlN6vL6y/mq3mIJWW9yOBbjdGXxzT8FEXJkLxEgqBXHYeC1yax2n70SuE6vWiZXqxEp1QqlOeB+JW9ByC2RKxLXUJlbTZtBW5KVbDYvCoH1OZsTIsj6RJTJhmMA+mJKhNrvH7ZOaZUZT0xyxzJ5kX1nVAbESfr4SfVpiVU9GZtmyfaLImcronswcCWiLwl0P4BXOWRoAg3JJDohcGEIaJk+cER1m2NUGytKRDWL8VX5YGom/yd+Wyy3fYh3+2hB/fYj/LsHj/fxwYlPw30s+UJ3LP0Znl/A/0VbkON/Hn6dSAN7nvVIL/h7voyrwIygvBO8DHwe+Nxp62ejlvT1g0P3+qDcoJ8ufj0ZKhjJG/lAmI2cokxosq87nz/FnKRddvAs+AvxZ3k/DwQ+CZ4L34x7/MvhTiFqTwXcP8Rf4funi/Gm+B28UBu+J+qQKdlSTbFfUJdmTUUqUGkqM/fxJvpOyIfpEtCAbtY/1FIww/PvQH8M7/6ponpFancQfYo3sawh14X0DnFL5w9EK2cnm6H7T6OOb+WYrs8LKt4qtbaI0v7S4dJsw881is8LcZlYH+O0IIFs59i/fhLSCTA7vAVmgzfyWqFJhVw9iTnJenDqQdjm5FqRtTg7vvhQ43XrMyVXx9TQTxNHHGtBaUAfoRhwjm/m1oOtA14NucGpWgdpBqxFN2oBoA6INiDYH0QZEGxBtQLQ5iDZn9HaQRLQA0QJECxAtDqIFiBYgWoBocRBS3xYgWhxEAxANQDQA0eAgGoBoAKIBiAYH0QBEAxANDsICwgLCAsJyEBYQFhAWEJaDsICwgLAcRCkQpUCUAlHqIEqBKAWiFIhSB1EKRCkQpQ7CBMIEwgTCdBAmECYQJhCmgzCBMIEwHUQAiAAQASACDiIARACIABABBxFw1qcdJBEDQAwAMQDEgIMYAGIAiAEgBhzEABADQAzw1d3icPWLgBwG5DAghx3IYUAOA3IYkMMO5DAghwE5PDT1VY4xONxmDWgtqAMksf3A9gPbD2y/g+133KsdJLE2EDYQNhC2g7CBsIGwgbAdhA2EDYTtILqA6AKiC4guB9EFRBcQXUB0OYgux3HbQRLxv3fK//XS8BtZo46zlnewUQ5fS186fA0dcfgN1O3w62mbw6+jmxx+LVU4fDUVOBz9OXwVGTqLGhX+6iBCwEzQJaBloK0geUk6CNKc3CHQB6A4H28NV/zaTG2rtks7qKm7tAGN+10zXVtdu1wHXeou14CLm9U53OvEUYQWusNJ1yL9CoRDBGmVk6vi5Ri3HHF2PD7lvNxKOWp+VcQOFbGDRWxXEbujiFW7+VlMcSKdSRW4Dhqs0UoumGIcAVUUFE5BZLp9z5cZRrRggtHL9ifYKCsC/iWoG7QNdBOoAlQGKgblgwynrgjyjdbwoS73gwpBIZAph6BgEJfH1BTd6uNetq3nRS+55TiFI4HbFy0sBeuNFs4EezpaON+odrM9VChvRewprNxO8F1R4yM0P5Fgj0eNfWCPRY1ysOZo4RiwC6OFrxvVXnY+GYqEzhniszFvyWdFjbkQOy9qjAKLRAsLpHQRBspH6yjWSB+B5w+hRiRGCkeNyWDDo8YkKa1ToVx45qJiRz0VJLnogUJf9bFGhVke46hxl/El4H+BYeEe75m9Ctih/F4210oy9hc/COFqI1qdJOVxPnQPcVvyp4xt+bcY96Mvlr/H+KUxxri9uFdH9W3Q+xZniKhxE15Hd1ppRodRaqwq/shYaZxrtBqzjOZ81EeNi4z9Uk1qYo185x6jAR2eg1nkR42z8nsdFacZ1xiWUWhMMvdL+9LERL8VxfulBagsMfpo2Lcov1f6+PkVvSzFKtKOaZu1C7UabbIW1oZrZ2h5Wrqeqgd0n56sJ+m67tIVneukp/fGB6yI/I0o3eX8VORSZKo4+QCXKSfnJyTOdE7nkp0m6nn97BpWb/cvoPr5pn18driXJeFtTw3XMDu1nurn1NgTI/W9WnyWXRGpt7WGCxu7Gbu9CbU234iXqTmNvSwuq9bnyK9Vuhmtvy2njxjLWn9bUxNlBq+qyqxKnZIyaVrtjyQtQ2nkuyfz+9k8e0v97EZ7R16TXSYz8bymevtG+aVLH/dzb11tH/dJ1tTYp7Rxf90sWa+01TZB7CNHDN7sgxgVSgYxvYZMKYZ4UiPFsEYJuQLAIReSDHJJXipw5AqSvI6cwqRc9xGzrrbbNB2ZfKIjjsyRfPqeDDwG2NruggJHKmyyRinFGsOmo9gopyPDgEix4Ygw3OucjgzmDGaXfCeSPyQy/rTIeGcswb6TMRIy6SNPyaSPhEzk//FZVBNhPWPb1zwvv8dqCdctArXYm65anGl3zDfN7jXtQ19wFbTMX7BY8tZFdnt4Ua29Jlxrdo99/kean5fNY8O13fR83ZzG7uetRbXRsdbYunBrbVNPVWVj9Q/GuuX0WI2VP9JZpeysUY5VVf0jzdWyuUqOVS3HqpZjVVlVzlh1S6TfNzR261TTNPWiBO/hniT4cEtOqKkmGGibIh26b3Ioc03OXoXYY+SJNNnJ4RrbC5JNxdXF1bIJ+0w2+eSXlUNNmWsmh3L2sseGmgKoTgnX0CnTkhSqt8efV2+HZs9rlK5iW60/vmYr5eM0Z1Ldklr8obzKIXy+L0krf/RZ9WNPe3v7Spm0R1YS1dtFs+vtCedBE03DUC21Tagbc6pOCKeu2+2u6433ozECJdgqOZzMRVgEFrSS8Nal8S5Xl8blq8Kqnuy8smUHcIKvBeE9jq+Oljivz3x1z/B8+f6yqqdkfILjdVXyaHaoDCP0VAAqeX6CWynFyGzO31y8uaIrv6u4q8KF2j3bUGlsk0dptGSboFWRlacMgeyqJhgbasnxHorm5jkDd8lMJNIUWckce/1nY7NTRj9t2JVDva50ul91akES9SuHOsFKJEZvPwVrHwI5je0OKNFJonQ6+e5Z1S67kvZMfPWj06VDv/cLSqFTv/0ryKcM5V3IDZffICnyfxCG46Uukefko/OH8gL1C4byCvLrh/Iu5LdXy6c2Ur1iSevlo2uWXb7wf66QP78PfWopgnQFLaFWupxGUw0tA19Is2gRXUbtyLei9X+W//8h4Xznhpc4VVpLo5rdnMVcWi+vstJIVWKCkjQlxihLd6kxLvazAnIzm2VSZiRwvHKwckbg68rpg5VUhXzgJJKxpaGUUEo+EpygdNIU/Sctlf5BptIvV+Ie2HCdupfctMKq0lXFpeZrpl6qH9Q/0JUSfTMOZJ2Eks8Zd5OuVeGuyV2zBLTk2aan1MM9ittkJl7TOfXyTT1JY2dnRqBEs9RiRqD5ODIoQB+pUeqkkubl4EINVEKzcSmhYSGH7hFHByfzhYMPqHu/jT367eCd5BzxpB6Ebholseo+0uJHLHfFpHLXSCSa3E3ukePLXRYSlI5YDaFCtCEZRUVKkToyqSR5IlWoVclLaSlfJC5VF+uXJX0m/Oe6GNfdTCS53YrmZlBeSyfSXG5FMVVXuqq69CQrO29KkhzCk51XnpTPhXAp8t5p+VwaVxVcufTkjIxsTLkVNyLm/DtCBxOsl4+w3Iablbo73Ny9l48gBRJuU2VqlufiBQnTTB/MOt68/Ovm5ZmDM+oW1X4C41QGYJ/pR1NgoMrBSKRygzomsuGGFzaMyZRMg7U2vPBCt0t++7rbXe72llOkaWwp7jsehLYzENr6SMRjUV1J2huPwVInu13KRPk0seXNiV0ZCgl8WChNCPVg7JmOwT3XxF7ik9mkoldfYtNjPerek53cHBxwfmam1vin6sXqm5RN71gzbnbfkn5LcCvd6/qN+y3xlucb4c53j0we6R2VPirYrra7b1Z1LU3LyEjLyBjFi0S+qo1Uf6ne435FvOhRq9hMxtmsALEBOibdBPEwJbPc4UmYSS+bZ2VkFiu6z/KllvvqL/GzmX7mt4Zllvt72UhreGpxkvB/5ZtLX5HTVXZpLssdVtilMb9maKWawPa4tSdnzZDnLZ9+1HG86Ue/PkpVg19Hmpd/FJFcZprHllIza25uZqpLCZuUEqCQmRHMUAsKwsNdKYHguLIJShUzamKvfxn7Y2wju5aVM+9jC8tif8h+9KpHXnu566odPOfCY5+zO9g8diX7xdaL7Wkr1n0ROxH74sstFJO2G4091ef47QorXOIuVUrVBncbPGKzW3Mxlecrgmuku+FAylp4Ri8rtpJcGnyI5FeBspgifA28jXfwzVzhWfrg44mp1Z/X2M2tiU3OnhqsRAL/+Whoc8kdxZqxn8bLHcU+iE1XbovNUJ779tt/TJkr9boLazoCemVRpzVR0zW3FsjQg+6z9LPc2gXuuYEtgXtS7h12f3B74Ongu8M+dh13ebzJybhsa/lp7mSP6T3kYz5scmu4ldOQ05Ij2nI6criZU5rTldOfo+QwvCOaWaVZ/VkiS8aC7LHt38WC6YHm5SuONyeC01HH46W6y9NCKekZQWn2CeMRqAI+Hh5eUFBYMP4uNtKTdsf1azqy2cjSG488+fv31qTnwUk/OTBx3hWXbXlSRE7GYt++v6Wp9f7z1xyX8WIL4sV+zG8Yhehb66ZJ/nP8F2hLPUuTd7i3+7rCe3xH3Eku3ZWESSdN8E3zTfNresCdku5L96cHJvgm+M/yt/uuCbyZ5LnafXXWVXkb3Ruzbs5zuYPp7mS/b7av3bfOd7fvEZ/qM73J6V5vsj95mDcjmJ8WSGct6V3pPD2dzJAMlV6fbxjpPhkwCskb8HLvWzmFXS7b1e867FJcG9rCzAyXhnk4NOz7wXP42AXfGQz2Ot589Ovmo6fCw3fhkyFOTNowJtLsuyHwAkuZRCg7fr28uRkxtSwYHJbu0oLBjLSQGMPD4ZQUx7zlMGs4vIUv+8vbHc8923LD0p7Yg++smHPxpZV/eHtp5cyzR+z+VN0789WbHn03d+LNO2N/ZlU7m0KDD4gZIxprzr0wWZU+dC9sHJbnBfud5XMLl54lMnQlVUeE7I1TT6qnSsh9fWFzueRW0ew55aJM09M1TRc655pwK5y7UVAsyCgW2pUy1yG5C+BYWZanwdPiEW2eDg/v8vR7eOKM0d1DnUpu+WbPLneXOXbrxyGZOHa+czWETzjbKW9Dydkfjs0oYTc8iKqJcCoD54Dl9hWW6yYSqfXTiK+65QRZPIizUx2pjj2e8XqHZ7wzsZ9kjynXZyNRRVCUCUso08R6HJddelT/SLheEIf093VhihK9XEzWZ+o/F1v1LrFLt8VB3ZM4vMaNL+fWOOfwGrC8JWXl3JSJlj4eNfdY7tCYcj4HiSM97QwTJSQ617RMLjK00bxQm8zHaTO4pV3E52rudJ6jTed12n3aTu01/h7/jH+q/Qf3FPKR2rna1dpG7XHuwoZbseK7a7a0kjNHkn7DUuQtIeVeZvJGlhZ7d7Ab261YvHlimth/sjZxLtyKZDfWX9CyPlKxKGXl5apcnHC+w62q9IxyUi21Qe1QB1TVUFvUNvWYqnSoiNxcEDzlPdxwbBog0S/PA7mMh1FS6Epl7NahEL5i6BJTlQgSUkkomHIrG6nuPTEN2+UV6PFnpcC5I42xcsRE5nJNVJLcuwTnrgJmqqUqV3fpr++U9yIZKwOVx2XcOTq2NA0dyam+wrJin7Is4ZX85N9kStCD0cO4ehWo/bgTzbXcP+XX8U1ccKWXjeq5xPHTi5/W3SqjZDftwwsyJ8abLa9KiqGYiq0oSlbSXradddEpj5T3Mmcu2MzOPg2FUlza+AkjKsaJgtin971xJeOlHynhzXXxEa/cTGwkdBiHMyQZOuSxKuuSpzL3ZPflvKr8JvNw5uGsw9n61JypuVPz5mbdr/wic4eyLVd3ZZs00lWRfbYyNXNq1tRsfUTmiKwR2SJYoMxVNmY+kPNA7gN5O3J35OmplBfIM/PG5l2Vty5vc947eXqeXLZg+rDyPB5I9ucFyEwsiiX3FlY2NYgzmj/Uw1myX34NFTaSS5J5soX65G1pqvtIMMhmQuVsw38ksJpnnfHmc87Mp3+Nc/j48krsRnkOR5Z/hBiGM7gSO5GljIs0y5cayov3R1MmSR2ifodZvsAkRQ9MUvUU8JRJCVdtSuxWy+POycrhOWlM/rceOsJfs7wJyaPxAOXEBygXlBcfGLr74KBPCU1IrZhQIeMfjngtf8KIcWVOgEQk1pTkk4WBri+fiZy5qKlxsR77LIvpL7337VnTx8WOnxVkauwfdzP3H7qrLjj/4kVLr8v97NUvnlzQM7/664YCuk/D2s+Nf6r4sE4+WO0uq/7qpI1J29kOTZ44T7tfdutzU5qCTdlzjctSFgcXZ19m6JP4JNcE9wTvOfwcV517mne7+zX+iusF9wve9/gfXG+53/KmBDLNTJ4pTZEPG2du072Gv8TP/dLi/m2k5h2ZqTAle3j6EU9W6JSxHVtPh6GPRpZLkjbB/mZlGcGUgOYKD8dVp2JCBgwgbznyvK2YkBIoKOBlb199x+bVb78TO4F0XEMwr3zmuART++/dHbsk1rJnCzuHbWMP7tnyefWcK2J4nrWq51wu9/Oz1Vj4C+Crmeo28tDNfaQgmI31p5QnebI9ZyoTk85W53p2eJ7xvO55z5MU8jCP0MjwlHh4iafKM9MjPHJWnr28iwR7/GnOmaLpyXova+wp0Rgudi2Wj88UTGR78dKTPDTbSulXuAMNOtsqcNRxKxnhm+W0I9jhw1ycZ4RSUysuEM+uPn4ji/27dvQl5SGm/rY9dm4s7TlWyq/+D+g+HeuXg/UbRe9ZZRuGvTKMX5e7KZdvE79Wt6fvEXvVPenvZ/4pSw+ms9uCt2XwUJKXFJaRFgwZ3kByUi8bYSXP9DLLewcOeS8L9jJu+Y20kjSeJieWti1HZdg0TwUQGxBDsKZlqFa2FXrt5H7souRg4Mha4w5jq7HLOGioxoB2ZOYINiI7EjySsZodoayi0wv89dASI4qk4CIwtKVkIovLj8r5J+4CQ/sCtsAGoOa0fGe9Hf/XKoKnN8IUPq5M/iufJu8LFB4+YjoLeFecd8HqFbMm1Bsrrm485+xLPbHBnCuev+bQDZe9ueae2Ce//03sBFsfWnzlural1w/7WCy54NzGhS2j12+9cN3lG59dmbN//bOxYx//X9BPtE5lbmRzdHJlYW0gCmVuZG9iaiAKMiAwIG9iaiAKPDwgCi9UeXBlIC9QYWdlcyAKL0tpZHMgWyA4IDAgUiBdIAovQ291bnQgMSAKL01lZGlhQm94IDMgMCBSIAovQ3JvcEJveCA0IDAgUiAKPj4gCmVuZG9iaiAKMyAwIG9iaiAKWyAwIDAgNjEyIDc5MiBdIAplbmRvYmogCjQgMCBvYmogClsgMCAwIDYxMiA3OTIgXSAKZW5kb2JqIAo2IDAgb2JqIAo8PCAKL1Byb2NTZXQgNyAwIFIgCi9Gb250IDw8IAovOSA5IDAgUiAgCi9hIDEwIDAgUiAgCj4+IAovWE9iamVjdCA8PCAKL2ltZzAgMTEgMCBSICAKPj4gCj4+IAplbmRvYmogCjcgMCBvYmogClsgL1BERiAvVGV4dCAvSW1hZ2VCIC9JbWFnZUMgL0ltYWdlSSAgXSAKZW5kb2JqIAo4IDAgb2JqIAo8PCAKL1R5cGUgL1BhZ2UgCi9QYXJlbnQgMiAwIFIgCi9SZXNvdXJjZXMgNiAwIFIgCi9Db250ZW50cyBbIDUgMCBSIF0gCj4+IAplbmRvYmogCjkgMCBvYmogCjw8IAovVHlwZSAvRm9udCAKL1N1YnR5cGUgL1RydWVUeXBlIAovQmFzZUZvbnQgL0FBQUFBQitBcmlhbCAKL0ZpcnN0Q2hhciAzMiAKL0xhc3RDaGFyIDkwIAovV2lkdGhzIDE0IDAgUiAKL0ZvbnREZXNjcmlwdG9yIDE2IDAgUiAKL1RvVW5pY29kZSAxNSAwIFIgCj4+IAplbmRvYmogCjEwIDAgb2JqIAo8PCAKL1R5cGUgL0ZvbnQgCi9TdWJ0eXBlIC9UcnVlVHlwZSAKL0Jhc2VGb250IC9BQUFBQUQrQXJpYWwsQm9sZCAKL0ZpcnN0Q2hhciAzMiAKL0xhc3RDaGFyIDQ2IAovV2lkdGhzIDE5IDAgUiAKL0ZvbnREZXNjcmlwdG9yIDIxIDAgUiAKL1RvVW5pY29kZSAyMCAwIFIgCj4+IAplbmRvYmogCjExIDAgb2JqIAo8PCAKL1R5cGUgL1hPYmplY3QgCi9TdWJ0eXBlIC9JbWFnZSAKL05hbWUgL2ltZzAgCi9MZW5ndGggNDAxMiAKL0ZpbHRlciBbIC9GbGF0ZURlY29kZSBdIAovV2lkdGggMTgxIAovSGVpZ2h0IDE4MSAKL0JpdHNQZXJDb21wb25lbnQgOCAKL0NvbG9yU3BhY2UgMTIgMCBSIAo+PiAKc3RyZWFtCniczV3tcvOsDhzG8TSe4f6v9zSOBavVSjh92jkvP+oYkFg+LGRJuK3lqVO68o6N6lDds1zkB15JG9sB5RJXWahAPz1DBS7Lvwn6O+95A/S26cIxdocHs00aCXr7EPTF/3X9ZjxoU1xnWdYjw/y+fL3yvn8/r/rbVeeL6j43kU9pxzaOSfvK374n8yhxfRc8DsEVGBrI9uU7cTwuvl80crYmMZ/TTp20636xL3Gdf0QpjpJ1eRSe03k4oG52jqNzfhgtbGuby24sxUeBK5tCB1o0xPlc5yPQbT7gqn0FequWRwcRR1Vc/j+ANhE5ROVFl+NSzFWjSYewnjVSNr4c8aLTfwFaTq2i/e+AHg/O6yF86AfqONageU/4K9Av0QYi6hSFXYgutT0LvsevgeYyuP+y35u7+E0CNp00Md1fgp73r213bL1+Oz5/b3dAb2n7fwM61J2KD8vhYqQH3f8D9FvFfIx6x93lYWv/E9BMxHJWMh3lDw0eB4LpZGcrXLpHfnp4NNRMMBgeoQ9AF8vjmYGmB4EUF7sf5aBXDz6kBxv9qHdoZUu2r/IFoRM5rCLaPdCZXj2AIWSkt3oor9XySETezMcGrxSEO+kSjRQo20xcp7i+/VbymjAcIs/nh0K1jV5yFu8n3bVtWzkvJ6AfPLcCNLUv80WPImgaaZUnAfS4DJS8VhhKXEvQjwiQQO+lKgr013Wn5XG+L+7dpyXoJJlc5KuT36/r7vNDOV934rdfwCddaULYjqJQyOvsPsr1z+g1XYqr6JCT01F+bnTlxhP6lB/zLXAVHTrlIshllp92P/K/PAhJX/Az+pFf4ErTkIv24kkPyEHXoVev6BN+ZtxR77MBV1I05eIpZ1l+ginLkgNd0Et+9vtYYF6VByDUyKpuRp/xq3h/lP6ToK2iWvHcEOY3kqdZXShzRpmW2ENu8PkY9APr989Au23cgfhn0KAL1yNNL672YBm94gOGxjOfFavW/AOrQB+Hk48Dtv34IoaY38hE0KcI25hP79Gkq1TY5vmEdOE5y7+woE/9eBjFcbQ6yVPeLIB+2K+NkI026kUX+HBnDOd7c/Ggp34sQI/6bPay5TLpj7h2nZuiOT19gtzStW4T6AoYZDLSUkxleUyrwGS8NegmQQeX2gK0UzV7FG2fgk5FoS2PgwiC+IP8zH+4U740tnMSnZd1ss7cA134D13+U0/ph6AfWMZ1c9DCT4i2gZkPNmcwNAZeJL8DaOEzdNgSxxGPnPMTomsO8zuIto3qmfxnE3Ay0gH1F2DLXHT84Dk/4SvxA2KbzIXEGc+tU8rYbnYSGlVnP+nkPLXeLkAXchbr4nZ9+Ho+H+X3Iz4L3n7yxDZGXSHXpXx2oJO6WT3Oz/ir5SJBr0d6LWep4SCSKP+43Mj7Fmnd/nALdDVKCKZRUvXh3tlJrnQ67BPDjDS6L0c4AV2qqAXo5ZS7vMS9sQaNDxo5fAYDoSezvfmsS3bsUY/8iq6D4NB3fPEBvMqHaGE3haG+VMWhGjJAtje/EtqxUWQK0XjWOSh0AvnSsjkGU2E3dk5MaNzpyZl/EBoLmxP7FYHXCFLhlwVYldvTTamzG5O7eNQTS0H4B3FacfpdPocNQTgQ1rdlNpara5xGLCsLoJORHmCbULjgwbvTjqOFSmw35hAIVw/ul6LqurIK6+Q1vI+aSLT62wExT9f9tEOw3bjDfVaPQboR8flsx0Z5jXrGTu2ciWW7GpV06lT+TdDtjn9StcN1u3uwjihf8wdDvICy/9DlL/yTAxjhGb+9knCKMBMtLF9bLoLCqz4rxJRf+idhNB0e4OVUzNEWytEu7MUk7F3XMxCoT7uRzjsZ8NjtGCQ3pfBKNBrItlWarmy6R37inwygFZ6rC465SjRlob7KV/dVftZmhemfQAv1MohAy991/qegJ5+CgOOY0R+4t2mfZr2ZNxveVEK68jmokI1Gc1Oresn+vLXf0I+mms0UNG/rYpsfPN5jqHx3ptR4vXpcTZ4HvRleUIfNujl7B5Y5UKcCBS++TqE6PGgUcYja/IR8j/5AoTcPU8DRp+pqfGCAnYwHVfWkh/tgX1GbiY3I0NVRr+4gb5Vct2zUl9HuwYOCI23PDN07+8oYab9tXwXHxIh6NfsD7cp5OL0cb2194+Vx7gO4jDAOG1/zEKwDDYnvsR7Wd/dJXAfTMP+szNG1qDIy6FJfTkFHOmcqtnZ/BLov7MtqxNUIKsZV5/oiuCVrW46a6u2fgL4ZTp+DdnZnenFV8pTKHGgVp2cpC8DCF1p22KtALGF3ZhOvcTlF2h7tJC6/kTx2mNsUjSQSh+kA2gOIYqRZx2jAvDUXhLJbZ8h4PvKt0ww6M96wkQbAd7yPy+fwLgg33UnYzvnbXr9cPsXp4SwKM5nxmcuAX+O20C4U+oR52Qsp18V8CTppPKOd9887oJ2lPoQG2zihaOR8wVeZfl+pjutL6HwjMf7ZNcpgFXNF1zTNWb4TX048qDAFasQjcS8AZPF0Fc2dtjVoJy9beOF8J3TYKwD5OcLMfoHlhkPSM2hWId/wZHKhERG0PkdY2C+cy45NwSVoA8vGGDGFQ44qZlau6JX94vUDnaOGI7OfBNDutai1YL9450U7iSxP4qdx7AOYbW7hqf0kgI6jmuYxsSpX9J4uHlSo6CvQH4eeJeUrEzCGIBP9U9JL0AwCG/fXZ6ibMUVwNChWxwzlqZGHNxU3yglouX1/ADpsv6qOA1K0fxN0bt+4BzoqOsFR9L4ZD6Fsn0GjH/GVqvhnIW8DHXXCqZQshzupvj2aglklnaZna7Qv4p/ximB7NPIE+g4ZyriTgAz27GHk5+Ef94l9Q4ALEkJNt+UFMxrp0Rn9vAo/omtEALoNGsrUvc6PenME3X4F9J7kZ6ClftzI/lKAniJyBS4D9vq936DvycsB5O+Josb17o9oBfrmjKSzel6f9zBMxKUefRGIuLolaK67KdDeHs20od4whHYv2pJeOsmHjWefxMDXsoNCLIC3s0cLclfvZMV6NAKlKQlx0VcZx1+fCfmNCdXLMdijCaTVR+N+l3EVEXSMi7YyBToLBwqghT36fU/2Ew5PUgDESMv1m4KGsi5So8T5qm0sc3p0ATrERS9AZ3aOV0plO9zn9hPVsAKkRi1jrhrnlB2abC1/CZCZPwKd2JkVD+adgF5v+yNTONJHg5s2Ak5a/yB50NG4WYIuXmytDafyDd7XlV/xFWhlN2HXHsZXW1LLg74Tko30Weyci0DE8c9SahgX4aw0mo35dP0guu+EZKBbg3Muztx1TAJ1L6es9xhn1/2yU/YU5vdGHX2M8wpy2oEkxqohBpdMpRSHS9CtHGkHOtg9mr7PQMtPzgFJiPv4FPQIrcuIVOpG5K+ukWLmdt6cqAPZy4HVnR9R+wHoxnEfN0E7uS5At+x1K/CToN0Hcxh0PC/OBwxS0PagbpT/ZuKW1nPQsOMqAb25y0x0DpHPI1piv6KJRXceUYy0MwFD2VBdU9AgT6Xe3KdanNqj0a+I4JCQQUNxdj6yHul5LsURv5lz3Mdi20VwfB7R0Shdu9n+8VgvD00cn2yVV4JO6BSPh2i3Ah1cbwvQG2/PvwEa2g3nYpSYY/nLm04ZD8KBJ8z8Wyxkfsisc1swvgvQvlelXF2PXsn7Hui4H0h5zHZociCxnC1BS/sF0JOhcXwGQxgmx37QSB6zKYFNDIcPmShBs55+lct4EsEvmIBxPwjxGWwzOygf9W0GDeCcng51Niw3UD0JZux6PxDxGXzuj48jJd9KItB9Lodov5j16ZgVzLlri4+r8rQymCz/HuicP/N8/X4Qj6wtGTrxi6BP/vxdBfidHR2UcR+uYe49AJLf5WgktxNaS+zPKTeXZfkN0O8yJ6+1f68ALZfC74EOtgm2H3t92vIdaPVhhsSu7X5XCpUls3sQ+IEaQ9ZAPjt9Gu0eA7MeuWDX5t+sun6Jut12Jypw3/fAxsAGj9eOD1Jm5+5iP8Df/JLQYR+gutOPKJfDNdVu+sT3l9Q58Qg67gf8G1/HXL6ru8X4aa4sRixNWFfRlcvjSdcUdJOg74iwCnRUJd+J4+/4d3ZUJCwPlN+dKy5+y6CWTvaNVWcapTuDI0frFujke0qDx1PxWn+36T7SJEZ6+Zv07MFDPFBOL65Aqw+e4cN/kAxLQMu4DtazB/9EdDXQiwG0MvkG1CRjD6fUqykysF34C1nPVo0A/VD2MeE7peqcMPJ4P2IGukfGQ26/2UT9G8sxT4ws5cdl5M1p4jtMH4HucY1yUvxq0PTAkvw2mhCycAc0T+svgpYmjI7nyFsL8cvl/1O52tjpPgWF9QiktKMUtP4QJTdYfVc01v0xaMnrDm1nvZgfBJf4Q8MMOosbEQeN8UWVD0TI+Gk8YNxIL24kclzbyegMzH2KQEV31XcmAbZXK3qsb/SsFzvhDg1ncdVGJDcb4YcMxhe0V1fOzzmorBfzeXDssfADurpiW3fL4Or++I1x07wMBGj8PEGZeJpK0EleLNeKE9cPoAX/FegyrronqireI58CtA6dmFac1aec895yXo/ylv+5QQCCnc3Ay878Iujwe+VnVPeKPtCcHBf/d6sEPV58+dv/az/jNdBdvfCyX5HldBmP14Vf0BLan3v351/aws8I99K0gPSveyenWS6q0WW/4FXGh9DR5/hm3lM/o3vA1awaPeIYcvrMFKixMl99Xty6302u/YxIF0CnR2G3e/8noAadq5s0cho00dypH+TiD0Cv9PHUz/gBaHyedFxeBhJBIBN1WF6Bel3D95Ryvi7tVPlT0I317ez/r2Q8E9CBL9N/Btrp0XzuMP9HSCMlcX0j3fi/iB+Dpm2Wzx2Go3oBc6tH+rjxfxE/Ai3kOMtfKy7jqLNZMD08+7+IEvxypNl/x/I3jdPonekV6DP/ZdeozjN+DLrpKVX5EjT9DiAWH3L4KWglx79UfgI6/cToVS+cG1/F7ynQ5f/V6sKZmXUuAWk0/P290Alqd97rkc6PkzKzljSwBJ18pzr7zOICtJa77zF+v/RL/Vd8H9qhLb5nreJLRj1hO5fLQ/3fqxPzm1bqv0rFpUFGXTvYt60S+yU7iVSPfqZD5aMxB8sQCG4KgoeLr7OGjC4AmB2JQYYBdPZ/r3qXn9tyMyLOlCMU/v8DK/u2jVHgpcCloGkkA+h6pOUDxvxUeyFw9gPQIU7vQ9BlfHUBOoYoc2OQOK6DU/b/arNzh1xP83um/snJtwAdp0WMxJ3fWZnkt/JP1qBjXEdgsiGYGP+hQa/5OYeQaq9aHhjXwQxQnl58QvyHBl3zYzt51l6WyOeYV+DblOAmP2Undxn/AwynP8wKZW5kc3RyZWFtCmVuZG9iaiAKMTIgMCBvYmogClsgL0luZGV4ZWQgL0RldmljZVJHQiAyNTUgMTMgMCBSIF0gCmVuZG9iaiAKMTMgMCBvYmogCjw8IAovTGVuZ3RoIDU1IAovRmlsdGVyIFsgL0ZsYXRlRGVjb2RlIF0gCj4+IApzdHJlYW0KeJztwaEJAEAIBdBfDILF/TcxiBNZxGCR2+PwPQBExMwioqpm5u4RkZlV1d0zs7s450cPcy0VkWVuZHN0cmVhbSAKZW5kb2JqIAoxNCAwIG9iaiAKWyAKNzIyIAo1NTYgCjgzMyAKNTU2IAozMzMgCjU1NiAKMjc4IAoyNzggCjgzMyAKNTU2IAoyNzggCjYxMSAKNTAwIAo1NTYgCjU1NiAKNjY3IAoyMjIgCjUwMCAKNzIyIAoyMjIgCjEwMTUgCjU1NiAKNjY3IAo1NTYgCjI3OCAKNTAwIAo2NjcgCjYxMSAKNzIyIAo3MjIgCjc3OCAKMjc4IAo2MTEgCjU1NiAKMjc4IAo1NTYgCjI3OCAKMjIyIAo3MjIgCjU1NiAKNTU2IAo1MDAgCjU1NiAKNTU2IAoyNzggCjU1NiAKNTU2IAo1NTYgCjU1NiAKNTU2IAo2NjcgCjY2NyAKOTQ0IAo1NTYgCjU1NiAKMzMzIAo1MDAgCjM2NSAKMzU1IApdIAplbmRvYmogCjE2IDAgb2JqIAo8PCAKL1R5cGUgL0ZvbnREZXNjcmlwdG9yIAovQXNjZW50IDkwNSAKL0NhcEhlaWdodCA1MDAgCi9EZXNjZW50IC0yMTIgCi9GbGFncyA0IAovRm9udEJCb3ggMTcgMCBSIAovRm9udE5hbWUgL0FBQUFBQitBcmlhbCAKL0l0YWxpY0FuZ2xlIDAKL1N0ZW1WIDAgCi9TdGVtSCAwIAovQXZnV2lkdGggNDQxIAovRm9udEZpbGUyIDE4IDAgUiAKL0xlYWRpbmcgMCAKL01heFdpZHRoIDI2NjUgCi9NaXNzaW5nV2lkdGggNDQxIAovWEhlaWdodCAwIAo+PiAKZW5kb2JqIAoxNyAwIG9iaiAKWyAtNjY1IC0zMjUgMjAwMCAxMDQwIF0gCmVuZG9iaiAKMTkgMCBvYmogClsgCjYxMSAKNzIyIAo3MjIgCjYxMSAKNzIyIAo3MjIgCjcyMiAKMjc4IAoyNzggCjMzMyAKNTU2IAo1NTYgCjU1NiAKNTU2IAo1NTYgCl0gCmVuZG9iaiAKMjEgMCBvYmogCjw8IAovVHlwZSAvRm9udERlc2NyaXB0b3IgCi9Bc2NlbnQgOTA1IAovQ2FwSGVpZ2h0IDUwMCAKL0Rlc2NlbnQgLTIxMiAKL0ZsYWdzIDQgCi9Gb250QkJveCAyMiAwIFIgCi9Gb250TmFtZSAvQUFBQUFEK0FyaWFsLEJvbGQgCi9JdGFsaWNBbmdsZSAwCi9TdGVtViAwIAovU3RlbUggMCAKL0F2Z1dpZHRoIDQ3OSAKL0ZvbnRGaWxlMiAyMyAwIFIgCi9MZWFkaW5nIDAgCi9NYXhXaWR0aCAyNjI4IAovTWlzc2luZ1dpZHRoIDQ3OSAKL1hIZWlnaHQgMCAKPj4gCmVuZG9iaiAKMjIgMCBvYmogClsgLTYyOCAtMzc2IDIwMDAgMTA1NiBdIAplbmRvYmogCjI0IDAgb2JqIAooUG93ZXJlZCBCeSBDcnlzdGFsKSAKZW5kb2JqIAoyNSAwIG9iaiAKKENyeXN0YWwgUmVwb3J0cykgCmVuZG9iaiAKMjYgMCBvYmogCjw8IAovUHJvZHVjZXIgKFBvd2VyZWQgQnkgQ3J5c3RhbCkgIAovQ3JlYXRvciAoQ3J5c3RhbCBSZXBvcnRzKSAgCj4+IAplbmRvYmogCnhyZWYgCjAgMjcgCjAwMDAwMDAwMDAgNjU1MzUgZiAKMDAwMDAwMDAxNyAwMDAwMCBuIAowMDAwMDM2MzQ4IDAwMDAwIG4gCjAwMDAwMzY0NDcgMDAwMDAgbiAKMDAwMDAzNjQ4MSAwMDAwMCBuIAowMDAwMDAwMTk0IDAwMDAwIG4gCjAwMDAwMzY1MTUgMDAwMDAgbiAKMDAwMDAzNjYyNSAwMDAwMCBuIAowMDAwMDM2NjgzIDAwMDAwIG4gCjAwMDAwMzY3NzUgMDAwMDAgbiAKMDAwMDAzNjk0NiAwMDAwMCBuIAowMDAwMDM3MTIzIDAwMDAwIG4gCjAwMDAwNDEzMzEgMDAwMDAgbiAKMDAwMDA0MTM4NSAwMDAwMCBuIAowMDAwMDQxNTIyIDAwMDAwIG4gCjAwMDAwMDEzOTIgMDAwMDAgbiAKMDAwMDA0MTg0MiAwMDAwMCBuIAowMDAwMDQyMTE2IDAwMDAwIG4gCjAwMDAwMDIwNjYgMDAwMDAgbiAKMDAwMDA0MjE1OSAwMDAwMCBuIAowMDAwMDI3MDgxIDAwMDAwIG4gCjAwMDAwNDIyNTggMDAwMDAgbiAKMDAwMDA0MjUzNyAwMDAwMCBuIAowMDAwMDI3NDcxIDAwMDAwIG4gCjAwMDAwNDI1ODAgMDAwMDAgbiAKMDAwMDA0MjYyMCAwMDAwMCBuIAowMDAwMDQyNjU3IDAwMDAwIG4gCnRyYWlsZXIgCjw8IAovU2l6ZSAyNyAKL1Jvb3QgMSAwIFIgCi9JbmZvIDI2IDAgUiAKPj4gCnN0YXJ0eHJlZiAKNDI3NDUgCiUlRU9GDQo=";
		//echo $fileToDownload ;
		//$fichero =$_SERVER["DOCUMENT_ROOT"].'/web_pago_facil//application/assets/documentospdf/factura'.$tnCliente.$tnFactura.date('y-m-d--H:i:s').'.pdf';

		$fichero =$_SERVER["DOCUMENT_ROOT"].'/web_pago_facil/application/assets/documentospdf/factura-empresa'.$tnFactura.'.pdf';
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/web_pago_facil/application/assets/documentospdf/factura-empresa'.$tnFactura.'.pdf';
		$d['documentopdf']=$fichero2;
	
		if($tnTipo==1){
			//si es uno demo mostrar normal 
			$this->load->view('pagosrealizados/vysorpdf', $d);
		}else{
			//si es distinto de uno se debe mostrar la url de googledrive
			$d['urlweb']='https://docs.google.com/gview?embedded=true&url=https://pagofacil.com.bo/'.$d['documentopdf'] ;
			//echo $taData['urlweb'];
			$this->load->view('pagosrealizados/vistaiframepdf', $d);
		}
		
	}
	public function enviarfacturacorreo()
	{
		$datos=$this->input->post("datos");

		$tnCliente=$_SESSION['cliente'];
		$tnEmpresa = $datos['empresa'];
		$tnTransaccion= $datos['transaccion'];
		$tcCorreo=$datos['tccorreo'];
		//var datos= {empresa:empresa,tccorreo:tccorreo, transaccion:transaccion };
		$metodos=$this->servicios->enviarfacturacorreo( $tnCliente, $tnEmpresa ,$tnTransaccion , $tcCorreo );
		$mensajeerror=$metodos->error ;
					$valor= $metodos->values;
					if($mensajeerror== 0 ){
						if($valor==1)
						{
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );
						}else{
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 );
						}

					}else{
						$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 );
					}
					echo json_encode($arreglo);

	}
	public function get_periodo_inversa($cadena)
	{
		$cadenanueva=substr($cadena, 0, 8);
		$porciones = explode("-", $cadenanueva);
		$arraymeses=[ "ENE" => "01", "FEB" =>"02" , "MAR"=>"03" , "ABR"=>"04", "MAY"=> "05" , "JUN"=> "06" ,"JUL"=> "07" ,"AGO"=>"08"  , "SEP"=>"09" , "OCT"=> "10" , "NOV"=> "11"  , "DIC"=> "12" ];
		return $porciones[0]."-".$arraymeses[$porciones[1]];
	}

	public function empresasafiliadas($lan,$empresa)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnEmpresa=$empresa;
		$tnCliente=$_SESSION['cliente'];
		$empresas=$this->servicios->EmpresasDetalle($tnEmpresa,$tnCliente);
		$empresadetalle=$empresas->values;
		
		$d['Descripcion']=$empresadetalle[0]->Descripcion ;
		$d['direccionempresa']=$empresadetalle[0]->direccion ;
		
		$d['telefonoempresa']=$empresadetalle[0]->telefono ;
		$d['direccionwebempresa']=$empresadetalle[0]->url_web ;
		$d['direccionfacebook']=$empresadetalle[0]->url_facebook ;
		$d['direcciontwitter']=$empresadetalle[0]->url_twitter ;
		$d['latitude']=$empresadetalle[0]->latitud  ;
		$d['longitude']=$empresadetalle[0]->longitud  ;

	
		$this->load->view('empresasafiliadas/index', $d);
	}

	

	public function metodospagomenu()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
	
		$tnCliente=$_SESSION['cliente'];
		$empresas=$this->servicios->listarempresasfull($tnCliente);
		$d['metodosdepagomenu']=array();
		if(isset($empresas->values))
		{
			$_SESSION['metodosdepagomenu']=$empresas->values[0]->metodoPago;
			$d['metodosdepagomenu']=$empresas->values[0]->metodoPago;
		}
		
		echo json_encode($d['metodosdepagomenu']);

	}
	public function vistacomision($lan,$metodo)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$empresaiID= '';
		$empresas=$this->servicios->getempresasimple($empresaiID ,$_SESSION['cliente']);
		$rubros=$this->servicios->get_list_rubros($_SESSION['cliente']);
		$metodosdepago=$_SESSION['metodosdepagomenu'];
		for ($i=0; $i < count($metodosdepago); $i++) { 
			if($metodosdepago[$i]->metodoPago == $metodo)
			{
				$d['comisiones']=$metodosdepago[$i];
			}

		}
		$d['empresas']=$empresas->values;
		$d['rubros']=$rubros->values;
		//		echo json_encode($empresas);
		/*echo "<pre>";
		print_r($d['comisiones']);
		echo "</pre>";
		*/
		
		$this->load->view('metodosdepago/index', $d);
	}

	public function puntosdecobranza()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$id_cliente=$this->session->userdata('cliente');
		$ubicaciones=$this->servicios->getubicaciones($id_cliente);

		$d["ubicaciones"]=json_encode($ubicaciones->values);
		$this->load->view('puntosdecobranza/index', $d);
		
	}
	public function vistafacturacionrecarga()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$metodopago=$datos["metododepago"];
		$tnIdentificarPestaña=$datos[0];

		//$d['nombrecliente'] = ""; //$datos["nombreclienterecarga"]; // $this->session->userdata('nombreclienteempresa') ;
		//$d['cionit']= ""; //$datos["ciclienterecarga"]; //$this->session->userdata('cionitclienteempresa');
		$d['numerocelular']=  $this->session->userdata('telefonoDePago');
		$d["correo"]= $this->session->userdata('correo');
		$_SESSION[$tnIdentificarPestaña.'montototal']=$datos["montototal"];
		$_SESSION[$tnIdentificarPestaña.'idfactura']=$datos["idfactura"];
		$_SESSION[$tnIdentificarPestaña.'metododepago']=$datos["metododepago"];
		$_SESSION[$tnIdentificarPestaña.'codigofijo']=$datos["idbilletera"];
		$metodopago=$_SESSION[$tnIdentificarPestaña.'metododepago'];
		$d['nombrecliente']=(isset($_SESSION[$tnIdentificarPestaña.'gaDatosBilletera']->NombreCliente)) ? $_SESSION[$tnIdentificarPestaña.'gaDatosBilletera']->NombreCliente  : "Sin Nombre";    ;
		$d['cionit']=(isset($_SESSION[$tnIdentificarPestaña.'gaDatosBilletera']->cinit)) ? $_SESSION[$tnIdentificarPestaña.'gaDatosBilletera']->cinit  : 0; 

		$montocomision=$this->servicios->calcularcomision($_SESSION['cliente'], $_SESSION[$tnIdentificarPestaña.'idempresa'],$metodopago,$_SESSION[$tnIdentificarPestaña.'montototal']);
		
		$this->cargarlog("calcularcomision-facturacion".json_encode($montocomision));

		$_SESSION[$tnIdentificarPestaña.'montocomision']=$montocomision->values;
		$d['comision']=$_SESSION[$tnIdentificarPestaña.'montocomision'];
	
		if($metodopago==2)
		{
		$tnCliente= $this->session->userdata('cliente');
		$tnEmpresa=$_SESSION['idempresa'];
		$billetera=$this->servicios->getbilletera($tnCliente,$tnEmpresa);
		if( isset($billetera->values[0]->Saldo)  )
		{
			$d['saldo']=@$billetera->values[0]->Saldo;
		}else{
			$d['saldo']="0.00";
			$d['mensaje']="Su billetera movil no se encuentra activada . <br> Contacte con el proveedor para activarla  use otro metodo de pago";
			
		}
		}
		$index=0;
		for ($i=0; $i < count($_SESSION['todosmetodosdepago']) ; $i++) { 
			//echo $_SESSION['todosmetodosdepago'][$i]->metodoPago."--".$_SESSION['metododepago']; 
			if($_SESSION['todosmetodosdepago'][$i]->metodoPago==$_SESSION['metododepago'])
			{
				$index=$i;
				$d['etiquetametodopago']=$_SESSION[$tnIdentificarPestaña.'todosmetodosdepago'][$i]->etiquetaBilletera;
				$_SESSION[$tnIdentificarPestaña.'etiquetametodopago']=$_SESSION[$tnIdentificarPestaña.'todosmetodosdepago'][$i]->etiquetaBilletera;
				$_SESSION[$tnIdentificarPestaña.'urlimagenmetodo']=$_SESSION[$tnIdentificarPestaña.'todosmetodosdepago'][$i]->url_icon;
				$_SESSION[$tnIdentificarPestaña.'urlimagenbanner']=$_SESSION[$tnIdentificarPestaña.'todosmetodosdepago'][$i]->url_banner;
			}
		}	
		$_SESSION[$tnIdentificarPestaña.'metodopagoelegido']=$_SESSION['todosmetodosdepago'][$index];
		echo '<pre>'; 
		print_r($d );
		echo '</pre>' ;
		$this->load->view('pago_rapido/facturacion', $d);
		
	}
	public function vistarecargas()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$lnBilletera=$datos["codigo"];
		$tnIdentificarPestaña=$datos[0];

		$tnCliente=$this->session->userdata('cliente');
		echo '<pre>'; 
		print_r($_SESSION[$tnIdentificarPestaña.'gaBilleteras'] );
		echo '</pre>' ;
		for ($i=0; $i < count($_SESSION[$tnIdentificarPestaña.'gaBilleteras']) ; $i++) { 
			if($_SESSION[$tnIdentificarPestaña.'gaBilleteras'][$i]->idBilletera==$lnBilletera){
				$_SESSION[$tnIdentificarPestaña.'gaDatosBilletera']=$_SESSION[$tnIdentificarPestaña.'gaBilleteras'][$i];
				$d['taDatosBilletera']=$_SESSION[$tnIdentificarPestaña.'gaBilleteras'][$i];
			}
		}
		$_SESSION[$tnIdentificarPestaña.'idempresa']=20;
		$_SESSION[$tnIdentificarPestaña.'periodomes']="RECARGA";
		$_SESSION[$tnIdentificarPestaña.'nombreempresa']='Recarga Billetera PagoFacil';
		$_SESSION[$tnIdentificarPestaña.'urlimagenempresa']="https://www.syscoop.com.bo/Url_Icon/SYSCOOP.jpeg";
		$_SESSION[$tnIdentificarPestaña.'nrofactura']=0;
		$d['urlimagenempresa']=$_SESSION[$tnIdentificarPestaña.'urlimagenempresa'];
		$d['nombreempresa']=$_SESSION[$tnIdentificarPestaña.'nombreempresa'];
		$metodos=$this->servicios->get_metodos_pago_empresa($tnCliente ,20);
		$d['metodospago']=$metodos->values->aMetodosDePago;
		$d['tnBilletera']=$lnBilletera;
		$d['tnMontoMinimo']=$d['taDatosBilletera']->MontoMinimoCargaDiaBilletera;
		$d['tnRecargasMaximo']=$d['taDatosBilletera']->NroCargasDiaBilletera;
		$d['tnRecargasHechas']= $d['taDatosBilletera']->RecargasAlDia;
		echo '<pre>'; 
		print_r($d['taDatosBilletera'] );
		echo '</pre>' ;
		$this->cargarlog("taDatosBilletera".json_encode($d['taDatosBilletera']));
		
		$_SESSION['todosmetodosdepago']=$metodos->values->aMetodosDePago;		
		$this->load->view('pago_rapido/vistabilletera', $d);
			
		
		
	}

	public function busquedabilleteradependiente()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnBilletera=$datos["codigo"];
		$tnCliente=$this->session->userdata('cliente');
		$tnIdentificarPestaña=$datos[0];
		$billeteradependientes=$this->servicios->getbilleterasdependientes($tnCliente,$tnBilletera);
		$laMibilletera=$this->servicios->getbilleterausuario($tnCliente);
		$d['billeteras']= $laMibilletera->values ;
		$d['tcTitulo']= "Su Billetera " ;
		for ($i=0; $i < count( $billeteradependientes->values) ; $i++) { 
			$laMibilleteraAux=$this->servicios->getbilleterausuario( $billeteradependientes->values[$i]->idCliente);
			array_push($d['billeteras'], $laMibilleteraAux->values[0]);	
		}
		if(count( $billeteradependientes->values)>0)
		{
			$d['tcTitulo']= $d['tcTitulo'] . "Y sus Billeteras  Dependientes" ;
		}

		$_SESSION[$tnIdentificarPestaña.'gaBilleteras']=$d['billeteras'];
		$this->load->view('pago_rapido/lista_billeteras', $d);
	}
	
	public function busquedabilleteras()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnBilletera=$datos["codigo"];
		$tnIdentificarPestaña=$datos[0];
		$tnCliente=$this->session->userdata('cliente');
		$billeteras=$this->servicios->getbilleterausuario($tnBilletera);
	
		$d['billeteras']=$billeteras->values;
		$d['tcTitulo']= "Busqueda Realizada con Exito" ;
		for ($i=0; $i < count($d['billeteras']) ; $i++) { 
			$d['billeteras'][$i]->Saldo= "";
		}
		$_SESSION[$tnIdentificarPestaña.'gaBilleteras']=$d['billeteras'];	
		$this->load->view('pago_rapido/lista_billeteras', $d);
	}

	public function listarempresafrecuentes()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$region_id=$datos['region_id'];
		$rubro_id=$datos['rubro_id'];
		$tncliente=$this->session->userdata('cliente');
		$laEmpresasMasPagadas=$this->servicios->listarmaspagadas($tncliente);
		$d['empresas']=$laEmpresasMasPagadas->values;
		$_SESSION['todaslasempresas']=$d['empresas'];

		$laEmpresasMasPagadas=$this->servicios->getEmpresaAccesodirecto($tncliente) ;
		//$laEmpresasMasPagadas=$this->servicios->listarmaspagadas($id_cliente);
		$d['empresasaccesodirecto']=$laEmpresasMasPagadas->values;

		$laMibilletera=$this->servicios->getbilleterausuario($tncliente);
		$lbEsBilletera= false;
		if( !is_null($laMibilletera) && count($laMibilletera->values) >0   )
		{
			$lbEsBilletera= true;
		}
		

		foreach ($d['empresasaccesodirecto'] as $key => $value) {
			
			$lnEmpresaAux=$value->Empresa ;
			if($lnEmpresaAux  == 20  && $lbEsBilletera == false )
			{
				unset( $d['empresasaccesodirecto'][$key]);
			}
		}
		$this->load->view('pago_rapido/listarempresasfrecuentes', $d);
		


	}

	public function obtenerhora()
	{
		echo date('h:i:s A');
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	}



	public function vermiubicacion()
	{
		$ip="mi.ip.";
		$new_ip=$this->get_client_ip();
		if ($new_ip!==$ip){
            $now = new DateTime();
			$datosip=$this->ip_info($new_ip, "Country");
			$this->cargarlog("datosip--".json_encode($datosip));
			return $datosip;
			
        }


	}


    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        }
		return $ipdat;
	}

	public function guardariptransaccion( $tnCliente,$tnEmpresa , $tnTransaccion)
	{
		$ip="mi.ip.";
		$new_ip=$this->get_client_ip();
		if ($new_ip!==$ip){
            $now = new DateTime();

       //Distinguir el tipo de petición, 
       // tiene importancia en mi contexto pero no es obligatorio

			$datosip=$this->ip_info($new_ip, "Country");
			/*echo '<pre>';
			echo $new_ip;
			print_r($datosip ) ;
			echo '</pre>' ;
			*/
			$laServicioubicacion=$this->servicios->guardarUbicacionDePago($tnCliente  ,  $tnEmpresa,$tnTransaccion, $datosip->geoplugin_latitude ,$datosip->geoplugin_longitude ,'$new_ip' );
			$this->cargarlog("llego guardar ubicacion --".json_encode($laServicioubicacion));


           
        }


	}

	public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
		 }

	public function error404($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error404', $d);
	
	}

	/**/

	public function error($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}

	/**/

	public function error403($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}


	public function verificarqr()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		$datos=$this->input->post("datos");
		$tnTransaccion=$datos["tnTransaccion"];
		$tnIdentificarPestaña=$datos[0];
		$this->cargarlog("datos--".json_encode($datos));
		$tnCliente=$_SESSION['cliente'];	
		$metodos=$this->servicios->verificarqr($tnCliente , $tnTransaccion );
		$this->cargarlog("verificarqr--".json_encode($metodos));
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
			if($mensajeerror== 0 ){
			if(isset($valor))
			{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'Estado' =>$valor->Estado );
			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
			}
		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
		}
		echo json_encode($arreglo);
	}

	public function GetFacturaPagoFacil($lan,$transaccion)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$datos=$this->input->post("datos");
		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$transaccion;
		$tnEmpresa=   $_SESSION['Empresaid'];;  //$tnEmpresa;
		$tnFactura= $_SESSION['Idpedido']; // "LNK-1379" ; // $nropago;

		/*	$tnCliente=16468;
		$tnTransaccionDePago=$transaccion;
		$tnEmpresa=  1;
		$tnFactura= 479813;
		*/



		//$facturapagofacil=$this->servicios->getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		$facturapagofacil=$this->servicios->getfacturapagofacil($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		$this->cargarlog("GetFacturaPagoFacil--------------------".$tnTransaccionDePago."--".$tnEmpresa."--". $tnFactura."--". $tnCliente  );
		//$laDatosEmpresa=$this->servicios->getempresasimple($tnEmpresa ,$_SESSION['cliente']);
		//$lcNombreEmpresa=$laDatosEmpresa->values[0]->cDescripcion;

		$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
		//START DOWNLOAD
		//header('Content-Description: File Transfer');
		//header('Content-Type', 'application/octet-stream');
		header('Content-Disposition: attachment; filename=FacturaPagoFacil-'.$tnFactura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		//	readfile($fileToDownload);
		//	exit;
			
		echo $fileToDownload;
	
		
	}





	public function GetFacturaEmpresa($lan,$transaccion)
	{
		
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$datos=$this->input->post("datos");

		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$transaccion;
		$tnEmpresa=  $_SESSION['idempresa'];
		$tnFactura= $_SESSION['nrofactura'];


	
		

		$facturapagofacil=$this->servicios->getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		$this->cargarlog("GetFacturaEmpresa--------------------".$tnTransaccionDePago."--".$tnEmpresa."--". $tnFactura."--". $tnCliente  );
		//$laDatosEmpresa=$this->servicios->getempresasimple($tnEmpresa ,$_SESSION['cliente']);
		//$lcNombreEmpresa=$laDatosEmpresa->valu111111111111111es[0]->cDescripcion;

		$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
		//START DOWNLOAD
		//header('Content-Description: File Transfer');
		//header('Content-Type', 'application/octet-stream');
		header('Content-Disposition: attachment; filename= FactutaEmpresa-'.$tnFactura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		//	readfile($fileToDownload);
		//	exit;
			
		echo $fileToDownload;
	
		
	}
	public function cargarlog($Mensajeerror)
    {
	  $mes=date("m");
      $logFile = fopen("log$mes.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }

	public function cargarlogsession($Mensajeerror)
    {
      $logFile = fopen("logsession.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }
	
	/**/
}