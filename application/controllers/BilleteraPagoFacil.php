<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BilleteraPagoFacil extends CI_Controller {

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
		
		/*
		if(!@$this->session->userdata('cliente')){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect($d['url']."?m=Usted tiene que iniciar session !!!");
		}
		*/
    }


	public function index()
	{	
		$laData= array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente =743;
		$reportecomisiones=$this->servicios->reportecomisiones($tnCliente);
		$laData['comisiones']=$reportecomisiones->values;
		$this->load->view('pagofacilentubarrio/index', $laData);
	
	}
	public function inicio($lan,$tipo)
	{	
		$laData= array();
		$this->Msecurity->url_and_lan($laData);
		$tnCliente =$_SESSION['cliente'];
		$reportecomisiones=$this->servicios->reportecomisiones($tnCliente);
		$laData['comisiones']=$reportecomisiones->values;
		$laData['tipo']=$tipo;
		$billeterausuario=$this->servicios->getbilleterausuario($tnCliente);
		$laData['Datos']=$billeterausuario->values[0];
		$_SESSION['lnIdBilletera']=$laData['Datos']->idBilletera;
		$this->load->view('pagofacilentubarrio/index', $laData);
	

	
	}

	public function reportemovimientobilletera()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);


		$datos=$this->input->post("datos");
	
		$d['fechaini'] = $datos['FechaInicial'];
		$d['fechafin'] = $datos['FechaFinal'];
		
		$tnCliente =   $_SESSION['cliente'];
		$tcFechaInicial=$d['fechaini'];
		$tcfechaFinal=$d['fechafin'];
		$tnBilletera =  $_SESSION['lnIdBilletera'] ;
		$reportemovimiento=$this->servicios->reportebilletera($tnCliente  ,$tcFechaInicial  , $tcfechaFinal , $tnBilletera );
		$this->cargarlog("llego -->reportebilletera ".json_encode($reportemovimiento));
		
		$cadena="";
		foreach($reportemovimiento->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		$fileToDownload = $cadena;
		$fichero = $_SERVER["DOCUMENT_ROOT"].'/web_pago_facil/application/assets/documentospdf/billetera-pagoacil.pdf';
		//$fichero =$_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/billetera-'.$idcliente.$factura.date('y-m-d--H:i:s').'.pdf';
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/web_pago_facil/application/assets/documentospdf/billetera-pagoacil.pdf';
		$d['documentopdf']=$fichero2;
		$this->load->view('pagofacilentubarrio/reportemovimientos', $d);

		
	
	}
	public function reportecomisionbilletera()
	{

		$laData = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente =$_SESSION['cliente'];
		$reportecomisiones=$this->servicios->reportecomisiones($tnCliente);
		$laData['comisiones']=$reportecomisiones->values;
		$this->load->view('pagofacilentubarrio/reportecomisiones', $laData);

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
	public function cargarlog($Mensajeerror)
    {
      $logFile = fopen("log.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }

	/**/
}