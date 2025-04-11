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
		echo Date('Y-m-d  H:m:s');
	
			$maxlifetime = ini_get("session.gc_maxlifetime");
			echo date_default_timezone_get() ;
			echo '<pre>';
			print_r($maxlifetime ) ;
			echo '</pre>' ;

		//$tload->view('index', $d);
	
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
	public function getrubros()
	{

		$d['rubros']=$this->servicios->get_list_rubros($_SESSION['cliente']);

		if(isset($d['rubros']))
		{
			echo json_encode($d['rubros']->values);
		}else{

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
	public function buscadorbilletera()
	{
		$datos=$this->input->post("datos");
		$tnCliente=$datos["codigo"];
		//echo json_encode($tnCliente);
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
  
	public function obtenerhora()
	{
		echo date('h:i:s A');
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
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

	
	public function puntosdecobranza2($lan,$lat , $long)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		echo "$lat , $long";
		
		$tnCliente=1;
		$ubicaciones=$this->servicios->getubicaciones($tnCliente);
		$metodopagoaux=$this->servicios->getmetodospago($tnCliente);
		$empresas=$this->servicios->ListarEmpresas2($tnCliente);
		$d["metodosdepago"]=$metodopagoaux->values;
		$d["puntos"]=$ubicaciones->values;
		$d["empresas"]=$empresas->values;
		$d["ubicaciones"]=array();
		
		$nuevo=array("nombreEstablecimiento"=> "Punto" , 'latitud'=>$lat , 'latitud'=>$lat , 'tipo'=> "REF" , 'longitud'=> $long );
			array_push($d['ubicaciones'], $nuevo);	
		

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
		
		$metodos=$this->servicios->jwtvalidation($jwt, $_SESSION['metododepago'] , $taDataCardinal);
		
		//$metodos=$this->servicios->jwtvalidation($jwt, 9);
		$this->cargarlogbasico("llegocojwtvalidationnfirmarbcp--".json_encode($metodos));
		echo json_encode($metodos);
		
	}
	public function comopagar()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$entidades=$this->servicios->genentidadesfinancieras(1);
		$d['entidades']=$entidades->values;		
		$this->load->view('entidadescomopagar' , $d);
		//$this->load->view('pruebaabrirapp' , $d);


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

	public function metodospagovista($lan,$tokenservice = "51247fae280c20410824977b0781453df59fad5b23bf2a0d14e884482f91e09078dbe5966e0b970ba696ec4caf9aa5661802935f86717c481f1670e63f35d5041c31d7cc6124be82afedc4fe926b806755efe678917468e31593a5f427c79cdf016b686fca0cb58eb145cf524f62088b57c6987b3bb3f30c2082b640d7c52907")
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$metodopago=$this->servicios->getmetodosbyToken($tokenservice);

		$d['metodosdepago']=$metodopago->values;
		$this->load->view('metodosdepagospagofacil' , $d);		
	
				//echo json_encode($d['metodosdepagomenu']);
	}

	public function MandarAyudaQr()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		$datos=$this->input->post("datos");
		$tnTransaccionDePago=$datos["tnTransaccionDePago"];

		$metodos=$this->servicios->MandarAyudaQr($tnTransaccionDePago);
		$this->cargarlogbasico("MandarAyudaQr-$tnTransaccionDePago-".json_encode($metodos));
		echo "ñlaksjdalksj".json_encode($metodos);
	
	}

	
	public function cargarlogbasico($Mensajeerror)
    {
      $logFile = fopen("logservicio.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }

	/**/
}