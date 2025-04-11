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
	
		$d['fechaini'] =$datos['FechaInicial'];
		$d['fechafin'] =  $datos['FechaFinal'];
		
		$tnCliente =  $_SESSION['cliente'];
		$tcFechaInicial= $d['fechaini'];
		$tcfechaFinal=$d['fechafin'];
		$tnBilletera =  $_SESSION['lnIdBilletera'] ;
		$tnTipo=$datos['tipo'];	
		$reportemovimiento=$this->servicios->reportebilletera($tnCliente  ,$tcFechaInicial  , $tcfechaFinal , $tnBilletera );
		$this->cargarlog("llego -->reportebilletera ".json_encode($reportemovimiento));
		$cadena=""; 
		if(is_null($reportemovimiento))
		{
			echo " <br><br><br><center>  NO TIENE MOVIMIENTOS EN ESTE RANGO DE FECHAS   </center>" ;
			return 1;
		}
		$valor= $reportemovimiento->values->facturaPDF  ;	
		//$valor= json_decode( $reportemovimiento->values->facturaPDF ) ;	
		foreach($valor  as $byte){
			$cadena.=chr($byte);
		}
	
		$fileToDownload = $cadena;
		$fichero =$_SERVER["DOCUMENT_ROOT"].'/online/application/assets/documentospdf/reportebilletera-'.$tnCliente.date('is').'.pdf';
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/online/application/assets/documentospdf/reportebilletera-'.$tnCliente.date('is').'.pdf';
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

	public function reportehistoricocliente()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);


		$datos=$this->input->post("datos");
	
		$d['fechaini'] =$datos['FechaInicial'];
		$d['fechafin'] =  $datos['FechaFinal'];
		
		$tnCliente =  $_SESSION['cliente'];
		$tcFechaInicial= $d['fechaini'];
		$tcfechaFinal=$d['fechafin'];
		$tnBilletera =  $_SESSION['lnIdBilletera'] ;
		$tnTipo=$datos['tipo'];	
		$reportemovimiento=$this->servicios->reportehistoricocliente($tnCliente  ,$tcFechaInicial  , $tcfechaFinal , $tnBilletera );
		$this->cargarlog("llego -->reportehistoricocliente ".json_encode($reportemovimiento));
		$cadena=""; 
		$valor= $reportemovimiento->values->facturaPDF  ;	
		//$valor= json_decode( $reportemovimiento->values->facturaPDF ) ;	
		foreach($valor  as $byte){
			$cadena.=chr($byte);
		}
	
		$fileToDownload = $cadena;
		$fichero =$_SERVER["DOCUMENT_ROOT"].'/web_pago_facil/application/assets/documentospdf/reportehistorico-'.$tnCliente.date('is').'.pdf';
		// por le momento voy a ocmnetar esta linea ya ue no se va crera nada 
		file_put_contents($fichero, $fileToDownload);
		$fichero2 ='/web_pago_facil/application/assets/documentospdf/reportehistorico-'.$tnCliente.date('is').'.pdf';
		$d['documentopdf']=$fichero2;
		if (file_exists($d['documentopdf'])) {
			echo "El fichero $fichero2 existe";
		} else {
			echo "El fichero $fichero2 no existe";
		}
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
