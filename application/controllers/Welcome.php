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
        $this->load->helper(array('url', 'language'));
        
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

    // destroy session
		//$this->session->sess_destroy();
	/*	$d['datossession']=$this->session->userdata();
		echo "<pre>";
		print_r($d);
		echo "</pre>";
	*/
		$this->load->view('index', $d);
	
	}

	public function pago_rapido()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		//echo "hola mundo ";
		$id_cliente=$this->session->userdata('cliente');
		$d['rubros']=$this->servicios->get_list_rubros($id_cliente);
		$d['region']=$this->servicios->get_list_regiones($id_cliente);
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
		$d['empresas']=$this->servicios->get_list_empresas_by_tipo_region($rubro_id,$region_id,$id_cliente);
		$_SESSION['todaslasempresas']=$d['empresas'];
		
		//		echo json_encode($empresas);
		/*echo "<pre>";
		print_r($d);
		echo "</pre>";*/
		$this->load->view('pago_rapido/lista_empresas', $d);
		


	}
	public function  busqueda_clientes()
	{
	
	//get_busqueda_codigo_fijo($id_empresa,$codigo_fijo,$codigo_cliente)
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$empresa_id=$datos['empresa_id'];
		$codigo=$datos['codigo'];
		$tipo=$datos['tipo'];
		$tnIdentificarPestaña=$datos[0];
		$id_cliente=$this->session->userdata('cliente');
		
		if($tipo==1)
		{
			$d['clientes']=$this->servicios->get_busqueda_codigo_fijo($empresa_id,$codigo,$id_cliente);
		}else{
			$d['clientes']=$this->servicios->get_busqueda_ci($empresa_id,$codigo,$id_cliente);
		}

	
		$_SESSION[$tnIdentificarPestaña.'idempresa']=$empresa_id;
		$_SESSION[$tnIdentificarPestaña.'clientesbusqueda']=$d['clientes']->values;
		/*
		if(count($d['clientes']->values)>0 ){
			$_SESSION['codigofijo']=$d['clientes']->values[0]->codigoClienteEmpresa;
			$_SESSION['codigoubicacion']= $d['clientes']->values[0]->codidgoUbicacion;
			$_SESSION['nombreclienteempresa'] = $d['clientes']->values[0]->nombre;
			$_SESSION['cionitclienteempresa'] = $d['clientes']->values[0]->Nit;
			
			
			
		}*/

		$this->load->view('pago_rapido/lista_clientes', $d);

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
		//echo "hola mundo ";

		$datos=$this->input->post("datos");
		echo '<pre>';
		print_r($datos ) ;
		echo '</pre>' ;
		
		$lnEmpresa=$datos["empresa_id"];
		$lnCodigoFijo=$datos["codigo"];
		$lcUrlIconoImagen=$datos["urlimagen"];
		$lnCliente=$this->session->userdata('cliente');
		$tnIdentificarPestaña=$datos[0];
		
		try {
			//$_SESSION[$tnIdentificarPestaña.'clientesbusqueda']=$d['clientes']->values;
		
		for ($L=0; $L <count($_SESSION[$tnIdentificarPestaña.'clientesbusqueda']) ; $L++) { 
			// /	echo $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codigoClienteEmpresa."====".$lnCodigoFijo ;
				if($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codigoClienteEmpresa==$lnCodigoFijo)
				{
	
					
					$_SESSION[$tnIdentificarPestaña.'codigofijo']= $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codigoClienteEmpresa;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
					$_SESSION[$tnIdentificarPestaña.'codigoubicacion']=$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codidgoUbicacion; // $d['clientes']->values[0]->codidgoUbicacion;
					$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->nombre;  // $d['clientes']->values[0]->nombre;
					$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->Nit;// $d['clientes']->values[0]->Nit;
	
				}
			}
			//$lista=$this->servicios->get_listar_facturas($lnEmpresa,$lnCodigoFijo,$lnCliente);
			$laServicioListarFacturas=$this->servicios->get_listar_facturas($lnEmpresa,$lnCodigoFijo,$lnCliente);
			$this->cargarlog("listarfacturas".json_encode($laServicioListarFacturas));
				
			if(!is_null(@$laServicioListarFacturas->values)  ){
				$d['facturas']=$laServicioListarFacturas->values;
				$d['cantidadfacturas']=count($laServicioListarFacturas->values);
				//unset($_SESSION[$tnIdentificarPestaña.'periodomes']);
				//unset($_SESSION[$tnIdentificarPestaña.'nrofactura']);
				$_SESSION[$tnIdentificarPestaña.'periodomes']=$laServicioListarFacturas->values[0]->periodo;
				echo "leo===".$_SESSION[$tnIdentificarPestaña.'periodomes'] ; 
				$_SESSION[$tnIdentificarPestaña.'nrofactura']=$laServicioListarFacturas->values[0]->factura;
				$lcPeriodo=$laServicioListarFacturas->values[0]->periodo;
				$lnFactura=$laServicioListarFacturas->values[0]->factura;
				//$lnCodigoFijo=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
	
				$this->cargarlog("factura a pagar :".$lnFactura . "--" .$lcPeriodo);
				$d['periodomes']=$this->get_periodo($laServicioListarFacturas->values[0]->periodo);
				for ($i=0; $i < count($laServicioListarFacturas->values); $i++) { 
					$laServicioListarFacturas->values[$i]->periodoaux=$laServicioListarFacturas->values[$i]->periodo;
					$laServicioListarFacturas->values[$i]->periodo =$this->get_periodo($laServicioListarFacturas->values[$i]->periodo);
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
			$this->load->view('pago_rapido/facturaspendientes', $d);
		} catch (\Throwable $th) {
			echo '<pre>';
			print_r($th ) ;
			echo '</pre>' ;
			//throw $th;
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
		header('Content-Disposition: attachment; filename=factura-'.$factura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		readfile($fileToDownload);
		exit;
		
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

		$tnIdentificarPestaña=$datos[0];
		echo '<pre>';
		print_r($datos ) ;
		echo '</pre>' ;
		
		try {
			
		for ($L=0; $L <count($_SESSION[$tnIdentificarPestaña.'clientesbusqueda']) ; $L++) { 
			// /	echo $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codigoClienteEmpresa."====".$lnCodigoFijo ;
				if($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codigoClienteEmpresa==$lncodigofijo)
				{
					$_SESSION[$tnIdentificarPestaña.'codigofijo']= $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codigoClienteEmpresa;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
					$_SESSION[$tnIdentificarPestaña.'codigoubicacion']=$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->codidgoUbicacion; // $d['clientes']->values[0]->codidgoUbicacion;
					$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->nombre;  // $d['clientes']->values[0]->nombre;
					$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$L]->Nit;// $d['clientes']->values[0]->Nit;
				}
			}
		$d['nombrecliente'] = $this->session->userdata($tnIdentificarPestaña.'nombreclienteempresa');
		$d['cionit']= $this->session->userdata($tnIdentificarPestaña.'cionitclienteempresa'); 
		$d['numerocelular']=  $this->session->userdata('telefonoDePago');
		$d["correo"]= $this->session->userdata('correo');
/*
		echo '<pre>';
		print_r($datos ) ;
		print_r($d ) ;
		print_r($_SESSION ) ;
		echo '</pre>' ;
		
*/
		$_SESSION[$tnIdentificarPestaña.'montototal']=$datos["montototal"];
		$_SESSION[$tnIdentificarPestaña.'idfactura']=$datos["idfactura"];
		$_SESSION[$tnIdentificarPestaña.'metododepago']=$datos["metododepago"];
		$metodopago=$_SESSION[$tnIdentificarPestaña.'metododepago'];
		$lnEmpresa=$_SESSION[$tnIdentificarPestaña.'idempresa'] ;
		$montocomision=$this->servicios->calcularcomision($_SESSION['cliente'], $lnEmpresa,$metodopago,$_SESSION[$tnIdentificarPestaña.'montototal']);
		$this->cargarlog("calcularcomision-facturacion".json_encode($montocomision));
		
		$_SESSION[$tnIdentificarPestaña.'montocomision']=$montocomision->values;
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
		echo '<pre>';
		print_r($datos ) ;
		echo date('Y-m-d');
		echo '</pre>' ;
		//var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo };
		if($nombrecliente != $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'])
		{
			$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa']=$nombrecliente ;
		}
		if($cionit != $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] )
		{
			$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] =$cionit ;
		}
		if(	$numero != $_SESSION['telefonoDePago'] )
		{
			$_SESSION['telefonoDePago'] =	$numero;
		}
		if($correo != $_SESSION['correo'] )
		{
			$_SESSION['correo']=$correo;
		}


		$metodopago=$datos["metododepago"];
		$id_empresa= $_SESSION[$tnIdentificarPestaña.'idempresa'];
		$idcliente=$this->session->userdata('cliente');
		$metodos=$this->servicios->get_metodos_pago_empresa($idcliente ,$id_empresa);
		$tipodecomision=0;
		$montocomision=0;
		$d['metodosdepago']=$metodos->values->aMetodosDePago;
		$d['tipocomision']=$metodos->values->aTipoComisionDetalle;
		//$varinicio=0;
		//$varfinal=0;
		//	echo "<pre>";
		//		print_r($d);

		//$montocomision=$this->servicios->calcularcomision($idcliente, $_SESSION[$tnIdentificarPestaña.'idempresa'],$metodopago,$_SESSION[$tnIdentificarPestaña.'montototal']);
		//$this->cargarlog("calcularcomision-confirmacion".json_encode($montocomision)) ;
		//print_r($montocomision);

	
		$d['nombre']=$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'];
		$d['cinit']=$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];

		$d['periodo']=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$d['monto']=$_SESSION[$tnIdentificarPestaña.'montototal'];
		//$_SESSION[$tnIdentificarPestaña.'montocomision']=$montocomision->values;
		$d['comision']=$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$d['nombremetodopago']=$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'];
		$d['medios']= $this->session->userdata('telefonoDePago');
		$d['email']=$this->session->userdata('correo');		
		$d['nombreempresa']=$_SESSION[$tnIdentificarPestaña.'nombreempresa'];
		$d['urlimagenempresa']=$_SESSION[$tnIdentificarPestaña.'urlimagenempresa'];
		$_SESSION[$tnIdentificarPestaña.'montototalpagar']= $d['monto'] + $d['comision'];
		$d['montototalpagar']=$_SESSION[$tnIdentificarPestaña.'montototalpagar'];
		
		
		$d['etiquetametodopago']=$_SESSION[$tnIdentificarPestaña.'etiquetametodopago'];	
		

		
		$this->load->view('pago_rapido/confirmacion', $d);

	}
	public function vistaprepararpago()
	{
		
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnIdentificarPestaña=$datos[0];
		try {
			//code...
			$d['montototal']=$_SESSION[$tnIdentificarPestaña.'montototalpagar'];
		$laubicacion=$this->vermiubicacion();
		$_SESSION['gcUbicacion']= $laubicacion->geoplugin_countryName;
			
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

		} catch (\Throwable $th) {
			//throw $th;

			echo '<pre>';  
			print_r($th ) ;
			echo '</pre>' ;
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
		$tcFacturaA = $_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] ;
		$tnCiNit = $_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'];
		$tcNroPago = $_SESSION[$tnIdentificarPestaña.'nrofactura'];
		$tnMontoClienteEmpresa=$_SESSION[$tnIdentificarPestaña.'montototal'];
		$tnMontoClienteSyscoop =$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$tcPeriodo=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$tcImei =  $_SESSION[$tnIdentificarPestaña.'imei'];
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

		$metodos=$this->servicios->generarqr($tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei);
		$this->cargarlog("generar qr ".json_encode($metodos));
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
		$tnCiNit=$ci;
		$tcNroPago=$_SESSION[$tnIdentificarPestaña.'nrofactura'];
		$tnMontoClienteEmpresa=$_SESSION[$tnIdentificarPestaña.'montototal'];
		$tnMontoClienteSyscoop =$_SESSION[$tnIdentificarPestaña.'montocomision'];
		$tcPeriodo=$_SESSION[$tnIdentificarPestaña.'periodomes'];
		$tcImei= $_SESSION[$tnIdentificarPestaña.'imei']  ;//$_SESSION[$tnIdentificarPestaña.'imei'];
		$tcExtension=$extension ;
		$tcComplement= (($complemento==''))? null : $complemento; //$complemento;  //(!isset($tcComplement))? null : $tcComplement; // $complemento;
		$tcServiceCode=$codigoservicio;
		$tcExpireDate =$fechaexpiracion;
			 
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
		$metodos=$this->servicios->prepararpago($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcExtension , $tcComplement  , $tcServiceCode , $tcExpireDate );
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
				
				$this->servicios->finalizarpago($tncliente ,$tnAuthorizationNumber);
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
		 $laConsultaFactura=$this->servicios->consultarfacturaempresa( $tnempresa, $tcNroPago);
		 
		 if($tcNroPago!=0)
		{
			if( (trim($laConsultaFactura->periodo) != trim($tcPeriodo))  ||   (  floatval($laConsultaFactura->montoTotal) != floatval($tnMontoClienteEmpresa) )  )
			{
				$this->cargarlog("consultar-factura-pendiente-si entro aqui significa que hay algun error mal ".json_encode($laConsultaFactura));
				$tcPeriodo=$laConsultaFactura->periodo;
				$montocomision=$this->servicios->calcularcomision($tncliente, $_SESSION[$tnIdentificarPestaña.'idempresa'],$tnmetodopago,$laConsultaFactura->montoTotal);
				$tnMontoClienteEmpresa=$laConsultaFactura->montoTotal;
				$tnMontoClienteSyscoop= $montocomision->values;
			}
		}
		 $metodos=$this->servicios->realizarpagotigo($tncliente  , $tnempresa ,$codigoclienteempresa , $tnmetodopago , $tnTelefono, $tcFacturaA,  $tnCiNit, $tcNroPago , $tnMontoClienteEmpresa ,  $tnMontoClienteSyscoop , $tcImei ,$tcPeriodo ) ;
		 $this->cargarlog("estollegodetigo".json_encode($metodos));
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		if($mensajeerror== 0 ){
			if(isset($valor))
			{
				//$valores=$valor['transaccionDePago'];
				if($tnmetodopago==1){
					// entro por tigo money
					$this->guardariptransaccion( $tncliente , $tnempresa , $valor);
					$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'valor'=> $metodos->values , 'tnTransaccion' => $valor );
				}else{
					//entro por billetera 	
					$valortransaccion=@$valor->transaccionDePago;
					$this->guardariptransaccion( $tncliente , $tnempresa , $valortransaccion);
					$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'valor'=> $metodos->values , 'tnTransaccion' => $valortransaccion );

				}	
				
				
				

			}else{
				
				if($tnmetodopago==1){
					
					$this->guardariptransaccion( $tncliente , $tnempresa , @$valor);

				}else{
					$valortransaccion=@$valor->transaccionDePago;
					$this->guardariptransaccion( $tncliente , $tnempresa , @$valortransaccion);

				}
				
				
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values );
			}

		}else{
			$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> @$metodos->values);
		}
		echo json_encode($arreglo);

	}

	public function pagarporatc()
	{
		
		// aqui son los datos que tengo recolectados
		
		$datos=$this->input->post();
		$tncliente=$_SESSION['cliente'];
		$tnIdentificarPestaña=$datos[0];
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
		$this->cargarlog("verificatigomoney".json_encode($metodos));

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
								$this->servicios->finalizarpago($tncliente ,$tnTransaccionDePago);
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
		$tnTipo=$datos['tipo'];	
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		//$factura="2020-02";//$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura,$idcliente);
		/*
		echo "<pre>";
		echo $datos['idfactura'];
		print_r($empresadcccetalle);
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
			$d['urlweb']='https://docs.google.com/gview?embedded=true&url=https://'.$d['documentopdf'] ;
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
			$taData['urlweb']='https://docs.google.com/gview?embedded=true&url=https://'.$d['documentopdf'] ;
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
		$facturapagofacil=$this->servicios->getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		//$this->cargarlog("facturaempresa".json_encode($facturapagofacil));
		$laDatosEmpresa=$this->servicios->getempresasimple($tnEmpresa ,$_SESSION['cliente']);
		$lcNombreEmpresa=@$laDatosEmpresa->values[0]->cDescripcion;

		//este codigo sirve para poder visuailzar 
		echo '<pre>';  
		print_r($facturapagofacil ) ;
		echo '</pre>' ;

			$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena;
		//echo  $fileToDownload ;
		$fichero =$_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/factura'.$lcNombreEmpresa.$tnCliente.$tnFactura.date('y-m-d--H:i:s').'.pdf';
		//$fichero ='/web_pago_facil/application/assets/documentospdf/factura-empresa'.$tnFactura.'.pdf';
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/online/application/assets/documentospdf/factura'.$lcNombreEmpresa.$tnCliente.$tnFactura.date('y-m-d--H:i:s').'.pdf';
		$d['documentopdf']=$fichero2;
		//$this->load->view('pagosrealizados/vysorpdf', $d);
		if($tnTipo==1){
			//si es uno demo mostrar normal 
			//$this->load->view('pagosrealizados/vysorpdf', $taData);
		}else{
			//si es distinto de uno se debe mostrar la url de googledrive
			$taData['urlweb']='https://docs.google.com/gview?embedded=true&url=https://'.$taData['documentopdf'] ;
			//echo $taData['urlweb'];
			//$this->load->view('pagosrealizados/vistaiframepdf', $taData);
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
			array_push($d['billeteras'], $billeteradependientes->values[$i]);	
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
		
		//		echo json_encode($empresas);
		/*(echo "<pre>";
		print_r($d);
		echo "</pre>";*/
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


		/*$tnCliente=16468;
		$tnTransaccionDePago=$transaccion;
		$tnEmpresa=  1;
		$tnFactura= 479813;
		*/

		$facturapagofacil=$this->servicios->getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		$this->cargarlog("GetFacturaEmpresa--------------------".$tnTransaccionDePago."--".$tnEmpresa."--". $tnFactura."--". $tnCliente  );
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
      $logFile = fopen("log2.txt", 'a') or die("Error creando archivo");
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