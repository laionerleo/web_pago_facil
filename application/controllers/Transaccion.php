<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class Formulario extends CI_Controller {

class Transaccion extends CI_Controller {


	public function __construct(){
	
        
        parent::__construct();
        //cargamos los agentes para los dispositivos
		//	$this->load->library('user_agent');
		//cargamos el helper url y el helper form
		$this->load->helper(array('url', 'language'));
		$this->load->library('servicios');
		//cargamos los modelos
		$this->load->model(array('Msecurity'));
		session_start();
		
		if(!@$this->session->userdata('cliente')){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect(base_url()."?m=Usted tiene que iniciar session !!!");
		}
    

    }


	//aqui debo listar loscobros que  se han realizado a algunda mis empresas
	public function index()
	{	
		$taData=array();
		
		$datos=$this->input->post();
		$laCobros=array();
		
		$laServicioMetodosPago=$this->servicios->getmetodospago($_SESSION['cliente']);
		$laMetodosdePago=$laServicioMetodosPago->values;
		
		//for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
			//$laServicio=$this->servicios->gettransaccionempresa($_SESSION['cliente'] , $_SESSION['gaEmpresas'][$i]->Empresa, date('Y-m-d'), date('Y-m-d'), 0  );	
			$laServicio=$this->servicios->gettransaccionempresa($_SESSION['cliente'] , 0, date('Y-m-d'), date('Y-m-d'), 0 ,0 );	
			
			
			
			 	for ($j=0; $j <  count($laServicio->values); $j++) { 
					//esta iteracion es p[aracopnseguir el numero  el nombre d el;a empresa 
			
					for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
						if($_SESSION['gaEmpresas'][$i]->Empresa== $laServicio->values[$j]->Empresa ){
							$laServicio->values[$j]->NombreEmpresa=$_SESSION['gaEmpresas'][$i]->Descripcion;
						}
						
					}
					
					//array_push($laPedidos,$laServicio->values[$j]);
					for ($k=0; $k <count($laMetodosdePago) ; $k++) { 
						if($laMetodosdePago[$k]->metodoPago == $laServicio->values[$j]->MetodoPago  )
						{
							$laServicio->values[$j]->NombreMetodo=$laMetodosdePago[$k]->nombre;

						}
					}
					array_push($laCobros,$laServicio->values[$j]);
				}
			  	

		
			
		//	}
		
		
		$taData['MetodosdePago']=$laMetodosdePago;
		$taData['pago']=  $laCobros;
		$taData['taEmpresas']=$_SESSION['gaEmpresas'];
		$taData['tnPerfil']=@$_SESSION['perfil'];
		$this->load->view('cobros/index', $taData);
		
		
	}

	//aqui debo listar los pagos que he realizado 
	//como usuario de pago facil 
	public function listarpagos()
	{
		$taData=array();
		
		$datos=$this->input->post();
		$laPagos=array();
		
		$laServicioMetodosPago=$this->servicios->getmetodospago($_SESSION['cliente']);
		$laMetodosdePago=$laServicioMetodosPago->values;
		$fecha_actual =date('Y-m-d');
		
		//	for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
			// /$laServicio=$this->servicios->gettransaccionesdeusuario($_SESSION['cliente'] );
			$laServicio=$this->servicios->gettransaccionesdeusuario($_SESSION['cliente'] ,date("Y-m-d",strtotime($fecha_actual."- 1 week")) , date('Y-m-d') ,0 , 0    );
	
			if(isset($laServicio->values))
				{
				for ($j=0; $j <  count($laServicio->values); $j++) { 
					$laServicio->values[$j]->NombreEmpresa=@$_SESSION['gaEmpresas'][$i]->Descripcion;
					
					//array_push($laPedidos,$laServicio->values[$j]);
					for ($k=0; $k <count($laMetodosdePago) ; $k++) { 
						if($laMetodosdePago[$k]->metodoPago == $laServicio->values[$j]->MetodoPago  )
						{
							$laServicio->values[$j]->NombreMetodo=$laMetodosdePago[$k]->nombre;
						}
					}
					array_push($laPagos,$laServicio->values[$j]);
				}
				}

		
			
	//	}
		
		
		$taData['MetodosdePago']=$laMetodosdePago;
		$taData['pago']=  $laPagos;
		$taData['taEmpresas']=$_SESSION['gaEmpresas'];
	
		
	    $this->load->view('pago/index', $taData);
	}
	public function buscarmispagos()
	{
		$taData=array();
		
		$datos=$this->input->post('datos');
		$tnCliente= $_SESSION['cliente'];
		$tcFechaIni =$datos['tcFechaInicial'];
		$tcFechaFin= $datos['tcFechaFinal'];
		$tcEstado=$datos['tnEstado'];
		$lnMetodoPago=$datos['tnMetodoPago'];
		$tnEmpresa=$datos['tnEmpresa'];
		$laPagos=array();
		
		$laServicioMetodosPago=$this->servicios->getmetodospago($_SESSION['cliente']);

			$laServicio=$this->servicios->gettransaccionesdeusuario($_SESSION['cliente'] ,"$tcFechaIni" , "$tcFechaFin" ,$tcEstado , $tnEmpresa    );
	
			if(isset($laServicio->values))
				{
				for ($j=0; $j <  count($laServicio->values); $j++) { 
					for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
						if($_SESSION['gaEmpresas'][$i]->Empresa==$laServicio->values[$j]->Empresa )
						{
							$laServicio->values[$j]->NombreEmpresa=@$_SESSION['gaEmpresas'][$i]->Nombre;
						}
					
					}
			
					
					//array_push($laPedidos,$laServicio->values[$j]);
					for ($k=0; $k <count($laMetodosdePago) ; $k++) { 
						if($laMetodosdePago[$k]->metodoPago == $laServicio->values[$j]->MetodoPago  )
						{
							$laServicio->values[$j]->NombreMetodo=$laMetodosdePago[$k]->nombre;
						}
					}
					array_push($laPagos,$laServicio->values[$j]);
				}
				}
		
		$taData['MetodosdePago']=$laMetodosdePago;
		$taData['pago']=  $laPagos;
		$taData['taEmpresas']=$_SESSION['gaEmpresas'];
			
	
	    $this->load->view('pago/listadopagos', $taData);
	}


	public function buscarcobros()
	{

		
		$taData=array();
		$laCobros=array();
		$datos=$this->input->post("datos");
		$laServicioMetodosPago=$this->servicios->getmetodospago($_SESSION['cliente']);
		$laMetodosdePago=$laServicioMetodosPago->values;
		$tnCliente= $_SESSION['cliente'];
		$tcFechaIni =$datos['tcFechaInicial'];
		$tcFechaFin= $datos['tcFechaFinal'];
		$tcEstado=$datos['tnEstado'];
		$tnMetodoPago=$datos['tnMetodoPago'];
		$tnEmpresa=$datos['tnEmpresa'];
		$tnTelefono=$datos['tnTelefono'];
		$tnTransacionMetodoPago=$datos['tnTransacionMetodoPago'];
		$tnTrasaccionEmpresa=$datos['tnTrasaccionEmpresa'];
		$laServicio=$this->servicios->gettransaccionempresa($tnCliente ,$tnEmpresa, $tcFechaIni , $tcFechaFin, $tcEstado , $tnMetodoPago,$tnTelefono,$tnTransacionMetodoPago , $tnTrasaccionEmpresa  );
		
		$this->cargarlogtransaccion("gettransaccionempresa".json_encode($laServicio));
		
		for ($j=0; $j <  count($laServicio->values); $j++) { 
			
			for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
				if($_SESSION['gaEmpresas'][$i]->Empresa== $laServicio->values[$j]->Empresa ){
					$laServicio->values[$j]->NombreEmpresa=$_SESSION['gaEmpresas'][$i]->Descripcion;
				}
				
			}
			//$laServicio->values[$j]->NombreEmpresa=$_SESSION['gaEmpresas'][$i]->Descripcion;
			
			//array_push($laPedidos,$laServicio->values[$j]);
			for ($k=0; $k <count($laMetodosdePago) ; $k++) { 
				if($laMetodosdePago[$k]->metodoPago == $laServicio->values[$j]->MetodoPago  )
				{
					$laServicio->values[$j]->NombreMetodo=$laMetodosdePago[$k]->nombre;
				}
			}
			array_push($laCobros,$laServicio->values[$j]);
		}

		
		$taData['pago']=$laCobros;
		$taData['taEmpresas']=$_SESSION['gaEmpresas'];		
		$taData['tnPerfil']=@$_SESSION['perfil'];
		$this->load->view('cobros/listadocobros', $taData);
	}

	public function buscarcobrosmetodopago()
	{

		
		$taData=array();
		$laCobros=array();
		$datos=$this->input->post("datos");
		//$laServicioMetodosPago=$_SESSION['gaMetodosPago'] ;// $laServicioMetodosPago->values;;
		$laMetodosdePago=$_SESSION['gaMetodosPago'] ; //$laServicioMetodosPago->values;
		$tnCliente= $_SESSION['cliente'];
		$tcFechaIni =$datos['tcFechaInicial'];
		$tcFechaFin= $datos['tcFechaFinal'];
		$tcEstado=$datos['tnEstado'];
		$tnMetodoPago=$datos['tnMetodoPago'];
		$tnEmpresa=$datos['tnEmpresa'];
		$tnTelefono=$datos['tnTelefono'];
		$tnTransacionMetodoPago=$datos['tnTransacionMetodoPago'];
		$tnTrasaccionEmpresa=$datos['tnTrasaccionEmpresa'];
		$laServicio=$this->servicios->gettransaccionesmetodopago($tnCliente ,$tnEmpresa, $tcFechaIni , $tcFechaFin, $tcEstado , $tnMetodoPago,$tnTelefono,$tnTransacionMetodoPago , $tnTrasaccionEmpresa  );
		
		$this->cargarlogtransaccion("gettransaccionempresa".json_encode($laServicio));
		
		for ($j=0; $j <  count($laServicio->values); $j++) { 
			
			for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
				if($_SESSION['gaEmpresas'][$i]->Empresa== $laServicio->values[$j]->Empresa ){
					$laServicio->values[$j]->NombreEmpresa=$_SESSION['gaEmpresas'][$i]->Descripcion;
				}else{
					$laServicio->values[$j]->NombreEmpresa="";
				}
				
			}
			//$laServicio->values[$j]->NombreEmpresa=$_SESSION['gaEmpresas'][$i]->Descripcion;
			
			//array_push($laPedidos,$laServicio->values[$j]);
			for ($k=0; $k <count($laMetodosdePago) ; $k++) { 
				if($laMetodosdePago[$k]->MetodoPago == $laServicio->values[$j]->MetodoPago  )
				{
					$laServicio->values[$j]->NombreMetodo=$laMetodosdePago[$k]->Nombre;
				}
			}
			array_push($laCobros,$laServicio->values[$j]);
		}

		
		$taData['pago']=$laCobros;
		$taData['taEmpresas']=$_SESSION['gaEmpresas'];		
		$taData['tnPerfil']=@$_SESSION['perfil'];
		$this->load->view('cobros/listadocobros', $taData);
	}


	public function VerFacturaPagoFacil()
	{

		
		$taData=array();
		$laPagos=array();
		$datos=$this->input->post("datos");
		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$datos['transaccion'];
		$tnEmpresa=0 ;//$datos['codigoempresa'];
		$tnFactura= $datos['nrofactura'];	
		$tnTipo= $datos['tipo'];	
		$facturapagofacil=$this->servicios->getfacturapagofacil($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);

		//este codigo sirve para poder visuailzar 
			$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena;
		$fichero = $_SERVER["DOCUMENT_ROOT"].'/application/assets/documentopdf/factura-'.$tnFactura.'.pdf';
		
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/application/assets/documentopdf/factura-'.$tnFactura.'.pdf';
		$taData['documentopdf']=$fichero2;
		//$this->load->view('pagosrealizados/vysorpdf', $d);


	
		if($tnTipo==1){
			//si es uno demo mostrar normal 
			$this->load->view('pago/pdfvysorfacturapagofacil', $taData);
		}else{
			//si es distinto de uno se debe mostrar la url de googledrive
			$taData['urlweb']='https://docs.google.com/gview?embedded=true&url=https://micuenta.pagofacil.com.bo/'.$taData['documentopdf'] ;
			//echo $taData['urlweb'];
			$this->load->view('cobros/vistaiframepdf', $taData);
		}
		

	}

	public function VerFacturaEmpresa()
	{
		//$lan,$factura,$id_empresa,$codigo_fijo
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$datos['transaccion'];
		$tnEmpresa=$datos['Empresa'];
		$tnFactura= $datos['nrofactura'];	
		$tnCodigoFijo= $datos['codigofijo'];	
		$tnTipo= $datos['tipo'];	

		
		
		$facturapagofacil=$this->servicios->getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente);
		
		$laDatosEmpresa=$this->servicios->getempresasimple($tnEmpresa ,$tnCliente);
		$lcNombreEmpresa=@$laDatosEmpresa->values[0]->cDescripcion;
		 
	
	
		$cadena="";
		foreach($facturapagofacil->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}


		//GET CONTENT
		$fileToDownload = $cadena;
		//$fichero = $_SERVER["DOCUMENT_ROOT"].'/application/assets/documentopdf/Empresa-'.$tnFactura.'.pdf';
		$fichero = $_SERVER["DOCUMENT_ROOT"].'/documentopdf/Empresa-'.$tnFactura.'.pdf';
		
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		//$fichero2 ='/application/assets/documentopdf/Empresa-'.$tnFactura.'.pdf';
		$fichero2 ='/documentopdf/Empresa-'.$tnFactura.'.pdf';
		$taData['documentopdf']=$fichero2;

		if($tnTipo==1){
			//si es uno demo mostrar normal 
			$this->load->view('pago/pdfvysorfacturapagofacil', $taData);
		}else{
			//si es distinto de uno se debe mostrar la url de googledrive
			$taData['urlweb']='https://docs.google.com/gview?embedded=true&url=https://micuenta.pagofacil.com.bo/'.$taData['documentopdf'] ;
			//echo $taData['urlweb'];
			$this->load->view('cobros/vistaiframepdf', $taData);
		}
	
	}

	public function DescargarQr($lan,$numerotransaccion)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente= 3859;  //$_SESSION['cliente'];
		$tcNroPago = $numerotransaccion;
		$metodos=$this->servicios->recuperarqr($tnCliente ,$tcNroPago);
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;

		if(isset($valor))
		{
		header('Content-Disposition: attachment;filename="PagoFacilBoliviaQR-'.$numerotransaccion.'.png"');
	   header('Content-Type: application/force-download'); 
	   header('Pragma:public');
		header('Expires:0');
		header('Cache-Control:no-cache,must-revalidate,post-check=0,pre-check=0');
		header('Cache-Control:private,false');
	   echo base64_decode($valor );
		}else{
		echo "ocurrio un error o no existe la transaccion";
		}
		
	}

	public function funcionespagofacil()
	{
		$datos=$this->input->post('datos');
		$tnTransaccionDePago =$datos['transaccion'];
		$tnEmpresa= 0 ; $datos['empresa'];
	
		$laServicioMetodosPago=$this->servicios->consultarestadodetransaccion($_SESSION['cliente'],$tnEmpresa,$tnTransaccionDePago);
		echo json_encode($laServicioMetodosPago);
		//$tcFechaIni =$datos['tcFechaInicial'];
		//$tcFechaFin= $datos['tcFechaFinal'];
	}

	

	public function generador()
	{
		$this->load->view('inicio/boton');
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



	/////aqui debo listar loscobros que  se han realizado a algunda mis empresas
	public function vistatransaccionmetodopago()
	{	
		$taData=array();
		
		$datos=$this->input->post();
		$laCobros=array();
		$_SESSION['gaEmpresas']=@$this->servicios->getEmpresaMetodopagoPersonal($_SESSION['cliente'])->values;
		/*echo '<pre>' ;
		 print_r($_SESSION['gaEmpresas'])  ;
		echo '</pre>' ;
		return 1;
		*/
		$laServicioMetodosPago=$this->servicios->getmetodospago($_SESSION['cliente']);
		$laMetodosdePago=  $_SESSION['gaMetodosPago'] ;// $laServicioMetodosPago->values;
		
		//for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
			//$laServicio=$this->servicios->gettransaccionempresa($_SESSION['cliente'] , $_SESSION['gaEmpresas'][$i]->Empresa, date('Y-m-d'), date('Y-m-d'), 0  );	
			$laServicio=$this->servicios->gettransaccionesmetodopago($_SESSION['cliente'] , 0, date('Y-m-d'), date('Y-m-d'), 0 ,0 );	
			
			
			
			 	for ($j=0; $j <  count($laServicio->values); $j++) { 
					//esta iteracion es p[aracopnseguir el numero  el nombre d el;a empresa 
			
					for ($i=0; $i <count($_SESSION['gaEmpresas']) ; $i++) { 
						if($_SESSION['gaEmpresas'][$i]->Empresa== $laServicio->values[$j]->Empresa ){
							$laServicio->values[$j]->NombreEmpresa=$_SESSION['gaEmpresas'][$i]->Descripcion;
						}
						
					}
					
					//array_push($laPedidos,$laServicio->values[$j]);
					for ($k=0; $k <count($laMetodosdePago) ; $k++) { 
						if($laMetodosdePago[$k]->metodoPago == $laServicio->values[$j]->MetodoPago  )
						{
							$laServicio->values[$j]->NombreMetodo=$laMetodosdePago[$k]->Nombre;

						}
					}
					array_push($laCobros,$laServicio->values[$j]);
				}
			  	

		
			
		//	}
		
		
		$taData['MetodosdePago']=$laMetodosdePago;
		$taData['pago']=  $laCobros;
		$taData['taEmpresas']=$_SESSION['gaEmpresas'];
		$taData['tnPerfil']=@$_SESSION['perfil'];
		/*	echo '<pre>' ;
		print_r($taData)  ;
		echo '</pre>' ;*/
		$this->load->view('metodopago/index', $taData);
		
		
	}


	public function cargarlogtransaccion($Mensajeerror)
	{
	$logFile = fopen("./logs/logtransaccion.txt", 'a') or die("Error creando archivo");
	fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
	fclose($logFile);
	}
	
		



	public function GetFacturaEmpresaFactura($lan,$transaccion,$tnFactura)
	{
		
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$datos=$this->input->post("datos");

		$tnCliente=$this->session->userdata('cliente');
		$tnTransaccionDePago=$transaccion;
		$tnEmpresa=  $_SESSION['idempresa'];
		
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
		//header('Content-Disposition: attachment; filename= FacturaEmpresa-'.strval($tnTransaccionDePago).'-'.strval($tnFactura).'.pdf');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename= FacturaEmpresa-'.strval($tnTransaccionDePago).'-'.strval($tnFactura).'.pdf');
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

	




}