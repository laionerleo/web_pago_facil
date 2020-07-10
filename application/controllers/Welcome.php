<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
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
 
 
	/*	$ip = '181.114.102.117'; // Esto contendrá la ip de la solicitud.
		// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
		// Vamos a recuperar los datos rápidamente con file_get_contents
		$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
		
		var_dump($dataArray);
		
		echo "Hola visitante desde: ".$dataArray["geoplugin_countryName"];*/
	/*echo "<pre>";
		print_r($d);
		echo "</pre>";*/
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
		$id_cliente=$this->session->userdata('cliente');
		if($tipo==1)
		{
			$d['clientes']=$this->servicios->get_busqueda_codigo_fijo($empresa_id,$codigo,$id_cliente);
		}else{
			$d['clientes']=$this->servicios->get_busqueda_ci($empresa_id,$codigo,$id_cliente);
		}
/*
		echo "<pre>";
		print_r($d['clientes']->values);
		echo "</pre>";
		
		*/
		$_SESSION['clientesbusqueda']=$d['clientes']->values;
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
		$empresa_id=$datos["empresa_id"];
		$codigo_fijo=$datos["codigo"];
		$urliconoempresa=$datos["urlimagen"];
		$id_cliente=$this->session->userdata('cliente');
		//$_SESSION['clientesbusqueda']=$d['clientes']->values;
		for ($L=0; $L <count($_SESSION['clientesbusqueda']) ; $L++) { 
			if($_SESSION['clientesbusqueda'][$L]->codigoClienteEmpresa==$codigo_fijo)
			{
				$_SESSION['codigofijo']= $_SESSION['clientesbusqueda'][$L]->codigoClienteEmpresa;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
				$_SESSION['codigoubicacion']=$_SESSION['clientesbusqueda'][$L]->codidgoUbicacion; // $d['clientes']->values[0]->codidgoUbicacion;
				$_SESSION['nombreclienteempresa'] =$_SESSION['clientesbusqueda'][$L]->nombre;  // $d['clientes']->values[0]->nombre;
				$_SESSION['cionitclienteempresa'] =$_SESSION['clientesbusqueda'][$L]->Nit;// $d['clientes']->values[0]->Nit;
				
			}
		}
	



		$lista=$this->servicios->get_listar_facturas($empresa_id,$codigo_fijo,$id_cliente);
		if(!is_null(@$lista->values)  ){
			$d['facturas']=$lista->values;
			$d['cantidadfacturas']=count($lista->values);

			$facturaprincipal=$this->servicios->get_detalle_factura($lista->values[0]->factura , $empresa_id,$codigo_fijo,$id_cliente);
			$d['facturaprincipal']=$facturaprincipal->values;
			//print_r($facturaprincipal->values);
			$_SESSION['periodomes']=$lista->values[0]->periodo;
			$_SESSION['nrofactura']=$facturaprincipal->values->factura;

			for ($i=0; $i < count($lista->values); $i++) { 
				$lista->values[$i]->periodoaux=$lista->values[$i]->periodo;
				$lista->values[$i]->periodo =$this->get_periodo($lista->values[$i]->periodo);
				
	
			}
		}else{
			$d['facturas']= array();
			$d['cantidadfacturas']=0;
			
		}	
		
		$d['idCliente']=  $_SESSION['codigofijo']; 
		$d['nombre']=  $_SESSION['nombreclienteempresa'];
		$d['codigoUbicacion']=  $_SESSION['codigoubicacion'];
		$d['urlimagenempresa']=$urliconoempresa;
		$d['nombreempresa']=$datos["nombreempresa"];
		$d['idempresa']=$datos["empresa_id"];
		$_SESSION['idempresa']=$datos["empresa_id"];
		$_SESSION['nombreempresa']=$datos["nombreempresa"];
		$_SESSION['urlimagenempresa']=$d['urlimagenempresa'];
		
		$metodos=$this->servicios->get_metodos_pago_empresa($id_cliente ,$empresa_id);
		$d['tiposdecomision']=$metodos->values->aTipoComisionDetalle;
		$d['metodospago']=$metodos->values->aMetodosDePago;
		$_SESSION['todosmetodosdepago']=$metodos->values->aMetodosDePago;

		$etiquetas=$this->servicios->get_etiquetas($id_cliente);
		//$d['etiquetas']=$etiquetas->values;
		
		for ($i=0; $i < count($etiquetas->values); $i++) { 
			if($etiquetas->values[$i]->Empresa == $empresa_id) 
			{
				$d['etiquetas']=$etiquetas->values[$i];

			}
		}
		
		$d["empresa_id"]= $datos["empresa_id"];
		$d["codigofijo"]= $datos["codigo"];
	/*			
	echo "<pre>";
	print_r($datos);
	print_r($d);
	print_r($lista);
	echo "</pre>";
	*/
	
	
	$this->load->view('pago_rapido/facturaspendientes', $d);
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
		$d['nombrecliente'] =  $this->session->userdata('nombreclienteempresa') ;
		$d['cionit']=  $this->session->userdata('cionitclienteempresa');
		$d['numerocelular']=  $this->session->userdata('telefonoDePago');
		$d["correo"]= $this->session->userdata('correo');
		$_SESSION['montototal']=$datos["montototal"];
		$_SESSION['idfactura']=$datos["idfactura"];
		$_SESSION['metododepago']=$datos["metododepago"];

		for ($i=0; $i < count($_SESSION['todosmetodosdepago']) ; $i++) { 
			//echo $_SESSION['todosmetodosdepago'][$i]->metodoPago."--".$_SESSION['metododepago']; 
			if($_SESSION['todosmetodosdepago'][$i]->metodoPago==$_SESSION['metododepago'])
			$d['etiquetametodopago']=$_SESSION['todosmetodosdepago'][$i]->etiquetaBilletera;
			$_SESSION['etiquetametodopago']=$_SESSION['todosmetodosdepago'][$i]->etiquetaBilletera;

		}	
		
		/*
			echo "<pre>";
			print_r($d);
			echo print_r($_SESSION);
			echo "</pre>";*/
		$this->load->view('pago_rapido/facturacion', $d);

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
		//var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo };
		if($nombrecliente != $_SESSION['nombreclienteempresa'])
		{
			$_SESSION['nombreclienteempresa']=$nombrecliente ;
		}
		if($cionit != $_SESSION['cionitclienteempresa'] )
		{
			$_SESSION['cionitclienteempresa'] =$cionit ;
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
		$id_empresa= $_SESSION['idempresa'];
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

		$montocomision=$this->servicios->calcularcomision($idcliente, $_SESSION['idempresa'],$metodopago,$_SESSION['montototal']);
		//print_r($montocomision);

	
		$d['nombre']=$_SESSION['nombreclienteempresa'];
		$d['cinit']=$_SESSION['cionitclienteempresa'];
		$d['periodo']=$_SESSION['periodomes'];
		$d['monto']=$_SESSION['montototal'];
		$_SESSION['montocomision']=$montocomision->values;
		$d['comision']=$_SESSION['montocomision'];
		$d['nombremetodopago']=$_SESSION['nombreclienteempresa'];
		$d['medios']= $this->session->userdata('telefonoDePago');
		$d['email']=$this->session->userdata('correo');		
		$d['nombreempresa']=$_SESSION['nombreempresa'];
		$d['urlimagenempresa']=$_SESSION['urlimagenempresa'];
		$_SESSION['montototalpagar']= $d['monto'] + $d['comision'];
		$d['montototalpagar']=$_SESSION['montototalpagar'];
		$d['etiquetametodopago']=$_SESSION['etiquetametodopago'];
		


		
				
		$this->load->view('pago_rapido/confirmacion', $d);

	}
	public function vistaprepararpago()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['montototal']=$_SESSION['montototalpagar'];

		//$d['urlimagenempresa']=$_SESSION['urlimagenempresa'];
	/*
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";*/
		
	if( (isset($_SESSION['cinit']) ) ||  (isset($_SESSION['telefono']) ))
	{
		$var=$_SESSION['metododepago'];
			switch ($var) {
				case 4:
						
					$entidades=$this->servicios->genentidadesfinancieras($_SESSION['cliente']);
					$entidadeselegidas=$this->servicios->getultimasutilizadas($_SESSION['cliente']);
					$d['entidadeselegidas']=$entidadeselegidas->values;
					$d['entidades']=$entidades->values;
					//$d['montototal']=$_SESSION['monto']+$_SESSION['montocomision'];
					$_SESSION['entidades']=$entidades->values;
					$this->load->view('pago_rapido/formasdepago/pagoqr', $d);
					
				break;
				
				case 5:
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
					
				
					
					$this->load->view('pago_rapido/formasdepago/pagoconbcp', $d);
				break;
				case 6:
					$this->load->view('pago_rapido/formasdepago/pagoconelinkser', $d);
				break;
				
				default:
				$this->load->view('endesarrollo', $d);
			}
	}else{
	
		
		$d['nombre']=$_SESSION['nombre'];
		$d['apellido']=$_SESSION['apellido'];
		$d['direccion']=$_SESSION['direccion'];
		$d['telefono']=$_SESSION['telefono'];
		$d['telefonoDePago']=$_SESSION['telefonoDePago'];
		
		$d['cinit']=$_SESSION['cinit'];
		$d['facturaa']=$_SESSION['facturaa'];
		

		$this->load->view('auth/formularioedicion', $d);

	}

			
	

	}
	public function generarqr()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnCliente=$_SESSION['cliente'];
		$tnEmpresa=$_SESSION['idempresa'];;
		$tcCodigoClienteEmpresa = $_SESSION['codigofijo'];
		$tnMetodoPago =$_SESSION['metododepago'];
		$tnTelefono = null;
		$tcFacturaA = $_SESSION['nombreclienteempresa'] ;
		$tnCiNit = $_SESSION['cionitclienteempresa'];
		$tcNroPago = $_SESSION['nrofactura'];
		$tnMontoClienteEmpresa=$_SESSION['montototal'];
		$tnMontoClienteSyscoop =$_SESSION['montocomision'];
		$tcPeriodo=$_SESSION['periodomes'];
		$tcImei =  $_SESSION['imei'].json_encode($datos)  ; 

		$metodos=$this->servicios->generarqr($tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei);
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
	
/*		echo "<pre>";
		print_r($metodos);
		echo "</pre>";
*/
		
		if($mensajeerror== 0 ){
			if(isset($valor))
			{
				//http://localhost/web_pago_facil/es/Descargarqr/55928
				$valores = explode(";", $valor );
				$linkdescarga= base_url()."es/Descargarqr/".$valores[0];
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 , 'imagenqr' =>$valores[1],'linkdescarga'=>$linkdescarga );
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
		$metodos=$this->servicios->getultimasutilizadas($_SESSION['cliente']);
		$d['entidadeselegidas']=$metodos->values;
	

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
		$ci=$datos["ci"];
		$complemento=$datos["complemento"];
		$extension=$datos["extension"];
		$fechaexpiracion=$datos["fechaexpiracion"];
		$codigoservicio=$datos["codigoservicio"];
		
		 $tncliente=$_SESSION['cliente'];
		 $tnempresa = $_SESSION['idempresa'];
		 $codigoclienteempresa=$_SESSION['codigofijo'];
		 $tnmetodopago= $_SESSION['metododepago'];

		$tnTelefono =  (($datos['numbersoli']==''))? null : $datos['numbersoli'] ;
		 
		$tcFacturaA= $_SESSION['nombreclienteempresa'] ;//'el nombre del cliente ';//$_SESSION['CLIENTE'];
		 $tnCiNit=$ci;
		 $tcNroPago=$_SESSION['nrofactura'];
		 $tnMontoClienteEmpresa=$_SESSION['montototal'];
		 $tnMontoClienteSyscoop =$_SESSION['montocomision'];
		 $tcPeriodo=$_SESSION['periodomes'];
		 $tcImei= $_SESSION['imei']."W"  ;//$_SESSION['imei'];
		 $tcExtension=$extension ;
		 $tcComplement= (($complemento==''))? null : $complemento; //$complemento;  //(!isset($tcComplement))? null : $tcComplement; // $complemento;
		 $tcServiceCode=$codigoservicio;
		 $tcExpireDate =$fechaexpiracion;
		$metodos=$this->servicios->prepararpago($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcExtension , $tcComplement  , $tcServiceCode , $tcExpireDate );

					$mensajeerror=$metodos->error ;
					$valor= $metodos->values;
					if($mensajeerror== 0 ){
						if(isset($valor))
						{
							//donde 555 es el numero de transaccion que se creo y 666 el codigo de autorizacion de BCP
							$valores = explode(";", $valor );
							//print_r($valores);
							$_SESSION['numerodetransaccion']=$valores[0];
							$_SESSION['numeroautorizacion']=$valores[1];
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );
							

						}else{
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
						}

					}else{
						$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
					}
					echo json_encode($arreglo);
					/*
				echo	"<pre>";
					print_r($metodos);
					print_r($metodos->error);
					print_r($metodos->message);
					print_r($metodos->values);
					
					echo "</pre>";
*/
	
		//	$arreglo=array('mensaje' => $metodos->message, 'error' => $metodos->error , 'valor'=> $metodos->values);
		
		//$arreglo=array('mensaje' => $metodos->message, 'error' => $metodos->error);
	//	echo json_encode($arreglo);
		
		/*echo	"<pre>";
		print_r($metodos);
		print_r($metodos->error);
		print_r($metodos->message);
		print_r($metodos->values);
		
		echo "</pre>";
*/
		//var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio};
	}
	public function confirmarpagobcp()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$datos=$this->input->post("datos");
		$tnCliente=$_SESSION['cliente'];
		$tnEmpresa=$_SESSION['idempresa'];
		$tnAuthorizationNumber=$_SESSION['numeroautorizacion'];
		$tnCorrelationId=  $_SESSION['numerodetransaccion'];
		$tcOTP=$datos["codigo"];
/*		echo	"<pre>";
		print_r($tnCliente);
		echo "--";
		print_r($tnEmpresa);
		echo "--";
		print_r($tnAuthorizationNumber);
		echo "--";
		print_r($tnCorrelationId);
		echo "--";
		print_r($tcOTP);
		echo "--";
		echo "</pre>";
*/
		$metodos=$this->servicios->bcpconfirmarpago($tnCliente,$tnEmpresa , $tnAuthorizationNumber,$tnCorrelationId , $tcOTP );
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		

		if($mensajeerror== 0 ){
			if(!isset($valor))
			{
				
				$this->servicios->finalizarpago($tncliente ,$tnAuthorizationNumber);
					$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );

			}else{
				$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
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
		 $tcImei= $_SESSION['imei']."W"  ;//$_SESSION['imei'];
		$metodos=$this->servicios->ejecuparpagoelinkser($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcTarjeta , $tcTarjetaHabiente  , $tcCodigoSeguridad , $tcFechaExpiracion );

					$mensajeerror=$metodos->error ;
					$valor= $metodos->values;
					if($mensajeerror== 0 ){
						if(isset($valor))
						{
							$valores = explode(";", $valor );
							//print_r($valores);
							$tntransaccion=$valores[0];
							$this->servicios->finalizarpago($tncliente ,$tntransaccion);
							
						
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 10 );
						}else{
							$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
						}

					}else{
						$arreglo=array('mensaje' => $metodos->message, 'tipo' => 1 , 'valor'=> $metodos->values);
					}
					echo json_encode($arreglo);
					/*
				echo	"<pre>";
					print_r($metodos);
					print_r($metodos->error);
					print_r($metodos->message);
					print_r($metodos->values);
					
					echo "</pre>";

		echo "</pre>";
*/
		//var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio};

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

	/**/
}