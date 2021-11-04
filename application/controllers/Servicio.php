<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

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

		$this->load->view('pago_rapido/index', $d);
	
	}

	public function recuperarqr($lan,$transaccion)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente= 3859;  //$_SESSION['cliente'];
		$tcNroPago = $transaccion;
		$metodos=$this->servicios->recuperarqr($tnCliente ,$tcNroPago);
		$valor= $metodos->values;
		if(isset($valor))
		{
			$d['imagenqr']=$metodos->values;
			$d['imagenqrhead']=base64_decode($metodos->values);
			$d['transaccion']=$transaccion;
			$this->load->view('vistaqr', $d);
	   
		}else{
			$d['error']=1;
			
			$this->load->view('vistaqr', $d);
			
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
		header('Content-Disposition: attachment;filename="PagoFacilBolivia-'.$numerotransaccion.'.png"');
	   header('Content-Type: application/force-download'); 
	   echo base64_decode($valor);
		}else{
		echo "ocurrio un error o no existe la transaccion";
		}
	}
	public function revisarsession()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['ultima']=$this->servicios->getultimatransaccion(3859);
		echo "<pre>";
		print_r($d);
		echo "</pre>";
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

	public function  FormPruebaEnvioParametrosAPagoFacilCheckOut()
	{
		
		// Estas son las variables que l aplicacion recolecta para el boton y que se mandaran al formulario		
		$lcPedidoID="4512526" ;
		$lcEmail= "cesar.corvera@pagofacil.com.bo";
		$lnTelefono=68921251 ;
		$lnMonto=10 ;
		$lcMoneda="BOB" ;
		$lcParametro1="";
		$lcParametro2="";
		$lcParametro3="";
		$lcParametro4="";

		// Los Tokens Entregados al comercio via Email

		// Identificador del comecio
		$tcComerceID ="76a50887d8f1c2e9301755428990ad81479ee21c25b43215cf524541e0503269";
		
		$lcTokenServicio="eb3eb2dd3bf268ccb3967ad96caa21b53eaad566f73844c988faafb0f30daa8878dbe5966e0b970ba696ec4caf9aa5661802935f86717c481f1670e63f35d5040703f4b271fa85ec67b6faea8b34e41859e7859bb4eea854fad617e970867e4031e09915e27ac73d25f2cd9fee2a3d9f7fd5e4636170c738556ad684774989c0";
		$lcTokenSecret="IH3HDGKKI233TTNZ6NVZ98TQ";

		// Aquí se concatena todos los datos para crear la firma
		$lcCadenaAFirmar= "$lcTokenServicio|$lcEmail|$lnTelefono|$lcPedidoID|$lnMonto|$lcMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4" ;
		
		// aqui se genera la firma  con la variable $lcCadenaAFirmar
		$lcFirma= hash('sha256', $lcCadenaAFirmar);

		// aqui  se concatena de nuevo pero utilizando la firma al comienzo 
		$lcDatosPago="$lcFirma|$lcEmail|$lnTelefono|$lcPedidoID|$lnMonto|$lcMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4" ;
		
        //Esto es el proceso de encriptacion que ocupa php 
		$lnSizeDatosPago=strlen($lcDatosPago);
		$lcDatosPago=str_pad($lcDatosPago,($lnSizeDatosPago+8-($lnSizeDatosPago%8)), "\0");
		
        //aqui se genera y se guarda  la variable tcparametros que es un encriptado de los datos
		$tcParametros =  openssl_encrypt($lcDatosPago, "DES-EDE3", $lcTokenSecret ,OPENSSL_ZERO_PADDING);
		$laData['lcFirma']=$lcFirma;
		$laData['tcParametros']=$tcParametros;
		$laData['tcComerceID']=$tcComerceID;

		$this->load->view('formulariocheckout',$laData);
	}

	public function  formulariodeboton()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		// aqui estan las variable que la empresa tiene 
		$TokenServicio="eb3eb2dd3bf268ccb3967ad96caa21b53eaad566f73844c988faafb0f30daa8878dbe5966e0b970ba696ec4caf9aa5661802935f86717c481f1670e63f35d5040703f4b271fa85ec67b6faea8b34e41859e7859bb4eea854fad617e970867e4031e09915e27ac73d25f2cd9fee2a3d9f7fd5e4636170c738556ad684774989c0";
		$TokenSecret="IH3HDGKKI233TTNZ6NVZ98TQ";
		// estas son las variables que l aplicacion recolecta para el boton y que se mandaran al formulario
		//$d['EmpresaID']= "00036";
		$d['PedidoID']=4512526 ;
		$d['Email']= "laionerplus@gmail.com";
		$d['Telefono']=68921251 ;
		$d['Monto']=152.23 ;
		$d['Moneda']="Bs" ;
		$d['tcComerceID']="76a50887d8f1c2e9301755428990ad81479ee21c25b43215cf524541e0503269";
		// aqui estoy guardando lo mismo pero para crear la firma
		//$EmpresaID= "00036";
		$PedidoID=4512526 ;
		$Email= "laionerplus@gmail.com";
		$Telefono=68921251 ;
		$Monto=152.23 ;
		$Moneda="Bs" ;
		$Parametro1="";
		$Parametro2="";
		$Parametro3="";
		$Parametro4="";
		        //“TokenService|Email|Telefono|PedidoID|Monto|Moneda|P1|P2|P3|P4”
		// aqui se concatena todos los datos para crear la firma
		$cadena= "$TokenServicio|$Email|$Telefono|$PedidoID|$Monto|$Moneda|$Parametro1|$Parametro2|$Parametro3|$Parametro4" ;
		// aqui se genera la firma  con la variable $cadena
		 $d['Firma']= hash('sha256', $cadena);
		$firma=$d['Firma'];
		// aqui  se concatena de nuevo pero utilizando la firma al comienzo 
		$datospago="$firma|$Email|$Telefono|$PedidoID|$Monto|$Moneda|$Parametro1|$Parametro2|$Parametro3|$Parametro4" ;
		//esto es el proceso de encriptacion que ocupa php 
		$lenght=strlen($datospago);
		$datospago=str_pad($datospago,($lenght+8-($lenght%8)), "\0");
		//aqui se genera y se guarda  la variable tcparametros que es un encriptado de los datos
		$d['tcParametros'] =  openssl_encrypt($datospago, "DES-EDE3", $TokenSecret ,OPENSSL_ZERO_PADDING);

		$this->load->view('formularioprueba',$d);
	}

	public function getempresaspagadasfrecuentes()
	{

		if(!isset($_SESSION['empresaspagadas']))
		{
			$d['empresaspagadas']=$this->servicios->getempresaspagadasfrecuentes($_SESSION['cliente']);
			if(isset($d['empresaspagadas']))
			{
				$_SESSION['empresaspagadas']=$d['empresaspagadas']->values;
				echo json_encode($d['empresaspagadas']->values);
			}
		}else{
			echo json_encode($_SESSION['empresaspagadas']);
		}


	}
	public function getallempresas()
	{
		
		$empresaiID= '';
		if(!isset($_SESSION['allempresa']))
		{
			$d['empresas']=$this->servicios->getempresasimple($empresaiID ,$_SESSION['cliente']);
			if(isset($d['empresas']))
			{
				$_SESSION['allempresas']=$d['empresas']->values;
				echo json_encode($d['empresas']->values);
			}
		}else{
			echo json_encode($_SESSION['allempresas']);
		}


	}
	public function getrubros()
	{

		$d['rubros']=$this->servicios->get_list_rubros($_SESSION['cliente']);

		if(isset($d['rubros']))
		{
			echo json_encode($d['rubros']->values);
		}else{
				echo json_encode(array());
		}		
	

	}
	public function cargaragofacilentubarrio()
	{
		//echo json_encode();
		$d['puntoscobranza']=$this->servicios->getPuntoCobranza($_SESSION['cliente']);
		

		if(isset($d['puntoscobranza']))
		{
			echo json_encode($d['puntoscobranza']->values);
		}else{
				echo json_encode(array());
		}		
	

	}
	public function buscadorbilletera()
	{
		$datos=$this->input->post("datos");
		$tnCliente=$datos["codigo"];
		$billetera=$this->servicios->getbilleterausuario($tnCliente);
		$_SESSION['gaBilleteras']=$billetera->values;
		echo json_encode($billetera->values);

	}

	public function actualizarperfilfrecuente()
	{
		//$datos=$this->input->post("datos");
		$tnCliente=$_SESSION['cliente'];
		$tnPerfil=$this->input->post("perfil");
		$_SESSION['PerfilFrecuente']=$tnPerfil;
		$laServicio=$this->servicios->actualizarperfilfrecuente($tnCliente,$tnPerfil);
		echo json_encode($laServicio);
	}
	public function puntosdecobranza()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente=1;
		$ubicaciones=$this->servicios->getubicaciones($tnCliente);
		$metodopagoaux=$this->servicios->getmetodospago($tnCliente);
		$empresas=$this->servicios->ListarEmpresas2($tnCliente);
		$d["metodosdepago"]=$metodopagoaux->values;
		$d["puntos"]=$ubicaciones->values;
		$d["empresas"]=$empresas->values;
		$d["ubicaciones"]=array();
		
		
		

		for ($i=0; $i < count($d["puntos"]) ; $i++) { 
			$nuevo=array("nombreEstablecimiento"=> $d["puntos"][$i]->nombreEstablecimiento , 'latitud'=>$d["puntos"][$i]->latitud , 'latitud'=>$d["puntos"][$i]->latitud  , 'tipo'=> "PF" , 'longitud'=> $d["puntos"][$i]->longitud );
			array_push($d['ubicaciones'], $nuevo);	
		} 

		for ($i=0; $i < count($d["metodosdepago"]) ; $i++) { 
			$nuevo=array("nombreEstablecimiento"=> $d["metodosdepago"][$i]->nombre , 'latitud'=>$d["metodosdepago"][$i]->latitud , 'latitud'=>$d["metodosdepago"][$i]->latitud  , 'tipo'=> "MP" , 'longitud'=> $d["metodosdepago"][$i]->longitud );
			array_push($d['ubicaciones'], $nuevo);	
		}
		for ($i=0; $i < count($d["empresas"]) ; $i++) { 
			$nuevo=array("nombreEstablecimiento"=> $d["empresas"][$i]->descripcion , 'latitud'=>$d["empresas"][$i]->latitud , 'latitud'=>$d["empresas"][$i]->latitud  , 'tipo'=> "EM" , 'longitud'=> $d["empresas"][$i]->longitud );
			array_push($d['ubicaciones'], $nuevo);	
		}
		$d["ubicaciones"]=json_encode($d["ubicaciones"]);

		$this->load->view('puntosdecobranza/index2', $d);
		
		
	}

	public function comopagar()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$entidades=$this->servicios->genentidadesfinancieras(1);
		$d['entidades']=$entidades->values;	
		$this->load->view('entidadescomopagar' , $d);

	}

	public function metodospagovista($lan,$tokenservice)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$metodopago=$this->servicios->getmetodosbyToken($tokenservice);
		$d['metodosdepago']=$metodopago->values;
		$this->load->view('metodosdepagospagofacil' , $d);		
	
				//echo json_encode($d['metodosdepagomenu']);
	}


	public function empresasafiliadas()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnMontoTotal= 1000;
        $tnEmpresa= 1;
        $tnCliente= "3859";
        $tcDireccion= "c. Madrejón # 264 Barrio Santa Rosita ";
        $tnTipoDocumentoFiscal= 1;
        $tnCodigoTipoDocumentoIdentidad= 1;
        $tnNumeroDocumento= 11385389;
        $tcNombreRazonSocial = "cesarcorvera";
        $tnMontoDescuento= 200;
        $tnCodigoCliente= 3859;
        $tnCodigoDocumentoSector= 1 ;
        $tnNitEmisor= 11111;
        $tcLeyenda= 20; 
        $tcCodigoMoneda= 688;
        $tnMontoMoneda= 1000;
        $tnTipoCambio= 688;
        $tnNroPedido= 2;
        $tnTipoModalidad= 4;
		$tnMetodoPago= 2;
        $tnNumeroTarjeta="4797000000007896"  ;
		$tcUsuario="Layala";
		
		$ArrayProductos= array();
		$product_detalle=array( 
			"ActividadEconomica"=>11110,
			"CodigoProducto" => "codigo1", 
			"DescripcionProducto" => "descripcionproducto1", 
			'Cantidad'=>  1,
			"PrecioUnitario"=>500  ,  
			"MontoDescuento" => 100, 
			"CodigoProductoSin"=> 1377,
			"UnidadMedida"=> 1
			);
		$product_detalle2=array( 
				"ActividadEconomica"=>11110,
				"CodigoProducto" => "codigo2", 
				"DescripcionProducto" => "descripcionproducto2", 
				'Cantidad'=>  1,
				"PrecioUnitario"=> 200  ,  
				"MontoDescuento" => 50, 
				"CodigoProductoSin"=> 1377,
				"UnidadMedida"=> 1
		);
		$product_detalle3=array( 
			"ActividadEconomica"=>11110,
			"CodigoProducto" => "codigo3", 
			"DescripcionProducto" => "descripcionproducto3", 
			'Cantidad'=>  1,
			"PrecioUnitario"=> 300  ,  
			"MontoDescuento" => 50, 
			"CodigoProductoSin"=> 1377,
			"UnidadMedida"=> 1
	);
		array_push($ArrayProductos , $product_detalle );
		array_push($ArrayProductos , $product_detalle2 );
		array_push($ArrayProductos , $product_detalle3 );
		$taDetalle= json_encode($ArrayProductos);
        $d['servicio']=$this->servicios->emitirfactura(  $tnMontoTotal, $tnEmpresa,$tnCliente,$tcDireccion, $tnTipoDocumentoFiscal, $tnCodigoTipoDocumentoIdentidad,$tnNumeroDocumento, $tcNombreRazonSocial,  $tnMontoDescuento, $tnCodigoCliente,  $tnCodigoDocumentoSector, $tnNitEmisor, $tcLeyenda,$tcCodigoMoneda,$tnMontoMoneda, $tnTipoCambio, $tnNroPedido, $tnTipoModalidad, $taDetalle , $tnMetodoPago  , $tnNumeroTarjeta , $tcUsuario);
		$this->cargarlogbasico("emitirfactura--".json_encode($d['servicio']));
		echo json_encode($d['servicio']);
	}

	function dec_to($num, $sistema = 2) {
		$valores_hexa = array(10 => 'A', 11 => 'B', 12 => 'C', 13 => 'D', 14 => 'E', 15 => 'F');
		if ($sistema > 1 && $sistema < 17) {
			$num_retornar = array();
			while ($num > 1) {
				//$residuo = $num % $sistema;
				$residuo = bcdiv($num, $sistema, 3);
				
				//$residuo =gmp_div_qr($num ,16);
				
				$num = floor($num / $sistema);
				echo "num".$num."<br>";
				$valor=$residuo > 9 ? $valores_hexa[$residuo] : $residuo;
				echo "valor ".$valor."<br>";
				$num_retornar[] = $residuo > 9 ? $valores_hexa[$residuo] : $residuo;
				//print_r($num_retornar);
				//echo "num ".$num."<br>";
			}
			return implode('', array_reverse($num_retornar));
		}
		return 'Verifica que el sistema al que deseas convertir sea válido';
	}

	/**
     * @author Ing. Alfonzo Salgado Flores
     * @fecha 10-06-2021
     */
    public static function str_baseconvert($tcCadena, $tnFromBase=10, $tnToBase=16) {
        $tcCadena = trim($tcCadena);
        if (intval($tnFromBase) != 10) {
            $lnLen = strlen($tcCadena);
            $lcEnCodeFromBase = 0;
            for ($lnIndex=0; $lnIndex<$lnLen; $lnIndex++) {
                $lnValor = base_convert($tcCadena[$lnIndex], $tnFromBase, 10);
                $lcEnCodeFromBase = bcadd(bcmul($lcEnCodeFromBase, $tnFromBase), $lnValor);
            }
        }
        else
            $lcEnCodeFromBase = $tcCadena;
    
        if (intval($tnToBase) != 10) {
            $lcEnCodeToBase = '';
            while (bccomp($lcEnCodeFromBase, '0', 0) > 0) {
                $lnValor = intval(bcmod($lcEnCodeFromBase, $tnToBase));
                $lcEnCodeToBase = base_convert($lnValor, 10, $tnToBase) . $lcEnCodeToBase;
                $lcEnCodeFromBase = bcdiv($lcEnCodeFromBase, $tnToBase, 0);
            }
        }
        else 
            $lcEnCodeToBase = $lcEnCodeFromBase;

        return strtoupper($lcEnCodeToBase);
    }

	public function cargarciudades()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");

		$tnPais=$datos['Pais'];
		$tncliente=$_SESSION['cliente'];
		$d['ciudades']=$this->servicios->getciudades($tncliente,$tnPais)   ;
		echo json_encode($d['ciudades']->values);
	}
	public function cargarestados()
	{

		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");

		$tnPais=$datos['Pais'];
		$tncliente=$_SESSION['cliente'];
		$d['ciudades']=$this->servicios->getestados($tncliente,$tnPais)   ;
		echo json_encode($d['ciudades']->values);
	}


	public function jwtvalidation()
	{

		$jwt=$this->input->post("tcJWT");
		$taDataCardinal=$this->input->post("taDataCardinal");
		$tnIdentificarPestaña=$this->input->post("0");
		$metodos=$this->servicios->jwtvalidation($jwt, $_SESSION[$tnIdentificarPestaña.'metododepago'] , $taDataCardinal);
		
		//$metodos=$this->servicios->jwtvalidation($jwt, 9);
		$this->cargarlogbasico("llegocojwtvalidationnfirmarbcp--".json_encode($metodos));
		echo json_encode($metodos);
		
	}
	/**/

	public function cargarlogbasico($Mensajeerror)
    {
      $logFile = fopen("logservicio.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }






	
}